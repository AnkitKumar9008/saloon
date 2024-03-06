<?php
include("../admin/db.php");

if (!isset($_SESSION["username"])) {
    header("location: login.php");
}

if(isset($_GET['adid'])){
    $serid = $_GET['adid'];
}

$res = $conn->query("SELECT * FROM `admin` WHERE `id` = '$serid' ");
while($row = $res->fetch_assoc())
{
    $adname1 = $row["name"];
    $mobile1 = $row["mobile"];
    $email1 = $row["email"];
    $password1 = $row["password"];
    $branch1 = $row["branch"];
    $address1 = $row["address"];
}

if(isset($_POST['update']))
{
    $adname = $_POST["adminname"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $branch = $_POST["branch"];
    $address = $_POST["address"];
    $editid =  $_POST['editid'];

    $res = $conn->query("UPDATE `admin` SET `email`='$email',`password`='$password',`name`='$adname',`mobile`='$mobile',`branch`='$branch',`address`='$address' WHERE `id` = '$editid' ");
    if($res)
    {
      header("location:admin.php");
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
                            <h5 class="mb-4">Add Admin</h5>
                            <form method="post" action="#">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <label class="form-label">Admin Name</label>
                                        <input type="text" class="form-control" value="<?=$adname1?>" name="adminname" required>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <label class="form-label">Mobile Number</label>
                                        <input type="number" class="form-control" value="<?=$mobile1?>" name="mobile" maxlength="10" required>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-6 col-12">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" value="<?=$email1?>" name="email" required>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" value="<?=$password1?>" name="password" readonly>
                                    </div>
                                </div>

                                <div class="mb-6 mt-2">
                                    <label class="form-label">Branch Name</label>
                                    <textarea class="form-control" name="branch" required><?=$branch1?></textarea>
                                </div>

                                <div class="mb-3 mt-2">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control" name="address" required><?=$address1?></textarea>
                                </div>
                                <input type="hidden" value="<?=$serid?>" name="editid">
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