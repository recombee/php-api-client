<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * UpdateManualReqlSegment request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Update definition of the Segment.
 */
class UpdateManualReqlSegment extends Request {

    /**
     * @var string $segmentation_id ID of the Segmentation to which the updated Segment belongs
     */
    protected $segmentation_id;
    /**
     * @var string $segment_id ID of the Segment that will be updated
     */
    protected $segment_id;
    /**
     * @var string $filter ReQL filter that returns `true` for items that belong to this Segment. Otherwise returns `false`.
     */
    protected $filter;
    /**
     * @var string $title Human-readable name of the Segment that is shown in the Recombee Admin UI.
     */
    protected $title;
    /**
     * @var array Array containing values of optional parameters
     */
   protected $optional;

    /**
     * Construct the request
     * @param string $segmentation_id ID of the Segmentation to which the updated Segment belongs
     * @param string $segment_id ID of the Segment that will be updated
     * @param string $filter ReQL filter that returns `true` for items that belong to this Segment. Otherwise returns `false`.
     * @param array $optional Optional parameters given as an array containing pairs name of the parameter => value
     * - Allowed parameters:
     *     - *title*
     *         - Type: string
     *         - Description: Human-readable name of the Segment that is shown in the Recombee Admin UI.
     * @throws Exceptions\UnknownOptionalParameterException UnknownOptionalParameterException if an unknown optional parameter is given in $optional
     */
    public function __construct($segmentation_id, $segment_id, $filter, $optional = array()) {
        $this->segmentation_id = $segmentation_id;
        $this->segment_id = $segment_id;
        $this->filter = $filter;
        $this->title = isset($optional['title']) ? $optional['title'] : null;
        $this->optional = $optional;

        $existing_optional = array('title');
        foreach ($this->optional as $key => $value) {
            if (!in_array($key, $existing_optional))
                 throw new UnknownOptionalParameterException($key);
         }
        $this->timeout = 10000;
        $this->ensure_https = false;
    }

    /**
     * Get used HTTP method
     * @return static Used HTTP method
     */
    public function getMethod() {
        return Request::HTTP_POST;
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
        $p['filter'] = $this->filter;
        if (isset($this->optional['title']))
             $p['title'] = $this-> optional['title'];
        return $p;
    }

}
