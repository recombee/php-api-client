<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\DeleteManualReqlSegment;

class DeleteManualReqlSegmentTest extends DeleteManualReqlSegmentTestCase {

    protected function createRequest($segmentation_id, $segment_id) {
        return new DeleteManualReqlSegment($segmentation_id, $segment_id);
    }
}
