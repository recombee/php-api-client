<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\UpdatePropertyBasedSegmentation;

class UpdatePropertyBasedSegmentationTest extends UpdatePropertyBasedSegmentationTestCase {

    protected function createRequest($segmentation_id, $optional=array()) {
        return new UpdatePropertyBasedSegmentation($segmentation_id, $optional);
    }
}
