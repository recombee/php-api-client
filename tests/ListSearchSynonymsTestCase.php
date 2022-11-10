<?php

/*
 * This file is auto-generated, do not edit
 */

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;
use Recombee\RecommApi\Requests as Reqs;

abstract class ListSearchSynonymsTestCase extends RecombeeTestCase {

    abstract protected function createRequest($optional=array());

    public function testListSearchSynonyms() {

         //it lists search synonyms
         $req = new Reqs\AddSearchSynonym('sci-fi','science fiction');
         $resp = $this->client->send($req);
         $req = $this->createRequest();
         $resp = $this->client->send($req);
         $this->assertCount(1, $resp['synonyms']);
         $req = $this->createRequest(['count' => 10,'offset' => 1]);
         $resp = $this->client->send($req);
         $this->assertCount(0, $resp['synonyms']);

    }
}
