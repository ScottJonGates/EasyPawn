<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBuser
 *
 * @author Scott
 */
class DBuser {
    public static function getUsers() {
        $db = Database::getDB();

        $query = 'select * from users';
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        $users = array();
        foreach ($results as $row) {
            $user = new User($row['userID'], $row['fName'], $row['lName'], $row['username'], $row['password'], $row['admin']);
            $users[] = $user;
        }
        return $users;
    }

    public static function insertNewUser($fName, $lName, $uName, $password) {
        $db = Database::getDB();
        $query = 'insert into users(fname, lname, username, password)'
                . 'VALUES (:first_name, :last_name, :user_name, :user_password)';
        $statement = $db->prepare($query);
        $statement->bindValue(':first_name', $fName);
        $statement->bindValue(':last_name', $lName);
        $statement->bindValue(':user_name', $uName);
        $statement->bindValue(':user_password', $password);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function getUserByUserName($uName) {
        $db = Database::getDB();
        
        $query = 'select * from users WHERE username = :username';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $uName);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        $user = new User($row['userID'], $row['fName'], $row['lName'], $row['username'], $row['password'], $row['admin']);
        
        return $user;
        
    }
    
    public static function getUserByID($userID) {
        $db = Database::getDB();
        $query = 'select * from users'
                 .' WHERE userID = :userID';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->execute();
        $results = $statement->fetch();
        $statement->closeCursor();
        $user = new User($results['userID'], $results['fName'], $results['lName'], $results['username'], $results['password'], $results['admin']);
        return $user;
    }

    public static function deleteUserByItemID($userID){
        $db = Database::getDB();
        
        $query = 'DELETE from users WHERE userID = :userID';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function AddAdminByUserID($userID) {
        $db = Database::getDB();
        $query = 'update users set admin = 1 '.
                'WHERE userID = :userID';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function removeAdminByUserID($userID) {
        $db = Database::getDB();
        $query = 'update users set admin = 0 '.
                'WHERE userID = :userID';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->execute();
        $statement->closeCursor();
    }
}
