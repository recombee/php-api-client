<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\RecommendUsersToItem;

class RecommendUsersToItemTest extends RecommendationTestCase {

    protected function createRequest($item_id, $count, $optional=array()) {
        return new RecommendUsersToItem($item_id, $count, $optional);
    }
}
