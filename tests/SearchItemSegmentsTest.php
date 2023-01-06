<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\SearchItemSegments;

class SearchItemSegmentsTest extends SearchItemSegmentsTestCase {

    protected function createRequest($user_id, $search_query, $count, $optional=array()) {
        return new SearchItemSegments($user_id, $search_query, $count, $optional);
    }
}
