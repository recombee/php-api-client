<?php

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;
use Recombee\RecommApi\Requests\InsertToGroup;
use Recombee\RecommApi\Requests\AddItem;

class InsertToGroupTest extends RecombeeTestCase {


    public function testInsertToGroup() {
        
        //does not fail when inserting existing item into existing set
        $this->client->send(new AddItem('new_item'));
        $req = new InsertToGroup('entity_id', 'item', 'new_item');
        $this->client->send($req);

        //does not fail when cascadeCreate is used
        $req = new InsertToGroup('new_group', 'item', 'new_item2', ['cascadeCreate' => true]);
        $this->client->send($req);

        //really inserts item to the set
        try {
            $req = new InsertToGroup('entity_id', 'item', 'new_item');
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