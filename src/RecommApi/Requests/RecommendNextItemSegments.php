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
 * Returns [Item Segments](https://docs.recombee.com/segmentations) to be shown as the next recommendations when a user scrolls (e.g., within a carousel or feed of Item Segments such as brands, artists, topics, or categories).
 * The request requires the `recommId` of a base recommendation request and the number of Segments to return (`count`).
 * The base request can be one of:
 *   - [Recommend Item Segments to Item](https://docs.recombee.com/api/recommendations#recommend-item-segments-to-item)
 *   - [Recommend Item Segments to User](https://docs.recombee.com/api/recommendations#recommend-item-segments-to-user)
 *   - [Recommend Item Segments to Item Segment](https://docs.recombee.com/api/recommendations#recommend-item-segments-to-item-segment)
 *   - [Search Item Segments](https://docs.recombee.com/api/search#search-item-segments)
 * All other parameters are inherited from the base request associated with the provided `recommId`.
 * This endpoint can be called multiple times for a single `recommId`. Each call returns different Item Segments that have not been recommended in previous calls.
 * The number of calls made so far is returned in the `numberNextRecommsCalls` field.
 * Requests can be made up to 30 minutes after the base request or the most recent Recommend Next Item Segments call.
 * For billing purposes, each call to this endpoint is counted as a separate recommendation request.
 * It is also possible to use GET HTTP method - body parameters then become query parameters.
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
