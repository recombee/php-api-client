<?php

namespace Recombee\RecommApi\Tests;

use Recombee\RecommApi\Client;
use Recombee\RecommApi\Requests as Reqs;
use Recombee\RecommApi\Exceptions as Ex;

class RecombeeTestCase extends \PHPUnit\Framework\TestCase
{
    protected $client;

    protected function setUp(): void {

        $dbId = getenv('DB_ID');
        if ($dbId === false) {
            throw new \Exception('DB_ID env var must be specified');
        }

        $token = getenv('PRIVATE_TOKEN');
        if ($token === false) {
            throw new \Exception('PRIVATE_TOKEN env var must be specified');
        }

        $this->client = new Client($dbId, $token, ['region' => 'eu-west']);

        $this->client->send(new Reqs\ResetDatabase());
        while (true) {
            try
            {
                $this->client->send(new Reqs\ListItems());
            }
            catch(Ex\ResponseException $e)
            {
                // Wait until DB is erased
                continue;
            }
            break;
        }

        $requests = new Reqs\Batch([
            new Reqs\AddItem('entity_id'),
            new Reqs\AddUser('entity_id'),
            new Reqs\AddSeries('entity_id'),
            new Reqs\AddGroup('entity_id'),
            new Reqs\InsertToGroup('entity_id', 'item', 'entity_id'),
            new Reqs\InsertToSeries('entity_id', 'item', 'entity_id', 1),
            new Reqs\AddItemProperty('int_property', 'int'),
            new Reqs\AddItemProperty('str_property', 'string'),
            new Reqs\SetItemValues('entity_id', ['int_property' => 42, 'str_property' => 'hello']),
            new Reqs\AddUserProperty('int_property', 'int'),
            new Reqs\AddUserProperty('str_property', 'string'),
            new Reqs\SetUserValues('entity_id', ['int_property' => 42, 'str_property' => 'hello'])

        ]);

        $this->client->send($requests);
    }
 }
