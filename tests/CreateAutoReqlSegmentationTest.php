<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\CreateAutoReqlSegmentation;

class CreateAutoReqlSegmentationTest extends CreateAutoReqlSegmentationTestCase {

    protected function createRequest($segmentation_id, $source_type, $expression, $optional=array()) {
        return new CreateAutoReqlSegmentation($segmentation_id, $source_type, $expression, $optional);
    }
}
