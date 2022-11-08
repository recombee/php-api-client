<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * DeleteSearchSynonym request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Deletes synonym of given `id` and this synonym is no longer taken into account in the [Search items](https://docs.recombee.com/api.html#search-items).
 */
class DeleteSearchSynonym extends Request {

    /**
     * @var string $id ID of the synonym that should be deleted.
     */
    protected $id;

    /**
     * Construct the request
     * @param string $id ID of the synonym that should be deleted.
     */
    public function __construct($id) {
        $this->id = $id;
        $this->timeout = 10000;
        $this->ensure_https = false;
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
        return "/{databaseId}/synonyms/items/{$this->id}";
    }

    /**
     * Get query parameters
     * @return array Values of query parameters (name of parameter => value of the parameter)
     */
    public function getQueryParameters() {
        $params = array();
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
