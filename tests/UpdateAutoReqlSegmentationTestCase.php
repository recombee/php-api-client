<?php

/*
 * This file is auto-generated, do not edit
 */

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;
use Recombee\RecommApi\Requests as Reqs;

abstract class UpdateAutoReqlSegmentationTestCase extends RecombeeTestCase {

    abstract protected function createRequest($segmentation_id,$optional=array());

    public function testUpdateAutoReqlSegmentation() {

         //it updates auto ReQL segmentation
         $req = new Reqs\CreateAutoReqlSegmentation('seg1','items','{\'str_property\'}',['title' => 'Test Segmentation','description' => 'For test purposes']);
         $resp = $this->client->send($req);
         $req = $this->createRequest('seg1',['title' => 'New title','expression' => '{\'str_property\' + \'str_property\'}','description' => 'Updated']);
         $resp = $this->client->send($req);

    }
}
