<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\AddBookmark;

class AddBookmarkTest extends AddInteractionTestCase {

    protected function createRequest($user_id, $item_id, $timestamp, $optional=array()) {
        return new AddBookmark($user_id, $item_id, $timestamp, $optional);
    }
}
?>
