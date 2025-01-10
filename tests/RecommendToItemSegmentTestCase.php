<?php

/*
 * This file is auto-generated, do not edit
 */

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;
use Recombee\RecommApi\Requests as Reqs;

abstract class RecommendToItemSegmentTestCase extends RecombeeTestCase {

    abstract protected function createRequest($context_segment_id,$target_user_id,$count,$optional=array());

    public function testRecommendToItemSegment() {

         //it rejects request to scenario which is not set up
         $req = $this->createRequest('segment_id','entity_id',5,['scenario' => 'scenario1','cascadeCreate' => true]);
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
