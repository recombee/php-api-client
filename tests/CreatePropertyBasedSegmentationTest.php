<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\CreatePropertyBasedSegmentation;

class CreatePropertyBasedSegmentationTest extends CreatePropertyBasedSegmentationTestCase {

    protected function createRequest($segmentation_id, $source_type, $property_name, $optional=array()) {
        return new CreatePropertyBasedSegmentation($segmentation_id, $source_type, $property_name, $optional);
    }
}
