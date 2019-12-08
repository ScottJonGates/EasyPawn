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

    public static function getEmployees() {
        $db = Database::getDB();

        $query = 'select * 
                    from users as u
                    JOIN employee as e
                    on u.userID = e.userID
                    where u.admin = 20 or 10';
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        $emps = array();
        foreach ($results as $row) {
            $emp = new employee($row['hireDate'], $row['salary'], $row['userID'], $row['fName'], $row['lName'], $row['username'], $row['email'], $row['phoneNumber'], $row['admin']);

            $emps[] = $emp;
        }
        return $emps;
    }

    public static function getEmployeeByID($userID) {
        $db = Database::getDB();

        $query = 'select * 
                    from users as u
                    JOIN employee as e
                    on u.userID = e.userID
                    where u.userID = :userID';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();

        $emp = new employee($row['hireDate'], $row['salary'], $row['userID'], $row['fName'], $row['lName'], $row['username'], $row['email'], $row['phoneNumber'], $row['admin']);

        return $emp;
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

    public static function insertNewEmployee($userID, $hireDate, $salary) {
        $db = Database::getDB();
        $query = 'insert into employee(userID, hireDate, salary)
                 VALUES (:userID, :hireDate, :salary)';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->bindValue(':hireDate', $hireDate);
        $statement->bindValue(':salary', $salary);
        $statement->execute();
        $statement->closeCursor();

        DBuser::setEmployee($userID);
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

    public static function deleteUserByUserID($userID) {
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

    public static function removeEmpByUserID($userID) {
        $db = Database::getDB();
        $query = 'update users set admin = 30
                 WHERE userID = :userID';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function setEmployee($userID) {
        $db = Database::getDB();
        $query = 'update users set admin = 20
                 WHERE userID = :userID';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function isCurrentEmployee($username) {
        $db = Database::getDB();
        $query = 'select * 
                 from users
                 WHERE username = :username';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        $user = new User($row['userID'], $row['fName'], $row['lName'], $row['username'], $row['email'], $row['phoneNumber'], $row['admin']);
        $flag = TRUE;
        if ($row == FALSE || $row == null) {
            $flag = FALSE;
        }
        return $flag;
    }

    public static function updateEmployee($fName, $lName, $uName, $password, $phoneNumber, $email, $hireDate, $salary, $userID ) {
        $db = Database::getDB();
        $query = 'UPDATE employee as e
                    JOIN users as u
                    on e.userID = u.userID
                    SET u.fName = :first_name, u.lName = :last_name, u.username = :user_name,
                    u.email = :email, u.phoneNumber = :phoneNumber, e.hireDate = :hireDate,
                    e.salary = :salary, u.password = :user_password
                    WHERE u.userID = :userID';
        $statement = $db->prepare($query);
        $statement->bindValue(':first_name', $fName);
        $statement->bindValue(':last_name', $lName);
        $statement->bindValue(':user_name', $uName);
        $statement->bindValue(':user_password', $password);
        $statement->bindValue(':phoneNumber', $phoneNumber);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':hireDate', $hireDate);
        $statement->bindValue(':salary', $salary);
        $statement->bindValue(':userID', $userID);
        $statement->execute();
        $statement->closeCursor();
    }

}
