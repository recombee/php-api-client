<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * ListSearchSynonyms request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Gives the list of synonyms defined in the database.
 */
class ListSearchSynonyms extends Request {

    /**
     * @var int $count The number of synonyms to be listed.
     */
    protected $count;
    /**
     * @var int $offset Specifies the number of synonyms to skip (ordered by `term`).
     */
    protected $offset;
    /**
     * @var array Array containing values of optional parameters
     */
   protected $optional;

    /**
     * Construct the request
     * @param array $optional Optional parameters given as an array containing pairs name of the parameter => value
     * - Allowed parameters:
     *     - *count*
     *         - Type: int
     *         - Description: The number of synonyms to be listed.
     *     - *offset*
     *         - Type: int
     *         - Description: Specifies the number of synonyms to skip (ordered by `term`).
     * @throws Exceptions\UnknownOptionalParameterException UnknownOptionalParameterException if an unknown optional parameter is given in $optional
     */
    public function __construct($optional = array()) {
        $this->count = isset($optional['count']) ? $optional['count'] : null;
        $this->offset = isset($optional['offset']) ? $optional['offset'] : null;
        $this->optional = $optional;

        $existing_optional = array('count','offset');
        foreach ($this->optional as $key => $value) {
            if (!in_array($key, $existing_optional))
                 throw new UnknownOptionalParameterException($key);
         }
        $this->timeout = 100000;
        $this->ensure_https = false;
    }

    /**
     * Get used HTTP method
     * @return static Used HTTP method
     */
    public function getMethod() {
        return Request::HTTP_GET;
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
        if (isset($this->optional['count']))
            $params['count'] = $this->optional['count'];
        if (isset($this->optional['offset']))
            $params['offset'] = $this->optional['offset'];
        return $params;
    }

    /**
     * Get body parameters
     * @return array Values of body parameters (name of parameter => value of the parameter)
     */
    public function getBodyParameters() {
        $p = array();
        return $p;
    }

}
?>
