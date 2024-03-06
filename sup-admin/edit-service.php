<?php
include("../admin/db.php");
$gender1="";
$name1="";
$price1="";
$msg = "";

if (!isset($_SESSION["username"])) {
    header("location: login.php");
}

if(isset($_GET['seid'])){
    $serid = $_GET['seid'];
}

if(isset($_GET['msg']))
{
    $msg = $_GET['msg'];
}

if(isset($_POST["service"])){
    $gender = $_POST["gender"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $editid =  $_POST['editid'];

    if($gender == '0' || $name == '' || $price == '' || $editid == '')
    {
        header("location:edit-service.php?seid=$serid && ?msg= All fields are required");exit;
    }
    else
    {
        $res = $conn->query("UPDATE `sal_service` SET `gender`='$gender',`name`='$name',`price`='$price' WHERE `id` ='$editid'");
        if($res)
        {
        header("location:services.php");
        }
        else{
        die("some thing error");
        }
    }
}

$res = $conn->query("SELECT * FROM `sal_service` WHERE `id` = '$serid' ");
while($row = $res->fetch_assoc())
{
    $gender1 = $row['gender'];
    $name1 = $row['name'];
    $price1 = $row['price'];
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
                            <h5 class="mb-4">Services</h5>
                            <span class="text-danger center"><?= $msg ?></span>
                            <form name="formId" id="formId" method="post" action="#">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Gender</label>
                                        <select class="form-select mb-3" aria-label="Default select example" id="gender" name="gender">
                                            <option value="0" <?php if($gender1 == '0') echo"selected"; ?>>Select gender</option>
                                            <option value="1" <?php if($gender1 == '1') echo"selected"; ?>>Male</option>
                                            <option value="2" <?php if($gender1 == '2') echo"selected"; ?>>Female</option>
                                        </select>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Service Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?=$name1?>"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Price</label>
                                    <input type="number" class="form-control" id="price" name="price" value="<?=$price1?>">
                                </div>
                                <input type="hidden" value="<?=$serid?>" name="editid">
                                <button type="submit" name="service" id="service" class="btn btn-primary">Save</button>
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

