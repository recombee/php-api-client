<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\RecommendItemsToUser;

class RecommendItemsToUserTest extends RecommendationTestCase {

    protected function createRequest($user_id, $count, $optional=array()) {
        return new RecommendItemsToUser($user_id, $count, $optional);
    }
}
?>
