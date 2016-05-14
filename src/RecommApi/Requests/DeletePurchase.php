<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * DeletePurchase request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Deletes an existing purchase uniquely specified by `userId`, `itemId`, and `timestamp`.
 */
class DeletePurchase extends Request {

    /**
     * @var string $user_id ID of the user who made the purchase.
     */
    protected $user_id;
    /**
     * @var string $item_id ID of the item of which was purchased.
     */
    protected $item_id;
    /**
     * @var float $timestamp Unix timestamp of the purchase.
     */
    protected $timestamp;

    /**
     * Construct the request
     * @param string $user_id ID of the user who made the purchase.
     * @param string $item_id ID of the item of which was purchased.
     * @param float $timestamp Unix timestamp of the purchase.
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
        return "/{databaseId}/purchases/";
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
