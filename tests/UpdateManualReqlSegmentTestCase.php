<?php

/*
 * This file is auto-generated, do not edit
 */

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;
use Recombee\RecommApi\Requests as Reqs;

abstract class UpdateManualReqlSegmentTestCase extends RecombeeTestCase {

    abstract protected function createRequest($segmentation_id,$segment_id,$filter,$optional=array());

    public function testUpdateManualReqlSegment() {

         //it updates manual ReQL segment
         $req = new Reqs\CreateManualReqlSegmentation('seg1','items',['title' => 'Test Segmentation','description' => 'For test purposes']);
         $resp = $this->client->send($req);
         $req = new Reqs\AddManualReqlSegment('seg1','first-segment','\'str_property\' != null',['title' => 'First Segment']);
         $resp = $this->client->send($req);
         $req = $this->createRequest('seg1','first-segment','\'str_property\' == null',['title' => 'Updated Segment']);
         $resp = $this->client->send($req);

    }
}
