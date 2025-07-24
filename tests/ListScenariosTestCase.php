<?php

/*
 * This file is auto-generated, do not edit
 */

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;
use Recombee\RecommApi\Requests as Reqs;

abstract class ListScenariosTestCase extends RecombeeTestCase {

    abstract protected function createRequest();

    public function testListScenarios() {

         //it lists scenarios
         $req = $this->createRequest();
         $resp = $this->client->send($req);

    }
}
