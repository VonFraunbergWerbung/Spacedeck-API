<?php

namespace Vfw;

use Vfw\Core\Request;

class SpacedeckApi
{
    /**
     * @var string
     */
    public const USER_ROLE_ADMIN  = "admin";
    public const USER_ROLE_EDITOR = "editor";
    public const USER_ROLE_VIEWER = "viewer";

    /**
     * createUser
     * 
     * @param string $email
     * @param string $username
     * @return string|bool
     */
    public function createUser($email, $username)
    {
        $req = new Request();
        $res = $req->createUser($email, $username);
        if ($res !== false) {
            if ($res['status']) {
                return $res['id'];
            }
            
            // TODO: else ... ?
        }

        return false;
    }

    /**
     * getUser
     * 
     * @param string $email
     * @return string|bool
     */
    public function getUser($email)
    {
        $req = new Request();
        $res = $req->getUser($email);
        if ($res !== false) {
            if ($res['status']) {
                return $res['id'];
            }
            
            // TODO: else ... ?
        }

        return false;
    }

    /**
     * deleteUser
     * 
     * @param string $userId
     * @return bool
     */
    public function deleteUser($userId)
    {
        $req = new Request();
        $res = $req->deleteUser($userId);
        if ($res !== false) {
            return $res['status'];
        }

        return false;
    }

    /**
     * changeUserName
     * 
     * @param string $userId
     * @param string $name
     * @return bool
     */
    public function changeUserName($userId, $name)
    {
        $req = new Request();
        $res = $req->changeUserName($userId, $name);
        if ($res !== false) {
            return $res['status'];
        }

        return false;
    }

    /**
     * changeUserRole
     * 
     * @param string $userId
     * @param string $spaceId
     * @param string $role
     * @return bool
     */
    public function changeUserRole($userId, $spaceId, $role)
    {
        $req = new Request();
        $res = $req->changeUserRole($userId, $spaceId, $role);
        if ($res !== false) {
            return $res['status'];
        }

        return false;
    }

    /**
     * deleteUserContent
     * 
     * @param string $userId
     * @param string $spaceId
     * @return bool
     */
    public function deleteUserContent($userId, $spaceId)
    {
        $req = new Request();
        $res = $req->deleteUserContent($userId, $spaceId);
        if ($res !== false) {
            return $res['status'];
        }

        return false;
    }

    /**
     * createMembership
     * 
     * @param string $userId
     * @param string $spaceId
     * @param string $role
     * @return bool
     */
    public function createMembership($userId, $spaceId, $role)
    {
        $req = new Request();
        $res = $req->createMembership($userId, $spaceId, $role);
        if ($res !== false) {
            return $res['status'];
        }

        return false;
    }

    /**
     * deleteMembership
     * 
     * @param string $userId
     * @param string $spaceId
     * @return bool
     */
    public function deleteMembership($userId, $spaceId)
    {
        $req = new Request();
        $res = $req->deleteMembership($userId, $spaceId);
        if ($res !== false) {
            return $res['status'];
        }

        return false;
    }

    /**
     * createSpace
     * 
     * @param string $name
     * @return string|bool
     */
    public function createSpace($name)
    {
        $req = new Request();
        $res = $req->createSpace($name);
        if ($res !== false) {
            if ($res['status']) {
                return $res['id'];
            }
            
            // TODO: else ... ?
        }

        return false;
    }

    /**
     * resetSpace
     * 
     * @param string $spaceId
     * @return bool
     */
    public function resetSpace($spaceId)
    {
        $req = new Request();
        $res = $req->resetSpace($spaceId);
        if ($res !== false) {
            return $res['status'];
        }

        return false;
    }

    /**
     * deleteSpace
     * 
     * @param string $spaceId
     * @return bool
     */
    public function deleteSpace($spaceId)
    {
        $req = new Request();
        $res = $req->deleteSpace($spaceId);
        if ($res !== false) {
            return $res['status'];
        }

        return false;
    }

    /**
     * createUserSession
     * 
     * @param string $userId
     * @return string|bool
     */
    public function createUserSession($userId)
    {
        $req = new Request();
        $res = $req->createUserSession($userId);
        if ($res !== false) {
            if ($res['status']) {
                setcookie("sdsession", $res['token']);
                return $res['token'];
            }
            
            // TODO: else ... ?
        }

        return false;
    }

    /**
     * removeUserSession
     * 
     * @param string $userId
     * @return string|bool
     */
    public function removeUserSession($userId)
    {
        $req = new Request();
        $res = $req->removeUserSession($userId);
        if ($res !== false) {
            setcookie("sdsession", "", time() - 3600);
            return $res['status'];
        }

        return false;
    }
    
    /**
     * generateUrl
     * 
     * @param string $spaceId
     * @return string
     */
    public function generateUrl($spaceId)
    {
        return Request::generateUrl($spaceId);
    }
}

?>
