<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\ListUsers;

class ListUsersTest extends ListEntitiesTestCase {

    protected function createRequest() {
        return new ListUsers();
    }
}
?>
