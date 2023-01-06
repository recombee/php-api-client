<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\RecommendItemSegmentsToItem;

class RecommendItemSegmentsToItemTest extends RecommendItemSegmentsToItemTestCase {

    protected function createRequest($item_id, $target_user_id, $count, $optional=array()) {
        return new RecommendItemSegmentsToItem($item_id, $target_user_id, $count, $optional);
    }
}
