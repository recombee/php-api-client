<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * DeleteManualReqlSegment request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Delete a Segment from a Manual ReQL Segmentation.
 */
class DeleteManualReqlSegment extends Request {

    /**
     * @var string $segmentation_id ID of the Segmentation from which the Segment should be deleted
     */
    protected $segmentation_id;
    /**
     * @var string $segment_id ID of the Segment that should be deleted
     */
    protected $segment_id;

    /**
     * Construct the request
     * @param string $segmentation_id ID of the Segmentation from which the Segment should be deleted
     * @param string $segment_id ID of the Segment that should be deleted
     */
    public function __construct($segmentation_id, $segment_id) {
        $this->segmentation_id = $segmentation_id;
        $this->segment_id = $segment_id;
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
        return "/{databaseId}/segmentations/manual-reql/{$this->segmentation_id}/segments/{$this->segment_id}";
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
