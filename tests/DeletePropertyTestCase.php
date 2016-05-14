<?php

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;

abstract class DeletePropertyTestCase extends RecombeeTestCase {

    abstract protected function createRequest($property_name);

    public function testDeleteProperty() {
        
        //does not fail with existing property
        $req = $this->createRequest('int_property');
        $this->client->send($req);

        //fails with invalid property
        try {
            
            $req = $this->createRequest('not_valid_id-*.?!');
            $this->client->send($req);
            throw new \Exception('Exception was not thrown');
        }
        catch(Exc\ResponseException $e)
        {
            $this->assertEquals(400, $e->status_code);
        }

        //fails with non-existing property
        try {
            
            $req = $this->createRequest('not_existing');
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