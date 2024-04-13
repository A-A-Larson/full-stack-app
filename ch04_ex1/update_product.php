<?php
// Get the product data
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$description = filter_input(INPUT_POST, 'description');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

// Validate inputs
if ($product_id == NULL || $product_id == FALSE || $code == NULL || 
        $name == NULL || $price == NULL || $price == FALSE || $category_id == NULL || $category_id == FALSE) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Update the product to the database  
    $query = 'UPDATE products SET  
              productCode = :code,
              productName = :name,
              description = :description,
              listPrice = :price,
              categoryID = :category_id
              WHERE productID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}
?>