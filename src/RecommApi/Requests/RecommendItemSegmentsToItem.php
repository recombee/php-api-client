<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * RecommendItemSegmentsToItem request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Recommends Segments from a Segmentation that are the most relevant to a particular item.
 * Based on the used Segmentation, this endpoint can be used for example for:
 *   - Recommending the related categories
 *   - Recommending the related genres
 *   - Recommending the related brands
 *   - Recommending the related artists
 * You need to set the used Segmentation the Admin UI in the Scenario settings prior to using this endpoint.
 * The returned segments are sorted by relevance (first segment being the most relevant).
 * It is also possible to use POST HTTP method (for example in case of very long ReQL filter) - query parameters then become body parameters.
 */
class RecommendItemSegmentsToItem extends Request {

    /**
     * @var string $item_id ID of the item for which the recommendations are to be generated.
     */
    protected $item_id;
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
     * @var int $count Number of item segments to be recommended (N for the top-N recommendation).
     */
    protected $count;
    /**
     * @var string $scenario Scenario defines a particular application of recommendations. It can be, for example, "homepage", "cart", or "emailing".
     * You can set various settings to the [scenario](https://docs.recombee.com/scenarios.html) in the [Admin UI](https://admin.recombee.com). You can also see the performance of each scenario in the Admin UI separately, so you can check how well each application performs.
     * The AI that optimizes models to get the best results may optimize different scenarios separately or even use different models in each of the scenarios.
     */
    protected $scenario;
    /**
     * @var bool $cascade_create If the user does not exist in the database, returns a list of non-personalized recommendations and creates the user in the database. This allows, for example, rotations in the following recommendations for that user, as the user will be already known to the system.
     */
    protected $cascade_create;
    /**
     * @var string $filter Boolean-returning [ReQL](https://docs.recombee.com/reql.html) expression which allows you to filter recommended segments based on the `segmentationId`.
     */
    protected $filter;
    /**
     * @var string $booster Number-returning [ReQL](https://docs.recombee.com/reql.html) expression which allows you to boost recommendation rate of some segments based on the `segmentationId`.
     */
    protected $booster;
    /**
     * @var string|array $logic Logic specifies the particular behavior of the recommendation models. You can pick tailored logic for your domain and use case.
     * See [this section](https://docs.recombee.com/recommendation_logics.html) for a list of available logics and other details.
     * The difference between `logic` and `scenario` is that `logic` specifies mainly behavior, while `scenario` specifies the place where recommendations are shown to the users.
     * Logic can also be set to a [scenario](https://docs.recombee.com/scenarios.html) in the [Admin UI](https://admin.recombee.com).
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
     * @param string $item_id ID of the item for which the recommendations are to be generated.
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
     * @param int $count Number of item segments to be recommended (N for the top-N recommendation).
     * @param array $optional Optional parameters given as an array containing pairs name of the parameter => value
     * - Allowed parameters:
     *     - *scenario*
     *         - Type: string
     *         - Description: Scenario defines a particular application of recommendations. It can be, for example, "homepage", "cart", or "emailing".
     * You can set various settings to the [scenario](https://docs.recombee.com/scenarios.html) in the [Admin UI](https://admin.recombee.com). You can also see the performance of each scenario in the Admin UI separately, so you can check how well each application performs.
     * The AI that optimizes models to get the best results may optimize different scenarios separately or even use different models in each of the scenarios.
     *     - *cascadeCreate*
     *         - Type: bool
     *         - Description: If the user does not exist in the database, returns a list of non-personalized recommendations and creates the user in the database. This allows, for example, rotations in the following recommendations for that user, as the user will be already known to the system.
     *     - *filter*
     *         - Type: string
     *         - Description: Boolean-returning [ReQL](https://docs.recombee.com/reql.html) expression which allows you to filter recommended segments based on the `segmentationId`.
     *     - *booster*
     *         - Type: string
     *         - Description: Number-returning [ReQL](https://docs.recombee.com/reql.html) expression which allows you to boost recommendation rate of some segments based on the `segmentationId`.
     *     - *logic*
     *         - Type: string|array
     *         - Description: Logic specifies the particular behavior of the recommendation models. You can pick tailored logic for your domain and use case.
     * See [this section](https://docs.recombee.com/recommendation_logics.html) for a list of available logics and other details.
     * The difference between `logic` and `scenario` is that `logic` specifies mainly behavior, while `scenario` specifies the place where recommendations are shown to the users.
     * Logic can also be set to a [scenario](https://docs.recombee.com/scenarios.html) in the [Admin UI](https://admin.recombee.com).
     *     - *expertSettings*
     *         - Type: array
     *         - Description: Dictionary of custom options.
     *     - *returnAbGroup*
     *         - Type: bool
     *         - Description: If there is a custom AB-testing running, return the name of the group to which the request belongs.
     * @throws Exceptions\UnknownOptionalParameterException UnknownOptionalParameterException if an unknown optional parameter is given in $optional
     */
    public function __construct($item_id, $target_user_id, $count, $optional = array()) {
        $this->item_id = $item_id;
        $this->target_user_id = $target_user_id;
        $this->count = $count;
        $this->scenario = isset($optional['scenario']) ? $optional['scenario'] : null;
        $this->cascade_create = isset($optional['cascadeCreate']) ? $optional['cascadeCreate'] : null;
        $this->filter = isset($optional['filter']) ? $optional['filter'] : null;
        $this->booster = isset($optional['booster']) ? $optional['booster'] : null;
        $this->logic = isset($optional['logic']) ? $optional['logic'] : null;
        $this->expert_settings = isset($optional['expertSettings']) ? $optional['expertSettings'] : null;
        $this->return_ab_group = isset($optional['returnAbGroup']) ? $optional['returnAbGroup'] : null;
        $this->optional = $optional;

        $existing_optional = array('scenario','cascadeCreate','filter','booster','logic','expertSettings','returnAbGroup');
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
        return "/{databaseId}/recomms/items/{$this->item_id}/item-segments/";
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
        $p['targetUserId'] = $this->target_user_id;
        $p['count'] = $this->count;
        if (isset($this->optional['scenario']))
             $p['scenario'] = $this-> optional['scenario'];
        if (isset($this->optional['cascadeCreate']))
             $p['cascadeCreate'] = $this-> optional['cascadeCreate'];
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
