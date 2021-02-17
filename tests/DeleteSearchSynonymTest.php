<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\DeleteSearchSynonym;

class DeleteSearchSynonymTest extends DeleteSearchSynonymTestCase {

    protected function createRequest($id) {
        return new DeleteSearchSynonym($id);
    }
}
?>
