<?php
/**
 * Batch request
 * @author Ondrej Fiedler <ondrej.fiedler@recombee.com>
*/

namespace Recombee\RecommApi\Requests;

use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;
use Recombee\RecommApi\Util\Util;

/**
 * In many cases, it may be desirable to execute multiple requests at once. By example, when synchronizing the catalog of items in periodical manner, you would have to execute a sequence of thousands of separate POST requests, which is very ineffective and may take a very long time to complete. Most notably, network latencies can make execution of such a sequence very slow and even if executed in multiple parallel threads, there will still be unreasonable overhead caused by the HTTP(s). To avoid the problems mentioned, batch processing may be used, encapsulating a sequence of requests into a single HTTP request.
 * Batch processing allows you to submit arbitrary sequence of requests in form of JSON array. Any type of request from the above documentation may be used in the batch, and the batch may combine different types of requests arbitrarily as well.
 * Note that:
 * - executing the requests in a batch is equivalent as if they were executed one-by-one individually; there are, however, many optimizations to make batch execution as fast as possible,
 * - the status code of the batch request itself is 200 even if the individual requests result in error – you have to inspect the code values in the resulting array,
 * - if the status code of the whole batch is not 200, then there is an error in the batch request itself; in such a case, the error message returned should help you to resolve the problem,
 * - currently, batch size is limited to **10,000** requests; if you wish to execute even larger number of requests, please split the batch into multiple parts.
 */
class Batch extends Request {

    /**
     * @var Requst[] Requests contained in the batch
     */ 
    public $requests;

    /**
     * Construct the Batch request
     * @param Request[] $requests Array of Requests.
     */
    public function __construct($requests) {
        $this->requests = $requests;
        $this->timeout = null;
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
        return "/{databaseId}/batch/";
    }

    /**
     * Get request timeout
     * @return int Request timeout in milliseconds
     */
    public function getTimeout() {
        if($this->timeout)
            return $this->timeout;

        $timeout = 0;
        foreach ($this->requests as $r) {
            $timeout += $r->getTimeout();
        }
        return $timeout;
    }

    /**
     * Get query parameters
     * @return array Values of query parameters (name of parameter => value of the parameter)
     */
    public function getQueryParameters() {
        return array();
    }

    /**
     * Get body parameters
     * @return array Values of body parameters (name of parameter => value of the parameter)
     */
    public function getBodyParameters() {
        $reqs = array();

        foreach ($this->requests as $r) {
            array_push($reqs, $this->requestToBatchArray($r));
        }
        return ['requests' => $reqs];
    }

    protected function requestToBatchArray($req) {
        $path = '/' . Util::sliceDbName($req->getPath());
        $bh = ['method' => $req->getMethod(),
               'path' => $path  ];
        $params = $req->getQueryParameters();
        if ($req->getBodyParameters())
            $params = array_merge($params, $req->getBodyParameters());
        if($params)
            $bh['params'] = $params;
        return $bh;
    } 
}
?>
