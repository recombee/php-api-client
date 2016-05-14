<?php

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;

abstract class AddInteractionTestCase extends RecombeeTestCase {

    abstract protected function createRequest($user_id, $item_id, $timestamp, $optional = array());

    public function testAddInteraction() {
        
        //does not fail with cascadeCreate
        $req = $this->createRequest('u_id', 'i_id', 0, ['cascadeCreate' => True]);
        $this->client->send($req);

        //does not fail with existing item and user
        $req = $this->createRequest('entity_id', 'entity_id', 0);
        $this->client->send($req);

        //fails with nonexisting item id
        try {
            
            $req = $this->createRequest('entity_id', 'notexisting_id', 0);
            $this->client->send($req);
            throw new \Exception('Exception was not thrown');
        }
        catch(Exc\ResponseException $e)
        {
            $this->assertEquals(404, $e->status_code);
        }

        //fails with nonexisting user id
        try {
            $req = $this->createRequest('notexisting_id', 'entity_id', 0);
            $this->client->send($req);
            throw new \Exception('Exception was not thrown');
        }
        catch(Exc\ResponseException $e)
        {
            $this->assertEquals(404, $e->status_code);
        }

        //fails with invalid time
        try {
            $req = $this->createRequest('entity_id', 'entity_id', -15);
            $this->client->send($req);
            throw new \Exception('Exception was not thrown');
        }
        catch(Exc\ResponseException $e)
        {
            $this->assertEquals(400, $e->status_code);
        }

        //really stores interaction to the system
        try {
            $req = $this->createRequest('entity_id', 'entity_id', 0);
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