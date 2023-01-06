<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * AddUserProperty request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Adding a user property is somehow equivalent to adding a column to the table of users. The users may be characterized by various properties of different types.
 */
class AddUserProperty extends Request {

    /**
     * @var string $property_name Name of the user property to be created. Currently, the following names are reserved: `id`, `userid`, case-insensitively. Also, the length of the property name must not exceed 63 characters.
     */
    protected $property_name;
    /**
     * @var string $type Value type of the user property to be created. One of: `int`, `double`, `string`, `boolean`, `timestamp`, `set`.
     * * `int` - Signed integer number.
     * * `double` - Floating point number. It uses 64-bit base-2 format (IEEE 754 standard).
     * * `string` - UTF-8 string.
     * * `boolean` - *true* / *false*
     * * `timestamp` - Value representing date and time.
     * * `set` - Set of strings.
     */
    protected $type;

    /**
     * Construct the request
     * @param string $property_name Name of the user property to be created. Currently, the following names are reserved: `id`, `userid`, case-insensitively. Also, the length of the property name must not exceed 63 characters.
     * @param string $type Value type of the user property to be created. One of: `int`, `double`, `string`, `boolean`, `timestamp`, `set`.
     * * `int` - Signed integer number.
     * * `double` - Floating point number. It uses 64-bit base-2 format (IEEE 754 standard).
     * * `string` - UTF-8 string.
     * * `boolean` - *true* / *false*
     * * `timestamp` - Value representing date and time.
     * * `set` - Set of strings.
     */
    public function __construct($property_name, $type) {
        $this->property_name = $property_name;
        $this->type = $type;
        $this->timeout = 100000;
        $this->ensure_https = false;
    }

    /**
     * Get used HTTP method
     * @return static Used HTTP method
     */
    public function getMethod() {
        return Request::HTTP_PUT;
    }

    /**
     * Get URI to the endpoint
     * @return string URI to the endpoint
     */
    public function getPath() {
        return "/{databaseId}/users/properties/{$this->property_name}";
    }

    /**
     * Get query parameters
     * @return array Values of query parameters (name of parameter => value of the parameter)
     */
    public function getQueryParameters() {
        $params = array();
        $params['type'] = $this->type;
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
