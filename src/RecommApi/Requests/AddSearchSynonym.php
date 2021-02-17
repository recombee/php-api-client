<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * AddSearchSynonym request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Adds a new synonym for the [Search items](https://docs.recombee.com/api.html#search-items).
 * When the `term` is used in the search query, the `synonym` is also used for the full-text search.
 * Unless `oneWay=true`, it works also in the opposite way (`synonym` -> `term`).
 * An example of a synonym can be `science fiction` for the term `sci-fi`.
 */
class AddSearchSynonym extends Request {

    /**
     * @var string $term A word to which the `synonym` is specified.
     */
    protected $term;
    /**
     * @var string $synonym A word that should be considered equal to the `term` by the full-text search engine.
     */
    protected $synonym;
    /**
     * @var bool $one_way If set to `true`, only `term` -> `synonym` is considered. If set to `false`, also `synonym` -> `term` works.
     * Default: `false`.
     */
    protected $one_way;
    /**
     * @var array Array containing values of optional parameters
     */
   protected $optional;

    /**
     * Construct the request
     * @param string $term A word to which the `synonym` is specified.
     * @param string $synonym A word that should be considered equal to the `term` by the full-text search engine.
     * @param array $optional Optional parameters given as an array containing pairs name of the parameter => value
     * - Allowed parameters:
     *     - *oneWay*
     *         - Type: bool
     *         - Description: If set to `true`, only `term` -> `synonym` is considered. If set to `false`, also `synonym` -> `term` works.
     * Default: `false`.
     * @throws Exceptions\UnknownOptionalParameterException UnknownOptionalParameterException if an unknown optional parameter is given in $optional
     */
    public function __construct($term, $synonym, $optional = array()) {
        $this->term = $term;
        $this->synonym = $synonym;
        $this->one_way = isset($optional['oneWay']) ? $optional['oneWay'] : null;
        $this->optional = $optional;

        $existing_optional = array('oneWay');
        foreach ($this->optional as $key => $value) {
            if (!in_array($key, $existing_optional))
                 throw new UnknownOptionalParameterException($key);
         }
        $this->timeout = 10000;
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
        return "/{databaseId}/synonyms/items/";
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
        $p['term'] = $this->term;
        $p['synonym'] = $this->synonym;
        if (isset($this->optional['oneWay']))
             $p['oneWay'] = $this-> optional['oneWay'];
        return $p;
    }

}
?>
