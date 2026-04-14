<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\RecommendNextItemSegments;

class RecommendNextItemSegmentsTest extends NextItemSegmentsRecommendationTestCase {

    protected function createRequest($recomm_id, $count) {
        return new RecommendNextItemSegments($recomm_id, $count);
    }
}
