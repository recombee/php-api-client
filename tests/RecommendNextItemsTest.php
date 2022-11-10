<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\RecommendNextItems;

class RecommendNextItemsTest extends NextItemsRecommendationTestCase {

    protected function createRequest($recomm_id, $count) {
        return new RecommendNextItems($recomm_id, $count);
    }
}
