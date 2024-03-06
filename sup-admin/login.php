<?php
include("../admin/db.php");

$msg ="";
if(isset($_POST["login"]))
 {
	$s1=$_POST["username"];
	$s2=$_POST["password"];
	if($s1!="")
	{
		$result=$conn->query("SELECT * FROM `sup-admin` WHERE `email`='$s1'");
		if($row=$result->fetch_assoc())
		{
			$pass=$row["password"];
			if($pass!=$s2)
			{
                $msg = "Password Not Matched";
			}
			else
			{
                $_SESSION["username"] = $s1;
                $msg = "Login successfully and password matched";
				header("location:index.php");
			}
		}
		else
		{
            $msg = "Invalid Mail Id";
		}
	}
	else
	{
        $msg = "Please enter your id first";
	}
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("header.php");?>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"></i>SUPER ADMIN</h3>
                            </a>
                            <h3>Sign In</h3>
                        </div>
                        <form method="post" action="#">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" name="username" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <a href="">Forgot Password</a>
                            </div>
                            <button type="submit" name="login" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                            <span class="text-danger center"><?=$msg?></span>
                        </form>    
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>