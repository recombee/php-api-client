<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\DeleteSeries;

class DeleteSeriesTest extends DeleteEntityTestCase {

    protected function createRequest($series_id, $optional=array()) {
        return new DeleteSeries($series_id, $optional);
    }
}
