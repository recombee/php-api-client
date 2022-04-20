<?php

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Client;
use Recombee\RecommApi\Requests as Reqs;

class InteractionsTestCase extends RecombeeTestCase {

    protected function setUp(): void {
        parent::setUp();

        $requests = new Reqs\Batch([
            new Reqs\AddUser('user'),
            new Reqs\AddItem('item'),
            new Reqs\AddDetailView('user', 'item', ['timestamp' => 0]),
            new Reqs\AddPurchase('user', 'item', ['timestamp' => 0]),
            new Reqs\AddRating('user', 'item', 1, ['timestamp' => 0]),
            new Reqs\AddCartAddition('user', 'item', ['timestamp' => 0]),
            new Reqs\AddBookmark('user', 'item', ['timestamp' => 0]),
            new Reqs\SetViewPortion('user', 'item', 1, ['timestamp' => 0])
        ]);

        $this->client->send($requests);
    }
}

?>