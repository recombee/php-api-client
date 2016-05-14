<?php

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;

abstract class GetPropertyInfoTestCase extends RecombeeTestCase {

    abstract protected function createRequest($property_name);

    public function testGetPropertyInfo() {
        
        //does not fail with existing property
        $req = $this->createRequest('int_property');
        $resp = $this->client->send($req);
        $this->assertEquals('int', $resp['type']);

        $req = $this->createRequest('str_property');
        $resp = $this->client->send($req);
        $this->assertEquals('string', $resp['type']);
    }
}
