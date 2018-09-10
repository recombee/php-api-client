<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * AddPurchase request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Adds a purchase of a given item made by a given user.
 */
class AddPurchase extends Request {

    /**
     * @var string $user_id User who purchased the item
     */
    protected $user_id;
    /**
     * @var string $item_id Purchased item
     */
    protected $item_id;
    /**
     * @var string|float $timestamp UTC timestamp of the purchase as ISO8601-1 pattern or UTC epoch time. The default value is the current time.
     */
    protected $timestamp;
    /**
     * @var bool $cascade_create Sets whether the given user/item should be created if not present in the database.
     */
    protected $cascade_create;
    /**
     * @var float $amount Amount (number) of purchased items. The default is 1. For example if `user-x` purchases two `item-y` during a single order (session...), the `amount` should equal to 2.
     */
    protected $amount;
    /**
     * @var float $price Price paid by the user for the item. If `amount` is greater than 1, sum of prices of all the items should be given.
     */
    protected $price;
    /**
     * @var float $profit Your profit from the purchased item. The profit is natural in e-commerce domain (for example if `user-x` purchases `item-y` for $100 and the gross margin is 30 %, then the profit is $30), but is applicable also in other domains (for example at a news company it may be income from displayed advertisement on article page). If `amount` is greater than 1, sum of profit of all the items should be given.
     */
    protected $profit;
    /**
     * @var string $recomm_id If this purchase is based on a recommendation request, `recommId` is the id of the clicked recommendation.
     */
    protected $recomm_id;
    /**
     * @var array Array containing values of optional parameters
     */
   protected $optional;

    /**
     * Construct the request
     * @param string $user_id User who purchased the item
     * @param string $item_id Purchased item
     * @param array $optional Optional parameters given as an array containing pairs name of the parameter => value
     * - Allowed parameters:
     *     - *timestamp*
     *         - Type: string|float
     *         - Description: UTC timestamp of the purchase as ISO8601-1 pattern or UTC epoch time. The default value is the current time.
     *     - *cascadeCreate*
     *         - Type: bool
     *         - Description: Sets whether the given user/item should be created if not present in the database.
     *     - *amount*
     *         - Type: float
     *         - Description: Amount (number) of purchased items. The default is 1. For example if `user-x` purchases two `item-y` during a single order (session...), the `amount` should equal to 2.
     *     - *price*
     *         - Type: float
     *         - Description: Price paid by the user for the item. If `amount` is greater than 1, sum of prices of all the items should be given.
     *     - *profit*
     *         - Type: float
     *         - Description: Your profit from the purchased item. The profit is natural in e-commerce domain (for example if `user-x` purchases `item-y` for $100 and the gross margin is 30 %, then the profit is $30), but is applicable also in other domains (for example at a news company it may be income from displayed advertisement on article page). If `amount` is greater than 1, sum of profit of all the items should be given.
     *     - *recommId*
     *         - Type: string
     *         - Description: If this purchase is based on a recommendation request, `recommId` is the id of the clicked recommendation.
     * @throws Exceptions\UnknownOptionalParameterException UnknownOptionalParameterException if an unknown optional parameter is given in $optional
     */
    public function __construct($user_id, $item_id, $optional = array()) {
        $this->user_id = $user_id;
        $this->item_id = $item_id;
        $this->timestamp = isset($optional['timestamp']) ? $optional['timestamp'] : null;
        $this->cascade_create = isset($optional['cascadeCreate']) ? $optional['cascadeCreate'] : null;
        $this->amount = isset($optional['amount']) ? $optional['amount'] : null;
        $this->price = isset($optional['price']) ? $optional['price'] : null;
        $this->profit = isset($optional['profit']) ? $optional['profit'] : null;
        $this->recomm_id = isset($optional['recommId']) ? $optional['recommId'] : null;
        $this->optional = $optional;

        $existing_optional = array('timestamp','cascadeCreate','amount','price','profit','recommId');
        foreach ($this->optional as $key => $value) {
            if (!in_array($key, $existing_optional))
                 throw new UnknownOptionalParameterException($key);
         }
        $this->timeout = 1000;
        $this->ensure_https = false;
    }

    /**
     * Get used HTTP method
     * @return static Used HTTP method
     */
    public function getMethod() {
        return Request::HTTP_POST;
    }

    /**
     * Get URI to the endpoint
     * @return string URI to the endpoint
     */
    public function getPath() {
        return "/{databaseId}/purchases/";
    }

    /**
     * Get query parameters
     * @return array Values of query parameters (name of parameter => value of the parameter)
     */
    public function getQueryParameters() {
        $params = array();
        return $params;
    }

    /**
     * Get body parameters
     * @return array Values of body parameters (name of parameter => value of the parameter)
     */
    public function getBodyParameters() {
        $p = array();
        $p['userId'] = $this->user_id;
        $p['itemId'] = $this->item_id;
        if (isset($this->optional['timestamp']))
             $p['timestamp'] = $this-> optional['timestamp'];
        if (isset($this->optional['cascadeCreate']))
             $p['cascadeCreate'] = $this-> optional['cascadeCreate'];
        if (isset($this->optional['amount']))
             $p['amount'] = $this-> optional['amount'];
        if (isset($this->optional['price']))
             $p['price'] = $this-> optional['price'];
        if (isset($this->optional['profit']))
             $p['profit'] = $this-> optional['profit'];
        if (isset($this->optional['recommId']))
             $p['recommId'] = $this-> optional['recommId'];
        return $p;
    }

}
?>
