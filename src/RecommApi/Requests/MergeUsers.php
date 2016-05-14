<?php
/*
 This file is auto-generated, do not edit
*/

/**
 * MergeUsers request
 */
namespace Recombee\RecommApi\Requests;
use Recombee\RecommApi\Exceptions\UnknownOptionalParameterException;

/**
 * Merges purchases, ratings, bookmarks, and detail views of two different users under a single user ID. This is especially useful for online e-commerce applications working with anonymous users identified by unique tokens such as the session ID. In such applications, it may often happen that a user owns a persistent account, yet accesses the system anonymously while, e.g., putting items into a shopping cart. At some point in time, such as when the user wishes to confirm the purchase, (s)he logs into the system using his/her username and password. The interactions made under anonymous session ID then become connected with the persistent account, and merging these two together becomes desirable.
 * Merging happens between two users referred to as the *source* and the *target*. After the merge, all the interactions of the source user are attributed to the target user, and the source user is **deleted** unless special parameter `keepSourceUser` is set `true`.
 */
class MergeUsers extends Request {

    /**
     * @var string $target_user_id ID of the source user.
     */
    protected $target_user_id;
    /**
     * @var string $source_user_id ID of the target user.
     */
    protected $source_user_id;
    /**
     * @var string $keep_source_user If true, the source user will not be deleted, but also kept in the database..
     */
    protected $keep_source_user;
    /**
     * @var array Array containing values of optional parameters
     */
   protected $optional;

    /**
     * Construct the request
     * @param string $target_user_id ID of the source user.
     * @param string $source_user_id ID of the target user.
     * @param array $optional Optional parameters given as an array containing pairs name of the parameter => value
     * - Allowed parameters:
     *     - *keepSourceUser*
     *         - Type: string
     *         - Description: If true, the source user will not be deleted, but also kept in the database..
     * @throws Exceptions\UnknownOptionalParameterException UnknownOptionalParameterException if an unknown optional parameter is given in $optional
     */
    public function __construct($target_user_id, $source_user_id, $optional = array()) {
        $this->target_user_id = $target_user_id;
        $this->source_user_id = $source_user_id;
        $this->keep_source_user = isset($optional['keepSourceUser']) ? $optional['keepSourceUser'] : null;
        $this->optional = $optional;

        $existing_optional = array('keepSourceUser');
        foreach ($this->optional as $key => $value) {
            if (!in_array($key, $existing_optional))
                 throw new UnknownOptionalParameterException($key);
         }
        $this->timeout = 1000;
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
        return "/{databaseId}/users/{$this->target_user_id}/merge/{$this->source_user_id}";
    }

    /**
     * Get query parameters
     * @return array Values of query parameters (name of parameter => value of the parameter)
     */
    public function getQueryParameters() {
        $params = array();
        if (isset($this->optional['keepSourceUser']))
            $params['keepSourceUser'] = $this->optional['keepSourceUser'];
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
