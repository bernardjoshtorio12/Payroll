<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "payroll", 3307);
if (isset($_POST['saveData'])) {
    $Fname = $_POST['Fname'];
    $Mname = $_POST['Mname'];
    $Lname = $_POST['Lname'];
    $Email = $_POST['Email'];
    $Contact = $_POST['Contact'];
    $Hiredate = $_POST['Hiredate'];
    $Dept = $_POST['Dept'];
    $Role = $_POST['Role'];
    $Birthdate = $_POST['Birthdate'];

    if (empty($Fname) || empty($Lname) || empty($Email) || empty($Contact) || 
        empty($Hiredate) || empty($Dept) || empty($Role) || empty($Birthdate)) {
        
        $_SESSION['saveStatus'] = "All fields are required!";
        $_SESSION['saveStatus_code'] = "warning"; 
    } else {
        $query = "INSERT INTO employee_records (Fname, Mname, Lname, Email, Contact, Hiredate, Dept, Role, Birthdate) 
                  VALUES('$Fname', '$Mname', '$Lname', '$Email', '$Contact', '$Hiredate', '$Dept', '$Role', '$Birthdate')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            $_SESSION['saveStatus'] = "New Employee Added Successfully!";
            $_SESSION['saveStatus_code'] = "success";
        } else {
            $_SESSION['saveStatus'] = "Unable to Complete Employee Registration!";
            $_SESSION['saveStatus_code'] = "error";
        }
    }
    header("location: addEmployee.php");
    exit(); 
}
if(isset($_POST['view_btn'])) {
    $id = $_POST['user_id'];

    $query = "SELECT * FROM  employee_records WHERE Id='$id'";
    $fetch_query_run = mysqli_query($conn, $query);
    if (mysqli_num_rows($fetch_query_run) > 0) {
        while($row = mysqli_fetch_array($fetch_query_run)){
            echo '
            <h6><strong>ID: </strong>'.$row['Id'].'</h6>
            <h6><strong>Employee Full Name: </strong>' . $row['Fname'] . " " 
            . $row['Mname'] . " " . $row['Lname'].'</h6>
            <h6><strong>Employee Email Address: </strong>'.$row['Email'].'</h6>
            <h6><strong>Employee Contact#: </strong>'.$row['Contact'].'</h6>
            <h6><strong>Employee Hire Date: </strong>'.$row['Hiredate'].'</h6>
            <h6><strong>Employee Department: </strong>'.$row['Dept'].'</h6>
            <h6><strong>Employee Role: </strong>'.$row['Role'].'</h6>
            <h6><strong>Employee Birth Date: </strong>'.$row['Birthdate'].'</h6>
        ';
        }
    }
    else {
        echo $result = "<h6>No Record Found</h6>";
    }  
}
if(isset($_POST['edit-btn'])) {
    $id = $_POST['user_id'];
    $arrayresult = [];
    $query = "SELECT * FROM  employee_records WHERE Id='$id'";
    $fetch_query_run = mysqli_query($conn, $query);
    if (mysqli_num_rows($fetch_query_run) > 0) {
        while($row = mysqli_fetch_array($fetch_query_run)){
            array_push($arrayresult, $row);
            header('content-type: application/json');
            echo json_encode($arrayresult);
        }
    }
    else {
        echo $result = "<h6>No Record Found</h6>";
    }  
}
if(isset($_POST['updateData'])) {
    $Id = $_POST['Id'];
    $Fname = $_POST['Fname'];
    $Mname = $_POST['Mname'];
    $Lname = $_POST['Lname'];
    $Email = $_POST['Email'];
    $Contact = $_POST['Contact'];
    $Hiredate = $_POST['Hiredate'];
    $Dept = $_POST['Dept'];
    $Role = $_POST['Role'];
    $Birthdate = $_POST['Birthdate'];

    $update_query = "UPDATE employee_records SET Fname='$Fname',  Mname='$Mname', Lname='$Lname', 
    Email='$Email',  Contact='$Contact', Hiredate='$Hiredate', Dept='$Dept',  Role='$Role', Birthdate='$Birthdate' 
    WHERE Id='$Id' ";
    $update_query_run = mysqli_query($conn, $update_query);

    if($update_query_run) {
        $_SESSION['updateStatus'] = "Employee Details Updated Successfully!";
        $_SESSION['updateStatus_code'] = "success";
        header("location: view.php");
        $conn->close();
    }else {
        $_SESSION['updateStatus'] = "Employee Details Update Failed!";
        $_SESSION['updateStatus_code'] = "error";
        header("location: view.php");
        $conn->close();
    }
}
if(isset($_POST['delete_btn'])) {
    $Id = $_POST['user_id'];
    $delete_query = "DELETE FROM employee_records WHERE Id='$Id'";
    $delete_query_run = mysqli_query($conn, $delete_query);
    if ($delete_query_run) {
        $_SESSION['delete_message'] = "Employee Successfully Deleted!";
        $_SESSION['delete_message_code'] = "success";
    } else {
        $_SESSION['delete_message'] = "Employee Deletion Failed!";
        $_SESSION['delete_message_code'] = "error";
    }
}
if(isset($_POST['approve-btn'])) {
    $Id = $_POST['user_id'];
    $approve_query = "UPDATE user_leave_requests SET Status='Approved' WHERE Id='$Id' ";
    $approve_query_run = mysqli_query($conn, $approve_query);
    if($approve_query_run) {
        $_SESSION['approve'] = "Request Approved Successfully!";
        $_SESSION['approve_code'] = "success";
    }
}
if(isset($_POST['decline-btn'])) {
    $Id = $_POST['user_id'];
    $decline_query = "UPDATE user_leave_requests SET Status='Declined' WHERE Id='$Id' ";
    $decline_query_run = mysqli_query($conn, $decline_query);
    if($decline_query_run) {
        $_SESSION['decline'] = "Request Rejected!";
        $_SESSION['decline_code'] = "info";
    }
}

