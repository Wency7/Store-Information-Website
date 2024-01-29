<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "storedb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products from the database
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header-logo {
            font-size: 24px;
            font-weight: bold;
        }

        .header-actions {
            display: flex;
            align-items: center;
        }

        .header-actions a {
            display: inline-block;
            margin-left: 10px;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }

        .header-actions a:hover {
            background-color: #45a049;
        }

        h1 {
            text-align: center;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f8f8f8;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .product-popup {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 999;
        }

        .product-popup h2 {
            margin-top: 0;
        }
        .add-product-button {
           
            top: 20px;
            left: 20px;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }

        .add-product-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="header">
    <a class="add-product-button" href="add_product.php">Add Product</a>
        <div class="header-actions">
            <a href="logout.php">Logout</a>
        </div>
    </div>

  
       
        
   

    <h1>All Products</h1>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?php echo $row['product_name']; ?></td>
                <td><img src="products/<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>" width="100" height="100"></td>
                <td><?php echo $row['product_price']; ?></td>
                <td>
                    <a href="edit_product.php?id=<?php echo $row['product_id']; ?>">Edit</a>
                    <a href="delete_product.php?id=<?php echo $row['product_id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
