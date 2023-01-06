<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * GetSegmentation request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Get existing Segmentation.
 */
class GetSegmentation extends Request {

    /**
     * @var string $segmentation_id ID of the Segmentation that should be returned
     */
    protected $segmentation_id;

    /**
     * Construct the request
     * @param string $segmentation_id ID of the Segmentation that should be returned
     */
    public function __construct($segmentation_id) {
        $this->segmentation_id = $segmentation_id;
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
        return "/{databaseId}/segmentations/list/{$this->segmentation_id}";
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
