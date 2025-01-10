<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\RecommendItemsToItemSegment;

class RecommendItemsToItemSegmentTest extends RecommendToItemSegmentTestCase {

    protected function createRequest($context_segment_id, $target_user_id, $count, $optional=array()) {
        return new RecommendItemsToItemSegment($context_segment_id, $target_user_id, $count, $optional);
    }
}
