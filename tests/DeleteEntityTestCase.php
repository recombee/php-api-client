<?php

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;

abstract class DeleteEntityTestCase extends RecombeeTestCase {

    abstract protected function createRequest($item_id);

    public function testDeleteEntity() {
        
        //does not fail with existing entity id
        $req = $this->createRequest('entity_id');
        $this->client->send($req);

        //really deletes entity
        try {
            
            $req = $this->createRequest('entity_id');
            $this->client->send($req);
            throw new \Exception('Exception was not thrown');
        }
        catch(Exc\ResponseException $e)
        {
            $this->assertEquals(404, $e->status_code);
        }

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

        //fails with non-existing entity
        try {
            $req = $this->createRequest('valid_id');
            $this->client->send($req);
            throw new \Exception('Exception was not thrown');
        }
        catch(Exc\ResponseException $e)
        {
            $this->assertEquals(404, $e->status_code);
        }
    }
}
?>