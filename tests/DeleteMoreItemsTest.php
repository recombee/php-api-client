<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\DeleteMoreItems;

class DeleteMoreItemsTest extends DeleteMoreItemsTestCase {

    protected function createRequest($filter) {
        return new DeleteMoreItems($filter);
    }
}
?>
