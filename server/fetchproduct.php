<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "raovat";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("⛔️⛔️⛔️ CONNECTION FAILED!!! " . $conn->connect_error);
}

// Lấy giá trị id từ tham số trên URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Kiểm tra xem id có giá trị hay không
if ($id === null) {
    die("⛔️⛔️⛔️ Missing 'id' parameter!");
}

// Sử dụng Prepared Statement để tránh SQL injection
$stmt = $conn->prepare("SELECT * FROM product WHERE id = ?");
$stmt->bind_param("i", $id);

// Thực thi truy vấn
if ($stmt->execute()) {
    // Lấy kết quả
    $result = $stmt->get_result();

    // Kiểm tra xem có dòng dữ liệu hay không
    if ($result->num_rows > 0) {
        // Lấy dữ liệu từ dòng đầu tiên
        $row = $result->fetch_assoc();

        // Trả về dữ liệu dưới dạng JSON
        header('Content-Type: application/json');
        echo json_encode($row);
    } else {
        echo "⛔️⛔️⛔️ No product found with ID: $id";
    }
} else {
    echo "⛔️⛔️⛔️ Error executing query: " . $stmt->error;
}

// Đóng kết nối
$stmt->close();
$conn->close();
?>