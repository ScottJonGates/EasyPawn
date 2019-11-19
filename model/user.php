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
    private $userID, $fName, $lName, $username, $email, $phoneNumber, $admin;
    
    function __construct($userID, $fName, $lName, $username, $email, $phoneNumber, $admin) {
        $this->userID = $userID;
        $this->fName = $fName;
        $this->lName = $lName;
        $this->username = $username;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->admin = $admin;
    }
    
    function getUserID() {
        return $this->userID;
    }

    function getFName() {
        return $this->fName;
    }

    function getLName() {
        return $this->lName;
    }

    function getUsername() {
        return $this->username;
    }

    function getEmail() {
        return $this->email;
    }

    function getPhoneNumber() {
        return $this->phoneNumber;
    }

    function getAdmin() {
        return $this->admin;
    }

    function setUserID($userID) {
        $this->userID = $userID;
    }

    function setFName($fName) {
        $this->fName = $fName;
    }

    function setLName($lName) {
        $this->lName = $lName;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPhoneNumber($phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }

    function setAdmin($admin) {
        $this->admin = $admin;
    }



}
