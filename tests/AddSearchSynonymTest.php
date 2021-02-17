<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\AddSearchSynonym;

class AddSearchSynonymTest extends AddSearchSynonymTestCase {

    protected function createRequest($term, $synonym, $optional=array()) {
        return new AddSearchSynonym($term, $synonym, $optional);
    }
}
?>
