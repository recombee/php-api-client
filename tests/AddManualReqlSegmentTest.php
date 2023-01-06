<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\AddManualReqlSegment;

class AddManualReqlSegmentTest extends AddManualReqlSegmentTestCase {

    protected function createRequest($segmentation_id, $segment_id, $filter, $optional=array()) {
        return new AddManualReqlSegment($segmentation_id, $segment_id, $filter, $optional);
    }
}
