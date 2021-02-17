<?php
/**
 * Recombee API client
 * @author Ondrej Fiedler <ondrej.fiedler@recombee.com>
 */

namespace Recombee\RecommApi;

use Recombee\RecommApi\Requests\Request;
use Recombee\RecommApi\Exceptions\ResponseException;
use Recombee\RecommApi\Exceptions\ApiTimeoutException;
use Recombee\RecommApi\Util\Util;

/**
 * Client for easy usage of Recombee recommendation API
*/
class Client{
    
    protected $account;
    protected $token;
    protected $request;
    protected $protocol;
    protected $base_uri;
    protected $options;
    protected $guzzle_client;

    /**
     * @ignore
     */
    const BASE_URI = 'rapi.recombee.com';

    /**
     * @ignore
     */
    const BATCH_MAX_SIZE = 10000; //Maximal number of requests within one batch request

    /**
     * Create the client
     * @param string $account Name of your account at Recombee
     * @param string $token Secret token
     * @param string $protocol Default protocol for sending requests. Possible values: 'http', 'https'.
     * @param array  $options Other custom options
     */
    public function __construct($account, $token, $protocol = 'https', $options= array()) {
        $this->account = $account;
        $this->token = $token;
        $this->protocol = $protocol;
        $this->base_uri = Client::BASE_URI;
        $this->options = $options;

        if(getenv('RAPI_URI') !== false)
            $this->base_uri = getenv('RAPI_URI');
        else if (isset($this->options['baseUri']))
            $this->base_uri = $this->options['baseUri'];
        $this->user_agent = $this->getUserAgent();

        $this->guzzle_client = new \GuzzleHttp\Client();
    }

    protected function getUserAgent() {
        $user_agent = 'recombee-php-api-client/3.2.0';
        if (isset($this->options['serviceName']))
            $user_agent .= ' '.($this->options['serviceName']);
        return $user_agent;
    }


