<?php

class user_db {

    public static function select_all() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM user';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $users = [];

        foreach ($rows as $value) {
            $users[$value['id']] = new user($value['id'], $value['firstName'], $value['lastName'], $value['userName'], $value['password'], $value['level']);
        }
        $statement->closeCursor();

        return $users;
    }

    public static function get_user_by_id($id) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM user
              WHERE ID= :id';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $value = $statement->fetch();
        
        $users[$value['id']] = new user($value['id'], $value['firstName'], $value['lastName'], $value['userName'], $value['password'], $value['level']);
        
        $statement->closeCursor();

        return $users;
    }

    public static function get_user_by_username($uName) {
        $db = Database::getDB();
        $query = 'SELECT userName
              FROM user
              WHERE userName= :uName';

        $statement = $db->prepare($query);
        $statement->bindValue(':uName', $uName);
        $statement->execute();
        $result = $statement->fetch();

        $statement->closeCursor();
        
        return $result;
    }

    public static function add_user_with_level($fName, $lName, $uName, $pWord, $level) {
        $db = Database::getDB();
        $query = 'INSERT INTO user
                 (firstName, lastName, userName, password, level)
              VALUES
                 (:fName, :lName, :uName, :pWord, :level)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':fName', $fName);
            $statement->bindValue(':lName', $lName);
            $statement->bindValue(':uName', $uName);
            $statement->bindValue(':pWord', $pWord);
            $statement->bindValue(':level', $level);
           
            $statement->execute();
            $statement->closeCursor();

            // Get the last product ID that was automatically generated
            $user_id = $db->lastInsertId();
            return $user_id;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function add_user($fName, $lName, $uName, $pWord) {
        
        $db = Database::getDB();
        $query = 'INSERT INTO user
                 (fName, lName, uName, pWord)
              VALUES
                 (:fName, :lName, :uName, :pWord)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':fName', $fName);
            $statement->bindValue(':lName', $lName);
            $statement->bindValue(':uName', $uName);
            $statement->bindValue(':pWord', $pWord);
           
            $statement->execute();
            $statement->closeCursor();
            $user_id = $db->lastInsertId();
            return $user_id;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    

    public static function update_user($id, $fName, $lName, $uName, $level) {
        
        $db = Database::getDB();
        $query = $query = 'UPDATE user
              SET firstName = :fName,
                  lastName = :lName,
                  userName = :uName,
                  level = :level
                WHERE id = :id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':fName', $fName);
            $statement->bindValue(':lName', $lName);
            $statement->bindValue(':uName', $uName);
            $statement->bindValue(':level', $level);
            $statement->bindValue(':id', $id);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function update_user_level($id, $level) {
        
        $db = Database::getDB();
        $query = $query = 'UPDATE user
              SET level = :level
                WHERE id = :id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':level', $level);
            $statement->bindValue(':id', $id);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    public static function delete_by_ID($id) {
        $db = Database::getDB();
        $query = 'DELETE from user WHERE id= :id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function validate_user_login($uName) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM user
              WHERE userName= :uName';

        $statement = $db->prepare($query);
        $statement->bindValue(':uName', $uName);
        $statement->execute();
        $value = $statement->fetch();
        
        $theUser = new user($value['id'], $value['firstName'], $value['lastName'], $value['userName'], $value['password'], $value['level']);

        $statement->closeCursor();

        return $theUser;
    }
    
    public static function reset_pw($uName,$pw){
        $db= Database::getDB();
        
        $query= 'Update user
               set password= :pw
               WHERE userName= :uName';
        
        $statement = $db->prepare($query);
        $statement->bindValue('uName', $uName);
        $statement->bindValue('pw', $pw);
        $statement->execute();
        $statement->closeCursor();
        
    }
}
