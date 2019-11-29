<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of custInquiryItem
 *
 * @author Scott
 */
class custInquiryItem {
    
    public $inquiryID, $customerID, $amountWanted, $itemName, $description, $pawnOrSell;
    
    function __construct($inquiryID, $customerID, $amountWanted, $itemName, $description, $pawnOrSell) {
        $this->inquiryID = $inquiryID;
        $this->customerID = $customerID;
        $this->amountWanted = $amountWanted;
        $this->itemName = $itemName;
        $this->description = $description;
        $this->pawnOrSell = $pawnOrSell;
    }

    function getInquiryID() {
        return $this->inquiryID;
    }

    function getCustomerID() {
        return $this->customerID;
    }

    function getAmountWanted() {
        return $this->amountWanted;
    }

    function getItemName() {
        return $this->itemName;
    }

    function getDescription() {
        return $this->description;
    }

    function getPawnOrSell() {
        return $this->pawnOrSell;
    }

    function setInquiryID($inquiryID) {
        $this->inquiryID = $inquiryID;
    }

    function setCustomerID($customerID) {
        $this->customerID = $customerID;
    }

    function setAmountWanted($amountWanted) {
        $this->amountWanted = $amountWanted;
    }

    function setItemName($itemName) {
        $this->itemName = $itemName;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setPawnOrSell($pawnOrSell) {
        $this->pawnOrSell = $pawnOrSell;
    }


}
