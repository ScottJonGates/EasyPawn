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
    
    public static function getItemsPawnedByCustomerID($customerID){
        
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
            $item = new pawnItems($row['itemID'], $row['itemName'], $row['description'], $row['pawnID'], $row['customerID'], $row['dateRecieved'], 
                    $row['loanAmount'], $row['paymentRecieved'], $row['paidOff'], $row['employeeID']);
            $items[] = $item;
        }
        return $items ;
        
    }

    public static function getItemsSoldByCustomerID($customerID) {
        
        $db = Database::getDB();

        $query = 'select * 
                    from solditems as p 
                    inner JOIN items as i on p.itemID = i.itemID 
                    WHERE p.customerID = :customerID';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerID', $customerID);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        
        $items = array();
        foreach ($results as $row) {
            $item = new soldItems($row['itemID'], $row['itemName'], $row['description'],$row['soldID'], $row['employeeID'], 
                    $row['customerID'], $row['soldFor'], $row['profit'], $row['dateSold'], $row['daysInInventory']);
                    
            $items[] = $item;
        }
        return $items ;
        
        
    }

    public static function getItemsBoughtByCustomerID($customerID) {
        
        
        
        
    }

}
