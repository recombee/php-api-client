<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\AddSeries;

class AddSeriesTest extends AddEntityTestCase {

    protected function createRequest($series_id, $optional=array()) {
        return new AddSeries($series_id, $optional);
    }
}
