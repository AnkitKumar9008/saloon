<?php
include("../admin/db.php");

if (!isset($_SESSION["username"])) {
    header("location: login.php");
}


$res = $conn->query("SELECT * FROM `sup-admin` WHERE `email` = '" . $_SESSION['username'] . "' ");
while ($row = $res->fetch_assoc()) {
    $adname1 = $row["name"];
    $email1 = $row["email"];
    $password1 = $row["password"];
}


if(isset($_POST['update']))
{
    $adname = $_POST["adminname"];
    $password = $_POST["password"];

    $res = $conn->query("UPDATE `sup-admin` SET `password`='$password',`name`='$adname' WHERE `email` = '" . $_SESSION['username'] . "' ");
    if($res)
    {
      header("location:index.php");
    }
    else{
      die("some thing Error");
    }
}

?>

<?php include("header.php");?>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
            <?php include("siderbar.php");?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
                <?php include("nav.php");?>
            <!-- Navbar End -->

        
            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h5 class="mb-4">My Profile</h5>
                            <form method="post" action="#">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <label class="form-label">Profile Name</label>
                                        <input type="text" class="form-control" value="<?=$adname1?>" name="adminname" required>
                                    </div>
                                </div>

                                <div class="row mt-2 mb-3">
                                    <div class="col-md-6 col-12">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" value="<?=$email1?>" name="email" readonly>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label class="form-label">Password</label>
                                        <input type="text" class="form-control" value="<?=$password1?>" name="password">
                                    </div>
                                </div>
                                <button type="submit" name="update" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->

            <!-- Footer Start -->
                <?php include("footer.php");?>
            <!-- Footer End -->
        </div>
        <!-- Content End -->
    </div>
</body>