<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\DeleteBookmark;

class DeleteBookmarkTest extends DeleteInteractionTestCase {

    protected function createRequest($user_id, $item_id, $timestamp) {
        return new DeleteBookmark($user_id, $item_id, $timestamp);
    }
}
?>
