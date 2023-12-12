<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "raovat";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve products
$sql = "SELECT * FROM product";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Fetch data and encode it as JSON
    $products = array();
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    echo json_encode($products);
} else {
    echo "No products found";
}

// Close the connection
$conn->close();
?>
