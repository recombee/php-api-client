<?php

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Client;
use Recombee\RecommApi\Requests as Reqs;
use Recombee\RecommApi\Exceptions as Exc;

abstract class RecommendationTestCase extends RecommendationDataTestCase {

    abstract protected function createRequest($entity_id, $count, $optional = array());

    public function testBasicRecomm() {
        $req = $this->createRequest('entity_id', 9);
        $resp = $this->client->send($req);
        $this->assertCount(9, $resp['recomms']);
    }

    public function testRotation() {

        $req = $this->createRequest('entity_id', 9);
        $recommended1 = $this->client->send($req);
        $this->assertCount(9, $recommended1['recomms']);

        $req = $this->createRequest('entity_id', 9, ['rotationTime' => 10000, 'rotationRate' => 1]);
        $recommended2 = $this->client->send($req);
        $this->assertCount(9, $recommended2['recomms']);

        foreach ($recommended1 as $item_id) {
            $this->assertNotContains($item_id, $recommended2['recomms']);
        }
    }

    public function testInBatch() {
        $num = 25;
        $reqs = array();
        for($i=0; $i<$num; $i++) {
            array_push($reqs, $this->createRequest("entity_{$i}", 9, ['cascadeCreate' => true]));
        }
        $recommendations = $this->client->send(new Reqs\Batch($reqs));
        foreach ($recommendations as $recommendation) {
            $this->assertCount(9, $recommendation['json']['recomms']);
        }
    }

    public function testReturningProperties() {
        $req = $this->createRequest('entity_id', 9, ['returnProperties' => true, 'includedProperties'=>['answer', 'id2', 'empty']]);
        $recommended = $this->client->send($req)['recomms'];
        foreach ($recommended as $rec) {
            $this->assertEquals($rec['values']['id2'], $rec['id']);
            $this->assertEquals(42, $rec['values']['answer']);
            $this->assertArrayHasKey('empty', $rec['values']);
        }

        $req = $this->createRequest('entity_id', 9, ['returnProperties' => true, 'includedProperties'=>'answer,id2']);
        $recommended = $this->client->send($req)['recomms'];
        foreach ($recommended as $rec) {
            $this->assertEquals($rec['values']['id2'], $rec['id']);
            $this->assertEquals(42, $rec['values']['answer']);
            $this->assertArrayNotHasKey('empty', $rec['values']);
        }
    }
}
?>