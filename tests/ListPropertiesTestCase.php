<?php

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;

abstract class ListPropertiesTestCase extends RecombeeTestCase {

    abstract protected function createRequest();
    
    public function testListProperties() {
    	
        $req = $this->createRequest();
        $resp = $this->client->send($req);
        $this->assertCount(2, $resp);
        
        $props = array();
        foreach ($resp as $r) {
        	$props[$r['name']] = $r['type'];
        }

        $this->assertEquals('int', $props['int_property']);
        $this->assertEquals('string', $props['str_property']);
    }
}

?>