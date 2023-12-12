<?php
session_start();
include 'product.php'; // Include your product class or necessary functions

// Check for POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST["action"];

    if ($action == 'delete') {
        $postId = $_POST["id"];
        deletePost($postId);
    }
} else {
    // Invalid request method
    $response = ["error" => "Invalid request method"];
    echo json_encode($response);
}

function deletePost($postId)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "raovat";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statement to prevent SQL injection
    $sql = "DELETE FROM product WHERE Id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $postId);

    if ($stmt->execute()) {
        // Success: Send a JSON response
        $response = ["success" => true];
        echo json_encode($response);
    } else {
        // Error: Send a JSON response with the error message
        $response = ["error" => "Error deleting post: " . $stmt->error];
        echo json_encode($response);
    }

    $stmt->close();
    $conn->close();
}
?>
