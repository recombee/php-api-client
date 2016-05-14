<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\AddPurchase;

class AddPurchaseTest extends AddInteractionTestCase {

    protected function createRequest($user_id, $item_id, $timestamp, $optional=array()) {
        return new AddPurchase($user_id, $item_id, $timestamp, $optional);
    }
}
?>
