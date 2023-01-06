<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * ListSegmentations request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Return all existing items Segmentations.
 */
class ListSegmentations extends Request {

    /**
     * @var string $source_type List Segmentations based on a particular type of data. Currently only `items` are supported.
     */
    protected $source_type;

    /**
     * Construct the request
     * @param string $source_type List Segmentations based on a particular type of data. Currently only `items` are supported.
     */
    public function __construct($source_type) {
        $this->source_type = $source_type;
        $this->timeout = 10000;
        $this->ensure_https = false;
    }

    /**
     * Get used HTTP method
     * @return static Used HTTP method
     */
    public function getMethod() {
        return Request::HTTP_GET;
    }

    /**
     * Get URI to the endpoint
     * @return string URI to the endpoint
     */
    public function getPath() {
        return "/{databaseId}/segmentations/list/";
    }

    /**
     * Get query parameters
     * @return array Values of query parameters (name of parameter => value of the parameter)
     */
    public function getQueryParameters() {
        $params = array();
        $params['sourceType'] = $this->source_type;
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
