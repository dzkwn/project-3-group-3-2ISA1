<!-- Add New Product -->

<?php

  session_start();
  
  if (!isset($_SESSION["login"])) {
      header("Location: index.php");
      exit;
  }

  // Add New Product
  require 'funcdb.php';

  function addProduct($data) {
  global $db;
  
  $pr_id = htmlspecialchars($data['id_product']);
  $pr_name = htmlspecialchars($data['product_name']);
  $pr_category = htmlspecialchars($data['category']);
  $pr_quantity = (int)$data['quantity'];
  $pr_price = (float)$data['price'];
  $sp_id = htmlspecialchars($data['supplier_id']);
  
  $query = "INSERT INTO product (pr_id, pr_name, pr_category, pr_quantity, pr_price, sp_id) 
            VALUES ('$pr_id', '$pr_name', '$pr_category', $pr_quantity, $pr_price, '$sp_id')";
  
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
  }
  
  if (isset($_POST["create"])) {
      if (addProduct($_POST) > 0) {
          echo "<script>alert('New Product Added!'); window.location.href = 'Project..php';</script>";
      } else {
          echo "<script>alert('Failed to add product.');</script>";
      }
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Supplier</title>
    <link rel="stylesheet" href="addnewproduct.css" />
    <script src="https://unpkg.com/feather-icons"></script>
  </head>
  <body>
    <nav class="navbar">
      <div class="navbar-logo">Shop <span>Administrator</span></div>
      <div class="navbar-nav">
        <a href="Project..php">Dashboard</a>
        <a href="addproduct.php">Add Product</a>
        <a href="addsupplier.php">Add Supplier</a>
      </div>
      <div class="navbar-extra">
        <a href="logout.php" class="logout-icon" title="Logout">
          <i data-feather="log-out"></i></a>
      </div>
    </nav>
    
    
    <main>
      <h2>Add New Product</h2>
      <div class="login-container">
        <form action="" method="post">
          <label for="id_product">Product ID</label>
          <input type="text" id="id_product" name="id_product" required />
    
          <label for="product_name">Product Name</label>
          <input type="text" id="product_name" name="product_name" required />

          <label for="category">Category</label>
          <input type="text" id="category" name="category" required />

          <label for="quantity">Quantity</label>
          <input type="text" id="quantity" name="quantity" required />

          <label for="price">Price</label>
          <input type="text" id="price" name="price" required />

          <label for="supplier_id">Supplier ID</label>
          <input type="text" id="supplier_id" name="supplier_id" required />
    
          <button type="submit" name="create" id="create" >Create</button>
        </form>
      </div>
    </main>
      
  
    <script>
      feather.replace();
    </script>
  </body>
  
</html>