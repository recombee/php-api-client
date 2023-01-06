<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\RecommendItemSegmentsToUser;

class RecommendItemSegmentsToUserTest extends RecommendItemSegmentsToUserTestCase {

    protected function createRequest($user_id, $count, $optional=array()) {
        return new RecommendItemSegmentsToUser($user_id, $count, $optional);
    }
}
