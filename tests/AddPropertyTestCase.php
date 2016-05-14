<?php

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;

abstract class AddPropertyTestCase extends RecombeeTestCase {

    abstract protected function createRequest($property_name, $type);

    public function testAddProperty() {
        
        //does not fail with valid name and type
        $req = $this->createRequest('number', 'int');
        $this->client->send($req);
        $req = $this->createRequest('str', 'string');
        $this->client->send($req);
        

        //fails with invalid type
        try {
            
            $req = $this->createRequest('prop', 'integer');
            $this->client->send($req);
            throw new \Exception('Exception was not thrown');
        }
        catch(Exc\ResponseException $e)
        {
            $this->assertEquals(400, $e->status_code);
        }

        //really stores property to the system
        try {
            $req = $this->createRequest('number', 'int');
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