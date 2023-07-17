<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * DeleteMoreItems request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Deletes all the items that pass the filter.
 * If an item becomes obsolete/no longer available, it is meaningful to **keep it in the catalog** (along with all the interaction data, which are very useful) and **only exclude the item from recommendations**. In such a case, use [ReQL filter](https://docs.recombee.com/reql.html) instead of deleting the item completely.
 */
class DeleteMoreItems extends Request {

    /**
     * @var string $filter A [ReQL](https://docs.recombee.com/reql.html) expression, which returns `true` for the items that shall be updated.
     */
    protected $filter;

    /**
     * Construct the request
     * @param string $filter A [ReQL](https://docs.recombee.com/reql.html) expression, which returns `true` for the items that shall be updated.
     */
    public function __construct($filter) {
        $this->filter = $filter;
        $this->timeout = 100000;
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
        return $p;
    }

}
