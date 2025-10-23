<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\CompositeRecommendation;

class CompositeRecommendationTest extends CompositeRecommendationTestCase {

    protected function createRequest($scenario, $count, $optional=array()) {
        return new CompositeRecommendation($scenario, $count, $optional);
    }
}
