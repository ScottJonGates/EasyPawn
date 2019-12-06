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
                    WHERE p.employeeID = :employeeID';
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
    
    public static function editCustInquiryByID($itemName, $description, $amountWanted, $pawnOrSell,$inquiryID) {
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
            $item = new custInquiryItem($row['inquiryID'], $row['customerID'], 
                    $row['amountWanted'], $row['itemName'], $row['description'], $row['pawnOrSell']);
            $items[] = $item;
        }
        return $items;
    }

}
