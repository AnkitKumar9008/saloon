<?php
include("../admin/db.php");
$msg = "";

if (!isset($_SESSION["username"])) {
    header("location: login.php");
}

if(isset($_GET['msg']))
{
    $msg = $_GET['msg'];
}

if(isset($_POST['admin']))
{
    $adname = $_POST["adminname"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $branch = $_POST["branch"];
    $address = $_POST["address"];

    
    $check_query = "SELECT * FROM `admin` WHERE `email` = '$email'";
    $stmt = $conn->prepare($check_query);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $msg = "Email is already registered !!";
    }
    else{
        if($adname == ''|| strlen($mobile) != 10 || $email == '' || $password == '' || $branch == '' || $address == '')
        {
            header("location:add-admin.php?msg=All fields are required or invalid mobile number");
            exit; 
        }
        else
        {
            $res = $conn->query("INSERT INTO `admin`(`email`, `password`, `name`,`mobile`,`branch`, `address`) VALUES ('$email','$password','$adname','$mobile','$branch','$address')");
            if($res)
            {
            header("location:admin.php");
            }
            else{
            header("location:add-admin.php");
            }
        }
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
                            <span class="text-danger center"><?= $msg ?></span>
                            <form method="post" action="#">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <label class="form-label">Admin Name</label>
                                        <input type="text" class="form-control" name="adminname" required>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label class="form-label">Mobile Number</label>
                                        <input type="number" class="form-control" name="mobile" maxlength="10" required>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-6 col-12">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                </div>

                                <div class="mb-6 mt-2">
                                    <label class="form-label">Branch Name</label>
                                    <textarea class="form-control" name="branch" required></textarea>
                                </div>

                                <div class="mb-3 mt-2">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control" name="address" required></textarea>
                                </div>

                                <button type="submit" name="admin" class="btn btn-primary">Save</button>
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