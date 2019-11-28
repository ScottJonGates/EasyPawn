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
    
    public $inquiryID, $customerID, $askingFor, $pawnOrSell;
    
    function __construct($inquiryID, $customerID, $askingFor, $pawnOrSell) {
        $this->inquiryID = $inquiryID;
        $this->customerID = $customerID;
        $this->askingFor = $askingFor;
        $this->pawnOrSell = $pawnOrSell;
    }
    
    function getInquiryID() {
        return $this->inquiryID;
    }

    function getCustomerID() {
        return $this->customerID;
    }

    function getAskingFor() {
        return $this->askingFor;
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

    function setAskingFor($askingFor) {
        $this->askingFor = $askingFor;
    }

    function setPawnOrSell($pawnOrSell) {
        $this->pawnOrSell = $pawnOrSell;
    }



}
