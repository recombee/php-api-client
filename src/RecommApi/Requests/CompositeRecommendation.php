<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * CompositeRecommendation request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Composite Recommendation returns both a *source entity* (e.g., an Item or [Item Segment](https://docs.recombee.com/segmentations)) and a list of related recommendations in a single response.
 * It is ideal for use cases such as personalized homepage sections (*Articles from <category>*), *Because You Watched <movie>*, or *Artists Related to Your Favorite Artist <artist>*.
 * See detailed **examples and configuration guidance** in the [Composite Scenarios documentation](https://docs.recombee.com/scenarios#composite-recommendations).
 * **Structure**
 * The endpoint operates in two stages:
 * 1. Recommends the *source* (e.g., an Item Segment or item) to the user.
 * 2. Recommends *results* (items or Item Segments) related to that *source*.
 * For example, *Articles from <category>* can be decomposed into:
 *   - [Recommend Item Segments To User](https://docs.recombee.com/api#recommend-item-segments-to-user) to find the category.
 *   - [Recommend Items To Item Segment](https://docs.recombee.com/api#recommend-items-to-item-segment) to recommend articles from that category.
 * Since the first step uses [Recommend Item Segments To User](https://docs.recombee.com/api#recommend-items-to-user), you must include the `userId` parameter in the *Composite Recommendation* request.
 * Each *Composite Recommendation* counts as a single recommendation API request for billing.
 * **Stage-specific Parameters**
 * Additional parameters can be supplied via [sourceSettings](https://docs.recombee.com/api#composite-recommendation-param-sourceSettings) and [resultSettings](https://docs.recombee.com/api#composite-recommendation-param-resultSettings).
 * In the example above:
 *   - `sourceSettings` may include any parameter valid for [Recommend Item Segments To User](https://docs.recombee.com/api#recommend-items-to-user) (e.g., `filter`, `booster`).
 *   - `resultSettings` may include any parameter valid for [Recommend Items To Item Segment](https://docs.recombee.com/api#recommend-items-to-item-segment).
 * See [this example](https://docs.recombee.com/api#composite-recommendation-example-setting-parameters-for-individual-stages) for more details.
 */
class CompositeRecommendation extends Request {

    /**
     * @var string $scenario Scenario defines a particular application of recommendations. It can be, for example, "homepage", "cart", or "emailing".
     * You can set various settings to the [scenario](https://docs.recombee.com/scenarios) in the [Admin UI](https://admin.recombee.com). You can also see the performance of each scenario in the Admin UI separately, so you can check how well each application performs.
     * The AI that optimizes models to get the best results may optimize different scenarios separately or even use different models in each of the scenarios.
     */
    protected $scenario;
    /**
     * @var int $count Number of items to be recommended (N for the top-N recommendation).
     */
    protected $count;
    /**
     * @var string $item_id ID of the item for which the recommendations are to be generated.
     */
    protected $item_id;
    /**
     * @var string $user_id ID of the user for which the recommendations are to be generated.
     */
    protected $user_id;
    /**
     * @var string|array $logic Logic specifies the particular behavior of the recommendation models. You can pick tailored logic for your domain and use case.
     * See [this section](https://docs.recombee.com/recommendation_logics) for a list of available logics and other details.
     * The difference between `logic` and `scenario` is that `logic` specifies mainly behavior, while `scenario` specifies the place where recommendations are shown to the users.
     * Logic can also be set to a [scenario](https://docs.recombee.com/scenarios) in the [Admin UI](https://admin.recombee.com).
     */
    protected $logic;
    /**
     * @var string $segment_id ID of the segment from `contextSegmentationId` for which the recommendations are to be generated.
     */
    protected $segment_id;
    /**
     * @var string $search_query Search query provided by the user. It is used for the full-text search. Only applicable if the *scenario* corresponds to a search scenario.
     */
    protected $search_query;
    /**
     * @var bool $cascade_create If the entity for the source recommendation does not exist in the database, returns a list of non-personalized recommendations and creates the user in the database. This allows, for example, rotations in the following recommendations for that entity, as the entity will be already known to the system.
     */
    protected $cascade_create;
    /**
     * @var array $source_settings Parameters applied for recommending the *Source* stage. The accepted parameters correspond with the recommendation sub-endpoint used to recommend the *Source*.
     */
    protected $source_settings;
    /**
     * @var array $result_settings Parameters applied for recommending the *Result* stage. The accepted parameters correspond with the recommendation sub-endpoint used to recommend the *Result*.
     */
    protected $result_settings;
    /**
     * @var array $expert_settings Dictionary of custom options.
     */
    protected $expert_settings;
    /**
     * @var array Array containing values of optional parameters
     */
   protected $optional;

    /**
     * Construct the request
     * @param string $scenario Scenario defines a particular application of recommendations. It can be, for example, "homepage", "cart", or "emailing".
     * You can set various settings to the [scenario](https://docs.recombee.com/scenarios) in the [Admin UI](https://admin.recombee.com). You can also see the performance of each scenario in the Admin UI separately, so you can check how well each application performs.
     * The AI that optimizes models to get the best results may optimize different scenarios separately or even use different models in each of the scenarios.
     * @param int $count Number of items to be recommended (N for the top-N recommendation).
     * @param array $optional Optional parameters given as an array containing pairs name of the parameter => value
     * - Allowed parameters:
     *     - *itemId*
     *         - Type: string
     *         - Description: ID of the item for which the recommendations are to be generated.
     *     - *userId*
     *         - Type: string
     *         - Description: ID of the user for which the recommendations are to be generated.
     *     - *logic*
     *         - Type: string|array
     *         - Description: Logic specifies the particular behavior of the recommendation models. You can pick tailored logic for your domain and use case.
     * See [this section](https://docs.recombee.com/recommendation_logics) for a list of available logics and other details.
     * The difference between `logic` and `scenario` is that `logic` specifies mainly behavior, while `scenario` specifies the place where recommendations are shown to the users.
     * Logic can also be set to a [scenario](https://docs.recombee.com/scenarios) in the [Admin UI](https://admin.recombee.com).
     *     - *segmentId*
     *         - Type: string
     *         - Description: ID of the segment from `contextSegmentationId` for which the recommendations are to be generated.
     *     - *searchQuery*
     *         - Type: string
     *         - Description: Search query provided by the user. It is used for the full-text search. Only applicable if the *scenario* corresponds to a search scenario.
     *     - *cascadeCreate*
     *         - Type: bool
     *         - Description: If the entity for the source recommendation does not exist in the database, returns a list of non-personalized recommendations and creates the user in the database. This allows, for example, rotations in the following recommendations for that entity, as the entity will be already known to the system.
     *     - *sourceSettings*
     *         - Type: array
     *         - Description: Parameters applied for recommending the *Source* stage. The accepted parameters correspond with the recommendation sub-endpoint used to recommend the *Source*.
     *     - *resultSettings*
     *         - Type: array
     *         - Description: Parameters applied for recommending the *Result* stage. The accepted parameters correspond with the recommendation sub-endpoint used to recommend the *Result*.
     *     - *expertSettings*
     *         - Type: array
     *         - Description: Dictionary of custom options.
     * @throws Exceptions\UnknownOptionalParameterException UnknownOptionalParameterException if an unknown optional parameter is given in $optional
     */
    public function __construct($scenario, $count, $optional = array()) {
        $this->scenario = $scenario;
        $this->count = $count;
        $this->item_id = isset($optional['itemId']) ? $optional['itemId'] : null;
        $this->user_id = isset($optional['userId']) ? $optional['userId'] : null;
        $this->logic = isset($optional['logic']) ? $optional['logic'] : null;
        $this->segment_id = isset($optional['segmentId']) ? $optional['segmentId'] : null;
        $this->search_query = isset($optional['searchQuery']) ? $optional['searchQuery'] : null;
        $this->cascade_create = isset($optional['cascadeCreate']) ? $optional['cascadeCreate'] : null;
        $this->source_settings = isset($optional['sourceSettings']) ? $optional['sourceSettings'] : null;
        $this->result_settings = isset($optional['resultSettings']) ? $optional['resultSettings'] : null;
        $this->expert_settings = isset($optional['expertSettings']) ? $optional['expertSettings'] : null;
        $this->optional = $optional;

        $existing_optional = array('itemId','userId','logic','segmentId','searchQuery','cascadeCreate','sourceSettings','resultSettings','expertSettings');
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
        return "/{databaseId}/recomms/composite/";
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
        $p['scenario'] = $this->scenario;
        $p['count'] = $this->count;
        if (isset($this->optional['itemId']))
             $p['itemId'] = $this-> optional['itemId'];
        if (isset($this->optional['userId']))
             $p['userId'] = $this-> optional['userId'];
        if (isset($this->optional['logic']))
             $p['logic'] = $this-> optional['logic'];
        if (isset($this->optional['segmentId']))
             $p['segmentId'] = $this-> optional['segmentId'];
        if (isset($this->optional['searchQuery']))
             $p['searchQuery'] = $this-> optional['searchQuery'];
        if (isset($this->optional['cascadeCreate']))
             $p['cascadeCreate'] = $this-> optional['cascadeCreate'];
        if (isset($this->optional['sourceSettings']))
             $p['sourceSettings'] = $this-> optional['sourceSettings'];
        if (isset($this->optional['resultSettings']))
             $p['resultSettings'] = $this-> optional['resultSettings'];
        if (isset($this->optional['expertSettings']))
             $p['expertSettings'] = $this-> optional['expertSettings'];
        return $p;
    }

}
