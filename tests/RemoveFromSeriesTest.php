<?php

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;
use Recombee\RecommApi\Requests\RemoveFromSeries;

class RemoveFromSeriesTest extends RecombeeTestCase {

    public function testRemoveFromSeries() {
        
        //does not fail when removing item that is contained in the set
        $req = new RemoveFromSeries('entity_id', 'item', 'entity_id', 1);
        $this->client->send($req);

        //fails when removing item that is not contained in the set
        try {
            $req = new RemoveFromSeries('entity_id', 'item', 'not_contained', 1);
            $this->client->send($req);
            throw new \Exception('Exception was not thrown');
        }
        catch(Exc\ResponseException $e)
        {
            $this->assertEquals(404, $e->status_code);
        }
    }
    public function testRemoveFromSeriesTime() {
        //fails when removing item which have different time
        try {
            $req = new RemoveFromSeries('entity_id', 'item', 'entity_id', 0);
            $this->client->send($req);
            throw new \Exception('Exception was not thrown');
        }
        catch(Exc\ResponseException $e)
        {
            $this->assertEquals(404, $e->status_code);
        }
    }
}