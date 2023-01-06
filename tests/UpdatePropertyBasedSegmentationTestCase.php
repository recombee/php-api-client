<?php

/*
 * This file is auto-generated, do not edit
 */

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;
use Recombee\RecommApi\Requests as Reqs;

abstract class UpdatePropertyBasedSegmentationTestCase extends RecombeeTestCase {

    abstract protected function createRequest($segmentation_id,$optional=array());

    public function testUpdatePropertyBasedSegmentation() {

         //it updates property based segmentation
         $req = new Reqs\CreatePropertyBasedSegmentation('seg1','items','str_property');
         $resp = $this->client->send($req);
         $req = $this->createRequest('seg1',['title' => 'New title','propertyName' => 'str_property','description' => 'Updated']);
         $resp = $this->client->send($req);

    }
}
