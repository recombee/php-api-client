<?php
namespace Recombee\RecommApi\Tests;
use Recombee\RecommApi\Requests\ListScenarios;

class ListScenariosTest extends ListScenariosTestCase {

    protected function createRequest() {
        return new ListScenarios();
    }
}
