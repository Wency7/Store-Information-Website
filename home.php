<!DOCTYPE html>
<html lang="en">
<?php
?>
<style>
.navbar {
  height: 85px; /* Change this to the desired height */
}
.navbar-brand{
  position: relative;
  top: -20px;
  left: -5px;
}
</style>
<head>
  <title>Masit Online Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <div><?php require_once('navbar.php') ?></div>
  <?php require_once('dbslide.php') ?>
</head> 
<body>
<br>
<div style="text-align: center"><button type="button" class="btn btn-success btn-lg" id="btnVMP">View More Products</button></div>


<script>
    const button = document.querySelector('#btnVMP');

    button.addEventListener('click', () => {
      window.location.href = 'productpage.php';
    });
  </script>
</body>
</html>
