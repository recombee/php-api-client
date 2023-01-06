<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\UpdateManualReqlSegment;

class UpdateManualReqlSegmentTest extends UpdateManualReqlSegmentTestCase {

    protected function createRequest($segmentation_id, $segment_id, $filter, $optional=array()) {
        return new UpdateManualReqlSegment($segmentation_id, $segment_id, $filter, $optional);
    }
}
