<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * DeleteBookmark request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Deletes a bookmark uniquely specified by `userId`, `itemId`, and `timestamp`.
 */
class DeleteBookmark extends Request {

    /**
     * @var string $user_id ID of the user who made the bookmark.
     */
    protected $user_id;
    /**
     * @var string $item_id ID of the item of which was bookmarked.
     */
    protected $item_id;
    /**
     * @var float $timestamp Unix timestamp of the bookmark.
     */
    protected $timestamp;

    /**
     * Construct the request
     * @param string $user_id ID of the user who made the bookmark.
     * @param string $item_id ID of the item of which was bookmarked.
     * @param float $timestamp Unix timestamp of the bookmark.
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
        return "/{databaseId}/bookmarks/";
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
