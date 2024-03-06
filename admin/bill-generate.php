<?php
include("db.php");

if (!isset($_SESSION["username"])) {
    header("location: login.php");
}
$admins = $_SESSION["username"];
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
                        <h6 class="mb-0">Bill Generate</h6>
                        <a class="btn btn-primary" href="create-bill.php">Create Bill</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">ID</th>
                                    <th scope="col">Bill Id</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Bill Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $id = 1;
                                $res = $conn->query("SELECT * FROM `bill_generate` WHERE `adminname` = '$admins' LIMIT $offset, $recordsPerPage");
                                while($row = $res->fetch_assoc()) {
                                    $cname = $row['cname'];
                                    $bill_id = $row['bill_id'];
                                    $service = $row['service'];
                                    $price = $row['price'];
                                    $bill_date = $row['bill_date'];
                                ?>
                                <tr>
                                    <td><?=$id?></td>
                                    <td><?=$bill_id?></td>
                                    <td><?=$cname?></td>
                                    <td><?=$service?></td>
                                    <td>₹ <?=$price?></td>
                                    <td><?=$bill_date?></td>
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
                            $totalPages = ceil($conn->query("SELECT COUNT(*) FROM `bill_generate` WHERE `adminname` = '$admins' ")->fetch_row()[0] / $recordsPerPage);

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