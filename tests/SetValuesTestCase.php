<?php
namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;

abstract class SetValuesTestCase extends RecombeeTestCase {

    abstract protected function createRequest($entity_id, $values);

    public function testSetValues() {
        
        //does not fail with existing entity and property
        $req = $this->createRequest('entity_id', ['int_property' => 5]);
        $this->client->send($req);

        //sets multiple properties
        $req = $this->createRequest('entity_id',['int_property' => 5, 'str_property' => 'test']);
        $this->client->send($req);

        //does not fail with !cascadeCreate
        $req = $this->createRequest('entity_id',['int_property' => 5,
       											'str_property' => 'test',
       											'!cascadeCreate' => true]);
        $this->client->send($req);

        //fails with nonexisting entity
        try {
        	$req = $this->createRequest('nonexisting', ['int_property' => 5]);
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

