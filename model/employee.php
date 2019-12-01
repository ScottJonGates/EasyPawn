<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of employee
 *
 * @author Scott
 */
class employee extends User{
    
    private $hireDate, $salary;
    
    function __construct($hireDate, $salary, $userID, $fName, $lName, $username, $email, $phoneNumber, $admin) {
        $this->hireDate = $hireDate;
        $this->salary = $salary;
        
        User::__construct($userID, $fName, $lName, $username, $email, $phoneNumber, $admin);
    }

    //put your code here
}
