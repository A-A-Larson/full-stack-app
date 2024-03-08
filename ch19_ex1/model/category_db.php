<?php
class CategoryDB {
    public static function getCategories() {
        $db = Database::getDB();
        $query = 'SELECT categoryID, categoryName 
                  FROM categories
                  ORDER BY categoryID';
        try {
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            
            $categories = [];
            foreach ($rows as $row) {
                $categories[] = new Category($row['categoryID'],
                                             $row['categoryName']);
            }
            return $categories;
        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        }
    }

    public static function getCategory($category_id) {
        $db = Database::getDB();
        $query = 'SELECT categoryID, categoryName 
                  FROM categories
                  WHERE categoryID = :category_id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $category_id);
            $statement->execute();
            $row = $statement->fetch();
            $statement->closeCursor();
            
            return new Category($row['categoryID'], $row['categoryName']);
        } catch (PDOException $e) {
            Database::displayError($e->getMessage());
        }
    }
}
?>