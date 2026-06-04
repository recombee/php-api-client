<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\AddItemProperty;

class AddItemPropertyTest extends AddItemPropertyTestCase {

    protected function createRequest($property_name, $type, $optional=array()) {
        return new AddItemProperty($property_name, $type, $optional);
    }
}
