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

if ($action == 'update') {
    $post = new Post();
    $post->productName = $_POST["productName"];
    $post->salePrice = $_POST["price"];
    $post->categoryName = $_POST["category"];
    $post->imageLink = $_POST["imageLink"];
    $post->productLink = $_POST["productLink"];
    $postId = $_POST["postId"]; // Add the input field for postId in your HTML form

    updatePost($post, $postId);
}

function updatePost($post)
{
    global $conn;

    // Assuming you have a function to validate and sanitize input data to prevent SQL injection
    $postId = mysqli_real_escape_string($conn, $_POST['postId']);
    $productName = mysqli_real_escape_string($conn, $post->productName);
    $salePrice = mysqli_real_escape_string($conn, $post->salePrice);
    $categoryName = mysqli_real_escape_string($conn, $post->categoryName);
    $imageLink = mysqli_real_escape_string($conn, $post->imageLink);
    $productLink = mysqli_real_escape_string($conn, $post->productLink);

    $sql = "UPDATE product 
            SET ProductName = '$productName', 
                SalePrice = '$salePrice', 
                CategoryName = '$categoryName', 
                ImageLink = '$imageLink', 
                ProductLink = '$productLink'
            WHERE Id = '$postId'";

    if ($conn->query($sql) === TRUE) {
        $newURL = "http://localhost:3000/client/managepost.php";
        header('Location: ' . $newURL);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
