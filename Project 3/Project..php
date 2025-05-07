<?php

  session_start();
  
  // Login
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
  <title>Shop Administrator</title>
  <link rel="stylesheet" href="project..css" />
  <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>

  <nav class="navbar">
    <a href="#" class="navbar-logo">Shop <span>Administrator</span></a>
    <div class="navbar-nav">
      <a href="Project..php">Dashboard</a>
      <a href="addproduct.php">Add Product</a>
      <a href="addsupplier.php">Add Supplier</a>
    </div>

    <div class="navbar-extra">
      <a href="logout.php" class="logout-icon" title="Logout">
        <i data-feather="log-out"></i>
      </a>
    </div>
  </nav>

  <main>
    <section class="pageactive" id="dashboard">
      <h2>Dashboard</h2><br>

      <h3>Product</h3>
      <table>
        <tr>
          <th>Product ID</th>
          <th>Product</th>
          <th>Category</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Supplier</th>
        </tr>

        <?php

        $conn = mysqli_connect("localhost:3307", "root", "", "warehouse_system");
        $sql = "SELECT * FROM product";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["pr_id"] . "</td><td>" . $row["pr_name"] . "</td><td>" . $row["pr_category"] . "</td><td>" . $row["pr_quantity"] . "</td><td>" . $row["pr_price"] . "</td><td>" . $row["sp_id"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No results</td></tr>";
        }
        $conn->close();

        ?>

      </table><br>

      <h3>Supplier</h3>
      <table>
        <tr>
          <th>Supplier ID</th>
          <th>Supplier Name</th>
        </tr>

        <?php

        $conn = mysqli_connect("localhost:3307", "root", "", "warehouse_system");
        $sql = "SELECT * FROM supplier";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["sp_id"] . "</td><td>" . $row["sp_name"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No results</td></tr>";
        }
        $conn->close();

        ?>

      </table>
    </section>
  </main>

  <script>feather.replace();</script>
</body>
</html>

