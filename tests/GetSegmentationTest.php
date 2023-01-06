<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\GetSegmentation;

class GetSegmentationTest extends GetSegmentationTestCase {

    protected function createRequest($segmentation_id) {
        return new GetSegmentation($segmentation_id);
    }
}
