<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\DeleteAllSearchSynonyms;

class DeleteAllSearchSynonymsTest extends DeleteAllSearchSynonymsTestCase {

    protected function createRequest() {
        return new DeleteAllSearchSynonyms();
    }
}
