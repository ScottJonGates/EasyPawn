<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of item
 *
 * @author Scott
 */
class item {
    private $itemID, $itemName, $description;
    
    function __construct($itemID, $itemName, $description) {
        $this->itemID = $itemID;
        $this->itemName = $itemName;
        $this->description = $description;
    }
    
    function getItemID() {
        return $this->itemID;
    }

    function getItemName() {
        return $this->itemName;
    }

    function getDescription() {
        return $this->description;
    }

    function setItemID($itemID) {
        $this->itemID = $itemID;
    }

    function setItemName($itemName) {
        $this->itemName = $itemName;
    }

    function setDescription($description) {
        $this->description = $description;
    }



}
