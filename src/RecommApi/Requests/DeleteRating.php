<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * DeleteRating request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Deletes an existing rating specified by (`userId`, `itemId`, `timestamp`) from the database.
 */
class DeleteRating extends Request {

    /**
     * @var string $user_id ID of the user who rated the item.
     */
    protected $user_id;
    /**
     * @var string $item_id ID of the item which was rated.
     */
    protected $item_id;
    /**
     * @var float $timestamp Unix timestamp of the rating.
     */
    protected $timestamp;

    /**
     * Construct the request
     * @param string $user_id ID of the user who rated the item.
     * @param string $item_id ID of the item which was rated.
     * @param float $timestamp Unix timestamp of the rating.
     */
    public function __construct($user_id, $item_id, $timestamp) {
        $this->user_id = $user_id;
        $this->item_id = $item_id;
        $this->timestamp = $timestamp;
        $this->timeout = 1000;
    }

    /**
     * Get used HTTP method
     * @return static Used HTTP method
     */
    public function getMethod() {
        return Request::HTTP_DELETE;
    }

    /**
     * Get URI to the endpoint
     * @return string URI to the endpoint
     */
    public function getPath() {
        return "/{databaseId}/ratings/";
    }

    /**
     * Get query parameters
     * @return array Values of query parameters (name of parameter => value of the parameter)
     */
    public function getQueryParameters() {
        $params = array();
        $params['userId'] = $this->user_id;
        $params['itemId'] = $this->item_id;
        $params['timestamp'] = $this->timestamp;
        return $params;
    }

    /**
     * Get body parameters
     * @return array Values of body parameters (name of parameter => value of the parameter)
     */
    public function getBodyParameters() {
        $p = array();
        return $p;
    }

}
?>
