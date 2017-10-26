<?php

/*
 * This file is auto-generated, do not edit
 */

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;
use Recombee\RecommApi\Requests as Reqs;

abstract class RecommendationDeprecatedTestCase extends RecombeeTestCase {

    abstract protected function createRequest($user_id,$count,$optional=array());

    public function testRecommendationDeprecated() {

         //it recommends
         $req = $this->createRequest('entity_id',9);
         $resp = $this->client->send($req);
         $this->assertCount(9, $resp);

         //it recommends to previously nonexisting entity with cascadeCreate
         $req = $this->createRequest('nonexisting',9,['cascadeCreate' => true]);
         $resp = $this->client->send($req);
         $this->assertCount(9, $resp);

         //it recommends with expert settings
         $req = $this->createRequest('nonexisting2',9,['cascadeCreate' => true,'expertSettings' => new \stdclass()]);
         $resp = $this->client->send($req);
         $this->assertCount(9, $resp);

    }
}

?>
