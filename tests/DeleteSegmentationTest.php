<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\DeleteSegmentation;

class DeleteSegmentationTest extends DeleteSegmentationTestCase {

    protected function createRequest($segmentation_id) {
        return new DeleteSegmentation($segmentation_id);
    }
}
