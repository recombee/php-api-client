<?php

/*
 * This file is auto-generated, do not edit
 */

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;

abstract class ListItemInteractionsTestCase extends InteractionsTestCase {

    abstract protected function createRequest($entity_id);

    public function testListItemInteractions() {

         //it lists interactions
         $req = $this->createRequest('item');
         $resp = $this->client->send($req);
         $this->assertCount(1, $resp);
         $this->assertEquals('item',$resp[0]['itemId']);
         $this->assertEquals('user',$resp[0]['userId']);

    }
}

?>
