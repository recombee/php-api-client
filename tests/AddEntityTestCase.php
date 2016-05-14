<?php

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;

abstract class AddEntityTestCase extends RecombeeTestCase {

    abstract protected function createRequest($entity_id);

    public function testAddEntity() {
        //does not fail with valid entity id
        $req = $this->createRequest('valid_id');
        $this->client->send($req);

        //fails with invalid entity id
        try {
            
            $req = $this->createRequest('not_valid_id-*.?!');
            $this->client->send($req);
            throw new \Exception('Exception was not thrown');
        }
        catch(Exc\ResponseException $e)
        {
            $this->assertEquals(400, $e->status_code);
        }

        //really stores entity to the system
        try {
            $req = $this->createRequest('valid_id');
            $this->client->send($req);
            throw new \Exception('Exception was not thrown');
        }
        catch(Exc\ResponseException $e)
        {
            $this->assertEquals(409, $e->status_code);
        }
    }
}

?>