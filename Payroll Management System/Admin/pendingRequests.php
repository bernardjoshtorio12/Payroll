<?php
include("assets/include/header.php");
include("handler.inc.php");
$query = "SELECT * FROM  user_leave_requests";
$fetch_query_run = mysqli_query($conn, $query);
?>
  <body id="body-pd">
    <header class="header" id="header">
      <div class="header_toggle">
        <i class='bx bx-menu bx-lg bx-tada-hover' id="header-toggle"></i>
      </div>
    </header>
    <div class="l-navbar" id="nav-bar">
      <nav class="nav">
        <div>
          <a href="#" class="nav_logo">
            <img src="assets/imgs/logo.png" alt="logo" width="70px" alt="70px">
            <span class="nav_logo-name">Payroll <br> Management <br> System </span>
          </a>
          <div class="nav_list">
            <a href="Dashboard.php" class="nav_link">
            <i class='bx bxs-dashboard bx-sm bx-spin-hover nav_icon'></i>
              <span class="nav_name">Admin Dashboard</span>
            </a>

            <a href="addEmployee.php" class="nav_link">
              <i class='bx bx-user-plus bx-sm bx-tada-hover nav_icon'></i>
              <span class="nav_name">Add Employee</span>
            </a>
            <a href="view.php" class="nav_link">
            <i class='bx bxs-notepad bx-sm bx-tada-hover nav_icon'></i>
              <span class="nav_name">View Employee List</span>
            </a>
            <div class="nav_link">
            <i class='bx bxs-user-detail bx-sm bx-tada-hover nav_icon'></i>
              <span class="nav_name">Configure Salary</span>
              <ul class="sub-menu">
                <li><a href="#">View Salary List</a></li>
                <li><a href="#">Generate Salary Report</a></li>
              </ul>
            </div>
            <div class="nav_link active">
            <i class='bx bxs-bell-ring bx-sm bx-tada-hover nav_icon'></i>
                <span class="nav_name">Leave Requests</span>
                <ul class="sub-menu">
                  <li><a href="pendingRequests.php">Pending Leave Requests</a></li>
                  <li><a href="requestList.php">View Request List</a></li>
                </ul>
            </div>
          </div>
        </div>
        <a href="signout.php" class="nav_link">
        <i class='bx bxs-log-out bx-sm bx-tada-hover nav_icon' ></i>
          <span class="nav_name">Sign out</span>
        </a>
      </nav>
    </div>
    <!--Content Start-->
    <div class="height-100 bg-light">
      <div class="main">
        <div class="container-fluid">
          <div class="mb-3">
            </div>
            </div>
           </div>
            <!-- LIST INFOS START -->
            <p class="fw-bold fs-4 my-3" style="text-align: center;">Leave Management </p>
            <div class="row">
              <div class="col-12">
                <table class="table table-striped">
                  <thead class="table-dark">
                    <tr class="highlight">
                        <th scope="col">Leave ID</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Type of Leave</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Approve/Reject</th>
                    </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <?php
                                                $fetch_query_run = mysqli_query($conn, $query);
                                                if (mysqli_num_rows($fetch_query_run) > 0) {
                                                    while($row = mysqli_fetch_array($fetch_query_run)){
                                                ?>
                                            <tr>
                                                <td class="user_id"><?= $row['Id']?> </td>
                                                <td><?= $row['Name']?> </td>
                                                <td><?= $row['Type_of_leave']?> </td>
                                                <td><?= $row['Description']?> </td>
                                              <td><?= $row['Status']?> </td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm approve-butt"><i class="bx bxs-user-check"></i> Approve</button>
                                                    <button class="btn btn-danger btn-sm decline-butt"><i class="bx bxs-user-x"></i> Decline</button>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                        	}
                                            else {
                                                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                        <strong>Oh no!</strong> There is No Existing Requests.
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                      </div>';
                                            }                                       
                                            ?>
                  </tbody>
                </table>
              </div>
            </div>
        </main>
      </div>
      <!--Container Main end-->
<?php
include("assets/include/footerRequest.php");
?>