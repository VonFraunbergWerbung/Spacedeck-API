<?php

namespace Vfw\Spacedeck\Core;

class Request
{
    /**
     * @var string
     */
    private const API_URL = 'https://wir-pwc-stiftung.de:9666/';

    /**
     * @var string
     */
    public const COOKIE_DOMAIN = '/';

    /**
     * @var string
     */
    private const API_SECRET = 'BAIC4WFAfJI4ABXrFfOhY9qAtH93fajQSAVlWSflSsPfba8csgjr2qBo33Olg2NeIQ7c39XoDgiMgcvD_ciTJyWzhEa3gVPzWVbvxKEUlayn14ooF3aZV7_pT7kXx7oR';

    /**
     * @var array
     */
    private const API_EP_CREATE_USER         	= ['ep' => 'vfw/user/new', 'type' => 'POST'];
    private const API_EP_GET_USER            	= ['ep' => 'vfw/user/get', 'type' => 'POST'];
    private const API_EP_DETELE_USER         	= ['ep' => 'vfw/user/delete', 'type' => 'DELETE'];
    private const API_EP_CHANGE_USER_NAME    	= ['ep' => 'vfw/user/name', 'type' => 'PATCH'];
    private const API_EP_CHANGE_USER_ROLE    	= ['ep' => 'vfw/user/rights', 'type' => 'PATCH'];
    private const API_EP_DELETE_USER_CONTENT 	= ['ep' => 'vfw/space/remove', 'type' => 'POST'];
    private const API_EP_ADD_MEMBERSHIP      	= ['ep' => 'vfw/user/add', 'type' => 'POST'];
    private const API_EP_REMOVE_MEMBERSHIP   	= ['ep' => 'vfw/user/remove', 'type' => 'DELETE'];
    private const API_EP_CREATE_SPACE        	= ['ep' => 'vfw/space/create', 'type' => 'POST'];
    private const API_EP_RESET_SPACE         	= ['ep' => 'vfw/space/reset', 'type' => 'PURGE'];
    private const API_EP_DELETE_SPACE       	= ['ep' => 'vfw/space/delete', 'type' => 'DELETE'];
    private const API_EP_CREATE_SESSION     	= ['ep' => 'vfw/user/login', 'type' => 'POST'];
    private const API_EP_REMOVE_SESSION      	= ['ep' => 'vfw/user/logout', 'type' => 'POST'];
    private const API_EP_CHANGE_WELCOME_MESSAGE = ['ep' => 'vfw/space/message', 'type' => 'PATCH'];

    /**
     * createUser
     * 
     * @param string $email
     * @param string $username
     * @return string|bool
     */
    public function createUser($email, $username)
    {
        $postData = [
            'email' => $email,
            'nickname' => $username
        ];

        return $this->send(self::API_EP_CREATE_USER, $postData);
    }

    /**
     * getUser
     * 
     * @param string $email
     * @return string|bool
     */
    public function getUser($email)
    {
        $postData = [
            'email' => $email
        ];

        return $this->send(self::API_EP_GET_USER, $postData);
    }

    /**
     * deleteUser
     * 
     * @param string $userId
     * @return string|bool
     */
    public function deleteUser($userId)
    {
        $postData = [
            'id' => $userId
        ];

        return $this->send(self::API_EP_DETELE_USER, $postData);
    }

    /**
     * changeUserName
     * 
     * @param string $userId
     * @param string $name
     * @return string|bool
     */
    public function changeUserName($userId, $name)
    {
        $postData = [
            'user' => $userId,
            'name' => $name
        ];

        return $this->send(self::API_EP_CHANGE_USER_NAME, $postData);
    }

    /**
     * changeUserRole
     * 
     * @param string $userId
     * @param string $spaceId
     * @param string $role
     * @return string|bool
     */
    public function changeUserRole($userId, $spaceId, $role)
    {
        $postData = [
            'user' => $userId,
            'space' => $spaceId,
            'role' => $role
        ];

        return $this->send(self::API_EP_CHANGE_USER_ROLE, $postData);
    }

    /**
     * deleteUserContent
     * 
     * @param string $userId
     * @param string $spaceId
     * @return string|bool
     */
    public function deleteUserContent($userId, $spaceId)
    {
        $postData = [
            'user' => $userId,
            'space' => $spaceId
        ];

        return $this->send(self::API_EP_DELETE_USER_CONTENT, $postData);
    }

