<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * DeleteAllSearchSynonyms request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Deletes all synonyms defined in the database.
 */
class DeleteAllSearchSynonyms extends Request {


    /**
     * Construct the request
     */
    public function __construct() {
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
        return "/{databaseId}/synonyms/items/";
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
