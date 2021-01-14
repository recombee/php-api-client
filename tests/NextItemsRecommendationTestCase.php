<?php

/*
 * This file is auto-generated, do not edit
 */

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;
use Recombee\RecommApi\Requests as Reqs;

abstract class NextItemsRecommendationTestCase extends RecommendationDataTestCase {

    abstract protected function createRequest($recomm_id,$count);

    public function testNextItemsRecommendation() {

         //it recommends
         $req = new Reqs\RecommendItemsToUser('entity_id',3,['returnProperties' => true]);
         $resp = $this->client->send($req);
         $req = $this->createRequest($resp['recommId'],3);
         $resp = $this->client->send($req);
         $this->assertCount(3, $resp['recomms']);
         $req = $this->createRequest($resp['recommId'],3);
         $resp = $this->client->send($req);
         $this->assertCount(3, $resp['recomms']);

    }
}

?>
