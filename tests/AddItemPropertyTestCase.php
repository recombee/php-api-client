<?php

/*
 * This file is auto-generated, do not edit
 */

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;
use Recombee\RecommApi\Requests as Reqs;

abstract class AddItemPropertyTestCase extends RecombeeTestCase {

    abstract protected function createRequest($property_name,$type,$optional=array());

    public function testAddItemProperty() {

         //it does not fail with valid name and type
         $req = $this->createRequest('number','int');
         $resp = $this->client->send($req);
         $req = $this->createRequest('str','string');
         $resp = $this->client->send($req);

         //it fails with invalid type
         $req = $this->createRequest('prop','integer');
         try {

             $this->client->send($req);
             throw new \Exception('Exception was not thrown');
         }
         catch(Exc\ResponseException $e)
         {
            $this->assertEquals(400, $e->status_code);
         }

         //it really stores property to the system
         $req = $this->createRequest('number2','int');
         $resp = $this->client->send($req);
         try {

             $this->client->send($req);
             throw new \Exception('Exception was not thrown');
         }
         catch(Exc\ResponseException $e)
         {
            $this->assertEquals(409, $e->status_code);
         }

         //it does not fail with valid property role and metadata
         $req = $this->createRequest('title','string',['role' => 'title']);
         $resp = $this->client->send($req);

         //it fails with duplicate property role or invalid metadata
         $req = $this->createRequest('str4','string',['role' => 'summary']);
         $resp = $this->client->send($req);
         try {

             $this->client->send($req);
             throw new \Exception('Exception was not thrown');
         }
         catch(Exc\ResponseException $e)
         {
            $this->assertEquals(409, $e->status_code);
         }
         $req = $this->createRequest('str5','string',['role' => 'titl']);
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
