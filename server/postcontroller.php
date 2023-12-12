<?php
session_start();
include 'product.php';
$method = $_SERVER['REQUEST_METHOD'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST["action"];
} else {
    $action = $_GET["action"];
}
//
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "raovat";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("⛔️⛔️⛔️ CONNECTION FAILED!!! " . $conn->connect_error);
}

if ($action == 'fetch') {
    fetchProducts($conn);
}

function fetchProducts($conn)
{
    // Fetch products from the database and generate HTML
    $productsHTML = '';
    $result = $conn->query("SELECT * FROM product");

    if (!$result) {
        die("Error fetching products: " . $conn->error);
    }

    while ($row = $result->fetch_assoc()) {
        $productsHTML .= '<div class="product">';
        $productsHTML .= '<img src="' . $row['ImageLink'] . '" alt="' . $row['ProductName'] . '">';
        $productsHTML .= '<h3>' . $row['ProductName'] . '</h3>';
        $productsHTML .= '<p>Price: $' . $row['SalePrice'] . '</p>';
        $productsHTML .= '</div>';
    }

    // Send the generated HTML as the response
    echo $productsHTML;
}

function fetchProducts1($conn)
{
    // Fetch products from the database and generate HTML
    $productsHTML = '';
    $result = $conn->query("SELECT * FROM product");

    if (!$result) {
        die("Error fetching products: " . $conn->error);
    }

    while ($row = $result->fetch_assoc()) {
        $productsHTML .= '<tr>';
        $productsHTML .= '<td>' . $row['Id'] . '</td>';
        $productsHTML .= '<td>' . $row['ProductName'] . '</td>';
        $productsHTML .= '<td>' . $row['SalePrice'] . '</td>';
        $productsHTML .= '<td>' . $row['CategoryName'] . '</td>';
        $productsHTML .= '<td><button class="button-edit" data-id="' . $row['Id'] . '">Edit</button></td>';
        $productsHTML .= '<td><button class="button-delete" data-id="' . $row['Id'] . '">Delete</button></td>';
        $productsHTML .= '</tr>';
    }

    // Send the generated HTML as the response
    echo $productsHTML;
}



if ($action == 'search') {
    $keyword = $_GET["keyword"];
    searchPost($keyword);
}
if ($action == 'update') {
    $post = new Post();
    $post->id = $_POST["id"];
    $post->productName = $_POST["productName"];
    $post->regularPrice = $_POST["regularPrice"];
    $post->salePrice = $_POST["salePrice"];
    $post->categoryName = $_POST["categoryName"];
    $post->imageLink = $_POST["imageLink"];
    $post->productLink = $_POST["productLink"];
    updatePost($post, $post->id);
}

if ($action == 'create') {
    $post = new Post();
    $post->productName = $_POST["productName"];
    $post->regularPrice = $_POST["regularPrice"];
    $post->salePrice = $_POST["salePrice"];
    $post->categoryName = $_POST["categoryName"];
    $post->imageLink = $_POST["imageLink"];
    $post->productLink = $_POST["productLink"];
    createPost($post);
}

function searchPost($keyword)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "raovat";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("⛔️⛔️⛔️ CONNECTION FAILED!!! " . $conn->connect_error);
    }

    $sql = "SELECT * FROM product WHERE ProductName LIKE '%$keyword%';";

    $result = $conn->query($sql);

    $_SESSION["search_results"] = $result->fetch_all(MYSQLI_ASSOC);

    $newURL = "http://localhost/raovat/server/index.php?isSearch=1";
    header('Location: ' . $newURL);

    $conn->close();
}
///

if ($action == 'searchProduct') {
    $keyword = $_GET["keyword"];
    searchProduct($keyword);
}

function searchProduct($keyword)
{
    // ... (your existing database connection logic)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "raovat";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("⛔️⛔️⛔️ CONNECTION FAILED!!! " . $conn->connect_error);
    }

    $sql = "SELECT * FROM product WHERE ProductName LIKE '%$keyword%'";
    $result = $conn->query($sql);

    if (!$result) {
        die("Error searching products: " . $conn->error);
    }

    $productsHTML = '';
    while ($row = $result->fetch_assoc()) {
        $productsHTML .= '<div class="product">';
        $productsHTML .= '<img src="' . $row['ImageLink'] . '" alt="' . $row['ProductName'] . '">';
        $productsHTML .= '<h3>' . $row['ProductName'] . '</h3>';
        $productsHTML .= '<p>Price: $' . $row['SalePrice'] . '</p>';
        $productsHTML .= '</div>';
    }

    echo $productsHTML;

    $conn->close();
}


///
function updatePost($post, $postId)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "raovat";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("⛔️⛔️⛔️ CONNECTION FAILED!!! " . $conn->connect_error);
    }

    if (!($post->productName === "")) {
        $sql = "UPDATE product SET ProductName='$post->productName' WHERE Id='$post->id'";
        $conn->query($sql);
    }
    if (!($post->salePrice === "")) {
        $sql = "UPDATE product SET SalePrice='$post->salePrice' WHERE Id='$post->id'";
        $conn->query($sql);
    }
    if (!($post->categoryName === "")) {
        $sql = "UPDATE product SET CategoryName='$post->categoryName' WHERE Id='$post->id'";
        $conn->query($sql);
    }
    if (!($post->imageLink === "")) {
        $sql = "UPDATE product SET ImageLink='$post->imageLink' WHERE Id='$post->id'";
        $conn->query($sql);
    }
    if (!($post->productLink === "")) {
        $sql = "UPDATE product SET ProductLink='$post->productLink' WHERE Id='$post->id'";
        $conn->query($sql);
    }

    if ($conn->query($sql) === TRUE) {
        $newURL = "http://localhost/raovat/server/managepost.php";
        header('Location: ' . $newURL);
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}

function createPost($post)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "raovat";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO product(ProductName,SalePrice,CategoryName,ImageLink,ProductLink)
    VALUES('$post->productName',$post->salePrice,'$post->categoryName','$post->imageLink','$post->productLink')";

    if ($conn->query($sql) === TRUE) {
        $newURL = "http://localhost/raovat/server/managepost.php";
        header('Location: ' . $newURL);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

if ($action == 'delete') {
    $post = new Post();
    $post->id = $_GET["id"];
    deletePost($post->id);
}

function deletePost($postId)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "raovat";

    // Check for POST request
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    } else {
        // Invalid request method
        $response = ["error" => "Invalid request method"];
        echo json_encode($response);
    }
}
