<?php
include("../admin/db.php");
$msg = "";

if (!isset($_SESSION["username"])) {
    header("location: login.php");
}

$branch = $_SESSION["username"];

if(isset($_GET['msg']))
{
    $msg = $_GET['msg'];
}

if(isset($_POST['admin']))
{
    $empname = $_POST["empname"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $doj = $_POST["doj"];
    $salary = $_POST["salary"];
    $address = $_POST["address"];
    $branch = $_SESSION["username"];

    $adharnames = $_FILES['adharcard']['name'];
    $adhartmpname = $_FILES['adharcard']['tmp_name'];
    $adharname = $empname . "-adharcard.pdf";


    $pancards = $_FILES['pancard']['name'];
    $pancardtmpname = $_FILES['pancard']['tmp_name'];
    $pancard = $empname. "-pancard.pdf";

    $check_query = "SELECT * FROM `sal_employee` WHERE `email` = '$email'";
    $stmt = $conn->prepare($check_query);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $msg = "Email is already registered !!";
    }
    else{
        if($empname == ''|| strlen($mobile) != 10 || $email == '' || $password == '' || $salary == '' || $address == '' || $doj == '')
        {
            header("location:add-employee.php?msg=All fields are required or invalid mobile number");
            exit; 
        }
        else
        {
            if(move_uploaded_file($adhartmpname, "uploads/" . $adharname) && move_uploaded_file($pancardtmpname, "uploads/" . $pancard)) {
            $res = $conn->query("INSERT INTO `sal_employee`(`name`, `email`,`password`,`mobile`, `doj`, `salary`, `address`, `addhar`, `pan`, `branch`) VALUES ('$empname','$email','$password','$mobile','$doj','$salary','$address','$adharname','$pancard','$branch')");
                if($res)
                {
                header("location:employee.php");
                }
                else{
                header("location:add-employee.php");
                }
            }
            else{
                $msg = "Something Error !!";
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
                            <h5 class="mb-4">Add Employee</h5>
                            <span class="text-danger center"><?= $msg ?></span>
                            <form method="post" action="#" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <label class="form-label">Employee Name</label>
                                        <input type="text" class="form-control" name="empname" required>
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

                                <div class="row mt-2">
                                    <div class="col-md-6 col-12">
                                        <label class="form-label">Date Of Joning</label>
                                        <input type="date" class="form-control" name="doj" required>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label class="form-label">Salary</label>
                                        <input type="number" class="form-control" name="salary" required>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-6 col-12">
                                        <label class="form-label">Addhar Card</label>
                                        <input type="file" class="form-control" name="adharcard" accept=".pdf" required>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label class="form-label">Pan Card</label>
                                        <input type="file" class="form-control" name="pancard" accept=".pdf" required>
                                    </div>
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