    /**
     * Send a request to the Recombee API
     * @param Requests\Request $request Request that will be sent
     * @throws Exceptions\ResponseException ResponseException if the request fails (a status different from 200 or 201 is returned)
     * @throws Exceptions\ApiTimeoutException ApiTimeoutException if the request takes too long
     */
    public function send(Requests\Request $request) {
        
        if($request instanceof Requests\Batch && count($request->requests) > Client::BATCH_MAX_SIZE)
            return $this->sendMultipartBatch($request);

        $this->request = $request;
        $path = Util::sliceDbName($request->getPath());
        $request_url =  $path . $this->paramsToUrl($request->getQueryParameters());
        $signed_url = $this->signUrl($request_url);
        $protocol = ($request->getEnsureHttps()) ? 'https' : $this->protocol;
        $uri = $protocol . '://' . $this->base_uri . $signed_url;
        $timeout = $request->getTimeout() / 1000;
        $result = null;

        try {
            switch ($request->getMethod()) {
                case Requests\Request::HTTP_GET:
                    $result = $this->get($uri, $timeout);
                    break;

                case Requests\Request::HTTP_PUT:
                    $json = json_encode($request->getBodyParameters(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                    $result = $this->put($uri, $timeout, $json);
                    break;

                case Requests\Request::HTTP_DELETE:
                    $result = $this->delete($uri, $timeout);
                    break;

                case Requests\Request::HTTP_POST:
                    $json = json_encode($request->getBodyParameters(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                    $result = $this->post($uri, $timeout, $json);
                    break;
            }
        }
        catch(\GuzzleHttp\Exception\ConnectException $e)
        {
            throw new ApiTimeoutException($request);
        }
        catch(\GuzzleHttp\Exception\GuzzleException $e)
        {
            if(strpos($e->getMessage(), 'cURL error 28') !== false) throw new ApiTimeoutException($request);
            if(strpos($e->getMessage(), 'timed out') !== false) throw new ApiTimeoutException($request);

            throw $e;
        }

        return $result;
    }

    /* ----------------------- Send requests -----------------------  */
    protected function getOptionalHttpHeaders() {
        if (isset($this->options['requestsHeaders']))
            return $this->options['requestsHeaders'];
        return array();
    }

    protected function getHttpHeaders() {
        return array_merge(array('User-Agent' => $this->user_agent), $this->getOptionalHttpHeaders()); 
    }

    protected function getRequestOptions() {
        $options = array('http_errors' => false);
        if (isset($this->options['requestsOptions']))
            $options = array_merge($options, $this->options['requestsOptions']);
        return $options;
    }


    protected function put($uri, $timeout, $body) {
        $options = array_merge(array('timeout' => $timeout), $this->getRequestOptions());
        $headers = array_merge(array('Content-Type' => 'application/json'), $this->getHttpHeaders());
        $response = $this->guzzle_client->request('PUT', $uri, array_merge($options, ['body' => $body, 'headers' => $headers]));
        $this->checkErrors($response);
        return (string) $response->getBody();
    }

    protected function get($uri, $timeout) {
        $options = array_merge(array('timeout' => $timeout), $this->getRequestOptions());
        $headers = $this->getHttpHeaders();

        $response = $this->guzzle_client->request('GET', $uri, array_merge($options, ['headers' => $headers]));
        $this->checkErrors($response);
        return json_decode($response->getBody(), true);
    }

    protected function delete($uri, $timeout) {
        $options = array_merge(array('timeout' => $timeout), $this->getRequestOptions());
        $headers = $this->getHttpHeaders();

        $response = $this->guzzle_client->request('DELETE', $uri, array_merge($options, ['headers' => $headers]));
        $this->checkErrors($response);
        return (string) $response->getBody();
    }

    protected function post($uri, $timeout, $body) {
        $options = array_merge(array('timeout' => $timeout), $this->getRequestOptions());
        $headers = array_merge(array('Content-Type' => 'application/json'), $this->getHttpHeaders());

        $response = $this->guzzle_client->request('POST', $uri, array_merge($options, ['body' => $body, 'headers' => $headers]));
        $this->checkErrors($response);

        $json = json_decode($response->getBody(), true);
        if($json !== null && json_last_error() == JSON_ERROR_NONE)
            return $json;
        else
            return (string) $response->getBody();
    }

    protected function checkErrors($response) {
        $status_code = $response->getStatusCode();
        if($status_code == 200 || $status_code == 201) return;
        throw new ResponseException($this->request, $status_code, $response->getBody());
    }

    protected function sendMultipartBatch($request) {
        $chunks = array_chunk($request->requests, Client::BATCH_MAX_SIZE);
        $responses = array();
        foreach ($chunks as $rqs) {
            array_push($responses, $this->send(new Requests\Batch($rqs)));
        }
        return array_reduce($responses, 'array_merge', array());
    }

    /* ----------------------- HMAC -----------------------  */

    protected function signUrl($uri) {
        $uri = '/' . $this->account . '/' . $uri;
        $time_str = $this->hmacTime($uri);
        $sign = $this->hmacSign($uri, $time_str);
        return $uri . $time_str . '&hmac_sign=' . $sign;
    }

    protected function hmacTime($uri) {
        $res = (strpos($uri, '?')) ? '&' : '?';
        $res = $res . 'hmac_timestamp=' . time();
        return $res;
    }

    protected function hmacSign($uri, $timeStr) {
        $url = $uri . $timeStr;
        return hash_hmac('sha1', $url, $this->token);
    }

    /* ----------------------- Util -----------------------  */

    protected function paramsToUrl($params) {
        if (!$params) return '';

        $urlp = array();
        foreach ($params as $p => $val) {
            array_push($urlp, urlencode($p) . '=' . urlencode($this->formatQueryParameterValue($val)));
        }
        $result = '?' . implode ('&' , $urlp);
        return $result;
    }

    protected function formatQueryParameterValue($value) {
        if (is_array($value))
            return implode(',', $value);
        if (is_bool($value))
            return ($value) ? 'true' : 'false';

        else return $value;
    }

}
?>
