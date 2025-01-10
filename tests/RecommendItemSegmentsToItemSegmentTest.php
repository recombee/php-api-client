<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\RecommendItemSegmentsToItemSegment;

class RecommendItemSegmentsToItemSegmentTest extends RecommendToItemSegmentTestCase {

    protected function createRequest($context_segment_id, $target_user_id, $count, $optional=array()) {
        return new RecommendItemSegmentsToItemSegment($context_segment_id, $target_user_id, $count, $optional);
    }
}
