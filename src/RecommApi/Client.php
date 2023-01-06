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
    const BATCH_MAX_SIZE = 10000; //Maximal number of requests within one batch request

    /**
     * Create the client
     * @param string $account Name of your account at Recombee
     * @param string $token Secret token
     * @param array  $options Other custom options
     */
    public function __construct($account, $token, $options = array()) {
        $this->account = $account;
        $this->token = $token;

        if (!is_array($options)) throw new \InvalidArgumentException("options must be given as an array. $options given instead.");
        $this->options = $options;

        $this->protocol = (isset($this->options['protocol'])) ? $this->options['protocol'] : 'https';
        $this->base_uri = $this->getBaseUri();
        $this->user_agent = $this->getUserAgent();

        if (isset($options['guzzleClient'])) {
            if (!($options['guzzleClient'] instanceof \GuzzleHttp\ClientInterface)) throw new \InvalidArgumentException("option guzzleClient must be instance of \GuzzleHttp\ClientInterface.");
            $this->guzzle_client = $options['guzzleClient'];
        } else {
            $this->guzzle_client = new \GuzzleHttp\Client();
        }
    }

    protected function getRegionalBaseUri($region) {
        $uriPerRegion = [
            'ap-se' => 'rapi-ap-se.recombee.com',
            'ca-east' => 'rapi-ca-east.recombee.com',
            'eu-west' => 'rapi-eu-west.recombee.com',
            'us-west' => 'rapi-us-west.recombee.com'
          ];
        $uri = $uriPerRegion[strtolower(strval($region))];
        if (!isset($uri)) {
            throw new \InvalidArgumentException("Region $region is unknown. You may need to update the version of the SDK.");
        }
        return $uri;
    }

    protected function getBaseUri() {
        $base_uri = null;
        if(getenv('RAPI_URI') !== false)
            $base_uri = getenv('RAPI_URI');
        else if (isset($this->options['baseUri']))
            $base_uri = $this->options['baseUri'];

        if (isset($this->options['region'])) {
            if (isset($base_uri)) {
                throw new \InvalidArgumentException('baseUri and region cannot be specified at the same time');
            }
            $base_uri = $this->getRegionalBaseUri($this->options['region']);
        }
        return (isset($base_uri)) ? $base_uri : 'rapi.recombee.com';
    }

    protected function getUserAgent() {
        $user_agent = 'recombee-php-api-client/4.1.0';
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
        $json = json_encode($request->getBodyParameters(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        try {
            switch ($request->getMethod()) {
                case Requests\Request::HTTP_GET:
                    $result = $this->get($uri, $timeout);
                    break;

                case Requests\Request::HTTP_PUT:
                    $result = $this->put($uri, $timeout, $json);
                    break;

                case Requests\Request::HTTP_DELETE:
                    $result = $this->delete($uri, $timeout, $json);
                    break;

                case Requests\Request::HTTP_POST:
                    $result = $this->post($uri, $timeout, $json);
                    break;
            }
        }
        catch(\GuzzleHttp\Exception\ConnectException $e)
        {
            throw new ApiTimeoutException($request, $e);
        }
        catch(\GuzzleHttp\Exception\GuzzleException $e)
        {
            if(strpos($e->getMessage(), 'cURL error 28') !== false) throw new ApiTimeoutException($request, $e);
            if(strpos($e->getMessage(), 'timed out') !== false) throw new ApiTimeoutException($request, $e);

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
        return $this->formatResult($response);
    }

    protected function get($uri, $timeout) {
        $options = array_merge(array('timeout' => $timeout), $this->getRequestOptions());
        $headers = $this->getHttpHeaders();

        $response = $this->guzzle_client->request('GET', $uri, array_merge($options, ['headers' => $headers]));
        $this->checkErrors($response);
        return $this->formatResult($response);
    }

    protected function delete($uri, $timeout, $body) {
        $options = array_merge(array('timeout' => $timeout), $this->getRequestOptions());
        $headers = array_merge(array('Content-Type' => 'application/json'), $this->getHttpHeaders());

        $response = $this->guzzle_client->request('DELETE', $uri, array_merge($options, ['body' => $body, 'headers' => $headers]));
        $this->checkErrors($response);
        return $this->formatResult($response);
    }

    protected function post($uri, $timeout, $body) {
        $options = array_merge(array('timeout' => $timeout), $this->getRequestOptions());
        $headers = array_merge(array('Content-Type' => 'application/json'), $this->getHttpHeaders());

        $response = $this->guzzle_client->request('POST', $uri, array_merge($options, ['body' => $body, 'headers' => $headers]));
        $this->checkErrors($response);
        return $this->formatResult($response);
    }

    protected function formatResult($response) {
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
