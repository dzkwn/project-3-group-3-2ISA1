<!-- Add Supplier -->

<?php

session_start();

  // Login
  if (!isset($_SESSION["login"])) {
      header("Location: index.php");
      exit;
  }

  require 'funcdb.php';

  function addSp($data) {
      global $db;
      $sp_id = $data['id_supplier'];
      $sp_name = $data['Supplier_name'];

      $query = "INSERT INTO supplier (sp_id, sp_name) VALUES ('$sp_id', '$sp_name')";
      mysqli_query($db, $query);
      return mysqli_affected_rows($db);
  }

  if (isset($_POST["create"])) {
      if (addSp($_POST) > 0) {
          echo "<script>alert('Supplier Added!'); window.location.href = 'Project..php';</script>";
      } else {
          echo "<script>alert('Gagal menambahkan supplier');</script>";
      }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Supplier</title>
  <link rel="stylesheet" href="addsuplier.css" />
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
    <h2>Add Supplier</h2>
    <div class="login-container">

      <form action="" method="post">
        <label for="id_supplier">Supplier ID</label>
        <input type="text" id="id_supplier" name="id_supplier" required />

        <label for="Supplier_name">Supplier Name</label>
        <input type="text" id="Supplier_name" name="Supplier_name" required />

        <button type="submit" name="create" id="create">Create</button>
      </form>

    </div>
  </main>
  
  <script>feather.replace();</script>

</body>
</html>
