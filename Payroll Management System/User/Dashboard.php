<?php
include("assets/include/header.php");
$conn = mysqli_connect("localhost", "root", "", "payroll", 3307);  
$query = "SELECT * FROM  employee_records";
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
            <a href="Dashboard.php" class="nav_link active">
            <i class='bx bxs-dashboard bx-sm bx-spin-hover nav_icon'></i>
              <span class="nav_name">User Dashboard</span>
            </a>

            <a href="#" class="nav_link">
              <i class='bx bx-user-plus bx-sm bx-tada-hover nav_icon'></i>
              <span class="nav_name">View Personal Info</span>
            </a>
            <a href="#" class="nav_link">
            <i class='bx bxs-notepad bx-sm bx-tada-hover nav_icon'></i>
              <span class="nav_name">Update Contact</span>
            </a>
            <a href="#" class="nav_link">
              <i class='bx bx-user-plus bx-sm bx-tada-hover nav_icon'></i>
              <span class="nav_name">Salary Info</span>
            </a>
            <a href="createLeave.php" class="nav_link">
              <i class='bx bx-user-plus bx-sm bx-tada-hover nav_icon'></i>
              <span class="nav_name">Create Leave</span>
            </a>
          </div>
        </div>
        <a href="signout.php" class="nav_link">
        <i class='bx bxs-log-out bx-sm bx-tada-hover nav_icon' ></i>
          <span class="nav_name">Sign out</span>
        </a>
      </nav>
    </div>
    <!--Content Start-->
    <div class="height-100">
      <div class="main">
        <div class="container-fluid">
          <div class="mb-3">
            <h3 class="fw-bold fs-4 mb-3">Dashboard</h3>
       <!-- START TABLE DATA -->
          <div class="row">
              <div class="col-12 col-md-3">
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title"><strong>Total Employees</strong></h5>
                    <?php
                    if ($Id_total = mysqli_num_rows($fetch_query_run)) {
                    echo '<p class="card-text fs-5"> ' . $Id_total . '</p>';
                    } else {
                    echo '<p class="fs-2"> No Data</p>';
                    }
                    ?>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#listModal">
                    View Employee Lists
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="listModal" tabindex="-1" aria-labelledby="listModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="listModalLabel">Employee List</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <h4>here lies employee info</h4>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-3">
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                      <h5 class="card-title"><strong>Overall Leave Requests:</strong></h5>
                                            <?php
                                            $conn = mysqli_connect("localhost", "root", "", "payroll", 3307);  
                                            $query = "SELECT * FROM  user_leave_requests";
                                            $run_query = mysqli_query($conn, $query);
                                            if ($Id_total = mysqli_num_rows($run_query)) {
                                            echo '<p class="card-text fs-5"> ' . $Id_total . '</p>';
                                            } else {
                                                echo '<p class="fs-2"> No Data</p>';
                                            }
                                            ?>
                      <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#requestModal">
                      View Details
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="requestModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="requestModalLabel">Request Details</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <h4>Leave Requests</h4>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-3">
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                      <h5 class="card-title"><strong>Total Overtime Hours</strong></h5>
                      <p class="card-text fs-5">16 hours</p>
                      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#overtimeModal">
                      View More Info
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="overtimeModal" tabindex="-1" aria-labelledby="overtimeModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="overtimeModalLabel">Overtime Info</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <h4>here lies overtime info</h4>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-3">
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                      <h5 class="card-title"><strong>Total Deductions</strong></h5>
                      <p class="card-text fs-5">₱1,000</p>
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deductionsModal">
                      See More
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="deductionsModal" tabindex="-1" aria-labelledby="deductionsModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deductionsModalLabel">Deduction Description</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <h4>here lies total deductions</h4>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END TABLE DATA -->
            <!-- LIST INFOS START -->
            <div class="row">
              <div class="col-12">
              
          </div>
        </div>
        </main>
      </div>
      <!--Container Main end-->
<?php
include("assets/include/footer.php");
?>