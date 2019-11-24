<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of soldItems
 *
 * @author Scott
 */
class soldItems extends item {
    
    private $soldID, $employeeID, $customerID, $soldFor, $profit, $dateSold, $daysInInventory;
    
    function __construct($itemID, $itemName, $description, $soldID, $employeeID, $customerID, $soldFor, $profit, $dateSold, $daysInInventory) {
        $this->soldID = $soldID;
        $this->employeeID = $employeeID;
        $this->customerID = $customerID;
        $this->soldFor = $soldFor;
        $this->profit = $profit;
        $this->dateSold = $dateSold;
        $this->daysInInventory = $daysInInventory;
        
        item::__construct($itemID, $itemName, $description);
    }

    function getSoldID() {
        return $this->soldID;
    }

    function getEmployeeID() {
        return $this->employeeID;
    }

    function getCustomerID() {
        return $this->customerID;
    }

    function getSoldFor() {
        return $this->soldFor;
    }

    function getProfit() {
        return $this->profit;
    }

    function getDateSold() {
        return $this->dateSold;
    }

    function getDaysInInventory() {
        return $this->daysInInventory;
    }

    function setSoldID($soldID) {
        $this->soldID = $soldID;
    }

    function setEmployeeID($employeeID) {
        $this->employeeID = $employeeID;
    }

    function setCustomerID($customerID) {
        $this->customerID = $customerID;
    }

    function setSoldFor($soldFor) {
        $this->soldFor = $soldFor;
    }

    function setProfit($profit) {
        $this->profit = $profit;
    }

    function setDateSold($dateSold) {
        $this->dateSold = $dateSold;
    }

    function setDaysInInventory($daysInInventory) {
        $this->daysInInventory = $daysInInventory;
    }


}
