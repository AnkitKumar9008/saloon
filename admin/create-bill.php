<?php
include("../admin/db.php");
$msg = "";
$getdata = "";
if (!isset($_SESSION["username"])) {
    header("location: login.php");
}

if(isset($_GET["msg"]))
{
    $getdata = $_GET["msg"];
}

if(isset($_POST['admin']))
{
    $cname = $_POST["cname"];
    $service = $_POST["service"];
    $price = $_POST["price"];
    $billdate = $_POST["billdate"];
    $adminame = $_SESSION["username"];

    $bill_id = "{$_POST['cname']}-{$_POST['service']}".rand(999, 10000);

    
    $res = $conn->query("SELECT `branch` FROM `admin` WHERE `email` = '" . $_SESSION['username'] . "'");
    while ($row = $res->fetch_assoc()) {
        $branchname = $row['branch'];
    }
   
    if($cname == '' || $service == '0' || $price == '0' || $billdate =='' ||$adminame =='' ||$branchname == '')
    {
        header("location:create-bill.php?msg= All fields are required");exit;
    }
    else{
        $res = $conn->query("INSERT INTO `bill_generate`(`cname`,`adminname`,`branch`, `bill_id`, `service`, `price`, `bill_date`) VALUES ('$cname','$adminame','$branchname','$bill_id','$service','$price','$billdate')");
        if($res)
        {
        header("location:bill-generate.php");
        }
        else{
        header("location:create-bill.php");
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
                            <h5 class="mb-4">Create Bill</h5>
                            <span class="text-danger center"><?= $msg ?></span>
                            <span class="text-danger center"><?= $getdata ?></span>
                            <form method="post" action="#">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <label class="form-label">Customer Name</label>
                                        <input type="text" class="form-control" name="cname" required>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label class="form-label">Service</label>
                                        <select class="form-control" name="service" required>
                                            <option value="0">Select Service</option>
                                            <?php 
                                                $res = $conn->query("SELECT * FROM `sal_service` ");
                                                while($row = $res->fetch_assoc()) {
                                                    $service = $row['name'];
                                                ?>
                                                <option value="<?=$service?>"><?=$service?></option>
                                                <?php }?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-2 mb-2">
                                    <div class="col-md-6 col-12">
                                        <label class="form-label">Price</label>
                                            <select class="form-control" name="price" required>
                                                <option value="0">Select price</option>
                                                <?php 
                                                    $res = $conn->query("SELECT * FROM `sal_service` ");
                                                    while($row = $res->fetch_assoc()) {
                                                        $price = $row['price'];
                                                    ?>
                                                    <option value="<?=$price?>"><?=$price?></option>
                                                    <?php }?>
                                            </select>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label class="form-label">Bill date</label>
                                        <input type="date" class="form-control" name="billdate" required>
                                    </div>
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