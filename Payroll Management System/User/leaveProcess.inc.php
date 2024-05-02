<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "payroll", 3307);
$query = "SELECT * FROM  user_leave_requests";
if (isset($_POST['CreateLeaveData'])) {
    $Id = $_POST['Id'];
    $Name = $_POST['Name'];
    $Type_of_leave = $_POST['Type_of_leave'];
    $Start_date = $_POST['Start_date'];
    $End_date = $_POST['End_date'];
    $Description = $_POST['Description'];
    $Status = $_POST['Status'];

    if (empty($Name) || empty($Type_of_leave) || empty($Start_date) || empty($End_date) || 
    empty($Description) || empty($Status) ) {
        $_SESSION['leaveStatus'] = "All fields are required!";
        $_SESSION['leaveStatus_code'] = "warning"; 
        header("location: createLeave.php");
        $conn->close();
    } else {
    $query = "INSERT INTO user_leave_requests (Id, Name, Type_of_leave, Start_date, End_date, Description, Status) 
    VALUES('$Id', '$Name', '$Type_of_leave', '$Start_date', '$End_date', '$Description', '$Status')";
    $query_run = mysqli_query($conn, $query);
    if($query_run) {
        $_SESSION['leaveStatus'] = "Request Successfully Submitted";
        $_SESSION['leaveStatus_code'] = "success";
        header("location: createLeave.php");
        $conn->close();
    }else {
        $_SESSION['leaveStatus'] = "Request Submission Failed";
        $_SESSION['leaveStatus_code'] = "error";
        header("location: createLeave.php");
        $conn->close();
        }
    }
}
