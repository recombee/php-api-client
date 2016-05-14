<?php

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;
use Recombee\RecommApi\Requests\InsertToSeries;
use Recombee\RecommApi\Requests\AddItem;

class InsertToSeriesTest extends RecombeeTestCase {


    public function testInsertToSeries() {
        
        //does not fail when inserting existing item into existing set
        $this->client->send(new AddItem('new_item'));
        $req = new InsertToSeries('entity_id', 'item', 'new_item', 3);
        $this->client->send($req);

        //does not fail when cascadeCreate is used
        $req = new InsertToSeries('new_series', 'item', 'new_item2', 1, ['cascadeCreate' => true]);
        $this->client->send($req);

        //really inserts item to the set
        try {
            $req = new InsertToSeries('entity_id', 'item', 'new_item', 3);
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