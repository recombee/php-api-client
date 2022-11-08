<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\RecommendUsersToUser;

class RecommendUsersToUserTest extends RecommendationTestCase {

    protected function createRequest($user_id, $count, $optional=array()) {
        return new RecommendUsersToUser($user_id, $count, $optional);
    }
}
