<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pawnItems
 *
 * @author Scott
 */
class pawnItems extends item{

    
    private $pawnID, $customerID, $dateRecieved, $loanAmount, $paymentRecieved, $paidOff, $employeeID;
    
    
    
    function __construct($itemID, $itemName, $description,$pawnID, $customerID, $dateRecieved, $loanAmount, $paymentRecieved, $paidOff, $employeeID) {
        $this->pawnID = $pawnID;
        $this->customerID = $customerID;
        $this->dateRecieved = $dateRecieved;
        $this->loanAmount = $loanAmount;
        $this->paymentRecieved = $paymentRecieved;
        $this->paidOff = $paidOff;
        $this->employeeID = $employeeID;
        
        item::__construct($itemID, $itemName, $description);
    }

    function getPawnID() {
        return $this->pawnID;
    }

    function getCustomerID() {
        return $this->customerID;
    }

    function getDateRecieved() {
        return $this->dateRecieved;
    }

    function getLoanAmount() {
        return $this->loanAmount;
    }

    function getPaymentRecieved() {
        return $this->paymentRecieved;
    }

    function getPaidOff() {
        return $this->paidOff;
    }

    function getEmployeeID() {
        return $this->employeeID;
    }

    function setPawnID($pawnID) {
        $this->pawnID = $pawnID;
    }

    function setCustomerID($customerID) {
        $this->customerID = $customerID;
    }

    function setDateRecieved($dateRecieved) {
        $this->dateRecieved = $dateRecieved;
    }

    function setLoanAmount($loanAmount) {
        $this->loanAmount = $loanAmount;
    }

    function setPaymentRecieved($paymentRecieved) {
        $this->paymentRecieved = $paymentRecieved;
    }

    function setPaidOff($paidOff) {
        $this->paidOff = $paidOff;
    }

    function setEmployeeID($employeeID) {
        $this->employeeID = $employeeID;
    }


}
