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
    
    // Retrieve the product details from the database
    $sql = "SELECT * FROM products WHERE product_id = '$productId'";
    $result = mysqli_query($conn, $sql);
    $product = $result->fetch_assoc();
    
    // Close the database connection
    $conn->close();
    
    // Display the edit form with pre-filled values
    echo "<h1>Edit Product</h1>";
    echo "<form action='update_product.php' method='POST'>";
    echo "<input type='hidden' name='id' value='" . $product['product_id'] . "'><br>";
    echo "Product Name: <input type='text' name='name' value='" . $product['product_name'] . "'><br>";
    echo "Product Price: <input type='text' name='price' value='" . $product['product_price'] . "'><br>";
    echo "<input type='submit' value='Update'>";
    echo "</form>";
}
?>
