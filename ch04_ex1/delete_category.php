<?php
require_once('database.php');

// Get ID
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

// Delete the product from the database
if ($category_id != FALSE) {
    $query = 'DELETE FROM categories
              WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $success = $statement->execute();
    $statement->closeCursor();    
}

// Display the Product List page
include('category_list.php');