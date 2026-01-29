<?php
require_once "../db_connection/db_connection.php";

if (isset($_POST['submit'])) {
    $name  = trim($_POST['name']);
    $buying_price  = trim($_POST['BP']);
    $selling_price = trim($_POST['SP']);
    $errors        = [];

    if ($name === '') {
        $errors[] = "Product name is required.";
    }
    if ($buying_price === '' || !is_numeric($buying_price) || $buying_price < 0) {
        $errors[] = "Buying price must be a non-negative number.";
    }
    if ($selling_price === '' || !is_numeric($selling_price) || $selling_price < 0) {
        $errors[] = "Selling price must be a non-negative number.";
    }
    if (is_numeric($buying_price) && is_numeric($selling_price) && $selling_price < $buying_price) {
        $errors[] = "Selling price should not be less than buying price.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    } else {
        $query = "INSERT INTO products (name, buying_price, selling_price, display) 
                  VALUES ('$name', '$buying_price', '$selling_price', 'no')";
        if (isset($_POST['cb'])) {
            $query = "INSERT INTO products (name, buying_price, selling_price, display) 
                      VALUES ('$name', '$buying_price', '$selling_price', 'yes')";
        }

        if (write($query)) {
            echo "<p style='color:green;'>Product added successfully.</p>";
        } else {
            echo "<p style='color:red;'>Error adding product: " . mysqli_error($con) . "</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 6px;
            text-align: center;
            border: 1px solid black;
        }
        a {
            margin: 0 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <fieldset>
                <legend>ADD PRODUCTS</legend>

                Name <br>
                <input type="text" id="name" name="name"><br><br>

                Buying Price <br>
                <input type="text" id="BP" name="BP"><br><br>

                Selling Price <br>
                <input type="text" id="SP" name="SP"><br><br>

                <input type="checkbox" id="cb" name="cb">
                <label for="cb">Display</label><br><br>

                <button type="submit" name="submit">Save</button>
            </fieldset>
        </form>
        <fieldset>
            <legend>Display</legend>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Profit</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $product = read("SELECT *, (selling_price - buying_price) AS profit FROM products WHERE display='yes';");
                    foreach ($product as $products) {
                        echo "<tr>
                                <td>{$products['name']}</td>
                                <td>{$products['profit']}</td>
                                <td>
                                    <a href='edit_product.php?name={$products['name']}&BP={$products['buying_price']}&SP={$products['selling_price']}'>Edit</a>
                                    <a href='delete_product.php?name={$products['name']}&BP={$products['buying_price']}&SP={$products['selling_price']}'>Delete</a>
                                </td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
            <br>
            <a href="ajax.php">Go to AJAX implemented page</a>
        </fieldset>

    </div>
</body>
</html>