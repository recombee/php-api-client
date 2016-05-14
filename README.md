# Recombee API Client

A PHP client for easy use of the [Recombee](https://www.recombee.com/) recommendation API.

Documentation of the API can be found at [docs.recombee.com](https://docs.recombee.com/).

## Installation

The best way to install the client is through dependency manager [Composer](https://getcomposer.org/):

```
composer require recombee/php-api-client
```
or
```
{
    "require": {
        "recombee/php-api-client": ">=0.1"
    }
}
```

## Examples

### Basic example
```php
use Recombee\RecommApi\Client;
use Recombee\RecommApi\Requests as Reqs;
use Recombee\RecommApi\Exceptions as Ex;

const NUM = 100;
const PROBABILITY_PURCHASED = 0.01;

// Prepare some users and items
$my_user_ids = array();
$my_item_ids = array();
for($i=0; $i < NUM; $i++) {
    array_push($my_user_ids, "user-{$i}");
    array_push($my_item_ids, "item-{$i}");
}

// Generate some random purchases of items by users
$my_purchases = array();
foreach ($my_user_ids as $user_id) {
    foreach ($my_item_ids as $item_id) {
        if(mt_rand() / mt_getrandmax() < PROBABILITY_PURCHASED)
            array_push($my_purchases, ['user'=>$user_id, 'item'=>$item_id]);
    }
}

// Use Recombee recommender
$client = new Client('client-test', 'jGGQ6ZKa8rQ1zTAyxTc0EMn55YPF7FJLUtaMLhbsGxmvwxgTwXYqmUk5xVZFw98L');

try
{
    $client->send(new Reqs\ResetDatabase()); //Clear everything from the database

    //Create requests and send the data to Recombee, use Batch for faster processing
    echo "Send users\n";
    $user_requests = array_map(function($userId) {return new Reqs\AddUser($userId);}, $my_user_ids);
    $client->send(new Reqs\Batch($user_requests));

    echo "Send items\n";
    $item_requests = array_map(function($itemId) {return new Reqs\AddItem($itemId);}, $my_item_ids);
    $client->send(new Reqs\Batch($item_requests));

    echo "Send purchases\n";
    $purchase_requests = array_map(function($tuple)
                        {return new Reqs\AddPurchase($tuple['user'], $tuple['item'], time());}, $my_purchases);
    $client->send(new Reqs\Batch($purchase_requests));

    // Get 5 recommendations for user 'user-25'
    $recommended = $client->send(new Reqs\UserBasedRecommendation('user-25', 5, ['rotationRate' => 0]));
    echo 'Recommended items: ' . implode(',',$recommended) . "\n";
}
catch(Ex\ApiTimeoutException $e)
{
    //use fallback
}
```

### Using property values
```php
use Recombee\RecommApi\Client;
use Recombee\RecommApi\Requests as Reqs;
use Recombee\RecommApi\Exceptions as Ex;

const NUM = 100;
const PROBABILITY_PURCHASED = 0.1;

$client = new Client('client-test', 'jGGQ6ZKa8rQ1zTAyxTc0EMn55YPF7FJLUtaMLhbsGxmvwxgTwXYqmUk5xVZFw98L');
$client->send(new Reqs\ResetDatabase()); //Clear everything from the database

/*
We will use computers as items in this example
Computers have three properties 
  - price (floating point number)
  - number of processor cores (integer number)
  - description (string)
*/

// Add properties of items
$client->send(new Reqs\AddItemProperty('price', 'double'));
$client->send(new Reqs\AddItemProperty('num-cores', 'int'));
$client->send(new Reqs\AddItemProperty('description', 'string'));

# Prepare requests for setting a catalog of computers
$requests = array();
for($i=0; $i<NUM; $i++)
{
    $r = new Reqs\SetItemValues(
      "computer-{$i}", //itemId
      //values:
      [ 
        'price' => rand(15000, 25000),
        'num-cores' => rand(1, 8),
        'description' => 'Great computer',
        '!cascadeCreate' => true // Use !cascadeCreate for creating item
                                 // with given itemId, if it doesn't exist
      ]
    );
    array_push($requests, $r);
}

// Send catalog to the recommender system
$client->send(new Reqs\Batch($requests));

// Generate some random purchases of items by users
$requests = array();

for($i=0; $i<NUM; $i++)
    for($j=0; $j<NUM; $j++)
        if(mt_rand() / mt_getrandmax() < PROBABILITY_PURCHASED)
        {
           $r = new Reqs\AddPurchase("user-{$i}", "computer-{$j}", time(), ['cascadeCreate' => true]);
           array_push($requests, $r);
        }
        
// Send purchases to the recommender system
$client->send(new Reqs\Batch($requests));

// Get 5 recommendations for user-42, who is currently viewing computer-6
$recommended = $client->send(new Reqs\ItemBasedRecommendation('computer-6', 5, ['targetUserId' => 'user-42']));
echo 'Recommended items: ' . implode(',',$recommended) . "\n";

// Get 5 recommendations for user-42, but recommend only computers that
// have at least 3 cores
$recommended = $client->send(
  new Reqs\ItemBasedRecommendation('computer-6', 5, ['targetUserId' => 'user-42', 'filter' => "'num-cores'>=3"])
  );
echo 'Recommended items with at least 3 processor cores: ' . implode(',',$recommended) . "\n";

// Get 5 recommendations for user-42, but recommend only items that
// are more expensive then currently viewed item (up-sell)
$recommended = $client->send(
  new Reqs\ItemBasedRecommendation('computer-6', 5,
    ['targetUserId' => 'user-42', 'filter' => "'price' > context_item[\"price\"]"])
  );
echo 'Recommended up-sell items: ' . implode(',',$recommended) . "\n"
```

### Exception handling

For the sake of brevity, the above examples omit exception handling. However, various exceptions can occur while processing request, for example because of adding an already existing item, submitting interaction of nonexistent user or because of timeout.

We are doing our best to provide the fastest and most reliable service, but production-level applications must implement a fallback solution since errors can always happen. The fallback might be, for example, showing the most popular items from the current category, or not displaying recommendations at all.

Example:
```php
use Recombee\RecommApi\Client;
use Recombee\RecommApi\Requests as Reqs;
use Recombee\RecommApi\Exceptions as Ex;

try
{
    $recommended = $client->send(
      new Reqs\ItemBasedRecommendation('computer-6', 5,
        ['targetUserId' => 'user-42', 'filter' => "'price' > context_item[\"price\"]"])
    );
}
catch(Ex\ApiTimeoutException $e)
{
    //Handle timeout => use fallback
}
catch(Ex\ResponseException $e)
{
    //Handle errorneous request => use fallback
}
catch(Ex\ApiException $e)
{
    //ApiException is parent of both ResponseException and ApiTimeoutException
}
```