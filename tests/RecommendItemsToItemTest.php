<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\RecommendItemsToItem;

class RecommendItemsToItemTest extends ItemToItemRecommendationTestCase {

    protected function createRequest($item_id, $target_user_id, $count, $optional=array()) {
        return new RecommendItemsToItem($item_id, $target_user_id, $count, $optional);
    }
}
?>
