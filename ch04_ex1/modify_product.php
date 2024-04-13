<?php
// #1  Connect this PHP page to MySQL
require_once('database.php');

$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);


if ($product_id != FALSE && $category_id != FALSE) {

    // #2  Add to the string below to complete SELECT statement before the "bound" WHERE clause to get
    //     the product's productCode, productID, categoryID, productName, description and listPice
    //     from the products table.
    $query = 'SELECT productCode, productID, categoryID, productName, description, listPrice FROM products 
              WHERE productID = :product_id';

    // #3  Use $db->prepare() to prepare the query string and
    //     store it in the variable below.
    $statement = $db->prepare($query);

    // #4  Use $statement->bindValue() to bind :product_id in
    //     the prepared query to $product_id.
    $statement->bindValue(':product_id', $product_id);

    // #5  Use $statement->execute() to execute the statement.
    $statement->execute();

    // #6  Use $statement->fetch() to fetch the product row from the
    //     database and store it in the variable below.
    $product = $statement->fetch();

    // #7  Use $statement->closeCursor() to close the connection.
    $statement->closeCursor();
    
    // #8  In the empty string below, write a SELECT statement that gets
    //     all categories from the categories table.  
    $query = 'SELECT * FROM categories';

    // #9  Prepare the query.
    $statement = $db->prepare($query);

    // #10 Execute the query.
    $statement->execute();

    // #11 Fetch ALL category rows from the database and store them in
    //     the variable below.
    $categories = $statement->fetchAll();

    // #12 Close the connection.
    $statement->closeCursor();

}
?>
<!DOCTYPE html>
<html>

<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" href="main.css" />
</head>

<body>
<header><h1>Product Manager</h1></header>
<main>

    <!-- #13 Finish PHP statement below to echo the product's name. -->
    <h1>Modify Product <?php echo $product['productName']; ?></h1>

    <section>
        <form action="update_product.php" method="post">
            <input type="hidden" name="product_id" value="<?php echo $product['productID'] ; ?>">
            <table>
                <tr>

                    <td>Code</td>

                    <!-- #14 Finish PHP statement below to echo the product's code. -->
                    <td><input type="text" name="code" value="<?php echo $product['productCode'] ; ?>"></td>
                
                </tr>
                <tr>

                    <td>Name</td>

                    <!-- #15 Add a PHP statement to the input's value attribute below
                             that echoes the product's name. -->
                    <td><input type="text" name="name" value="<?php echo $product['productName']; ?>"></td>

                </tr>
                <tr>

                    <td>Description</td>

                    <td>

                        <!-- #16 Add a PHP statement nested between the <textarea></textarea> tags
                                 that echoes the product's description. -->
                        <textarea name="description" rows="10" cols="40"><?php echo $product['description']; ?></textarea>
                    
                    </td>

                </tr>
                <tr>

                    <td>List Price</td>

                    <!-- #17 Add a PHP statement to the input's value attribute below
                             that echoes the product's list price. -->
                    <td><input type="text" name="price" value="<?php echo $product['listPrice']; ?>"></td>

                </tr>
                <tr>
                    <td>Category</td>
                    <td>
                        <select name="category_id">
                            <?php

                            // #18 Finish the "( as $category)" condition of the foreach loop below
                            //     to iterate through the catagories returned from the database. 
                            foreach ( $categories as $category) :

                                $selected = "";

                                if ($category['categoryID'] == $product['categoryID']) {
                                    $selected = "selected";
                                }

                                ?>
                                
                                <option <?php echo $selected; ?> value="<?php echo $category['categoryID'] ?>">

                                    <!-- #19 Finish the PHP statement below to echo the category name  -->
                                    <?php echo $category['categoryName']; ?>

                                </option>;

                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <button>Update</button>
        </form>     
    </section>
</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
</footer>
</body>
</html>