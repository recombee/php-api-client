<?php

/*
 * This file is auto-generated, do not edit
 */

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;
use Recombee\RecommApi\Requests as Reqs;

abstract class AddSearchSynonymTestCase extends RecombeeTestCase {

    abstract protected function createRequest($term,$synonym,$optional=array());

    public function testAddSearchSynonym() {

         //it adds search synonym
         $req = $this->createRequest('sci-fi','science fiction',['oneWay' => true]);
         $resp = $this->client->send($req);
         $this->assertEquals('sci-fi',$resp['term']);
         $this->assertEquals('science fiction',$resp['synonym']);
         $req = $this->createRequest('sci-fi','science fiction',['oneWay' => true]);
         try {

             $this->client->send($req);
             throw new \Exception('Exception was not thrown');
         }
         catch(Exc\ResponseException $e)
         {
            $this->assertEquals(409, $e->status_code);
         }

    }
}

?>
