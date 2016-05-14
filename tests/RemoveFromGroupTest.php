<?php

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;
use Recombee\RecommApi\Requests\RemoveFromGroup;

class RemoveFromGroupTest extends RecombeeTestCase {

    public function testRemoveFromGroup() {
        
        //does not fail when removing item that is contained in the set
        $req = new RemoveFromGroup('entity_id', 'item', 'entity_id');
        $this->client->send($req);

        //fails when removing item that is not contained in the set
        try {
            $req = new RemoveFromGroup('entity_id', 'item', 'not_contained');
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