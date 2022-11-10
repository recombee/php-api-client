<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * UpdateMoreItems request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Update (some) property values of all the items that pass the filter.
 * Example: *Setting all the items that are older than a week as unavailable*
 *   ```
 *     {
 *       "filter": "'releaseDate' < now() - 7*24*3600",
 *       "changes": {"available": false}
 *     }
 *   ```
 */
class UpdateMoreItems extends Request {

    /**
     * @var string $filter A [ReQL](https://docs.recombee.com/reql.html) expression, which return `true` for the items that shall be updated.
     */
    protected $filter;
    /**
     * @var array $changes A dictionary where the keys are properties which shall be updated.
     */
    protected $changes;

    /**
     * Construct the request
     * @param string $filter A [ReQL](https://docs.recombee.com/reql.html) expression, which return `true` for the items that shall be updated.
     * @param array $changes A dictionary where the keys are properties which shall be updated.
     */
    public function __construct($filter, $changes) {
        $this->filter = $filter;
        $this->changes = $changes;
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
        return "/{databaseId}/more-items/";
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
        $p['changes'] = $this->changes;
        return $p;
    }

}
