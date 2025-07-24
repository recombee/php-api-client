<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * RecommendUsersToUser request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Gets users similar to the given user, based on the user's past interactions (purchases, ratings, etc.) and values of properties.
 * It is also possible to use POST HTTP method (for example in the case of a very long ReQL filter) - query parameters then become body parameters.
 * The returned users are sorted by similarity (the first user being the most similar).
 */
class RecommendUsersToUser extends Request {

    /**
     * @var string $user_id User to whom we find similar users
     */
    protected $user_id;
    /**
     * @var int $count Number of users to be recommended (N for the top-N recommendation).
     */
    protected $count;
    /**
     * @var string $scenario Scenario defines a particular application of recommendations. It can be, for example, "homepage", "cart", or "emailing".
     * You can set various settings to the [scenario](https://docs.recombee.com/scenarios) in the [Admin UI](https://admin.recombee.com). You can also see the performance of each scenario in the Admin UI separately, so you can check how well each application performs.
     * The AI that optimizes models to get the best results may optimize different scenarios separately or even use different models in each of the scenarios.
     */
    protected $scenario;
    /**
     * @var bool $cascade_create If the user does not exist in the database, returns a list of non-personalized recommendations and creates the user in the database. This allows, for example, rotations in the following recommendations for that user, as the user will be already known to the system.
     */
    protected $cascade_create;
    /**
     * @var bool $return_properties With `returnProperties=true`, property values of the recommended users are returned along with their IDs in a JSON dictionary. The acquired property values can be used to easily display the recommended users. 
     * Example response:
     * ```json
     *   {
     *     "recommId": "9cb9c55d-50ba-4478-84fd-ab456136156e",
     *     "recomms": 
     *       [
     *         {
     *           "id": "user-17",
     *           "values": {
     *             "country": "US",
     *             "sex": "F"
     *           }
     *         },
     *         {
     *           "id": "user-2",
     *           "values": {
     *             "country": "CAN",
     *             "sex": "M"
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
     * Example response for `includedProperties=country`:
     * ```json
     *   {
     *     "recommId": "b326d82d-5d57-4b45-b362-c9d6f0895855",
     *     "recomms":
     *       [
     *         {
     *           "id": "user-17",
     *           "values": {
     *             "country": "US"
     *           }
     *         },
     *         {
     *           "id": "user-2",
     *           "values": {
     *             "country": "CAN"
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
     * @var float $diversity **Expert option:** Real number from [0.0, 1.0], which determines how mutually dissimilar the recommended users should be. The default value is 0.0, i.e., no diversification. Value 1.0 means maximal diversification.
     */
    protected $diversity;
    /**
     * @var string $min_relevance **Expert option:** Specifies the threshold of how relevant must the recommended users be. Possible values one of: "low", "medium", "high".
     */
    protected $min_relevance;
    /**
     * @var float $rotation_rate **Expert option:** If your users browse the system in real-time, it may easily happen that you wish to offer them recommendations multiple times. Here comes the question: how much should the recommendations change? Should they remain the same, or should they rotate? Recombee API allows you to control this per request in a backward fashion. You may penalize a user for being recommended in the near past. For the specific user, `rotationRate=1` means maximal rotation, `rotationRate=0` means absolutely no rotation. You may also use, for example, `rotationRate=0.2` for only slight rotation of recommended users.
     */
    protected $rotation_rate;
    /**
     * @var float $rotation_time **Expert option:** Taking *rotationRate* into account, specifies how long it takes for a user to recover from the penalization. For example, `rotationTime=7200.0` means that users recommended less than 2 hours ago are penalized.
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
     * @param string $user_id User to whom we find similar users
     * @param int $count Number of users to be recommended (N for the top-N recommendation).
     * @param array $optional Optional parameters given as an array containing pairs name of the parameter => value
     * - Allowed parameters:
     *     - *scenario*
     *         - Type: string
     *         - Description: Scenario defines a particular application of recommendations. It can be, for example, "homepage", "cart", or "emailing".
     * You can set various settings to the [scenario](https://docs.recombee.com/scenarios) in the [Admin UI](https://admin.recombee.com). You can also see the performance of each scenario in the Admin UI separately, so you can check how well each application performs.
     * The AI that optimizes models to get the best results may optimize different scenarios separately or even use different models in each of the scenarios.
     *     - *cascadeCreate*
     *         - Type: bool
     *         - Description: If the user does not exist in the database, returns a list of non-personalized recommendations and creates the user in the database. This allows, for example, rotations in the following recommendations for that user, as the user will be already known to the system.
     *     - *returnProperties*
     *         - Type: bool
     *         - Description: With `returnProperties=true`, property values of the recommended users are returned along with their IDs in a JSON dictionary. The acquired property values can be used to easily display the recommended users. 
     * Example response:
     * ```json
     *   {
     *     "recommId": "9cb9c55d-50ba-4478-84fd-ab456136156e",
     *     "recomms": 
     *       [
     *         {
     *           "id": "user-17",
     *           "values": {
     *             "country": "US",
     *             "sex": "F"
     *           }
     *         },
     *         {
     *           "id": "user-2",
     *           "values": {
     *             "country": "CAN",
     *             "sex": "M"
     *           }
     *         }
     *       ],
     *     "numberNextRecommsCalls": 0
     *   }
     * ```
     *     - *includedProperties*
     *         - Type: array
     *         - Description: Allows specifying which properties should be returned when `returnProperties=true` is set. The properties are given as a comma-separated list.
     * Example response for `includedProperties=country`:
     * ```json
     *   {
     *     "recommId": "b326d82d-5d57-4b45-b362-c9d6f0895855",
     *     "recomms":
     *       [
     *         {
     *           "id": "user-17",
     *           "values": {
     *             "country": "US"
     *           }
     *         },
     *         {
     *           "id": "user-2",
     *           "values": {
     *             "country": "CAN"
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
     *     - *diversity*
     *         - Type: float
     *         - Description: **Expert option:** Real number from [0.0, 1.0], which determines how mutually dissimilar the recommended users should be. The default value is 0.0, i.e., no diversification. Value 1.0 means maximal diversification.
     *     - *minRelevance*
     *         - Type: string
     *         - Description: **Expert option:** Specifies the threshold of how relevant must the recommended users be. Possible values one of: "low", "medium", "high".
     *     - *rotationRate*
     *         - Type: float
     *         - Description: **Expert option:** If your users browse the system in real-time, it may easily happen that you wish to offer them recommendations multiple times. Here comes the question: how much should the recommendations change? Should they remain the same, or should they rotate? Recombee API allows you to control this per request in a backward fashion. You may penalize a user for being recommended in the near past. For the specific user, `rotationRate=1` means maximal rotation, `rotationRate=0` means absolutely no rotation. You may also use, for example, `rotationRate=0.2` for only slight rotation of recommended users.
     *     - *rotationTime*
     *         - Type: float
     *         - Description: **Expert option:** Taking *rotationRate* into account, specifies how long it takes for a user to recover from the penalization. For example, `rotationTime=7200.0` means that users recommended less than 2 hours ago are penalized.
     *     - *expertSettings*
     *         - Type: array
     *         - Description: Dictionary of custom options.
     *     - *returnAbGroup*
     *         - Type: bool
     *         - Description: If there is a custom AB-testing running, return the name of the group to which the request belongs.
     * @throws Exceptions\UnknownOptionalParameterException UnknownOptionalParameterException if an unknown optional parameter is given in $optional
     */
    public function __construct($user_id, $count, $optional = array()) {
        $this->user_id = $user_id;
        $this->count = $count;
        $this->scenario = isset($optional['scenario']) ? $optional['scenario'] : null;
        $this->cascade_create = isset($optional['cascadeCreate']) ? $optional['cascadeCreate'] : null;
        $this->return_properties = isset($optional['returnProperties']) ? $optional['returnProperties'] : null;
        $this->included_properties = isset($optional['includedProperties']) ? $optional['includedProperties'] : null;
        $this->filter = isset($optional['filter']) ? $optional['filter'] : null;
        $this->booster = isset($optional['booster']) ? $optional['booster'] : null;
        $this->logic = isset($optional['logic']) ? $optional['logic'] : null;
        $this->diversity = isset($optional['diversity']) ? $optional['diversity'] : null;
        $this->min_relevance = isset($optional['minRelevance']) ? $optional['minRelevance'] : null;
        $this->rotation_rate = isset($optional['rotationRate']) ? $optional['rotationRate'] : null;
        $this->rotation_time = isset($optional['rotationTime']) ? $optional['rotationTime'] : null;
        $this->expert_settings = isset($optional['expertSettings']) ? $optional['expertSettings'] : null;
        $this->return_ab_group = isset($optional['returnAbGroup']) ? $optional['returnAbGroup'] : null;
        $this->optional = $optional;

        $existing_optional = array('scenario','cascadeCreate','returnProperties','includedProperties','filter','booster','logic','diversity','minRelevance','rotationRate','rotationTime','expertSettings','returnAbGroup');
        foreach ($this->optional as $key => $value) {
            if (!in_array($key, $existing_optional))
                 throw new UnknownOptionalParameterException($key);
         }
        $this->timeout = 50000;
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
        return "/{databaseId}/recomms/users/{$this->user_id}/users/";
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
