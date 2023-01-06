<?php

/*
 * This file is auto-generated, do not edit
 */

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;
use Recombee\RecommApi\Requests as Reqs;

abstract class SearchItemSegmentsTestCase extends RecombeeTestCase {

    abstract protected function createRequest($user_id,$search_query,$count,$optional=array());

    public function testSearchItemSegments() {

         //it rejects request to scenario which is not set up
         $req = $this->createRequest('entity_id','query',5,['scenario' => 'scenario1','cascadeCreate' => true]);
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
