<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of inventory
 *
 * @author Scott
 */
class inventory extends item {
    
    private $inventoryID, $boughtFor, $askingPrice, $dateInserted;
    
    function __construct($itemID, $itemName, $description, $inventoryID, $boughtFor, $askingPrice, $dateInserted) {
        $this->inventoryID = $inventoryID;
        $this->boughtFor = $boughtFor;
        $this->askingPrice = $askingPrice;
        $this->dateInserted = $dateInserted;
        
        item::__construct($itemID, $itemName, $description);
    }
    
    function getInventoryID() {
        return $this->inventoryID;
    }

    function getBoughtFor() {
        return $this->boughtFor;
    }

    function getAskingPrice() {
        return $this->askingPrice;
    }

    function getDateInserted() {
        return $this->dateInserted;
    }

    function setInventoryID($inventoryID) {
        $this->inventoryID = $inventoryID;
    }

    function setBoughtFor($boughtFor) {
        $this->boughtFor = $boughtFor;
    }

    function setAskingPrice($askingPrice) {
        $this->askingPrice = $askingPrice;
    }

    function setDateInserted($dateInserted) {
        $this->dateInserted = $dateInserted;
    }



}
