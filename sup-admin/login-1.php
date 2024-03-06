<?php
// include("../db.php");

// if(isset($_POST["login"]))
//  {
// 	$s1=$_POST["username"];
// 	$s2=$_POST["password"];
// 	if($s1!="")
// 	{
// 		$result=$conn->query("SELECT * FROM `admin` WHERE `email`='$s1'");
// 		if($row=$result->fetch_assoc())
// 		{
// 			$pass=$row["password"];
// 			if($pass!=$s2)
// 			{
// 				echo "<script>alert('Password Not Matched');</script>";
// 			}
// 			else
// 			{
//         $_SESSION["username"] = $s1;
// 				echo "<script>alert('Login successfully and password matched');</script>";
// 				header("location:dashboard.php");
// 			}
// 		}
// 		else
// 		{
// 			echo "<script>alert('Invalid Mail Id');</script>";	
// 		}
// 	}
// 	else
// 	{
// 		echo "<script>alert('Please enter your id first');</script>";
// 	}
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Admin Login</title>
  <style>
    body {
      background-color: #f8f9fa;
    }

    .login-container {
      max-width: 400px;
      margin: auto;
      margin-top: 180px;
    }

    .login-form {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>

<div class="container login-container">
  <div class="login-form">
    <h2 class="text-center">Super Admin Login</h2>
    <form method="post" action="login.php">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" name="username" placeholder="Enter username" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" placeholder="Enter password" required>
      </div>
      <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
    </form>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
