<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBitem
 *
 * @author Scott
 */
class DBitem {

    public static function getItemsPawnedByCustomerID($customerID) {

        $db = Database::getDB();

        $query = 'select * 
                    from pawnitems as p 
                    inner JOIN items as i on p.itemID = i.itemID 
                    WHERE p.customerID = :customerID';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerID', $customerID);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();

        $items = array();
        foreach ($results as $row) {
            $item = new pawnItems($row['itemID'], $row['itemName'], $row['description'], $row['pawnID'], $row['customerID'], $row['dateRecieved'], $row['loanAmount'], $row['paymentRecieved'], $row['paidOff'], $row['employeeID']);
            $items[] = $item;
        }
        return $items;
    }
    
    public static function getItemPawned() {
        $db = Database::getDB();

        $query = 'select * 
                    from pawnitems as p 
                    inner JOIN items as i on p.itemID = i.itemID';
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();

        $items = array();
        foreach ($results as $row) {
            $item = new pawnItems($row['itemID'], $row['itemName'], $row['description'], $row['pawnID'], $row['customerID'], $row['dateRecieved'], $row['loanAmount'], $row['paymentRecieved'], $row['paidOff'], $row['employeeID']);
            $items[] = $item;
        }
        return $items;
    }

    public static function getItemsBoughtByCustomerID($customerID) {

        $db = Database::getDB();

        $query = 'select * 
                    from solditems as s 
                    inner JOIN items as i on s.itemID = i.itemID 
                    WHERE s.customerID = :customerID';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerID', $customerID);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();

        $items = array();
        foreach ($results as $row) {
            $item = new soldItems($row['itemID'], $row['itemName'], $row['description'], $row['soldID'], $row['employeeID'], $row['customerID'], $row['soldFor'], $row['profit'], $row['dateSold'], $row['daysInInventory']);

            $items[] = $item;
        }
        return $items;
    }

    public static function getCustInquiryItemsByCust($customerID) {
        $db = Database::getDB();

        $query = 'select * 
                    from customerinquirytable 
                    WHERE s.customerID = :customerID';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerID', $customerID);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();

        $items = array();
        foreach ($results as $row) {
            $item = new custInquiryItem($row['inquiryID'], $row['customerID'], $row['askingFor'], $row['pawnOrSell']);

            $items[] = $item;
        }
        return $items;
    }

    public static function getAllCustInquiryItems() {
        $db = Database::getDB();

        $query = 'select * 
                    from customerinquirytable';
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();

        $items = array();
        foreach ($results as $row) {
            $item = new custInquiryItem($row['inquiryID'], $row['customerID'], $row['amountWanted'], $row['itemName'], $row['description'], $row['pawnOrSell']);

            $items[] = $item;
        }
        return $items;
    }

    public static function getItemsSoldByEmployeeID($employeeID) {

        $db = Database::getDB();

        $query = 'select * 
                    from solditems as s 
                    inner JOIN items as i on s.itemID = i.itemID 
                    WHERE s.employeeID = :employeeID';
        $statement = $db->prepare($query);
        $statement->bindValue(':employeeID', $employeeID);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();

        $items = array();
        foreach ($results as $row) {
            $item = new soldItems($row['itemID'], $row['itemName'], $row['description'], $row['soldID'], $row['employeeID'], $row['customerID'], $row['soldFor'], $row['profit'], $row['dateSold'], $row['daysInInventory']);

            $items[] = $item;
        }
        return $items;
    }

    public static function getItemsPawnLoanByEmployeeID($employeeID) {

        $db = Database::getDB();

        $query = 'select * 
                    from pawnitems as p 
                    inner JOIN items as i on p.itemID = i.itemID 
                    WHERE p.employeeID = :employeeID';
        $statement = $db->prepare($query);
        $statement->bindValue(':employeeID', $employeeID);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();

        $items = array();
        foreach ($results as $row) {
            $item = new pawnItems($row['itemID'], $row['itemName'], $row['description'], $row['pawnID'], $row['customerID'], $row['dateRecieved'], $row['loanAmount'], $row['paymentRecieved'], $row['paidOff'], $row['employeeID']);
            $items[] = $item;
        }
        return $items;
    }

    public static function getItemPawnedByItemID($itemID) {
        $db = Database::getDB();

        $query = 'select * 
                    from pawnitems as p 
                    inner JOIN items as i on p.itemID = i.itemID 
                    WHERE p.itemID = :itemID';
        $statement = $db->prepare($query);
        $statement->bindValue(':itemID', $itemID);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        $item = new pawnItems($row['itemID'], $row['itemName'], $row['description'], $row['pawnID'], $row['customerID'], $row['dateRecieved'], $row['loanAmount'], $row['paymentRecieved'], $row['paidOff'], $row['employeeID']);

        return $item;
    }

    public static function insertnewCustInquiry($itemName, $description, $amountWanted, $pawnOrSell, $customerID) {
        $db = Database::getDB();
        $query = 'insert into customerinquirytable(customerID, itemName, description, amountWanted, pawnOrSell)
                 VALUES (:customerID, :itemName, :description, :amountWanted, :pawnOrSell)';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerID', $customerID);
        $statement->bindValue(':itemName', $itemName);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':amountWanted', $amountWanted);
        $statement->bindValue(':pawnOrSell', $pawnOrSell);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function editCustInquiryByID($itemName, $description, $amountWanted, $pawnOrSell, $inquiryID) {
        $db = Database::getDB();

        $query = 'update customerinquirytable set itemName = :itemName, description = :description, 
                amountWanted = :amountWanted, pawnOrSell = :pawnOrSell
                WHERE inquiryID = :inquiryID';
        $statement = $db->prepare($query);
        $statement->bindValue(':inquiryID', $inquiryID);
        $statement->bindValue(':itemName', $itemName);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':amountWanted', $amountWanted);
        $statement->bindValue(':pawnOrSell', $pawnOrSell);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function getCustInquiryByID($inquiryID) {
        $db = Database::getDB();

        $query = 'select * 
                    from customerinquirytable
                    WHERE inquiryID = :inquiryID';
        $statement = $db->prepare($query);
        $statement->bindValue(':inquiryID', $inquiryID);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        $item = new custInquiryItem($row['inquiryID'], $row['customerID'], $row['amountWanted'], $row['itemName'], $row['description'], $row['pawnOrSell']);

        return $item;
    }

    public static function getItemsInquiryByCustomerID($customerID) {

        $db = Database::getDB();

        $query = 'select * 
                    from customerinquirytable
                    WHERE customerID = :customerID';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerID', $customerID);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();

        $items = array();
        foreach ($results as $row) {
            $item = new custInquiryItem($row['inquiryID'], $row['customerID'], $row['amountWanted'], $row['itemName'], $row['description'], $row['pawnOrSell']);
            $items[] = $item;
        }
        return $items;
    }

    public static function removeInquiryItemByInquiryID($inquiryID) {
        $db = Database::getDB();

        $query = 'DELETE FROM customerinquirytable
                    WHERE inquiryID = :inquiryID';
        $statement = $db->prepare($query);
        $statement->bindValue(':inquiryID', $inquiryID);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function insertItem($itemName, $description) {
        $db = Database::getDB();
        $query = 'INSERT INTO items(itemName, description) 
                    VALUES (:itemName,:description)';
        $statement = $db->prepare($query);
        $statement->bindValue(':itemName', $itemName);
        $statement->bindValue(':description', $description);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function getNewItem() {
        
        $db = Database::getDB();

        $query = 'SELECT * 
                    FROM items as i 
                    WHERE itemID NOT IN (SELECT itemID FROM pawnitems) 
                    AND itemID NOT IN (SELECT itemID FROM inventory) 
                    AND itemID NOT IN (SELECT itemID FROM solditems)';
        $statement = $db->prepare($query);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        
        $item = new item($row['itemID'], $row['itemName'], $row['description']);
        
        return $item;
    }

    public static function insertNewInventoryItem($itemID, $dateInserted, $boughtFor, $askingPrice, $employeeID) {
        $db = Database::getDB();
        $query = 'INSERT INTO inventory(itemID, employeeID, dateInserted, boughtFor, askingPrice)
                                VALUES (:itemID,:employeeID,:dateInserted,:boughtFor,:askingPrice)';
        $statement = $db->prepare($query);
        $statement->bindValue(':itemID', $itemID);
        $statement->bindValue(':employeeID', $employeeID);
        $statement->bindValue(':dateInserted', $dateInserted);
        $statement->bindValue(':boughtFor', $boughtFor);
        $statement->bindValue(':askingPrice', $askingPrice);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function insertNewPawnItem($itemID, $customerID, $dateRecieved, $loanAmount, $employeeID) {
        $db = Database::getDB();
        $query = 'INSERT INTO pawnitems(itemID, customerID, dateRecieved, loanAmount, employeeID)
                VALUES (:itemID, :customerID, :dateRecieved, :loanAmount, :employeeID)';
        $statement = $db->prepare($query);
        $statement->bindValue(':itemID', $itemID);
        $statement->bindValue(':customerID', $customerID);
        $statement->bindValue(':dateRecieved', $dateRecieved);
        $statement->bindValue(':loanAmount', $loanAmount);
        $statement->bindValue(':employeeID', $employeeID);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function updatePaymentRecievedByItemID($itemID,$newPaymentRecieved) {
        $db = Database::getDB();
        $query = 'UPDATE pawnitems SET paymentRecieved = :newPaymentRecieved 
                WHERE itemID = :itemID';
        $statement = $db->prepare($query);
        $statement->bindValue(':itemID', $itemID);
        $statement->bindValue(':newPaymentRecieved', $newPaymentRecieved);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function updatePaidOffByItemID($itemID) {
        $db = Database::getDB();
        $query = 'UPDATE pawnitems SET  paidOff = 1
                WHERE itemID = :itemID';
        $statement = $db->prepare($query);
        $statement->bindValue(':itemID', $itemID);
        $statement->execute();
        $statement->closeCursor();
    }

}
