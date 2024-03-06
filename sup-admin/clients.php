<?php
include("../admin/db.php");

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
                        <h5 class="mb-0">Clients</h5>
                        <a href="add-client.php" class="btn btn-primary">Add Client</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Mobile Number</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Address</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $id = 1;
                                $res = $conn->query("SELECT * FROM `sal_clients` LIMIT $offset, $recordsPerPage");
                                while($row = $res->fetch_assoc()) {
                                    $name = $row['name'];
                                    $email = $row['email'];
                                    $mobile = $row['contact_number'];
                                    $gender = $row['gender'];
                                    $address = $row['address'];
                                ?>
                                <tr>
                                    <td><?=$id?></td>
                                    <td><?=$name?></td>
                                    <td><?=$email?></td>
                                    <td><?=$mobile?></td>
                                    <td><?=$gender?></td>
                                    <td><?=$address?></td>
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
                            $totalPages = ceil($conn->query("SELECT COUNT(*) FROM `sal_clients`")->fetch_row()[0] / $recordsPerPage);

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