<!-- Login Menu -->

<?php

  // index.php - Login Menu
  session_start();
  require 'funcdb.php';

  if (!$db) {
      echo mysqli_error($db);
      die;
  }

  if (isset($_POST["login"])) {
      $id_staff = $_POST["id_staff"];
      $password = $_POST["password"];

      $getUserQuery = "SELECT * FROM staff_admin WHERE ad_id = '$id_staff'";
      $getUser = mysqli_query($db, $getUserQuery);

      if ($userData = mysqli_fetch_assoc($getUser)) {
          if ($password == $userData["ad_pass"]) {
            $_SESSION["login"] = true;
            $_SESSION["id_staff"] = $userData["ad_id"];
            header("Location: Project..php");
            exit;
          } else {
            echo "<script>alert('Password salah'); window.location.href = 'index.php';</script>";
          }
      } else {
          echo "<script>alert('ID Staff tidak terdata'); window.location.href = 'index.php';</script>";
      }

    mysqli_close($db);
  }

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SysAdmin | Login</title>
  <link rel="stylesheet" href="LoginMenu.css" />
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <form action="" method="post">
      <label for="id_staff">ID Staff</label>
      <input type="text" id="id_staff" name="id_staff" required />
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required />
      <button type="submit" name="login" id="login">Login</button>
    </form>
  </div>
</body>
</html>