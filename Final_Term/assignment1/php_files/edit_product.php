<?php
require_once "../db_connection/db_connection.php";
if (isset($_POST['submit'])) {
    $name          = trim($_POST['name']);
    $buying_price  = trim($_POST['BP']);
    $selling_price = trim($_POST['SP']);
    $original_name = trim($_POST['original_name']);
    $display       = isset($_POST['cb']) ? 'yes' : 'no';
    $errors        = [];
    if ($name === '') $errors[] = "Product name is required.";
    if ($buying_price === '' || !is_numeric($buying_price) || $buying_price < 0) $errors[] = "Buying price must be non-negative.";
    if ($selling_price === '' || !is_numeric($selling_price) || $selling_price < 0) $errors[] = "Selling price must be non-negative.";
    if (is_numeric($buying_price) && is_numeric($selling_price) && $selling_price < $buying_price) $errors[] = "Selling price cannot be less than buying price.";

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    } else {
        $query = "UPDATE products 
                  SET name='$name', buying_price='$buying_price', selling_price='$selling_price', display='$display' 
                  WHERE name='$original_name'";

        if (write($query)) {
            echo "<p style='color:green;'>Product updated successfully.</p>";
            header("Location: add_products.php");
            exit();
        } else {
            echo "<p style='color:red;'>Error updating product: " . mysqli_error($con) . "</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <style>
        .container { width: 50%; margin: auto; }
        fieldset { display: inline-block; padding: 12px; margin-bottom: 20px; }
        legend { font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <form action="" method="post">
        <fieldset>
            <legend>Edit Product</legend>

            Name <br>
            <input type="text" id="name" name="name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>"><br><br>

            Buying Price <br>
            <input type="text" id="BP" name="BP" value="<?php echo isset($_GET['BP']) ? $_GET['BP'] : ''; ?>"><br><br>

            Selling Price <br>
            <input type="text" id="SP" name="SP" value="<?php echo isset($_GET['SP']) ? $_GET['SP'] : ''; ?>"><br><br>

            <input type="checkbox" id="cb" name="cb" <?php echo (isset($_GET['display']) && $_GET['display'] === 'yes') ? 'checked' : ''; ?>> Display<br><br>

            <input type="hidden" name="original_name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>">

            <button type="submit" name="submit">Save</button>
        </fieldset>
    </form>
</div>
</body>
</html>