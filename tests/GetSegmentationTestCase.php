<?php

/*
 * This file is auto-generated, do not edit
 */

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;
use Recombee\RecommApi\Requests as Reqs;

abstract class GetSegmentationTestCase extends RecombeeTestCase {

    abstract protected function createRequest($segmentation_id);

    public function testGetSegmentation() {

         //it gets existing segmentation
         $req = new Reqs\CreatePropertyBasedSegmentation('seg1','items','str_property');
         $resp = $this->client->send($req);
         $req = $this->createRequest('seg1');
         $resp = $this->client->send($req);
         $this->assertEquals('seg1',$resp['segmentationId']);

    }
}
