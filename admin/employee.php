<?php
include("db.php");

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

if(isset($_GET['empid']))
{
    $empid = $_GET['empid'];
    $res = $conn->query("UPDATE `sal_employee` SET `status`='1' WHERE `id` = '$empid' ");
    if($res)
    {
        header("location:employee.php");
    }
    else
    {
        header("location:employee.php");
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
                        <h5 class="mb-0">Employee</h5>
                        <a href="add-employee.php" class="btn btn-primary">Add Employee</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">DOJ</th>
                                    <th scope="col">Salary</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Documents</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $id = 1;
                                $res = $conn->query("SELECT * FROM `sal_employee` WHERE `branch` = '" . $_SESSION['username'] . "' && `status` = '0' LIMIT $offset, $recordsPerPage");
                                while($row = $res->fetch_assoc()) {
                                    $ename = $row['name'];
                                    $email = $row['email'];
                                    $mobile = $row['mobile'];
                                    $doj = $row['doj'];
                                    $salary = $row['salary'];
                                    $address = $row['address'];
                                    $addhar = $row['addhar'];
                                    $pan = $row['pan'];
                                    $ids = $row['id'];
                                ?>
                                <tr>
                                    <td><?=$id?></td>
                                    <td><?=$ename?></td>
                                    <td><?=$email?></td>
                                    <td><?=$mobile?></td>
                                    <td><?=$doj?></td>
                                    <td>₹ <?=$salary?></td>
                                    <td><?=$address?></td>
                                    <td><a href="uploads/<?= $addhar ?>" target="_blank">Adhar Card</a> <br>
                                        <a href="uploads/<?= $pan ?>" target="_blank">Pan Card</a></td>
                                    <td>
                                        <a href="edit-employee.php?empid=<?=$ids?>" class="btn btn-primary btn-sm">Edit</a> | <a href="?empid=<?=$ids?>" class="btn btn-danger btn-sm">Del</a>
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
                            $totalPages = ceil($conn->query("SELECT COUNT(*) FROM `sal_employee`")->fetch_row()[0] / $recordsPerPage);

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