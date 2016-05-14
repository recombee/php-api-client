<?php

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;
use Recombee\RecommApi\Requests\AddRating;


class AddRatingTest extends RecombeeTestCase {


    public function testAddRating() {
        
        //does not fail with cascadeCreate
        $req = new AddRating('u_id', 'i_id', 0, 1, ['cascadeCreate' => True]);
        $this->client->send($req);

        //does not fail with existing item and user
        $req = new AddRating('entity_id', 'entity_id', 0, 0);
        $this->client->send($req);

        //fails with nonexisting item id
        try {
            
            $req = new AddRating('entity_id', 'notexisting_id', 0, -1);
            $this->client->send($req);
            throw new \Exception('Exception was not thrown');
        }
        catch(Exc\ResponseException $e)
        {
            $this->assertEquals(404, $e->status_code);
        }

        //fails with nonexisting user id
        try {
            $req = new AddRating('notexisting_id', 'entity_id', 0, 0.5);
            $this->client->send($req);
            throw new \Exception('Exception was not thrown');
        }
        catch(Exc\ResponseException $e)
        {
            $this->assertEquals(404, $e->status_code);
        }

        //fails with invalid time
        try {
            $req = new AddRating('entity_id', 'entity_id', -15, 0);
            $this->client->send($req);
            throw new \Exception('Exception was not thrown');
        }
        catch(Exc\ResponseException $e)
        {
            $this->assertEquals(400, $e->status_code);
        }

        //fails with invalid rating
        try {
            $req = new AddRating('entity_id', 'entity_id', 0, -2);
            $this->client->send($req);
            throw new \Exception('Exception was not thrown');
        }
        catch(Exc\ResponseException $e)
        {
            $this->assertEquals(400, $e->status_code);
        }

        //really stores interaction to the system
        try {
            $req = new AddRating('entity_id', 'entity_id', 0, 0);
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