<?php
require_once "../db_connection/db_connection.php"; 
header('Content-Type: application/json'); 

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['action'])) {
    if ($data['action'] === 'fetch_product') {
        $products = read("SELECT *, (selling_price - buying_price) AS profit 
                          FROM products 
                          WHERE display='yes'");
        echo json_encode($products);
    } else {
        $search_term = $data['action'];
        $products = read("SELECT *, (selling_price - buying_price) AS profit 
                          FROM products 
                          WHERE display='yes' AND name LIKE '%$search_term%'");
        echo json_encode($products);
    }
} else {
    echo json_encode(["error" => "Invalid request"]);
}
?>