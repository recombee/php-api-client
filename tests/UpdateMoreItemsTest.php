<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\UpdateMoreItems;

class UpdateMoreItemsTest extends UpdateMoreItemsTestCase {

    protected function createRequest($filter, $changes) {
        return new UpdateMoreItems($filter, $changes);
    }
}
