<?php

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;

abstract class DeleteInteractionTestCase extends InteractionsTestCase {

    abstract protected function createRequest($user_id, $item_id, $optional);

    public function testDeleteInteraction() {
        
        //does not fail with existing entity id
        $req = $this->createRequest('user', 'item', ['timestamp' => 0]);
        $this->client->send($req);

        //really deletes the interaction
        try {
            
            $req = $this->createRequest('user', 'item');
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