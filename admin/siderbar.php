<?php
$res = $conn->query("SELECT * FROM `admin` WHERE `email` = '" . $_SESSION['username'] . "'");
while ($row = $res->fetch_assoc()) {
    $name = $row["name"];
}
?>    

    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-light navbar-light">
            <a href="index.php" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary"></i>Admin</h3>
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0"><?=$name?></h6>
                    <span>Admin</span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="services.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Services</a>
                <a href="appointment.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Appointment</a>
                <a href="bill-generate.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Bill Generate</a>
                <a href="clients.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Clients</a>
                <a href="employee.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Employee</a>
                <a href="best-offers.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Best Offers</a>
                <a href="logout.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Logout</a>
            </div>
        </nav>
    </div>
        <!-- Sidebar End -->