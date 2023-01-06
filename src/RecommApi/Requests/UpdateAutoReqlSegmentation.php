<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * UpdateAutoReqlSegmentation request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Update an existing Segmentation.
 */
class UpdateAutoReqlSegmentation extends Request {

    /**
     * @var string $segmentation_id ID of the updated Segmentation
     */
    protected $segmentation_id;
    /**
     * @var string $expression ReQL expression that returns for each item a set with IDs of segments to which the item belongs
     */
    protected $expression;
    /**
     * @var string $title Human-readable name that is shown in the Recombee Admin UI.
     */
    protected $title;
    /**
     * @var string $description Description that is shown in the Recombee Admin UI.
     */
    protected $description;
    /**
     * @var array Array containing values of optional parameters
     */
   protected $optional;

    /**
     * Construct the request
     * @param string $segmentation_id ID of the updated Segmentation
     * @param array $optional Optional parameters given as an array containing pairs name of the parameter => value
     * - Allowed parameters:
     *     - *expression*
     *         - Type: string
     *         - Description: ReQL expression that returns for each item a set with IDs of segments to which the item belongs
     *     - *title*
     *         - Type: string
     *         - Description: Human-readable name that is shown in the Recombee Admin UI.
     *     - *description*
     *         - Type: string
     *         - Description: Description that is shown in the Recombee Admin UI.
     * @throws Exceptions\UnknownOptionalParameterException UnknownOptionalParameterException if an unknown optional parameter is given in $optional
     */
    public function __construct($segmentation_id, $optional = array()) {
        $this->segmentation_id = $segmentation_id;
        $this->expression = isset($optional['expression']) ? $optional['expression'] : null;
        $this->title = isset($optional['title']) ? $optional['title'] : null;
        $this->description = isset($optional['description']) ? $optional['description'] : null;
        $this->optional = $optional;

        $existing_optional = array('expression','title','description');
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
        return "/{databaseId}/segmentations/auto-reql/{$this->segmentation_id}";
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
        if (isset($this->optional['expression']))
             $p['expression'] = $this-> optional['expression'];
        if (isset($this->optional['title']))
             $p['title'] = $this-> optional['title'];
        if (isset($this->optional['description']))
             $p['description'] = $this-> optional['description'];
        return $p;
    }

}
