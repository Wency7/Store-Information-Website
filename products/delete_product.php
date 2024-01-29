<?php
if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "storedb";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Delete the product from the database
    $sql = "DELETE FROM products WHERE product_id = '$productId'";
    mysqli_query($conn, $sql);
    
    // Close the database connection
    $conn->close();
    
    // Redirect back to the product list page
    header("Location: login_process.php");
    exit();
}
?>
