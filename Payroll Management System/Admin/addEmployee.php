<?php
include("assets/include/header.php");
include("handler.inc.php");
$query = "SELECT * FROM  employee_records";
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
              <span class="nav_name">Admin Dashboard</span>
            </a>

            <a href="addEmployee.php" class="nav_link active">
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
    <div class="modal fade" id="insertData" tabindex="-1" aria-labelledby="insertDataModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title fs-5" id="insertDataModal">Kindly fill out the form: </p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="handler.inc.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="Fname" placeholder="First Name">
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="Mname" placeholder="Middle Name">
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="Lname" placeholder="Last Name">
                        </div>
                        <div class="form-group mb-3">
                            <input type="email" class="form-control" name="Email" placeholder="Email Address">
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="Contact" placeholder="Contact">
                        </div>
                        <div class="form-group mb-3">
                            <label for="Hiredate"><strong>Hire Date: </strong> </label>
                            <input type="date" class="form-control" name="Hiredate" placeholder="Hire Date">
                        </div>
                        <div class="form-group mb-3">
                            <select class="form-control" name="Dept" id="department">
                                <option value="">Select Department</option>
                                 <!-- Human Resources (HR) -->
                                <option value="Human Resources (HR)">Human Resources (HR)</option>
                                <!-- Finance/Accounting -->
                                <option value="Finance/Accounting">Finance/Accounting</option>
                                <!-- Marketing -->
                                <option value="Marketing">Marketing</option>
                                <!-- Sales -->
                                <option value="Sales">Sales</option>
                                <!-- Operations -->
                                <option value="Operations">Operations</option>
                                <!-- Information Technology (IT) -->
                                <option value="Information Technology (IT)">Information Technology (IT)</option>
                                <!-- Customer Service/Support -->
                                <option value="Customer Service/Support">Customer Service/Support</option>
                                <!-- Research and Development (R&D) -->
                                <option value="Research and Development (R&D)">Research and Development (R&D)</option>
                                <!-- Production/Manufacturing -->
                                <option value="Production/Manufacturing">Production/Manufacturing</option>
                                <!-- Quality Assurance/Quality Control (QA/QC) -->
                                <option value="Quality Assurance/Quality Control (QA/QC)">Quality Assurance/Quality Control (QA/QC)</option>
                                <!-- Administration -->
                                <option value="Administration">Administration</option>
                                <!-- Legal -->
                                <option value="Legal">Legal</option>
                                <!-- Procurement/Purchasing -->
                                <option value="Procurement/Purchasing">Procurement/Purchasing</option>
                                <!-- Logistics/Supply Chain -->
                                <option value="Logistics/Supply Chain">Logistics/Supply Chain</option>
                                <option value="Engineering">Engineering</option>
                                <!-- Engineering -->
                                <option value="Design/Graphics">Design/Graphics</option>
                                <!-- Design/Graphics -->
                                <option value="Public Relations (PR)">Public Relations (PR)</option>
                                <!-- Public Relations (PR) -->
                                <option value="Compliance/Risk Management">Compliance/Risk Management</option>
                                <!-- Compliance/Risk Management -->
                                <option value="Training and Development">Training and Development</option>
                                <!-- Training and Development -->
                                <option value="Health and Safety">Health and Safety</option>
                                <!-- Health and Safety -->
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <select class="form-control" name="Role" id="role">
                                <option value="">Select Role</option>
                                <!-- Human Resources (HR) -->
                                <option value="HR Manager">HR Manager</option>
                                <option value="Recruitment Specialist">Recruitment Specialist</option>
                                <option value="Training Coordinator">Training Coordinator</option>
                                <option value="Compensation and Benefits Analyst">Compensation and Benefits Analyst</option>
                                <option value="HR Generalist">HR Generalist</option>
                                
                                <!-- Finance/Accounting -->
                                <option value="Accountant">Accountant</option>
                                <option value="Financial Analyst">Financial Analyst</option>
                                <option value="Chief Financial Officer (CFO)">Chief Financial Officer (CFO)</option>
                                <option value="Auditor">Auditor</option>
                                <option value="Bookkeeper">Bookkeeper</option>
                                
                                <!-- Marketing -->
                                <option value="Marketing Manager">Marketing Manager</option>
                                <option value="Digital Marketer">Digital Marketer</option>
                                <option value="Brand Manager">Brand Manager</option>
                                <option value="Market Research Analyst">Market Research Analyst</option>
                                <option value="Content Creator">Content Creator</option>
                                
                                <!-- Sales -->
                                <option value="Sales Representative">Sales Representative</option>
                                <option value="Sales Manager">Sales Manager</option>
                                <option value="Account Executive">Account Executive</option>
                                <option value="Business Development Manager">Business Development Manager</option>
                                <option value="Sales Support Specialist">Sales Support Specialist</option>
                                
                                <!-- Operations -->
                                <option value="Operations Manager">Operations Manager</option>
                                <option value="Operations Analyst">Operations Analyst</option>
                                <option value="Supply Chain Manager">Supply Chain Manager</option>
                                <option value="Production Planner">Production Planner</option>
                                <option value="Inventory Controller">Inventory Controller</option>
                                
                                <!-- Information Technology (IT) -->
                                <option value="IT Manager">IT Manager</option>
                                <option value="Software Developer">Software Developer</option>
                                <option value="Network Administrator">Network Administrator</option>
                                <option value="Systems Analyst">Systems Analyst</option>
                                <option value="Cybersecurity Specialist">Cybersecurity Specialist</option>
                                
                                <!-- Customer Service/Support -->
                                <option value="Customer Service Representative">Customer Service Representative</option>
                                <option value="Technical Support Specialist">Technical Support Specialist</option>
                                <option value="Call Center Supervisor">Call Center Supervisor</option>
                                <option value="Customer Success Manager">Customer Success Manager</option>
                                <option value="Help Desk Analyst">Help Desk Analyst</option>
                                
                                <!-- Research and Development (R&D) -->
                                <option value="Research Scientist">Research Scientist</option>
                                <option value="R&D Engineer">R&D Engineer</option>
                                <option value="Product Developer">Product Developer</option>
                                <option value="Research Analyst">Research Analyst</option>
                                <option value="Lab Technician">Lab Technician</option>
                                
                                <!-- Production/Manufacturing -->
                                <option value="Production Supervisor">Production Supervisor</option>
                                <option value="Manufacturing Engineer">Manufacturing Engineer</option>
                                <option value="Assembly Line Worker">Assembly Line Worker</option>
                                <option value="Quality Control Inspector">Quality Control Inspector</option>
                                <option value="Plant Manager">Plant Manager</option>
                                
                                <!-- Quality Assurance/Quality Control (QA/QC) -->
                                <option value="Quality Assurance Engineer">Quality Assurance Engineer</option>
                                <option value="QA Tester">QA Tester</option>
                                <option value="Quality Control Inspector">Quality Control Inspector</option>
                                <option value="QA Manager">QA Manager</option>
                                <option value="Compliance Officer">Compliance Officer</option>
                                
                                <!-- Administration -->
                                <option value="Administrative Assistant">Administrative Assistant</option>
                                <option value="Office Manager">Office Manager</option>
                                <option value="Executive Assistant">Executive Assistant</option>
                                <option value="Administrative Coordinator">Administrative Coordinator</option>
                                <option value="Receptionist">Receptionist</option>
                                
                                <!-- Legal -->
                                <option value="Lawyer">Lawyer</option>
                                <option value="Legal Assistant">Legal Assistant</option>
                                <option value="Paralegal">Paralegal</option>
                                <option value="Legal Counsel">Legal Counsel</option>
                                <option value="Compliance Officer">Compliance Officer</option>
                                
                                <!-- Procurement/Purchasing -->
                                <option value="Purchasing Manager">Purchasing Manager</option>
                                <option value="Procurement Specialist">Procurement Specialist</option>
                                <option value="Buyer">Buyer</option>
                                <option value="Supply Chain Analyst">Supply Chain Analyst</option>
                                <option value="Vendor Manager">Vendor Manager</option>
                                
                                <!-- Logistics/Supply Chain -->
                                <option value="Logistics Coordinator">Logistics Coordinator</option>
                                <option value="Supply Chain Manager">Supply Chain Manager</option>
                                <option value="Warehouse Supervisor">Warehouse Supervisor</option>
                                <option value="Distribution Manager">Distribution Manager</option>
                                <option value="Freight Broker">Freight Broker</option>
                                
                                <!-- Engineering -->
                                <option value="Mechanical Engineer">Mechanical Engineer</option>
                                <option value="Electrical Engineer">Electrical Engineer</option>
                                <option value="Civil Engineer">Civil Engineer</option>
                                <option value="Software Engineer">Software Engineer</option>
                                <option value="Aerospace Engineer">Aerospace Engineer</option>
                                
                                <!-- Design/Graphics -->
                                <option value="Graphic Designer">Graphic Designer</option>
                                <option value="UI/UX Designer">UI/UX Designer</option>
                                <option value="Art Director">Art Director</option>
                                <option value="Web Designer">Web Designer</option>
                                <option value="Multimedia Artist">Multimedia Artist</option>
                                
                                <!-- Public Relations (PR) -->
                                <option value="Public Relations Specialist">Public Relations Specialist</option>
                                <option value="PR Manager">PR Manager</option>
                                <option value="Communications Coordinator">Communications Coordinator</option>
                                <option value="Media Relations Specialist">Media Relations Specialist</option>
                                <option value="Social Media Manager">Social Media Manager</option>
                                
                                <!-- Compliance/Risk Management -->
                                <option value="Compliance Officer">Compliance Officer</option>
                                <option value="Risk Manager">Risk Manager</option>
                                <option value="Regulatory Affairs Specialist">Regulatory Affairs Specialist</option>
                                <option value="Compliance Analyst">Compliance Analyst</option>
                                <option value="Internal Auditor">Internal Auditor</option>
                                
                                <!-- Training and Development -->
                                <option value="Training Manager">Training Manager</option>
                                <option value="Learning and Development Specialist">Learning and Development Specialist</option>
                                <option value="Corporate Trainer">Corporate Trainer</option>
                                <option value="Instructional Designer">Instructional Designer</option>
                                <option value="Training Coordinator">Training Coordinator</option>

                                 <!-- Health and Safety -->
                                <option value="Health and Safety Officer">Health and Safety Officer</option>
                                <option value="Environmental Health Specialist">Environmental Health Specialist</option>
                                <option value="Safety Coordinator">Safety Coordinator</option>
                                <option value="Occupational Health Nurse">Occupational Health Nurse</option>
                                <option value="Ergonomics Specialist">Ergonomics Specialist</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                        <label for="Birthdate" ><strong>Birth Date: </strong></label>
                            <input type="date" class="form-control" name="Birthdate" placeholder="Birth Date">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="saveData" class="btn btn-success">Submit</button>
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
            <p class="fw-bold fs-4 my-3" style="text-align: center;">Staff Catalog </p>
            <div class="row">
              <div class="col-12">
                <table class="table table-striped">
                  <thead class="table-dark">
                    <tr class="highlight">
                    <th scope="col">Employee ID</th>
                    <th scope="col">Employee Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Birthdate</th>
                    <th scope="col">Department</th>
                    <th scope="col">Role</th>
                    <th scope="col">Hire Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                          if (mysqli_num_rows($result) > 0) {
                          foreach($result as $employee) {
                          ?>
                          <tr>
                          <td><?= $employee['Id']?> </td>
                          <td><?= $employee['Fname'] . " " . $employee['Mname'] ." " .  $employee['Lname']?> </td>
                          <td><?= $employee['Email']?> </td>
                          <td><?= $employee['Birthdate']?> </td>
                          <td><?= $employee['Dept']?> </td>
                          <td><?= $employee['Role']?> </td>
                          <td><?= $employee['Hiredate']?> </td>
                          </tr>
                          <?php
                          }
                          }
                          else {
                          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <strong>Oh no!</strong> There is No Existing Employee.
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                          }                                       
                          ?>
                  </tbody>
                </table>
              </div>
            </div>
             <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mt-0 mb-2" data-bs-toggle="modal" data-bs-target="#insertData"> Create Employee Profile </button>
            
        </main>
      </div>
      <!--Container Main end-->
<?php
include("assets/include/footer.php");
?>