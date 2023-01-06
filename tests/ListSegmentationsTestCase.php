<?php

/*
 * This file is auto-generated, do not edit
 */

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;
use Recombee\RecommApi\Requests as Reqs;

abstract class ListSegmentationsTestCase extends RecombeeTestCase {

    abstract protected function createRequest($source_type);

    public function testListSegmentations() {

         //it lists existing segmentations
         $req = new Reqs\CreatePropertyBasedSegmentation('seg1','items','str_property');
         $resp = $this->client->send($req);
         $req = $this->createRequest('items');
         $resp = $this->client->send($req);
         $this->assertCount(1, $resp['segmentations']);

    }
}
