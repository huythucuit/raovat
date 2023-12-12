<?php
session_start();
include 'product.php'; // Make sure the path is correct

$method = $_SERVER['REQUEST_METHOD'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST["action"];
} else {
    $action = $_GET["action"];
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "raovat";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("⛔️⛔️⛔️ CONNECTION FAILED!!! " . $conn->connect_error);
}

if ($action == 'create') {
    $post = new Post();
    $post->productName = $_POST["productName"];
    $post->salePrice = $_POST["price"];
    $post->categoryName = $_POST["category"];
    $post->imageLink = $_POST["imageLink"];
    $post->productLink = $_POST["productLink"];
    createPost($post);
}

function createPost($post)
{
    global $conn;

    $sql = "INSERT INTO product(ProductName, SalePrice, CategoryName, ImageLink, ProductLink)
            VALUES ('$post->productName', '$post->salePrice', '$post->categoryName', '$post->imageLink', '$post->productLink')";

    if ($conn->query($sql) === TRUE) {
        $newURL = "http://localhost:3000/client/managepost.php";
        header('Location: ' . $newURL);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

?>