<?php
require_once "../db_connection/db_connection.php"; 
if (isset($_POST['submit'])) {
    $name          = trim($_POST['name']);
    $buying_price  = trim($_POST['BP']);
    $selling_price = trim($_POST['SP']);

    $query = "DELETE FROM products 
              WHERE name='$name' 
              AND buying_price='$buying_price' 
              AND selling_price='$selling_price'";

    if (write($query)) {
        echo "<p style='color:green;'>Product deleted successfully.</p>";
        header("Location: add_products.php");
        exit();
    } else {
        echo "<p style='color:red;'>Error deleting product: " . mysqli_error($con) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Product</title>
    <style>
        .container {
            width: 50%;
            margin: auto;
        }
        fieldset {
            display: inline-block;
            padding: 12px;
            margin-bottom: 20px;
        }
        legend {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <fieldset>
                <legend>Delete Product</legend>
                Name: 
                <input type="hidden" name="name" value="<?php echo $_GET['name']; ?>">
                <?php echo $_GET['name']; ?><br>

                Buying Price: 
                <input type="hidden" name="BP" value="<?php echo $_GET['BP']; ?>">
                <?php echo $_GET['BP']; ?><br>

                Selling Price: 
                <input type="hidden" name="SP" value="<?php echo $_GET['SP']; ?>">
                <?php echo $_GET['SP']; ?><br>

                Display: YES<br><br>

                <button type="submit" name="submit">Delete</button>
            </fieldset>
        </form>
    </div>
</body>
</html>