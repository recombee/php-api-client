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

    /**
     * @ignore
     */
    const BASE_URI = 'https://rapi.recombee.com';

    /**
     * Create the client
     * @param string $account Name of your account at Recombee
     * @param string $token Secret token
     */
    public function __construct($account, $token) {
        $this->account = $account;
        $this->token = $token;
    }

    /**
     * Send a request to the Recombee API
     * @param Requests\Request $request Request that will be sent
     * @throws Exceptions\ResponseException ResponseException if the request fails (a status different from 200 or 201 is returned)
     * @throws Exceptions\ApiTimeoutException ApiTimeoutException if the request takes too long
     */
    public function send(Requests\Request $request) {
        $this->request = $request;
        $path = Util::sliceDbName($request->getPath());
        $uri =  $path . $this->paramsToStr($request->getQueryParameters());
        $timeout = $request->getTimeout() / 1000;
        $result = null;

        try {
            switch ($request->getMethod()) {
                case Requests\Request::HTTP_GET:
                    $result = $this->hmacGet($uri, $timeout);
                    break;

                case Requests\Request::HTTP_PUT:
                    $result = $this->hmacPut($uri, $timeout);
                    break;

                case Requests\Request::HTTP_DELETE:
                    $result = $this->hmacDelete($uri, $timeout);
                    break;

                case Requests\Request::HTTP_POST:
                    $json = json_encode($request->getBodyParameters(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                    $result = $this->hmacPost($uri, $timeout, $json);
                    break;
            }
        }
        catch(\Requests_Exception $e)
        {
            if(strpos($e->getMessage(), 'cURL error 28') !== false) throw new ApiTimeoutException($request);
            echo "{$e->getMessage()}";
            throw $e;
        }

        return $result;
    }

    /* ----------------------- Send requests -----------------------  */
    //TODO remove ceils when Requests 1.7 is released as it support timeout in milliseconds
    protected function hmacPut($uri, $timeout) {
        $signed_url = $this->signUrl($uri);
        $response = \Requests::put($signed_url, array(), ['timeout' => ceil($timeout)]);
        $this->checkErrors($response);
        return $response->body;
    }

    protected function hmacGet($uri, $timeout) {
        $signed_url = $this->signUrl($uri);
        $response = \Requests::get($signed_url, array(), ['timeout' => ceil($timeout)]);
        $this->checkErrors($response);
        return json_decode($response->body, true);
    }

    protected function hmacDelete($uri, $timeout) {
        $signed_url = $this->signUrl($uri);
        $response = \Requests::delete($signed_url, array(), ['timeout' => ceil($timeout)]);
        $this->checkErrors($response);
        return $response->body;
    }

    protected function hmacPost($uri, $timeout, $body) {
        $signed_url = $this->signUrl($uri);
        $headers = array('Content-Type' => 'application/json');
        $response = \Requests::post($signed_url, $headers, $body, ['timeout' => ceil($timeout)]);
        $this->checkErrors($response);

        $json = json_decode($response->body, true);
        if($json)
            return $json;
        else
            return $response->body;
    }

    protected function checkErrors($response) {
        $status_code = $response->status_code;
        if($status_code == 200 || $status_code == 201) return;
        throw new ResponseException($this->request, $status_code, $response->body);
    }

    /* ----------------------- HMAC -----------------------  */

    protected function signUrl($uri) {
        $uri = '/' . $this->account . '/' . $uri;
        $time_str = $this->hmacTime($uri);
        $sign = $this->hmacSign($uri, $time_str);
        return Client::BASE_URI . $uri . $time_str . '&hmac_sign=' . $sign;
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

    protected function paramsToStr($params) {
        if (!$params) return '';

        $urlp = array();
        foreach ($params as $p => $val) {
            array_push($urlp, urlencode($p) . '=' . urlencode($val));
        }
        $result = '?' . implode ('&' , $urlp);
        return $result;
    }
}
?>
