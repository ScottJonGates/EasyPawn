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
            $user = new User($row['userID'], $row['fName'], $row['lName'], $row['username'], $row['email'], $row['phoneNumber'], $row['admin']);
            $users[] = $user;
        }
        return $users;
    }

    public static function insertNewUser($fName, $lName, $uName, $password, $phoneNumber, $email) {
        $db = Database::getDB();
        $query = 'insert into users(fName, lName, username, password, phoneNumber, email)
                 VALUES (:first_name, :last_name, :user_name, :user_password, :phoneNumber, :email)';
        $statement = $db->prepare($query);
        $statement->bindValue(':first_name', $fName);
        $statement->bindValue(':last_name', $lName);
        $statement->bindValue(':user_name', $uName);
        $statement->bindValue(':user_password', $password);
        $statement->bindValue(':phoneNumber', $phoneNumber);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function getUserPasswordByID($userID) {
        $db = Database::getDB();

        $query = 'select password 
                  from users 
                  WHERE userID = :userID';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        
        $password = $row['password'];
        return $password;
    }
    
    public static function getUserByUserName($uName) {
        $db = Database::getDB();
        
        $query = 'select * 
                 from users 
                 WHERE username = :username';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $uName);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        $user = new User($row['userID'], $row['fName'], $row['lName'], $row['username'], $row['email'], $row['phoneNumber'], $row['admin']);
        
        return $user;
        
    }
    
    public static function getUserByID($userID) {
        $db = Database::getDB();
        $query = 'select * 
                 from users
                 WHERE userID = :userID';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        $user = new User($row['userID'], $row['fName'], $row['lName'], $row['username'], $row['email'], $row['phoneNumber'], $row['admin']);
        return $user;
    }

    public static function deleteUserByItemID($userID){
        $db = Database::getDB();
        
        $query = 'DELETE from users 
                 WHERE userID = :userID';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function AddAdminByUserID($userID) {
        $db = Database::getDB();
        $query = 'update users set admin = 10
                 WHERE userID = :userID';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function removeAdminByUserID($userID) {
        $db = Database::getDB();
        $query = 'update users set admin = 20
                 WHERE userID = :userID';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->execute();
        $statement->closeCursor();
    }

    

}
