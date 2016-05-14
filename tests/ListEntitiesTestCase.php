<?php

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;

abstract class ListEntitiesTestCase extends RecombeeTestCase {

    abstract protected function createRequest();
    
    public function testListEntities() {
    	
        $req = $this->createRequest();
        $resp = $this->client->send($req);
        $this->assertEquals(['entity_id'], $resp);
    }
}

?>