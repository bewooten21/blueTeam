<?php
class level_db {
    
    public static function select_all() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM level';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $levels = [];

        foreach ($rows as $value) {
            $levels[$value['id']] = new $level($value['id'], $value['arithmeticType'], $value['digits']);
        }
        $statement->closeCursor();

        return $levels;
    }

    public static function get_level_by_id($id) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM level
              WHERE id= :id';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $value = $statement->fetch();
        
        $level[$value['id']] = new $level($value['id'], $value['arithmeticType'], $value['digits']);
        
        $statement->closeCursor();

        return $level;
    }

    public static function get_levels_by_arithmeticType($arithmeticType) {
        $db = Database::getDB();
        $query = 'SELECT arithmeticType
              FROM level
              WHERE arithmeticType= :arithmeticType';

        $statement = $db->prepare($query);
        $statement->bindValue(':arithmeticType', $arithmeticType);
        $statement->execute();
        $rows = $statement->fetchAll();
        $levels = [];

        foreach ($rows as $value) {
            $levels[$value['id']] = new $level($value['id'], $value['arithmeticType'], $value['digits']);
        }
        $statement->closeCursor();
        
        return $levels;
    }

    
    public static function add_level($arithmeticType, $digits) {
        
        $db = Database::getDB();
        $query = 'INSERT INTO level
                 (arithmeticType, digits)
              VALUES
                 (:arithmeticType, :digits)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':arithmeticType', $arithmeticType);
            $statement->bindValue(':digits', $digits);
           
            $statement->execute();
            $statement->closeCursor();
            $level_id = $db->lastInsertId();
            return $level_id;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    

    public static function update_level($id, $arithmeticType, $digits) {
        
        $db = Database::getDB();
        $query = $query = 'UPDATE level
              SET arithmeticType = :arithmeticType,
                  digits = :digits
                WHERE id = :id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':arithmeticType', $arithmeticType);
            $statement->bindValue(':digits', $digits);
            $statement->bindValue(':id', $id);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
}
