<?php
include("../admin/db.php");
$msg="";
if (!isset($_SESSION["username"])) {
    header("location: login.php");
}

// Set the number of records per page
$recordsPerPage = 5;

// Get the current page number
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
  $currentPage = $_GET['page'];
} else {
  $currentPage = 1;
}

// Calculate the offset for the query
$offset = ($currentPage - 1) * $recordsPerPage;

if(isset($_GET['adid']))
{
    $serv_id = $_GET['adid'];
    $res = $conn->query("UPDATE `admin` SET `status`='1' WHERE `id` = '$serv_id' ");
    if($res)
    {
        $msg = "Data Delete Successfully !!";
    }
    else{
        $msg = "Something Error !!";
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

        
            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Admin</h6>
                        <span class="text-danger center"><?=$msg?></span>
                        <a class="btn btn-primary" href="add-admin.php">Add Branch</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Branch</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $id = 1;
                                $res = $conn->query("SELECT * FROM `admin` WHERE `status` = '0' LIMIT $offset, $recordsPerPage");
                                while($row = $res->fetch_assoc()) {
                                    $email = $row['email'];
                                    $name = $row['name'];
                                    $branch = $row['branch'];
                                    $mobile = $row['mobile'];
                                    $address = $row['address'];
                                    $seid = $row['id'];
                                ?>
                                <tr>
                                    <td><?=$id?></td>
                                    <td><?=$name?></td>
                                    <td><a href="detail.php?clname=<?=$branch?>"><?=$branch?></a></td>
                                    <td><?=$email?></td>
                                    <td><?=$mobile?></td>
                                    <td><?=$address?></td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="edit-admin.php?adid=<?=$seid?>"><i class="fa fa-edit"></i></a> | 
                                        <a class="btn btn-sm btn-danger" href="?adid=<?=$seid?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                    $id++;
                                }
                                ?>
                            </tbody>
                        </table>

                        <!-- Pagination Links -->
                        <ul class="pagination mt-3" style="float:right;">
                            <?php
                            $totalPages = ceil($conn->query("SELECT COUNT(*) FROM `admin` WHERE `status` = '0' ")->fetch_row()[0] / $recordsPerPage);

                            // Previous button
                            if ($currentPage > 1) {
                                echo "<li class='page-item'><a class='page-link' href='?page=" . ($currentPage - 1) . "'>Previous</a></li>";
                            }

                            // Page numbers
                            for ($i = 1; $i <= $totalPages; $i++) {
                                echo "<li class='page-item " . ($i == $currentPage ? 'active' : '') . "'><a class='page-link' href='?page=$i'>$i</a></li>";
                            }

                            // Next button
                            if ($currentPage < $totalPages) {
                                echo "<li class='page-item'><a class='page-link' href='?page=" . ($currentPage + 1) . "'>Next</a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


            <!-- Footer Start -->
                <?php include("footer.php");?>
            <!-- Footer End -->
        </div>
        <!-- Content End -->
    </div>
</body>