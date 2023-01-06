<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * AddDetailView request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Adds a detail view of the given item made by the given user.
 */
class AddDetailView extends Request {

    /**
     * @var string $user_id User who viewed the item
     */
    protected $user_id;
    /**
     * @var string $item_id Viewed item
     */
    protected $item_id;
    /**
     * @var string|float $timestamp UTC timestamp of the view as ISO8601-1 pattern or UTC epoch time. The default value is the current time.
     */
    protected $timestamp;
    /**
     * @var int $duration Duration of the view
     */
    protected $duration;
    /**
     * @var bool $cascade_create Sets whether the given user/item should be created if not present in the database.
     */
    protected $cascade_create;
    /**
     * @var string $recomm_id If this detail view is based on a recommendation request, `recommId` is the id of the clicked recommendation.
     */
    protected $recomm_id;
    /**
     * @var array $additional_data A dictionary of additional data for the interaction.
     */
    protected $additional_data;
    /**
     * @var array Array containing values of optional parameters
     */
   protected $optional;

    /**
     * Construct the request
     * @param string $user_id User who viewed the item
     * @param string $item_id Viewed item
     * @param array $optional Optional parameters given as an array containing pairs name of the parameter => value
     * - Allowed parameters:
     *     - *timestamp*
     *         - Type: string|float
     *         - Description: UTC timestamp of the view as ISO8601-1 pattern or UTC epoch time. The default value is the current time.
     *     - *duration*
     *         - Type: int
     *         - Description: Duration of the view
     *     - *cascadeCreate*
     *         - Type: bool
     *         - Description: Sets whether the given user/item should be created if not present in the database.
     *     - *recommId*
     *         - Type: string
     *         - Description: If this detail view is based on a recommendation request, `recommId` is the id of the clicked recommendation.
     *     - *additionalData*
     *         - Type: array
     *         - Description: A dictionary of additional data for the interaction.
     * @throws Exceptions\UnknownOptionalParameterException UnknownOptionalParameterException if an unknown optional parameter is given in $optional
     */
    public function __construct($user_id, $item_id, $optional = array()) {
        $this->user_id = $user_id;
        $this->item_id = $item_id;
        $this->timestamp = isset($optional['timestamp']) ? $optional['timestamp'] : null;
        $this->duration = isset($optional['duration']) ? $optional['duration'] : null;
        $this->cascade_create = isset($optional['cascadeCreate']) ? $optional['cascadeCreate'] : null;
        $this->recomm_id = isset($optional['recommId']) ? $optional['recommId'] : null;
        $this->additional_data = isset($optional['additionalData']) ? $optional['additionalData'] : null;
        $this->optional = $optional;

        $existing_optional = array('timestamp','duration','cascadeCreate','recommId','additionalData');
        foreach ($this->optional as $key => $value) {
            if (!in_array($key, $existing_optional))
                 throw new UnknownOptionalParameterException($key);
         }
        $this->timeout = 1000;
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
        return "/{databaseId}/detailviews/";
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
        $p['userId'] = $this->user_id;
        $p['itemId'] = $this->item_id;
        if (isset($this->optional['timestamp']))
             $p['timestamp'] = $this-> optional['timestamp'];
        if (isset($this->optional['duration']))
             $p['duration'] = $this-> optional['duration'];
        if (isset($this->optional['cascadeCreate']))
             $p['cascadeCreate'] = $this-> optional['cascadeCreate'];
        if (isset($this->optional['recommId']))
             $p['recommId'] = $this-> optional['recommId'];
        if (isset($this->optional['additionalData']))
             $p['additionalData'] = $this-> optional['additionalData'];
        return $p;
    }

}
