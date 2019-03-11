<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * RecommendItemsToUser request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Based on user's past interactions (purchases, ratings, etc.) with the items, recommends top-N items that are most likely to be of high value for a given user.
 * It is also possible to use POST HTTP method (for example in case of very long ReQL filter) - query parameters then become body parameters.
 * The returned items are sorted by relevancy (first item being the most relevant).
 */
class RecommendItemsToUser extends Request {

    /**
     * @var string $user_id ID of the user for which personalized recommendations are to be generated.
     */
    protected $user_id;
    /**
     * @var int $count Number of items to be recommended (N for the top-N recommendation).
     */
    protected $count;
    /**
     * @var string $filter Boolean-returning [ReQL](https://docs.recombee.com/reql.html) expression which allows you to filter recommended items based on the values of their attributes.
     */
    protected $filter;
    /**
     * @var string $booster Number-returning [ReQL](https://docs.recombee.com/reql.html) expression which allows you to boost recommendation rate of some items based on the values of their attributes.
     */
    protected $booster;
    /**
     * @var bool $cascade_create If the user does not exist in the database, returns a list of non-personalized recommendations and creates the user in the database. This allows for example rotations in the following recommendations for that user, as the user will be already known to the system.
     */
    protected $cascade_create;
    /**
     * @var string $scenario Scenario defines a particular application of recommendations. It can be for example "homepage", "cart" or "emailing". You can see each scenario in the UI separately, so you can check how well each application performs. The AI which optimizes models in order to get the best results may optimize different scenarios separately, or even use different models in each of the scenarios.
     */
    protected $scenario;
    /**
     * @var string| $logic Logic specifies particular behavior of the recommendation models. You can pick tailored logic for your domain (e-commerce, multimedia, fashion ...) and use case.
     * See [this section](https://docs.recombee.com/recommendation_logic.html) for list of available logics and other details.
     * The difference between `logic` and `scenario` is that `logic` specifies mainly behavior, while `scenario` specifies the place where recommendations are shown to the users.
     */
    protected $logic;
    /**
     * @var bool $return_properties With `returnProperties=true`, property values of the recommended items are returned along with their IDs in a JSON dictionary. The acquired property values can be used for easy displaying of the recommended items to the user. 
     * Example response:
     * ```
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
     *       ]
     *   }
     * ```
     */
    protected $return_properties;
    /**
     * @var array $included_properties Allows to specify, which properties should be returned when `returnProperties=true` is set. The properties are given as a comma-separated list. 
     * Example response for `includedProperties=description,price`:
     * ```
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
     *       ]
     *   }
     * ```
     */
    protected $included_properties;
    /**
     * @var float $diversity **Expert option** Real number from [0.0, 1.0] which determines how much mutually dissimilar should the recommended items be. The default value is 0.0, i.e., no diversification. Value 1.0 means maximal diversification.
     */
    protected $diversity;
    /**
     * @var string $min_relevance **Expert option** Specifies the threshold of how much relevant must the recommended items be to the user. Possible values one of: "low", "medium", "high". The default value is "low", meaning that the system attempts to recommend number of items equal to *count* at any cost. If there are not enough data (such as interactions or item properties), this may even lead to bestseller-based recommendations to be appended to reach the full *count*. This behavior may be suppressed by using "medium" or "high" values. In such case, the system only recommends items of at least the requested relevancy, and may return less than *count* items when there is not enough data to fulfill it.
     */
    protected $min_relevance;
    /**
     * @var float $rotation_rate **Expert option** If your users browse the system in real-time, it may easily happen that you wish to offer them recommendations multiple times. Here comes the question: how much should the recommendations change? Should they remain the same, or should they rotate? Recombee API allows you to control this per-request in backward fashion. You may penalize an item for being recommended in the near past. For the specific user, `rotationRate=1` means maximal rotation, `rotationRate=0` means absolutely no rotation. You may also use, for example `rotationRate=0.2` for only slight rotation of recommended items. Default: `0.1`.
     */
    protected $rotation_rate;
    /**
     * @var float $rotation_time **Expert option** Taking *rotationRate* into account, specifies how long time it takes to an item to recover from the penalization. For example, `rotationTime=7200.0` means that items recommended less than 2 hours ago are penalized. Default: `7200.0`.
     */
    protected $rotation_time;
    /**
     * @var  $expert_settings Dictionary of custom options.
     */
    protected $expert_settings;
    /**
     * @var bool $return_ab_group If there is a custom AB-testing running, return name of group to which the request belongs.
     */
    protected $return_ab_group;
    /**
     * @var array Array containing values of optional parameters
     */
   protected $optional;

