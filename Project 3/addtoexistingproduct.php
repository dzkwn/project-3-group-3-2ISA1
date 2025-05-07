<!-- Add Stock in Existing Product -->

<?php

  // Login
  session_start();
  
  if (!isset($_SESSION["login"])) {
      header("Location: index.php");
      exit;
  }

  // Add Stock to Existing Product
  require 'funcdb.php';

  function addSp($data) {
    global $db;
    $pr_id = htmlspecialchars($data['product_id']);
    $added_quantity = (int)$data['quantity'];

    // Ambil stok saat ini
    $result = mysqli_query($db, "SELECT pr_quantity FROM product WHERE pr_id = '$pr_id'");
    if (mysqli_num_rows($result) === 0) {
        return -1; // ID produk tidak ditemukan
    }

    $row = mysqli_fetch_assoc($result);
    $current_quantity = (int)$row['pr_quantity'];
    $new_quantity = $current_quantity + $added_quantity;

    // Update stok
    $query = "UPDATE product SET pr_quantity = $new_quantity WHERE pr_id = '$pr_id'";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
  }

  if (isset($_POST["create"])) {
      $result = addSp($_POST);
      if ($result > 0) {
          echo "<script>alert('Stock updated successfully!'); window.location.href = 'Project..php';</script>";
      } elseif ($result === -1) {
          echo "<script>alert('Product ID not found!');</script>";
      } else {
          echo "<script>alert('Failed to update stock.');</script>";
      }
  }

  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Supplier</title>
    <link rel="stylesheet" href="addtoexistingproduct.css" />
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
      <h2>Add Stock Product</h2>
      <div class="login-container">
        <form action="" method="post">
          <label for="product_id">Product ID</label>
          <input type="text" id="product_id" name="product_id" required />
    
          <label for="quantity">Quantity</label>
          <input type="text" id="quantity" name="quantity" required />
    
          <button type="submit" name="create" id="create" >Create</button>
        </form>
      </div>
    </main>
  
    <script>
      feather.replace();
    </script>
  </body>
  
</html>