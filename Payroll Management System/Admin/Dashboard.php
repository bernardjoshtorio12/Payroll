<?php
include("assets/include/header.php");
include("handler.inc.php");
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
            <div class="nav_link">
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#totalEmployeesModal">
                    View Employee Lists
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="totalEmployeesModal" tabindex="-1" aria-labelledby="totalEmployeesModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="totalEmployeesModalLabel">Employee List</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                           <h4>Total Employee Lists</h4>
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
                      <h5 class="card-title"><strong>Total Payroll Expenses</strong></h5>
                      <p class="card-text fs-5">₱15,000</p>
                      <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#payrollModal">
                      View Details
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="payrollModal" tabindex="-1" aria-labelledby="payrollModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="payrollModalLabel">Payroll List</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <h4>Payroll Info</h4>
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
            <p class="fw-bold fs-4 my-3" style="text-align: center;">Staff Catalog </p>
            <div class="row">
              <div class="col-12">
                <table class="table table-striped">
                  <thead class="table-dark">
                    <tr class="highlight">
                      <th scope="col">ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Hire Date</th>
                      <th scope="col">Department</th>
                      <th scope="col">Role</th>
                    </tr>
                  </thead>
                  <tbody>
                  <tr>
                                        <?php
                                        $query = "SELECT * FROM  employee_records";
                                        $fetch_query_run = mysqli_query($conn, $query);
                                        if (mysqli_num_rows($fetch_query_run) > 0) {
                                        while($row = mysqli_fetch_array($fetch_query_run)){
                                        ?>
                                        <tr>
                                        <td><?= $row['Id']?> </td>
                                        <td><?= $row['Fname'] . " ".  $row['Mname'] . " " .$row['Lname']?> </td>
                                        <td><?= $row['Hiredate']?> </td>
                                        <td><?= $row['Dept']?> </td>
                                        <td><?= $row['Role']?> </td>
                                        </tr>
                                       <?php
                                            }
                                        }
                                        else {
                                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    <strong>Oh no!</strong> Employee List is Empty.
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                  </div>';
                                        }                                       
                                        ?>
                                        </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        </main>
      </div>
      <!--Container Main end-->
<?php
include("assets/include/footer.php");
?>