<?php
require_once('database.php');

// Get all categories
$query = 'SELECT * FROM categories
          ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" href="main.css" />
</head>

<!-- the body section -->
<body>
<header><h1>Product Manager</h1></header>
<main>
    <h1>Category List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php
        foreach ($categories as $category) {
        
            echo '<tr>';
            echo '<td>' . $category['categoryName'] . '</td>';
            echo '<td><form action="delete_category.php" method="post">
                    <button>Delete</button>
                    <input type="hidden" name="category_id" value="' . $category['categoryID'] . '"> 
                    </form></td>';
            echo '</tr>';
        
        }
        ?>

        <!-- add code for the rest of the table here -->
    
    </table>

    <h2>Add Category</h2>
    <form action="add_category.php" method="post" id="add_category_form">
            <label>Category Name:</label>
            <input type="text" name="name"> <button>Add</button>
    </form>
    <!-- add code for the form here -->
    
    <br>
    <p><a href="index.php">List Products</a></p>

    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>