<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\AddUserProperty;

class AddUserPropertyTest extends AddUserPropertyTestCase {

    protected function createRequest($property_name, $type, $optional=array()) {
        return new AddUserProperty($property_name, $type, $optional);
    }
}
