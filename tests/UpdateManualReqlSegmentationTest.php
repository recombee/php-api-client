<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\UpdateManualReqlSegmentation;

class UpdateManualReqlSegmentationTest extends UpdateManualReqlSegmentationTestCase {

    protected function createRequest($segmentation_id, $optional=array()) {
        return new UpdateManualReqlSegmentation($segmentation_id, $optional);
    }
}
