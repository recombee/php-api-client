<?php

/*
 * This file is auto-generated, do not edit
 */

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;
use Recombee\RecommApi\Requests as Reqs;

abstract class DeleteSearchSynonymTestCase extends RecombeeTestCase {

    abstract protected function createRequest($id);

    public function testDeleteSearchSynonym() {

         //it deletes search synonym
         $req = new Reqs\AddSearchSynonym('sci-fi','science fiction');
         $resp = $this->client->send($req);
         $req = $this->createRequest($resp['id']);
         $resp = $this->client->send($req);
         $req = $this->createRequest('a968271b-d666-4dfb-8a30-f459e564ba7b');
         try {

             $this->client->send($req);
             throw new \Exception('Exception was not thrown');
         }
         catch(Exc\ResponseException $e)
         {
            $this->assertEquals(404, $e->status_code);
         }

    }
}

?>
