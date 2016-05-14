<?php

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Exceptions as Exc;
use Recombee\RecommApi\Requests\MergeUsers;
use Recombee\RecommApi\Requests\AddUser;


class MergeUsersTest extends RecombeeTestCase {

    public function testMergeUsers() {
        
        //does not fail with existing users
        $this->client->send(new AddUser('target'));
        $req = new MergeUsers('target', 'entity_id');
        $this->client->send($req);

        //fails with nonexisting user
        try {
            $req = new MergeUsers('nonexisting', 'target');
            $this->client->send($req);
            throw new \Exception('Exception was not thrown');
        }
        catch(Exc\ResponseException $e)
        {
            $this->assertEquals(404, $e->status_code);
        }
    }
}

?>