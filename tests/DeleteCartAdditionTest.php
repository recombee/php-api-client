<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\DeleteCartAddition;

class DeleteCartAdditionTest extends DeleteInteractionTestCase {

    protected function createRequest($user_id, $item_id, $timestamp) {
        return new DeleteCartAddition($user_id, $item_id, $timestamp);
    }
}
?>
