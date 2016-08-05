<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * SetItemValues request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Set/update (some) property values of a given item. The properties (columns) must be previously created by [Add item property](https://docs.recombee.com/api.html#add-item-property).
 */
class SetItemValues extends Request {

    /**
     * @var string $item_id ID of the item which will be modified.
     */
    protected $item_id;
    /**
     * @var array $values The values for the individual properties.
     * Example of body:
     * ```
     *   {
     *     "product_description": "4K TV with 3D feature",
     *     "categories":   ["Electronics", "Televisions"],
     *     "price_usd": 342,
     *     "!cascadeCreate": true
     *   }
     * ```
     * Special parameter `!cascadeCreate` may be used. It indicates that the item of the given itemId should be created if it does not exist in the database, as if the corresponding PUT method was used. Note the exclamation mark (!) at the beginning of the parameter's name to distinguish it from item property names.
     */
    protected $values;

    /**
     * Construct the request
     * @param string $item_id ID of the item which will be modified.
     * @param array $values The values for the individual properties.
     * Example of body:
     * ```
     *   {
     *     "product_description": "4K TV with 3D feature",
     *     "categories":   ["Electronics", "Televisions"],
     *     "price_usd": 342,
     *     "!cascadeCreate": true
     *   }
     * ```
     * Special parameter `!cascadeCreate` may be used. It indicates that the item of the given itemId should be created if it does not exist in the database, as if the corresponding PUT method was used. Note the exclamation mark (!) at the beginning of the parameter's name to distinguish it from item property names.
     */
    public function __construct($item_id, $values) {
        $this->item_id = $item_id;
        $this->values = $values;
        $this->timeout = 1000;
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
        return "/{databaseId}/items/{$this->item_id}";
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
        $p = array_merge($p, $this->values);
        return $p;
    }

}
?>
