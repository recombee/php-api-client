<?php

/**
 * Request
 * @author Ondrej Fiedler <ondrej.fiedler@recombee.com>
 */

namespace Recombee\RecommApi\Requests;

/**
 * Base class for all the requests
 */
abstract class Request {

    /**
     @ignore
    */
    const HTTP_GET = 'GET';
    /**
     @ignore
    */
    const HTTP_PUT = 'PUT';
    /**
     @ignore
    */
    const HTTP_POST = 'POST';
    /**
     @ignore
    */
    const HTTP_DELETE = 'DELETE';

    /**
     * Get used HTTP method
     * @return static Used HTTP method
     */
    abstract public function getMethod();

    /**
     * Get URI to the endpoint
     * @return string URI to the endpoint
     */
    abstract public function getPath();

    /**
     * Get query parameters
     * @return array Values of query parameters (name of parameter => value of the parameter)
     */
    abstract public function getQueryParameters();

    /**
     * Get body parameters
     * @return array Values of body parameters (name of parameter => value of the parameter)
     */
    abstract public function getBodyParameters();
    
    /**
     * @var int Timeout of the request in milliseconds
     */
    protected $timeout;

    /**
     * Get request timeout
     * @return int Request timeout in milliseconds
     */
    public function getTimeout()
    {
        return $this->timeout;
    }
    /**
     * Sets request timeout
     * @param int Timeout in milliseconds
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
    }
}

?>