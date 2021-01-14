<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * RecommendNextItems request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Returns items that shall be shown to a user as next recommendations when the user e.g. scrolls the page down (*infinite scroll*) or goes to a next page.
 * It accepts `recommId` of a base recommendation request (e.g. request from the first page) and number of items that shall be returned (`count`).
 * The base request can be one of:
 *   - [Recommend items to item](https://docs.recombee.com/api.html#recommend-items-to-item)
 *   - [Recommend items to user](https://docs.recombee.com/api.html#recommend-items-to-user)
 *   - [Search items](https://docs.recombee.com/api.html#search-items)
 * All the other parameters are inherited from the base request.
 * *Recommend next items* can be called many times for a single `recommId` and each call returns different (previously not recommended) items.
 * The number of *Recommend next items* calls performed so far is returned in the `numberNextRecommsCalls` field.
 * *Recommend next items* can be requested up to 30 minutes after the base request or a previous *Recommend next items* call.
 * For billing purposes, each call to *Recommend next items* is counted as a separate recommendation request.
 */
class RecommendNextItems extends Request {

    /**
     * @var string $recomm_id ID of the base recommendation request for which next recommendations should be returned
     */
    protected $recomm_id;
    /**
     * @var int $count Number of items to be recommended
     */
    protected $count;

    /**
     * Construct the request
     * @param string $recomm_id ID of the base recommendation request for which next recommendations should be returned
     * @param int $count Number of items to be recommended
     */
    public function __construct($recomm_id, $count) {
        $this->recomm_id = $recomm_id;
        $this->count = $count;
        $this->timeout = 3000;
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
        return "/{databaseId}/recomms/next/items/{$this->recomm_id}";
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
        $p['count'] = $this->count;
        return $p;
    }

}
?>
