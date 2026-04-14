<?php

/*
 * This file is auto-generated, do not edit
 */

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;
use Recombee\RecommApi\Requests as Reqs;

abstract class NextItemSegmentsRecommendationTestCase extends RecombeeTestCase {

    abstract protected function createRequest($recomm_id,$count);

    public function testNextItemSegmentsRecommendation() {

         //it rejects request with invalid recommId
         $req = new Reqs\RecommendNextItemSegments('invalid_recomm_id',5);
         try {

             $this->client->send($req);
             throw new \Exception('Exception was not thrown');
         }
         catch(Exc\ResponseException $e)
         {
            $this->assertEquals(400, $e->status_code);
         }

         //it rejects request to recommId which does not return item-segments
         $req = new Reqs\RecommendItemsToUser('entity_id',3);
         $resp = $this->client->send($req);
         $req = $this->createRequest($resp['recommId'],5);
         try {

             $this->client->send($req);
             throw new \Exception('Exception was not thrown');
         }
         catch(Exc\ResponseException $e)
         {
            $this->assertEquals(400, $e->status_code);
         }

    }
}
