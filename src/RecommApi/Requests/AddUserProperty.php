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
 * Adding a user property is somewhat equivalent to adding a column to the table of users. The users may be characterized by various properties of different types.
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
     * * `timestamp` - Value representing date and time. ISO8601-1 pattern (string) or UTC epoch time (number).
     * * `set` - Set of strings.
     */
    protected $type;
    /**
     * @var string|array $role [Role](https://docs.recombee.com/api/property_roles_metadata#roles) to assign to the property.
     */
    protected $role;
    /**
     * @var array $metadata List of [metadata](https://docs.recombee.com/api/property_roles_metadata#metadata) entries to assign to the property.
     */
    protected $metadata;
    /**
     * @var array Array containing values of optional parameters
     */
   protected $optional;

    /**
     * Construct the request
     * @param string $property_name Name of the user property to be created. Currently, the following names are reserved: `id`, `userid`, case-insensitively. Also, the length of the property name must not exceed 63 characters.
     * @param string $type Value type of the user property to be created. One of: `int`, `double`, `string`, `boolean`, `timestamp`, `set`.
     * * `int` - Signed integer number.
     * * `double` - Floating point number. It uses 64-bit base-2 format (IEEE 754 standard).
     * * `string` - UTF-8 string.
     * * `boolean` - *true* / *false*
     * * `timestamp` - Value representing date and time. ISO8601-1 pattern (string) or UTC epoch time (number).
     * * `set` - Set of strings.
     * @param array $optional Optional parameters given as an array containing pairs name of the parameter => value
     * - Allowed parameters:
     *     - *role*
     *         - Type: string|array
     *         - Description: [Role](https://docs.recombee.com/api/property_roles_metadata#roles) to assign to the property.
     *     - *metadata*
     *         - Type: array
     *         - Description: List of [metadata](https://docs.recombee.com/api/property_roles_metadata#metadata) entries to assign to the property.
     * @throws Exceptions\UnknownOptionalParameterException UnknownOptionalParameterException if an unknown optional parameter is given in $optional
     */
    public function __construct($property_name, $type, $optional = array()) {
        $this->property_name = $property_name;
        $this->type = $type;
        $this->role = isset($optional['role']) ? $optional['role'] : null;
        $this->metadata = isset($optional['metadata']) ? $optional['metadata'] : null;
        $this->optional = $optional;

        $existing_optional = array('role','metadata');
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
        return $params;
    }

    /**
     * Get body parameters
     * @return array Values of body parameters (name of parameter => value of the parameter)
     */
    public function getBodyParameters() {
        $p = array();
        $p['type'] = $this->type;
        if (isset($this->optional['role']))
             $p['role'] = $this-> optional['role'];
        if (isset($this->optional['metadata']))
             $p['metadata'] = $this-> optional['metadata'];
        return $p;
    }

}
