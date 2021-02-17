<?php

/*
 * This file is auto-generated, do not edit
 */

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;
use Recombee\RecommApi\Requests as Reqs;

abstract class DeleteAllSearchSynonymsTestCase extends RecombeeTestCase {

    abstract protected function createRequest();

    public function testDeleteAllSearchSynonyms() {

         //it deletes all search synonyms
         $req = $this->createRequest();
         $resp = $this->client->send($req);

    }
}

?>
