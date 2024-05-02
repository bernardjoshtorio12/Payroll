<?php
$EmailErr = $passwordErr = "";
$Email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["Email"])) {
        $EmailErr = "Email is required";
    }
    else {
        $Email = $_POST["Email"];   
    } 
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required"; 
    }
    else {
        $password = $_POST["password"]; 
    }
    if ($Email && $password){
        include("connections.php");
        $check_email = mysqli_query($connections, "SELECT * FROM login_tbl WHERE Email = '$Email'");
        $check_email_row = mysqli_num_rows($check_email);
        if ($check_email_row > 0) {
            while ($row = mysqli_fetch_assoc($check_email)) {
                $db_password = $row["password"];
                $db_account_type = $row["account_type"];
                if ($password == $db_password) {
                    if ($db_account_type == '1') {
                        header("Location: ../Admin/Dashboard.php");
                        exit;
                    } else {
                        header("Location: ../User/Dashboard.php");
                        exit;
                    } 
                } else {
                    $passwordErr = "Password is incorrect";
                }
            }
        } else {
            $EmailErr = "Email is not registered";
        }
    }
}
session_start();
$_SESSION['EmailErr'] = $EmailErr;
$_SESSION['passwordErr'] = $passwordErr;
header("Location: loginMain.php");
exit;
?>
