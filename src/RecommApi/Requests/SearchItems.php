<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * SearchItems request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Full-text personalized search. The results are based on the provided `searchQuery` and also on the user's past interactions (purchases, ratings, etc.) with the items (items more suitable for the user are preferred in the results).
 * All the string and set item properties are indexed by the search engine.
 * This endpoint should be used in a search box on your website/app. It can be called multiple times as the user is typing the query in order to get the most viable suggestions based on the current state of the query, or once after submitting the whole query. 
 * The returned items are sorted by relevance (the first item being the most relevant).
 * Besides the recommended items, also a unique `recommId` is returned in the response. It can be used to:
 * - Let Recombee know that this search was successful (e.g., user clicked one of the recommended items). See [Reported metrics](https://docs.recombee.com/admin_ui#reported-metrics).
 * - Get subsequent search results when the user scrolls down or goes to the next page. See [Recommend Next Items](https://docs.recombee.com/api#recommend-next-items).
 * It is also possible to use POST HTTP method (for example in the case of a very long ReQL filter) - query parameters then become body parameters.
 */
class SearchItems extends Request {

    /**
     * @var string $user_id ID of the user for whom personalized search will be performed.
     */
    protected $user_id;
    /**
     * @var string $search_query Search query provided by the user. It is used for the full-text search.
     */
    protected $search_query;
    /**
     * @var int $count Number of items to be returned (N for the top-N results).
     */
    protected $count;
    /**
     * @var string $scenario Scenario defines a particular search field in your user interface.
     * You can set various settings to the [scenario](https://docs.recombee.com/scenarios) in the [Admin UI](https://admin.recombee.com). You can also see the performance of each scenario in the Admin UI separately, so you can check how well each field performs.
     * The AI that optimizes models to get the best results may optimize different scenarios separately, or even use different models in each of the scenarios.
     */
    protected $scenario;
    /**
     * @var bool $cascade_create If the user does not exist in the database, returns a list of non-personalized search results and creates the user in the database. This allows, for example, rotations in the following recommendations for that user, as the user will be already known to the system.
     */
    protected $cascade_create;
    /**
     * @var bool $return_properties With `returnProperties=true`, property values of the recommended items are returned along with their IDs in a JSON dictionary. The acquired property values can be used to easily display the recommended items to the user. 
     * Example response:
     * ```json
     *   {
     *     "recommId": "ce52ada4-e4d9-4885-943c-407db2dee837",
     *     "recomms": 
     *       [
     *         {
     *           "id": "tv-178",
     *           "values": {
     *             "description": "4K TV with 3D feature",
     *             "categories":   ["Electronics", "Televisions"],
     *             "price": 342,
     *             "url": "myshop.com/tv-178"
     *           }
     *         },
     *         {
     *           "id": "mixer-42",
     *           "values": {
     *             "description": "Stainless Steel Mixer",
     *             "categories":   ["Home & Kitchen"],
     *             "price": 39,
     *             "url": "myshop.com/mixer-42"
     *           }
     *         }
     *       ],
     *     "numberNextRecommsCalls": 0
     *   }
     * ```
     */
    protected $return_properties;
    /**
     * @var array $included_properties Allows specifying which properties should be returned when `returnProperties=true` is set. The properties are given as a comma-separated list.
     * Example response for `includedProperties=description,price`:
     * ```json
     *   {
     *     "recommId": "a86ee8d5-cd8e-46d1-886c-8b3771d0520b",
     *     "recomms":
     *       [
     *         {
     *           "id": "tv-178",
     *           "values": {
     *             "description": "4K TV with 3D feature",
     *             "price": 342
     *           }
     *         },
     *         {
     *           "id": "mixer-42",
     *           "values": {
     *             "description": "Stainless Steel Mixer",
     *             "price": 39
     *           }
     *         }
     *       ],
     *     "numberNextRecommsCalls": 0
     *   }
     * ```
     */
    protected $included_properties;
    /**
     * @var string $filter Boolean-returning [ReQL](https://docs.recombee.com/reql) expression, which allows you to filter recommended items based on the values of their attributes.
     * Filters can also be assigned to a [scenario](https://docs.recombee.com/scenarios) in the [Admin UI](https://admin.recombee.com).
     */
    protected $filter;
    /**
     * @var string $booster Number-returning [ReQL](https://docs.recombee.com/reql) expression, which allows you to boost the recommendation rate of some items based on the values of their attributes.
     * Boosters can also be assigned to a [scenario](https://docs.recombee.com/scenarios) in the [Admin UI](https://admin.recombee.com).
     */
    protected $booster;
    /**
     * @var string|array $logic Logic specifies the particular behavior of the recommendation models. You can pick tailored logic for your domain and use case.
     * See [this section](https://docs.recombee.com/recommendation_logics) for a list of available logics and other details.
     * The difference between `logic` and `scenario` is that `logic` specifies mainly behavior, while `scenario` specifies the place where recommendations are shown to the users.
     * Logic can also be set to a [scenario](https://docs.recombee.com/scenarios) in the [Admin UI](https://admin.recombee.com).
     */
    protected $logic;
    /**
     * @var array $expert_settings Dictionary of custom options.
     */
    protected $expert_settings;
    /**
     * @var bool $return_ab_group If there is a custom AB-testing running, return the name of the group to which the request belongs.
     */
    protected $return_ab_group;
    /**
     * @var array Array containing values of optional parameters
     */
   protected $optional;

    /**
     * Construct the request
     * @param string $user_id ID of the user for whom personalized search will be performed.
     * @param string $search_query Search query provided by the user. It is used for the full-text search.
     * @param int $count Number of items to be returned (N for the top-N results).
     * @param array $optional Optional parameters given as an array containing pairs name of the parameter => value
     * - Allowed parameters:
     *     - *scenario*
     *         - Type: string
     *         - Description: Scenario defines a particular search field in your user interface.
     * You can set various settings to the [scenario](https://docs.recombee.com/scenarios) in the [Admin UI](https://admin.recombee.com). You can also see the performance of each scenario in the Admin UI separately, so you can check how well each field performs.
     * The AI that optimizes models to get the best results may optimize different scenarios separately, or even use different models in each of the scenarios.
     *     - *cascadeCreate*
     *         - Type: bool
     *         - Description: If the user does not exist in the database, returns a list of non-personalized search results and creates the user in the database. This allows, for example, rotations in the following recommendations for that user, as the user will be already known to the system.
     *     - *returnProperties*
     *         - Type: bool
     *         - Description: With `returnProperties=true`, property values of the recommended items are returned along with their IDs in a JSON dictionary. The acquired property values can be used to easily display the recommended items to the user. 
     * Example response:
     * ```json
     *   {
     *     "recommId": "ce52ada4-e4d9-4885-943c-407db2dee837",
     *     "recomms": 
     *       [
     *         {
     *           "id": "tv-178",
     *           "values": {
     *             "description": "4K TV with 3D feature",
     *             "categories":   ["Electronics", "Televisions"],
     *             "price": 342,
     *             "url": "myshop.com/tv-178"
     *           }
     *         },
     *         {
     *           "id": "mixer-42",
     *           "values": {
     *             "description": "Stainless Steel Mixer",
     *             "categories":   ["Home & Kitchen"],
     *             "price": 39,
     *             "url": "myshop.com/mixer-42"
     *           }
     *         }
     *       ],
     *     "numberNextRecommsCalls": 0
     *   }
     * ```
     *     - *includedProperties*
     *         - Type: array
     *         - Description: Allows specifying which properties should be returned when `returnProperties=true` is set. The properties are given as a comma-separated list.
     * Example response for `includedProperties=description,price`:
     * ```json
     *   {
     *     "recommId": "a86ee8d5-cd8e-46d1-886c-8b3771d0520b",
     *     "recomms":
     *       [
     *         {
     *           "id": "tv-178",
     *           "values": {
     *             "description": "4K TV with 3D feature",
     *             "price": 342
     *           }
     *         },
     *         {
     *           "id": "mixer-42",
     *           "values": {
     *             "description": "Stainless Steel Mixer",
     *             "price": 39
     *           }
     *         }
     *       ],
     *     "numberNextRecommsCalls": 0
     *   }
     * ```
     *     - *filter*
     *         - Type: string
     *         - Description: Boolean-returning [ReQL](https://docs.recombee.com/reql) expression, which allows you to filter recommended items based on the values of their attributes.
     * Filters can also be assigned to a [scenario](https://docs.recombee.com/scenarios) in the [Admin UI](https://admin.recombee.com).
     *     - *booster*
     *         - Type: string
     *         - Description: Number-returning [ReQL](https://docs.recombee.com/reql) expression, which allows you to boost the recommendation rate of some items based on the values of their attributes.
     * Boosters can also be assigned to a [scenario](https://docs.recombee.com/scenarios) in the [Admin UI](https://admin.recombee.com).
     *     - *logic*
     *         - Type: string|array
     *         - Description: Logic specifies the particular behavior of the recommendation models. You can pick tailored logic for your domain and use case.
     * See [this section](https://docs.recombee.com/recommendation_logics) for a list of available logics and other details.
     * The difference between `logic` and `scenario` is that `logic` specifies mainly behavior, while `scenario` specifies the place where recommendations are shown to the users.
     * Logic can also be set to a [scenario](https://docs.recombee.com/scenarios) in the [Admin UI](https://admin.recombee.com).
     *     - *expertSettings*
     *         - Type: array
     *         - Description: Dictionary of custom options.
     *     - *returnAbGroup*
     *         - Type: bool
     *         - Description: If there is a custom AB-testing running, return the name of the group to which the request belongs.
     * @throws Exceptions\UnknownOptionalParameterException UnknownOptionalParameterException if an unknown optional parameter is given in $optional
     */
    public function __construct($user_id, $search_query, $count, $optional = array()) {
        $this->user_id = $user_id;
        $this->search_query = $search_query;
        $this->count = $count;
        $this->scenario = isset($optional['scenario']) ? $optional['scenario'] : null;
        $this->cascade_create = isset($optional['cascadeCreate']) ? $optional['cascadeCreate'] : null;
        $this->return_properties = isset($optional['returnProperties']) ? $optional['returnProperties'] : null;
        $this->included_properties = isset($optional['includedProperties']) ? $optional['includedProperties'] : null;
        $this->filter = isset($optional['filter']) ? $optional['filter'] : null;
        $this->booster = isset($optional['booster']) ? $optional['booster'] : null;
        $this->logic = isset($optional['logic']) ? $optional['logic'] : null;
        $this->expert_settings = isset($optional['expertSettings']) ? $optional['expertSettings'] : null;
        $this->return_ab_group = isset($optional['returnAbGroup']) ? $optional['returnAbGroup'] : null;
        $this->optional = $optional;

        $existing_optional = array('scenario','cascadeCreate','returnProperties','includedProperties','filter','booster','logic','expertSettings','returnAbGroup');
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
        return Request::HTTP_POST;
    }

    /**
     * Get URI to the endpoint
     * @return string URI to the endpoint
     */
    public function getPath() {
        return "/{databaseId}/search/users/{$this->user_id}/items/";
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
        $p['searchQuery'] = $this->search_query;
        $p['count'] = $this->count;
        if (isset($this->optional['scenario']))
             $p['scenario'] = $this-> optional['scenario'];
        if (isset($this->optional['cascadeCreate']))
             $p['cascadeCreate'] = $this-> optional['cascadeCreate'];
        if (isset($this->optional['returnProperties']))
             $p['returnProperties'] = $this-> optional['returnProperties'];
        if (isset($this->optional['includedProperties']))
             $p['includedProperties'] = $this-> optional['includedProperties'];
        if (isset($this->optional['filter']))
             $p['filter'] = $this-> optional['filter'];
        if (isset($this->optional['booster']))
             $p['booster'] = $this-> optional['booster'];
        if (isset($this->optional['logic']))
             $p['logic'] = $this-> optional['logic'];
        if (isset($this->optional['expertSettings']))
             $p['expertSettings'] = $this-> optional['expertSettings'];
        if (isset($this->optional['returnAbGroup']))
             $p['returnAbGroup'] = $this-> optional['returnAbGroup'];
        return $p;
    }

}
