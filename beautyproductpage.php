<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masit Online Store</title>
    <?php require_once('navbar.php'); ?>
    <style>
.product-grid {
    display: flex;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    flex-wrap: wrap;
    gap: 20px;
    margin: 0;
    padding: 0;
    justify-content: flex-start;
  
}

.product-item {
    background-color: #f2f2f2;
    padding: 20px;
    text-align: center;
    border-radius: 5px;
}

.product-item img {
    width: 200px;
    height: 200px; 
    margin-bottom: 10px;
}

.product-item h3 {
    font-size: 18px;
    margin: 0;
    text-align: center;
}

a:focus, 
a:visited{
  /* Set any styles you want to apply for these pseudo-classes to none */
  /* Here's an example of disabling the pointer cursor and removing the underline */
  cursor: pointer;
  text-decoration: none;
  color:black;    
}

a:hover {
    color: #7fd858;
}

a{
    color: black;
    text-decoration: none;
    float: left;
    margin-right:30px;
}

.divfilter {
    float: left;
    margin: 20px;
    width: 15%;
    font-size: 18px;   
}

h1 {
    margin-bottom:20px;
    text-align: center;
}

.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: 10% auto;
    padding: 50px;
    border: 5px solid #7fd858;
    width: 75%;
    display: flex;
    flex-direction: column;
   
}

.modal-content img {
    width: 450px;
    height: 450px;
    text-align: center;
    display: inline-block;
  margin: auto;
}

.modal-content h3 {
    font-size: 24px;
    margin: 0;
    text-align: left;
    line-height: 1.5;
}

.close {
  position: absolute;
  top: 0;
  right: 0;
  font-size: 50px;
  font-weight: bold;
  color: white;
  cursor: pointer;
  transition: color 0.2s ease-in-out;
  margin-top: -65px;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

.modal-image-container {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal-image-container img {
  max-width: 100%;
  max-height: 100%;
}

.modal-nameription-container {
  flex: 1;
  margin-left: 20px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.modal-nameription-container h2 {
  font-size: 24px;
  margin: 0;
}

.modal-btn {
  background-color: #7fd858;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.modal-btn:hover {
  background-color: #5da441;
}


  </style>
</head>
<body>

<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "storedb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products from database
$sql = "SELECT * FROM products WHERE Category = 'Beauty Products'";
$result = mysqli_query($conn, $sql);

// Display products in a grid with four columns
echo "<h1 style='text-align: center'>Beauty Products</h1>";
echo '<div class="divfilter" style="margin: 10px 10px 10px 30px;">
        <a href="productpage.php">All Products</a><br>
        <a href="beautyproductpage.php">Beauty Products</a><br>
        <a href="petproductpage.php">Pet Products</a><br>
        <a href="healthcareproductpage.php">Health Care Products</a><br>
        <a href="cleaningproductpage.php">Cleaning Products</a><br>
        <a href="foodproductpage.php">Food Products</a><br>
        <a href="otherproduct.php">Other Products</a><br>
      </div>';
echo "<div class='product-grid'>";
while ($row = $result->fetch_assoc()) {
    echo "<div class='product-item'>";
    echo "<img src='products/" . $row['product_image'] . "' alt='" . $row['product_name']  . "' width='250px' height='1fr'>";
    echo "<h3>" . $row['product_name'] . "</h3> <br>";
    echo "<button class='modal-btn' data-image='products/" . $row['product_image'] . "' data-name='" . $row['product_name'] . "' data-details='" . $row['product_description'] . "' data-price='" . $row['product_price'] .  "'>View Details</button>";
    echo "</div>";
}
echo "</div>";

echo '<div id="myModal" class="modal">
<div class="modal-content">
  <span class="close">&times;</span>
  <h1 id="modal-name"></h1> <br>
  <img src="" alt="" id="modal-img">
  <h2 id="modal-price"></h2> <br>
  <h3 id="modal-details"></h3>
</div>
</div>';


// Close database connection
$conn->close();
?>


<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btns = document.getElementsByClassName("modal-btn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener('click', function() {
    var img = this.getAttribute('data-image');
    var desc = this.getAttribute('data-name');
    var price = this.getAttribute('data-price');
    var details = this.getAttribute('data-details');
    var modalImg = document.getElementById("modal-img");
    modalImg.src = img;
    document.getElementById("modal-name").innerHTML = desc;
    document.getElementById("modal-price").innerHTML = "Price: " + price;
    document.getElementById("modal-details").innerHTML = details;
    modal.style.display = "block";
  });
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html