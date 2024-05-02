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
    <div class="modal fade" id="viewData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewDataLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-3" id="viewDataLabel">Employee Full Information</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="view_user_data">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editData" tabindex="-1" aria-labelledby="editDataModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editDataModal">Edit Employee Informations: </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="handler.inc.php" method="POST">
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <input type="hidden" class="form-control" id="Id" name="Id" placeholder="Employee ID: ">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" id="Fname" name="Fname" placeholder="First Name: ">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" id="Mname" name="Mname" placeholder="Middle Name: ">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" id="Lname" name="Lname" placeholder="Last Name: ">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" id="Email" name="Email" placeholder="Email Address: ">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" id="Contact" name="Contact" placeholder="Contact: ">
                            </div>
                            <div class="form-group mb-3">
                                <input type="date" class="form-control" id="Hiredate" name="Hiredate" placeholder="Hire Date: ">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" id="Dept" name="Dept" placeholder="Department: ">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" id="Role" name="Role" placeholder="Job Role: ">
                            </div>
                            <div class="form-group mb-3">
                                <input type="date" class="form-control" id="Birthdate" name="Birthdate" placeholder="Birth Date: ">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="updateData" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteDataModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteDataModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-3" id="deleteDataModalLabel">Confirmation</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" id="close_cancel"  aria-label="Close"></button>
                    </div>
                    <form action="" method="POST">
                        <div class="modal-body">
                            <input type="hidden" class="form-control" name="user_id" id="delete_id">
                            <h4>
                                Do you really wish to remove this data?
                            </h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" name="delete_cancel" id="delete_cancel" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger" id="delete_data" name="delete_data">Yes, Delete Data</button>
                        </div>  
                    </form>
                </div>
            </div>
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
            <p class="fw-bold fs-4 my-3" style="text-align: center;">Leave Request Lists </p>
            <div class="row">
              <div class="col-12">
                <table class="table table-striped">
                  <thead class="table-dark">
                    <tr class="highlight">
                    <th scope="col">Leave ID</th>
                                                <th scope="col">Employee Name</th>
                                                <th scope="col">Type of Leave</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Start </th>
                                                <th scope="col">End </th>
                                              	<th scope="col">Status</th>
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
                                                <td><?= $row['Start_date']?> </td>
                                                <td><?= $row['End_date']?> </td>
                                              <td><?= $row['Status']?> </td>
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
include("assets/include/footerView.php");
?>