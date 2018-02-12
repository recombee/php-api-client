<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * RecommendUsersToItem request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * This feature is currently in beta.
 * Recommend users that are likely to be interested in a given item.
 * It is also possible to use POST HTTP method (for example in case of very long ReQL filter) - query parameters then become body parameters.
 */
class RecommendUsersToItem extends Request {

    /**
     * @var string $item_id ID of the item for which the recommendations are to be generated.
     */
    protected $item_id;
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
     * @var bool $cascade_create If item of given *itemId* doesn't exist in the database, it creates the missing item.
     */
    protected $cascade_create;
    /**
     * @var string $scenario Scenario defines a particular application of recommendations. It can be for example "homepage", "cart" or "emailing". You can see each scenario in the UI separately, so you can check how well each application performs. The AI which optimizes models in order to get the best results may optimize different scenarios separately, or even use different models in each of the scenarios.
     */
    protected $scenario;
    /**
     * @var bool $return_properties With `returnProperties=true`, property values of the recommended users are returned along with their IDs in a JSON dictionary. The acquired property values can be used for easy displaying the recommended users. 
     * Example response:
     * ```
     *   {
     *     "recommId": "039b71dc-b9cc-4645-a84f-62b841eecfce",
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
     *       ]
     *   }
     * ```
     */
    protected $return_properties;
    /**
     * @var array $included_properties Allows to specify, which properties should be returned when `returnProperties=true` is set. The properties are given as a comma-separated list. 
     * Example response for `includedProperties=country`:
     * ```
     *   {
     *     "recommId": "b2b355dd-972a-4728-9c6b-2dc229db0678",
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
     * @var  $expert_settings Dictionary of custom options.
     */
    protected $expert_settings;
    /**
     * @var array Array containing values of optional parameters
     */
   protected $optional;

    /**
     * Construct the request
     * @param string $item_id ID of the item for which the recommendations are to be generated.
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
     *         - Description: If item of given *itemId* doesn't exist in the database, it creates the missing item.
     *     - *scenario*
     *         - Type: string
     *         - Description: Scenario defines a particular application of recommendations. It can be for example "homepage", "cart" or "emailing". You can see each scenario in the UI separately, so you can check how well each application performs. The AI which optimizes models in order to get the best results may optimize different scenarios separately, or even use different models in each of the scenarios.
     *     - *returnProperties*
     *         - Type: bool
     *         - Description: With `returnProperties=true`, property values of the recommended users are returned along with their IDs in a JSON dictionary. The acquired property values can be used for easy displaying the recommended users. 
     * Example response:
     * ```
     *   {
     *     "recommId": "039b71dc-b9cc-4645-a84f-62b841eecfce",
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
     *       ]
     *   }
     * ```
     *     - *includedProperties*
     *         - Type: array
     *         - Description: Allows to specify, which properties should be returned when `returnProperties=true` is set. The properties are given as a comma-separated list. 
     * Example response for `includedProperties=country`:
     * ```
     *   {
     *     "recommId": "b2b355dd-972a-4728-9c6b-2dc229db0678",
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
     *       ]
     *   }
     * ```
     *     - *diversity*
     *         - Type: float
     *         - Description: **Expert option** Real number from [0.0, 1.0] which determines how much mutually dissimilar should the recommended items be. The default value is 0.0, i.e., no diversification. Value 1.0 means maximal diversification.
     *     - *expertSettings*
     *         - Type: 
     *         - Description: Dictionary of custom options.
     * @throws Exceptions\UnknownOptionalParameterException UnknownOptionalParameterException if an unknown optional parameter is given in $optional
     */
    public function __construct($item_id, $count, $optional = array()) {
        $this->item_id = $item_id;
        $this->count = $count;
        $this->filter = isset($optional['filter']) ? $optional['filter'] : null;
        $this->booster = isset($optional['booster']) ? $optional['booster'] : null;
        $this->cascade_create = isset($optional['cascadeCreate']) ? $optional['cascadeCreate'] : null;
        $this->scenario = isset($optional['scenario']) ? $optional['scenario'] : null;
        $this->return_properties = isset($optional['returnProperties']) ? $optional['returnProperties'] : null;
        $this->included_properties = isset($optional['includedProperties']) ? $optional['includedProperties'] : null;
        $this->diversity = isset($optional['diversity']) ? $optional['diversity'] : null;
        $this->expert_settings = isset($optional['expertSettings']) ? $optional['expertSettings'] : null;
        $this->optional = $optional;

        $existing_optional = array('filter','booster','cascadeCreate','scenario','returnProperties','includedProperties','diversity','expertSettings');
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
        return "/{databaseId}/recomms/items/{$this->item_id}/users/";
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
        if (isset($this->optional['returnProperties']))
             $p['returnProperties'] = $this-> optional['returnProperties'];
        if (isset($this->optional['includedProperties']))
             $p['includedProperties'] = $this-> optional['includedProperties'];
        if (isset($this->optional['diversity']))
             $p['diversity'] = $this-> optional['diversity'];
        if (isset($this->optional['expertSettings']))
             $p['expertSettings'] = $this-> optional['expertSettings'];
        return $p;
    }

}
?>
