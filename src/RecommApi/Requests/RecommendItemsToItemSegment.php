<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * RecommendItemsToItemSegment request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Recommends Items that are the most relevant to a particular Segment from a context [Segmentation](https://docs.recombee.com/segmentations).
 * Based on the used Segmentation, this endpoint can be used for example for:
 * - Recommending articles related to a particular topic
 * - Recommending songs belonging to a particular genre
 * - Recommending products produced by a particular brand
 * You need to set the used context Segmentation in the Admin UI in the [Scenario settings](https://docs.recombee.com/scenarios) prior to using this endpoint.
 * The returned items are sorted by relevance (the first item being the most relevant).
 * It is also possible to use the POST HTTP method (for example, in the case of a very long ReQL filter) — query parameters then become body parameters.
 */
class RecommendItemsToItemSegment extends Request {

    /**
     * @var string $context_segment_id ID of the segment from `contextSegmentationId` for which the recommendations are to be generated.
     */
    protected $context_segment_id;
    /**
     * @var string $target_user_id ID of the user who will see the recommendations.
     * Specifying the *targetUserId* is beneficial because:
     * * It makes the recommendations personalized
     * * Allows the calculation of Actions and Conversions
     *   in the graphical user interface,
     *   as Recombee can pair the user who got recommendations
     *   and who afterward viewed/purchased an item.
     * If you insist on not specifying the user, pass `null`
     * (`None`, `nil`, `NULL` etc., depending on the language) to *targetUserId*.
     * Do not create some special dummy user for getting recommendations,
     * as it could mislead the recommendation models,
     * and result in wrong recommendations.
     * For anonymous/unregistered users, it is possible to use, for example, their session ID.
     */
    protected $target_user_id;
    /**
     * @var int $count Number of items to be recommended (N for the top-N recommendation).
     */
    protected $count;
    /**
     * @var string $scenario Scenario defines a particular application of recommendations. It can be, for example, "homepage", "cart", or "emailing".
     * You can set various settings to the [scenario](https://docs.recombee.com/scenarios) in the [Admin UI](https://admin.recombee.com). You can also see the performance of each scenario in the Admin UI separately, so you can check how well each application performs.
     * The AI that optimizes models to get the best results may optimize different scenarios separately or even use different models in each of the scenarios.
     */
    protected $scenario;
    /**
     * @var bool $cascade_create If a user of the given *targetUserId* doesn't exist in the database, it creates this user and returns some (non-personalized) recommendations. This allows, for example, rotations in the following recommendations for the user of the given *targetUserId*, as the user will be already known to the system.
     */
    protected $cascade_create;
    /**
     * @var bool $return_properties With `returnProperties=true`, property values of the recommended items are returned along with their IDs in a JSON dictionary. The acquired property values can be used to easily display the recommended items to the user. 
     * Example response:
     * ```json
     *   {
     *     "recommId": "0c6189e7-dc1a-429a-b613-192696309361",
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
     *     "recommId": "6842c725-a79f-4537-a02c-f34d668a3f80",
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
     * @var string $min_relevance **Expert option:** If the *targetUserId* is provided:  Specifies the threshold of how relevant must the recommended items be to the user. Possible values one of: "low", "medium", "high". The default value is "low", meaning that the system attempts to recommend a number of items equal to *count* at any cost. If there is not enough data (such as interactions or item properties), this may even lead to bestseller-based recommendations being appended to reach the full *count*. This behavior may be suppressed by using "medium" or "high" values. In such case, the system only recommends items of at least the requested relevance and may return less than *count* items when there is not enough data to fulfill it.
     */
    protected $min_relevance;
    /**
     * @var float $rotation_rate **Expert option:** If the *targetUserId* is provided: If your users browse the system in real-time, it may easily happen that you wish to offer them recommendations multiple times. Here comes the question: how much should the recommendations change? Should they remain the same, or should they rotate? Recombee API allows you to control this per request in a backward fashion. You may penalize an item for being recommended in the near past. For the specific user, `rotationRate=1` means maximal rotation, `rotationRate=0` means absolutely no rotation. You may also use, for example, `rotationRate=0.2` for only slight rotation of recommended items.
     */
    protected $rotation_rate;
    /**
     * @var float $rotation_time **Expert option:** If the *targetUserId* is provided: Taking *rotationRate* into account, specifies how long it takes for an item to recover from the penalization. For example, `rotationTime=7200.0` means that items recommended less than 2 hours ago are penalized.
     */
    protected $rotation_time;
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
     * @param string $context_segment_id ID of the segment from `contextSegmentationId` for which the recommendations are to be generated.
     * @param string $target_user_id ID of the user who will see the recommendations.
     * Specifying the *targetUserId* is beneficial because:
     * * It makes the recommendations personalized
     * * Allows the calculation of Actions and Conversions
     *   in the graphical user interface,
     *   as Recombee can pair the user who got recommendations
     *   and who afterward viewed/purchased an item.
     * If you insist on not specifying the user, pass `null`
     * (`None`, `nil`, `NULL` etc., depending on the language) to *targetUserId*.
     * Do not create some special dummy user for getting recommendations,
     * as it could mislead the recommendation models,
     * and result in wrong recommendations.
     * For anonymous/unregistered users, it is possible to use, for example, their session ID.
     * @param int $count Number of items to be recommended (N for the top-N recommendation).
     * @param array $optional Optional parameters given as an array containing pairs name of the parameter => value
     * - Allowed parameters:
     *     - *scenario*
     *         - Type: string
     *         - Description: Scenario defines a particular application of recommendations. It can be, for example, "homepage", "cart", or "emailing".
     * You can set various settings to the [scenario](https://docs.recombee.com/scenarios) in the [Admin UI](https://admin.recombee.com). You can also see the performance of each scenario in the Admin UI separately, so you can check how well each application performs.
     * The AI that optimizes models to get the best results may optimize different scenarios separately or even use different models in each of the scenarios.
     *     - *cascadeCreate*
     *         - Type: bool
     *         - Description: If a user of the given *targetUserId* doesn't exist in the database, it creates this user and returns some (non-personalized) recommendations. This allows, for example, rotations in the following recommendations for the user of the given *targetUserId*, as the user will be already known to the system.
     *     - *returnProperties*
     *         - Type: bool
     *         - Description: With `returnProperties=true`, property values of the recommended items are returned along with their IDs in a JSON dictionary. The acquired property values can be used to easily display the recommended items to the user. 
     * Example response:
     * ```json
     *   {
     *     "recommId": "0c6189e7-dc1a-429a-b613-192696309361",
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
     *     "recommId": "6842c725-a79f-4537-a02c-f34d668a3f80",
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
     *     - *minRelevance*
     *         - Type: string
     *         - Description: **Expert option:** If the *targetUserId* is provided:  Specifies the threshold of how relevant must the recommended items be to the user. Possible values one of: "low", "medium", "high". The default value is "low", meaning that the system attempts to recommend a number of items equal to *count* at any cost. If there is not enough data (such as interactions or item properties), this may even lead to bestseller-based recommendations being appended to reach the full *count*. This behavior may be suppressed by using "medium" or "high" values. In such case, the system only recommends items of at least the requested relevance and may return less than *count* items when there is not enough data to fulfill it.
     *     - *rotationRate*
     *         - Type: float
     *         - Description: **Expert option:** If the *targetUserId* is provided: If your users browse the system in real-time, it may easily happen that you wish to offer them recommendations multiple times. Here comes the question: how much should the recommendations change? Should they remain the same, or should they rotate? Recombee API allows you to control this per request in a backward fashion. You may penalize an item for being recommended in the near past. For the specific user, `rotationRate=1` means maximal rotation, `rotationRate=0` means absolutely no rotation. You may also use, for example, `rotationRate=0.2` for only slight rotation of recommended items.
     *     - *rotationTime*
     *         - Type: float
     *         - Description: **Expert option:** If the *targetUserId* is provided: Taking *rotationRate* into account, specifies how long it takes for an item to recover from the penalization. For example, `rotationTime=7200.0` means that items recommended less than 2 hours ago are penalized.
     *     - *expertSettings*
     *         - Type: array
     *         - Description: Dictionary of custom options.
     *     - *returnAbGroup*
     *         - Type: bool
     *         - Description: If there is a custom AB-testing running, return the name of the group to which the request belongs.
     * @throws Exceptions\UnknownOptionalParameterException UnknownOptionalParameterException if an unknown optional parameter is given in $optional
     */
    public function __construct($context_segment_id, $target_user_id, $count, $optional = array()) {
        $this->context_segment_id = $context_segment_id;
        $this->target_user_id = $target_user_id;
        $this->count = $count;
        $this->scenario = isset($optional['scenario']) ? $optional['scenario'] : null;
        $this->cascade_create = isset($optional['cascadeCreate']) ? $optional['cascadeCreate'] : null;
        $this->return_properties = isset($optional['returnProperties']) ? $optional['returnProperties'] : null;
        $this->included_properties = isset($optional['includedProperties']) ? $optional['includedProperties'] : null;
        $this->filter = isset($optional['filter']) ? $optional['filter'] : null;
        $this->booster = isset($optional['booster']) ? $optional['booster'] : null;
        $this->logic = isset($optional['logic']) ? $optional['logic'] : null;
        $this->min_relevance = isset($optional['minRelevance']) ? $optional['minRelevance'] : null;
        $this->rotation_rate = isset($optional['rotationRate']) ? $optional['rotationRate'] : null;
        $this->rotation_time = isset($optional['rotationTime']) ? $optional['rotationTime'] : null;
        $this->expert_settings = isset($optional['expertSettings']) ? $optional['expertSettings'] : null;
        $this->return_ab_group = isset($optional['returnAbGroup']) ? $optional['returnAbGroup'] : null;
        $this->optional = $optional;

        $existing_optional = array('scenario','cascadeCreate','returnProperties','includedProperties','filter','booster','logic','minRelevance','rotationRate','rotationTime','expertSettings','returnAbGroup');
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
        return "/{databaseId}/recomms/item-segments/items/";
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
        $p['contextSegmentId'] = $this->context_segment_id;
        $p['targetUserId'] = $this->target_user_id;
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
        if (isset($this->optional['minRelevance']))
             $p['minRelevance'] = $this-> optional['minRelevance'];
        if (isset($this->optional['rotationRate']))
             $p['rotationRate'] = $this-> optional['rotationRate'];
        if (isset($this->optional['rotationTime']))
             $p['rotationTime'] = $this-> optional['rotationTime'];
        if (isset($this->optional['expertSettings']))
             $p['expertSettings'] = $this-> optional['expertSettings'];
        if (isset($this->optional['returnAbGroup']))
             $p['returnAbGroup'] = $this-> optional['returnAbGroup'];
        return $p;
    }

}
