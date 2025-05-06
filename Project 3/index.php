<!-- Login Menu -->
 
<?php

  // call funcdb
  require 'funcdb.php';

  if (!$db) {
    echo mysqli_error($db);
    die;
  }

  if(isset($_POST["login"])){

    $id_staff = $_POST["id_staff"];
    $password = $_POST["password"];

    $getUserQuery = "SELECT * FROM staff_admin where ad_id = '$id_staff'";
    $getUser = mysqli_query($db, $getUserQuery);
 

    // Check id staff
    if($userData = mysqli_fetch_assoc($getUser)){
      // Check pass matched
      if($password == $userData["ad_pass"]){
        header("Location: Project..php");
        exit;
      }else{  
        echo "<script>
                  alert('Password salah');
                  Document.location.href('index.php');
              </script>";
      }
    }else{
      echo "<script>
                alert('id_staff tidak terdata');
                Document.location.href('index.php');
            </script>";
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

      <button type="submit" name="login" id="login" >Login</button>
    </form>
  </div>
</body>
</html>
