<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * DeleteSegmentation request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Delete existing Segmentation.
 */
class DeleteSegmentation extends Request {

    /**
     * @var string $segmentation_id ID of the Segmentation that should be deleted
     */
    protected $segmentation_id;

    /**
     * Construct the request
     * @param string $segmentation_id ID of the Segmentation that should be deleted
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
        return Request::HTTP_DELETE;
    }

    /**
     * Get URI to the endpoint
     * @return string URI to the endpoint
     */
    public function getPath() {
        return "/{databaseId}/segmentations/{$this->segmentation_id}";
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
