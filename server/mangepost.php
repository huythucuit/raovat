<?php
session_start();
include 'product.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "raovat";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action == 'fetch') {
    fetchProducts1($conn);
}

function fetchProducts1($conn) {
    $products = array();
    $result = $conn->query("SELECT * FROM product");

    if (!$result) {
        die("Error fetching products: " . $conn->error);
    }

    while ($row = $result->fetch_assoc()) {
        $products[] = array(
            'Id' => $row['Id'],
            'ProductName' => $row['ProductName'],
            'SalePrice' => $row['SalePrice'],
            'CategoryName' => $row['CategoryName']
        );
    }

    // Encode the array as JSON
    $jsonResponse = json_encode($products);

    // Set the content type to JSON
    header('Content-Type: application/json');

    // Echo the JSON response
    echo $jsonResponse;
}

$conn->close();
?>