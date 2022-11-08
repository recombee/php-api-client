<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\ListSearchSynonyms;

class ListSearchSynonymsTest extends ListSearchSynonymsTestCase {

    protected function createRequest($optional=array()) {
        return new ListSearchSynonyms($optional);
    }
}
