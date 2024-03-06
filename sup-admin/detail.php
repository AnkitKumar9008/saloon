<?php
include("../admin/db.php");
$msg="";
if (!isset($_SESSION["username"])) {
    header("location: login.php");
}

if(isset($_GET['clname']))
{
    $clname = $_GET['clname'];
}

$res = $conn->query("SELECT COUNT(`id`) AS count FROM `admin`");
$row = $res->fetch_assoc();
$Branch = $row['count'];

$res = $conn->query("SELECT COUNT(`id`) AS count FROM `sal_clients`");
$row = $res->fetch_assoc();
$client = $row['count'];

$res = $conn->query("SELECT SUM(`price`) AS count FROM `bill_generate` WHERE `branch` = '$clname' ");
$row = $res->fetch_assoc();
$price = $row['count'];

$res = $conn->query("SELECT COUNT(`id`) AS count FROM `sal_employee`");
$row = $res->fetch_assoc();
$employee = $row['count'];

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

            <!-- Sale & Revenue Start -->
                <div class="container-fluid pt-4 px-4">
                    <h4><?=$clname?></h4>
                    <div class="row g-4">
                        <div class="col-sm-6 col-xl-3">
                            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                <i class="fa fa-chart-line fa-3x text-primary"></i>
                                <div class="ms-3">
                                    <p class="mb-2">Total Branch</p>
                                    <h6 class="mb-0"></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                                <div class="ms-3">
                                    <p class="mb-2">Total Client</p>
                                    <h6 class="mb-0"></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                <i class="fa fa-chart-area fa-3x text-primary"></i>
                                <div class="ms-3">
                                    <p class="mb-2">Total Sale</p>
                                    <h6 class="mb-0">₹ <?=$price?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                                <div class="ms-3">
                                    <p class="mb-2">Total Employee</p>
                                    <h6 class="mb-0"></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Sale & Revenue End -->

            <!-- Footer Start -->
                <?php include("footer.php");?>
            <!-- Footer End -->
        </div>
        <!-- Content End -->
    </div>
</body>