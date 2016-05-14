<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\ListItems;

class ListItemsTest extends ListEntitiesTestCase {

    protected function createRequest($optional=array()) {
        return new ListItems($optional);
    }
}
?>
