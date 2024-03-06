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

if(isset($_POST["service"]))
{
    $gender = $_POST["gender"];
    $name = $_POST["name"];
    $price = $_POST["price"];

    if($gender == '0' || $name == '' || $price == '')
    {
        header("location:add-service.php?msg= All fields are required");exit;
    }
    else
    {
        $res = $conn->query("INSERT INTO `sal_service`(`gender`, `name`, `price`) VALUES ('$gender','$name','$price')");
        if($res)
        {
        header("location:services.php");
        }
        else{
        header("location:add-service.php");
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
                            <h5 class="mb-4">Services</h5>
                            <span class="text-danger center"><?= $msg ?></span>
                            <form name="formId" id="formId" method="post" action="#">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Gender</label>
                                        <select class="form-select mb-3" aria-label="Default select example" id="gender" name="gender">
                                            <option value="0">Select gender</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                        </select>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Service Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Price</label>
                                    <input type="number" class="form-control" id="price" name="price">
                                </div>
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

<!-- 
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function(){
        $("#service").click(function(e) {
            e.preventDefault();

            var gender = $("#gender").val();
            var name = $("#name").val(); 
            var price = $("#price").val();

            var dataString = $("#formId").serialize();

            $.ajax({
                type: 'POST',
                data: dataString,
                url: 'insert.php',
                success: function(data) {
                    //alert(data);
                }
            });
        });
    });
</script> -->