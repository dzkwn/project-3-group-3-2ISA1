<!-- Add Product -->

<?php

  session_start();
  
  if (!isset($_SESSION["login"])) {
      header("Location: index.php");
      exit;
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Supplier</title>
    <link rel="stylesheet" href="addproduct.css" />
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
        <h2>Add Product</h2>
        <div class="card-container">

          <!-- Card: Add New Product -->
          <div class="card">
            <h3>Add New Product</h3>
            <p>Use this option to add a completely new product to the inventory.</p>
            <a href="addnewproduct.php" class="card-button">Add New</a>
          </div>
      
          <!-- Card: Add Stock to Existing Product -->
          <div class="card">
            <h3>Add to Existing Product</h3>
            <p>Update the stock quantity for a product that already exists.</p>
            <a href="addtoexistingproduct.php" class="card-button">Add Stock</a>
          </div>
        </div>
      </main>
      
    </main>
  
    <script>
      feather.replace();
    </script>
  </body>
</html>