    /**
     * createMembership
     * 
     * @param string $userId
     * @param string $spaceId
     * @param string $role
     * @return string|bool
     */
    public function createMembership($userId, $spaceId, $role)
    {
        $postData = [
            'user' => $userId,
            'space' => $spaceId,
            'role' => $role
        ];

        return $this->send(self::API_EP_ADD_MEMBERSHIP, $postData);
    }

    /**
     * deleteMembership
     * 
     * @param string $userId
     * @param string $spaceId
     * @return string|bool
     */
    public function deleteMembership($userId, $spaceId)
    {
        $postData = [
            'user' => $userId,
            'space' => $spaceId
        ];

        return $this->send(self::API_EP_REMOVE_MEMBERSHIP, $postData);
    }

    /**
     * createSpace
     * 
     * @param string $name
     * @return string|bool
     */
    public function createSpace($name)
    {
        $postData = [
            'name' => $name
        ];

        return $this->send(self::API_EP_CREATE_SPACE, $postData);
    }

    /**
     * resetSpace
     * 
     * @param string $spaceId
     * @return string|bool
     */
    public function resetSpace($spaceId)
    {
        $postData = [
            'space' => $spaceId
        ];

        return $this->send(self::API_EP_RESET_SPACE, $postData);
    }

    /**
     * deleteSpace
     * 
     * @param string $spaceId
     * @return string|bool
     */
    public function deleteSpace($spaceId)
    {
        $postData = [
            'id' => $spaceId
        ];

        return $this->send(self::API_EP_DELETE_SPACE, $postData);
    }

    /**
     * createUserSession
     * 
     * @param string $userId
     * @return string|bool
     */
    public function createUserSession($userId)
    {
        $postData = [
            'id' => $userId
        ];

        return $this->send(self::API_EP_CREATE_SESSION, $postData);
    }

    /**
     * removeUserSession
     * 
     * @param string $userId
     * @return string|bool
     */
    public function removeUserSession($userId)
    {
        $postData = [
            'user' => $userId
            //'token' => $token
        ];

        return $this->send(self::API_EP_REMOVE_SESSION, $postData);
    }

    /**
     * changeWelcomeMessage
     *
     * @param string $spaceId
     * @param string $message
     * @return string|bool
     */
    public function changeWelcomeMessage($spaceId, $message)
    {
        $postData = [
            'id' => $spaceId,
            'message' => $message
        ];

        return $this->send(self::API_EP_CHANGE_WELCOME_MESSAGE, $postData);
    }

    /**
     * checkResult
     * 
     * @param array $endpoint
     * @param array $result
     * @return bool
     */
    private function checkResult($endpoint, $result)
    {
        if (!is_array($result) || !isset($result['status']) || !is_bool($result['status']))
            return false;
        
        if ($result['status']) {
            switch ($endpoint) {
                case self::API_EP_CREATE_USER:
                case self::API_EP_CREATE_SPACE: {
                    if (!isset($result['id']))
                        return false;
                } break;

                case self::API_EP_CREATE_SESSION: {
                    if (!isset($result['token']))
                        return false;
                } break;
            }
        }
        else {
            if (!isset($result['error']))
                return false;
        }

        return true;
    }

    /**
     * send
     * 
     * @param array $endpoint
     * @param mixed $postData
     * @return array|bool
     */
    private function send($endpoint, $postData)
    {
        $url = env('VFWSD_API_URL', self::API_URL). $endpoint['ep'];
        $payload = json_encode($postData);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $endpoint['type']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json',
                                              'Accept:application/json',
                                              'X-Spacedeck-API-Token:'. env('VFWSD_API_SECRET', self::API_SECRET)]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        if ($result !== false) {
            $jData = json_decode($result, true);
            if ($this->checkResult($endpoint, $jData))
                $result = $jData;
            else {
                // TODO: ...
                $result = false;
            }
        }

        curl_close($ch);

        return $result;
    }
    
    /**
     * generateUrl
     * 
     * @param string $spaceId
     * @return string
     */
    public static function generateUrl($spaceId)
    {
        return env('VFWSD_API_URL', self::API_URL). 'spaces/'. $spaceId;
    }

    /**
     * generateUrl2
     * 
     * @param string $spaceId
     * @param string $token
     * @return string
     */
    public static function generateUrl2($spaceId, $token)
    {
        return 'https://wir-pwc-stiftung.de/spacedeck/?sd='. $spaceId. '&token='. $token;
    }
}

?>
