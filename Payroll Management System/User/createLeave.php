<?php
include("assets/include/header.php");
include("leaveProcess.inc.php");
$result = mysqli_query($conn, $query);
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
            <a href="createLeave.php" class="nav_link active">
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
    <div class="modal fade" id="createData" tabindex="-1" aria-labelledby="createDataModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createDataModal">Submit Leave Application: </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="leaveProcess.inc.php" method="POST">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <input type="hidden" class="form-control" name="Id" placeholder="Leave Id: ">
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="Name" placeholder="Employee Name: ">
                    </div>
                    <div class="form-group mb-3">
                        <select class="form-control" name="Type_of_leave" id="Type_of_leave">
                            <option value="">Select Type of Leave</option>
                            <option value="Annual Leave">Annual Leave</option>
                            <option value="Sick Leave">Sick Leave</option>
                            <option value="Maternity Leave">Maternity Leave</option>
                            <option value="Paternity Leave">Paternity Leave</option>
                            <option value="Parental Leave">Parental Leave</option>
                            <option value="Family and Medical Leave">Family and Medical Leave</option>
                            <option value="Jury Duty Leave">Jury Duty Leave</option>
                            <option value="Unpaid Leave">Unpaid Leave</option>
                            <option value="Compassionate Leave">Compassionate Leave</option>
                            <option value="Personal Leave">Personal Leave</option>
                            <option value="Emergency Leave">Emergency Leave</option>
                            <option value="Domestic Violence Leave">Domestic Violence Leave</option>
                            <option value="Election Leave">Election Leave</option>
                            <option value="Moving/Relocation Leave">Moving/Relocation Leave</option>
                            <option value="Religious/Cultural Leave">Religious/Cultural Leave</option>
                            <option value="Administrative Leave">Administrative Leave</option>
                            <option value="Disability Leave">Disability Leave</option>
                            <option value="Quarantine Leave">Quarantine Leave</option>
                            <option value="Travel Leave">Travel Leave</option>
                            <option value="Anniversary Leave">Anniversary Leave</option>
                            <option value="Charity Leave">Charity Leave</option>
                            <option value="Mental Health Leave">Mental Health Leave</option>
                            <option value="Dental Appointment Leave">Dental Appointment Leave</option>
                            <option value="Vision Appointment Leave">Vision Appointment Leave</option>
                            <option value="Community Service Leave">Community Service Leave</option>
                            <option value="Family Emergency Leave">Family Emergency Leave</option>
                            <option value="Funeral Leave">Funeral Leave</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="Start_date">Start Date: </label>
                        <input type="Date" class="form-control" name="Start_date" placeholder="Start Date: ">
                    </div>
                    <div class="form-group mb-3">
                    <label for="End_date">End Date: </label>
                        <input type="Date" class="form-control" name="End_date" placeholder="End Date: ">
                    </div>
                    <div class="form-group mb-3">
                        <textarea class="form-control" name="Description" id="Description" cols="18" rows="8" placeholder="Description: "></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <input type="hidden" class="form-control" name="Status" value="Pending">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="CreateLeaveData" class="btn btn-success">Submit</button>
                </div>
                    </form>
                </div>
            </div>
            </div>
    <div class="height-100">
      <div class="main">
        <div class="container-fluid">
          <div class="mb-3">
            <p class="fw-bold fs-2 my-3" style="text-align: center;">In-process Leave Requests</p>
          <button type="button" class="btn btn-success mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#createData">Add Leave Request </button>
            <!-- LIST INFOS START -->
            <div class="row">
              <div class="col-12">
                <table class="table table-striped">
                  <thead class="table-dark">
                    <tr class="highlight">
                    <th scope="col">Leave ID</th>
                                            <th scope="col">Employee Name</th>
                                            <th scope="col">Type of Leave</th>
                                            <th scope="col">Start Date</th>
                                            <th scope="col">End Date</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Status </th>
                    </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <?php
                                        if (mysqli_num_rows($result) > 0) {
                                        foreach($result as $employee) {
                                        ?>
                                        <tr>
                                        <td><?= $employee['Id']?> </td>
                                        <td><?= $employee['Name']?> </td>
                                        <td><?= $employee['Type_of_leave']?> </td>
                                        <td><?= $employee['Start_date']?> </td>
                                        <td><?= $employee['End_date']?> </td>
                                        <td><?= $employee['Description']?> </td>
                                        <td><?= $employee['Status']?> </td>
                                        </tr>
                                       <?php
                                            }
                                        }
                                        else {
                                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    <strong>Oh no!</strong> There is No Existing Leave Requests.
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