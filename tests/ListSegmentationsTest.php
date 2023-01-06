<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\ListSegmentations;

class ListSegmentationsTest extends ListSegmentationsTestCase {

    protected function createRequest($source_type) {
        return new ListSegmentations($source_type);
    }
}
