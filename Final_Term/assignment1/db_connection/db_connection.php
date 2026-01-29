<?php
$host     = "localhost";
$user     = "root";
$password = "";
$dbname   = "product_db";

$con = mysqli_connect($host, $user, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
function write($query) {
    global $con;
    return mysqli_query($con, $query);
}
function read($query) {
    global $con;
    $result = mysqli_query($con, $query);
    $data = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    return $data;
}
?>