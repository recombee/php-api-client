<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\DeletePurchase;

class DeletePurchaseTest extends DeleteInteractionTestCase {

    protected function createRequest($user_id, $item_id, $timestamp) {
        return new DeletePurchase($user_id, $item_id, $timestamp);
    }
}
?>
