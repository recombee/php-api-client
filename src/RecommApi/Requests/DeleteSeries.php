<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * DeleteSeries request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Deletes the series of the given `seriesId` from the database.
 * Deleting a series will only delete assignment of items to it, not the items themselves!
 */
class DeleteSeries extends Request {

    /**
     * @var string $series_id ID of the series to be deleted.
     */
    protected $series_id;
    /**
     * @var bool $cascade_delete If set to `true`, item with the same ID as seriesId will be also deleted. Default is `false`.
     */
    protected $cascade_delete;
    /**
     * @var array Array containing values of optional parameters
     */
   protected $optional;

    /**
     * Construct the request
     * @param string $series_id ID of the series to be deleted.
     * @param array $optional Optional parameters given as an array containing pairs name of the parameter => value
     * - Allowed parameters:
     *     - *cascadeDelete*
     *         - Type: bool
     *         - Description: If set to `true`, item with the same ID as seriesId will be also deleted. Default is `false`.
     * @throws Exceptions\UnknownOptionalParameterException UnknownOptionalParameterException if an unknown optional parameter is given in $optional
     */
    public function __construct($series_id, $optional = array()) {
        $this->series_id = $series_id;
        $this->cascade_delete = isset($optional['cascadeDelete']) ? $optional['cascadeDelete'] : null;
        $this->optional = $optional;

        $existing_optional = array('cascadeDelete');
        foreach ($this->optional as $key => $value) {
            if (!in_array($key, $existing_optional))
                 throw new UnknownOptionalParameterException($key);
         }
        $this->timeout = 3000;
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
        return "/{databaseId}/series/{$this->series_id}";
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
        if (isset($this->optional['cascadeDelete']))
             $p['cascadeDelete'] = $this-> optional['cascadeDelete'];
        return $p;
    }

}
