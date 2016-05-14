<?php

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;

abstract class ListUserInteractionsTestCase extends InteractionsTestCase {

    abstract protected function createRequest($user_id);

    public function testListUserInteractions() {
        $req = $this->createRequest('user');
        $resp = $this->client->send($req);
        $this->assertCount(1, $resp);
        $this->assertEquals('item', $resp[0]['itemId']);
        $this->assertEquals('user', $resp[0]['userId']);
    }
}
?>