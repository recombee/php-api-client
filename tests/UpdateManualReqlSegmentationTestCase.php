<?php

/*
 * This file is auto-generated, do not edit
 */

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;
use Recombee\RecommApi\Requests as Reqs;

abstract class UpdateManualReqlSegmentationTestCase extends RecombeeTestCase {

    abstract protected function createRequest($segmentation_id,$optional=array());

    public function testUpdateManualReqlSegmentation() {

         //it updates manual ReQL segmentation
         $req = new Reqs\CreateManualReqlSegmentation('seg1','items',['title' => 'Test Segmentation','description' => 'For test purposes']);
         $resp = $this->client->send($req);
         $req = $this->createRequest('seg1',['title' => 'New title','description' => 'Updated']);
         $resp = $this->client->send($req);

    }
}
