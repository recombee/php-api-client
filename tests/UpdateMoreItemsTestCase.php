<?php

/*
 * This file is auto-generated, do not edit
 */

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;
use Recombee\RecommApi\Requests as Reqs;

abstract class UpdateMoreItemsTestCase extends RecombeeTestCase {

    abstract protected function createRequest($filter,$changes);

    public function testUpdateMoreItems() {

         //it updates more items
         $req = $this->createRequest('\'int_property\' == 42',['int_property' => 77]);
         $resp = $this->client->send($req);
         $this->assertCount(1, $resp['itemIds']);
         $this->assertEquals(1,$resp['count']);

    }
}

?>
