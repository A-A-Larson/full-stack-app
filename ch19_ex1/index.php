<?php
require_once('util/main.php');

require_once('model/database.php');
require_once('model/product_db.php');
require_once('model/category_db.php');
require_once('model/product.php');
require_once('model/category.php');

/*********************************************
 * Select some products
 **********************************************/

// Sample data
$cat_id = 1;

// Get the products
$products = ProductDB::getProductsByCategory($cat_id);

/***************************************
 * Delete a product
 ****************************************/

// Sample data
$product_name = 'Fender Telecaster';

// Delete the product and display an appropriate messge
$delete_message = "No rows were deleted.";

/***************************************
 * Insert a product
 ****************************************/

// Sample data
$category_id = 1;
$code = 'telex2';
$name = 'Fender Telecaster';
$description = 'NA';
$price = '949.99';
$discount_percent = '10';

//Get Category
$category = CategoryDB::getCategory($category_id);

//Make a product
$product = new Product($category, $code, $name, $description, $price, $discount_percent);


/* 
private Category $category,
private string $code,
private string $name,
private string $description,
private float $price,
private float $discount_percent
*/


// Insert the product
$insertedProductID = ProductDB::addProduct($product);


// Insert the data and display an appropriate message
$insert_message = "A product with the id of " . $insertedProductID .  " was inserted.";

include 'home.php';
?>