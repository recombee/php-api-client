<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\CreateManualReqlSegmentation;

class CreateManualReqlSegmentationTest extends CreateManualReqlSegmentationTestCase {

    protected function createRequest($segmentation_id, $source_type, $optional=array()) {
        return new CreateManualReqlSegmentation($segmentation_id, $source_type, $optional);
    }
}
