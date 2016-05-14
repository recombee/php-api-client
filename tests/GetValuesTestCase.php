<?php

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;

abstract class GetValuesTestCase extends RecombeeTestCase {

    abstract protected function createRequest($entity_id);

    public function testGetValues() {

        //does not fail with existing property
        $req = $this->createRequest('entity_id');
        $resp = $this->client->send($req);
        $this->assertCount(2, $resp);
        $this->assertEquals(42, $resp['int_property']);
        $this->assertEquals('hello', $resp['str_property']);
    }
}
