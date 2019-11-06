<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author Scott
 */
class User {
    private $userID, $fName, $lName, $username, $password, $admin;
    
    public function __construct($userID, $fName, $lName, $username, $password, $admin) {
        $this->userID = $userID;
        $this->fName = $fName;
        $this->lName = $lName;
        $this->username = $username;
        $this->password = $password;
        $this->admin = $admin;
    }

    public function getUserID() {
        return $this->userID;
    }

    public function getFName() {
        return $this->fName;
    }

    public function getLName() {
        return $this->lName;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getAdmin() {
        return $this->admin;
    }

    public function setUserID($userID) {
        $this->userID = $userID;
    }

    public function setFName($fName) {
        $this->fName = $fName;
    }

    public function setLName($lName) {
        $this->lName = $lName;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setAdmin($admin) {
        $this->admin = $admin;
    }
}
