<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\UpdateAutoReqlSegmentation;

class UpdateAutoReqlSegmentationTest extends UpdateAutoReqlSegmentationTestCase {

    protected function createRequest($segmentation_id, $optional=array()) {
        return new UpdateAutoReqlSegmentation($segmentation_id, $optional);
    }
}
