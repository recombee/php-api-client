<?php

/*
 * This file is auto-generated, do not edit
 */

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;
use Recombee\RecommApi\Requests as Reqs;

abstract class DeleteSegmentationTestCase extends RecombeeTestCase {

    abstract protected function createRequest($segmentation_id);

    public function testDeleteSegmentation() {

         //it deletes segmentation
         $req = new Reqs\CreatePropertyBasedSegmentation('seg1','items','str_property');
         $resp = $this->client->send($req);
         $req = $this->createRequest('seg1');
         $resp = $this->client->send($req);
         $req = $this->createRequest('seg1');
         try {

             $this->client->send($req);
             throw new \Exception('Exception was not thrown');
         }
         catch(Exc\ResponseException $e)
         {
            $this->assertEquals(404, $e->status_code);
         }

    }
}
