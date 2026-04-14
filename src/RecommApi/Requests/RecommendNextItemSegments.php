<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * RecommendNextItemSegments request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Returns Item segments that shall be shown to a user as next recommendations when the user e.g. scrolls the page down (*infinite scroll*) or goes to the next page.
 * It accepts `recommId` of a base recommendation request (e.g., request from the first page) and the number of segments that shall be returned (`count`).
 * The base request can be one of:
 *   - [Recommend Item Segments to Item](https://docs.recombee.com/api#recommend-item-segments-to-item)
 *   - [Recommend Item Segments to User](https://docs.recombee.com/api#recommend-item-segments-to-user)
 *   - [Recommend Item Segments to Item Segment](https://docs.recombee.com/api#recommend-item-segments-to-item-segment)
 *   - [Search Item Segments](https://docs.recombee.com/api#search-item-segments)
 * All the other parameters are inherited from the base request.
 * *Recommend next Item segments* can be called many times for a single `recommId` and each call returns different (previously not recommended) segments.
 * The number of *Recommend next Item segments* calls performed so far is returned in the `numberNextRecommsCalls` field.
 * *Recommend next Item segments* can be requested up to 30 minutes after the base request or a previous *Recommend next Item segments* call.
 * For billing purposes, each call to *Recommend next Item segments* is counted as a separate recommendation request.
 */
class RecommendNextItemSegments extends Request {

    /**
     * @var string $recomm_id ID of the base recommendation request for which next recommendations should be returned
     */
    protected $recomm_id;
    /**
     * @var int $count Number of item segments to be recommended
     */
    protected $count;

    /**
     * Construct the request
     * @param string $recomm_id ID of the base recommendation request for which next recommendations should be returned
     * @param int $count Number of item segments to be recommended
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
        return "/{databaseId}/recomms/next/item-segments/{$this->recomm_id}";
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
