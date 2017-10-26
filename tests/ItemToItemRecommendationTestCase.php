<?php

/*
 * This file is auto-generated, do not edit
 */

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;
use Recombee\RecommApi\Requests as Reqs;

abstract class ItemToItemRecommendationTestCase extends RecombeeTestCase {

    abstract protected function createRequest($item_id,$target_user_id,$count,$optional=array());

    public function testItemToItemRecommendation() {

         //it recommends
         $req = $this->createRequest('entity_id','entity_id',9);
         $resp = $this->client->send($req);

         //it recommends to previously nonexisting entity with cascadeCreate
         $req = $this->createRequest('nonexisting','entity_id',9,['cascadeCreate' => true]);
         $resp = $this->client->send($req);

         //it recommends with expert settings
         $req = $this->createRequest('nonexisting2','entity_id',9,['cascadeCreate' => true,'expertSettings' => new \stdclass()]);
         $resp = $this->client->send($req);

    }
}

?>
