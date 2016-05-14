<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\SetItemValues;

class SetItemValuesTest extends SetValuesTestCase {

    protected function createRequest($item_id, $values) {
        return new SetItemValues($item_id, $values);
    }
}
?>
