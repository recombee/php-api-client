<?php

/*
 * This file is auto-generated, do not edit
 */

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;
use Recombee\RecommApi\Requests as Reqs;

abstract class CreateManualReqlSegmentationTestCase extends RecombeeTestCase {

    abstract protected function createRequest($segmentation_id,$source_type,$optional=array());

    public function testCreateManualReqlSegmentation() {

         //it creates manual ReQL segmentation
         $req = $this->createRequest('seg1','items',['title' => 'Test Segmentation','description' => 'For test purposes']);
         $resp = $this->client->send($req);
         $req = $this->createRequest('seg1','items',['title' => 'Test Segmentation','description' => 'For test purposes']);
         try {

             $this->client->send($req);
             throw new \Exception('Exception was not thrown');
         }
         catch(Exc\ResponseException $e)
         {
            $this->assertEquals(409, $e->status_code);
         }

    }
}