    /**
     * Construct the request
     * @param string $user_id ID of the user for which personalized recommendations are to be generated.
     * @param int $count Number of items to be recommended (N for the top-N recommendation).
     * @param array $optional Optional parameters given as an array containing pairs name of the parameter => value
     * - Allowed parameters:
     *     - *filter*
     *         - Type: string
     *         - Description: Boolean-returning [ReQL](https://docs.recombee.com/reql.html) expression which allows you to filter recommended items based on the values of their attributes.
     *     - *booster*
     *         - Type: string
     *         - Description: Number-returning [ReQL](https://docs.recombee.com/reql.html) expression which allows you to boost recommendation rate of some items based on the values of their attributes.
     *     - *cascadeCreate*
     *         - Type: bool
     *         - Description: If the user does not exist in the database, returns a list of non-personalized recommendations and creates the user in the database. This allows for example rotations in the following recommendations for that user, as the user will be already known to the system.
     *     - *scenario*
     *         - Type: string
     *         - Description: Scenario defines a particular application of recommendations. It can be for example "homepage", "cart" or "emailing". You can see each scenario in the UI separately, so you can check how well each application performs. The AI which optimizes models in order to get the best results may optimize different scenarios separately, or even use different models in each of the scenarios.
     *     - *logic*
     *         - Type: string|
     *         - Description: Logic specifies particular behavior of the recommendation models. You can pick tailored logic for your domain (e-commerce, multimedia, fashion ...) and use case.
     * See [this section](https://docs.recombee.com/recommendation_logic.html) for list of available logics and other details.
     * The difference between `logic` and `scenario` is that `logic` specifies mainly behavior, while `scenario` specifies the place where recommendations are shown to the users.
     *     - *returnProperties*
     *         - Type: bool
     *         - Description: With `returnProperties=true`, property values of the recommended items are returned along with their IDs in a JSON dictionary. The acquired property values can be used for easy displaying of the recommended items to the user. 
     * Example response:
     * ```
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
     *       ]
     *   }
     * ```
     *     - *includedProperties*
     *         - Type: array
     *         - Description: Allows to specify, which properties should be returned when `returnProperties=true` is set. The properties are given as a comma-separated list. 
     * Example response for `includedProperties=description,price`:
     * ```
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
     *       ]
     *   }
     * ```
     *     - *diversity*
     *         - Type: float
     *         - Description: **Expert option** Real number from [0.0, 1.0] which determines how much mutually dissimilar should the recommended items be. The default value is 0.0, i.e., no diversification. Value 1.0 means maximal diversification.
     *     - *minRelevance*
     *         - Type: string
     *         - Description: **Expert option** Specifies the threshold of how much relevant must the recommended items be to the user. Possible values one of: "low", "medium", "high". The default value is "low", meaning that the system attempts to recommend number of items equal to *count* at any cost. If there are not enough data (such as interactions or item properties), this may even lead to bestseller-based recommendations to be appended to reach the full *count*. This behavior may be suppressed by using "medium" or "high" values. In such case, the system only recommends items of at least the requested relevancy, and may return less than *count* items when there is not enough data to fulfill it.
     *     - *rotationRate*
     *         - Type: float
     *         - Description: **Expert option** If your users browse the system in real-time, it may easily happen that you wish to offer them recommendations multiple times. Here comes the question: how much should the recommendations change? Should they remain the same, or should they rotate? Recombee API allows you to control this per-request in backward fashion. You may penalize an item for being recommended in the near past. For the specific user, `rotationRate=1` means maximal rotation, `rotationRate=0` means absolutely no rotation. You may also use, for example `rotationRate=0.2` for only slight rotation of recommended items. Default: `0.1`.
     *     - *rotationTime*
     *         - Type: float
     *         - Description: **Expert option** Taking *rotationRate* into account, specifies how long time it takes to an item to recover from the penalization. For example, `rotationTime=7200.0` means that items recommended less than 2 hours ago are penalized. Default: `7200.0`.
     *     - *expertSettings*
     *         - Type: 
     *         - Description: Dictionary of custom options.
     *     - *returnAbGroup*
     *         - Type: bool
     *         - Description: If there is a custom AB-testing running, return name of group to which the request belongs.
     * @throws Exceptions\UnknownOptionalParameterException UnknownOptionalParameterException if an unknown optional parameter is given in $optional
     */
    public function __construct($user_id, $count, $optional = array()) {
        $this->user_id = $user_id;
        $this->count = $count;
        $this->filter = isset($optional['filter']) ? $optional['filter'] : null;
        $this->booster = isset($optional['booster']) ? $optional['booster'] : null;
        $this->cascade_create = isset($optional['cascadeCreate']) ? $optional['cascadeCreate'] : null;
        $this->scenario = isset($optional['scenario']) ? $optional['scenario'] : null;
        $this->logic = isset($optional['logic']) ? $optional['logic'] : null;
        $this->return_properties = isset($optional['returnProperties']) ? $optional['returnProperties'] : null;
        $this->included_properties = isset($optional['includedProperties']) ? $optional['includedProperties'] : null;
        $this->diversity = isset($optional['diversity']) ? $optional['diversity'] : null;
        $this->min_relevance = isset($optional['minRelevance']) ? $optional['minRelevance'] : null;
        $this->rotation_rate = isset($optional['rotationRate']) ? $optional['rotationRate'] : null;
        $this->rotation_time = isset($optional['rotationTime']) ? $optional['rotationTime'] : null;
        $this->expert_settings = isset($optional['expertSettings']) ? $optional['expertSettings'] : null;
        $this->return_ab_group = isset($optional['returnAbGroup']) ? $optional['returnAbGroup'] : null;
        $this->optional = $optional;

        $existing_optional = array('filter','booster','cascadeCreate','scenario','logic','returnProperties','includedProperties','diversity','minRelevance','rotationRate','rotationTime','expertSettings','returnAbGroup');
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
        return "/{databaseId}/recomms/users/{$this->user_id}/items/";
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
        if (isset($this->optional['filter']))
             $p['filter'] = $this-> optional['filter'];
        if (isset($this->optional['booster']))
             $p['booster'] = $this-> optional['booster'];
        if (isset($this->optional['cascadeCreate']))
             $p['cascadeCreate'] = $this-> optional['cascadeCreate'];
        if (isset($this->optional['scenario']))
             $p['scenario'] = $this-> optional['scenario'];
        if (isset($this->optional['logic']))
             $p['logic'] = $this-> optional['logic'];
        if (isset($this->optional['returnProperties']))
             $p['returnProperties'] = $this-> optional['returnProperties'];
        if (isset($this->optional['includedProperties']))
             $p['includedProperties'] = $this-> optional['includedProperties'];
        if (isset($this->optional['diversity']))
             $p['diversity'] = $this-> optional['diversity'];
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
?>
