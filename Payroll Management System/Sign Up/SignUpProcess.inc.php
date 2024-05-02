<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "", "payroll", 3307);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = htmlspecialchars($_POST["Email"]);
    $Password = htmlspecialchars($_POST["password"]);
    $cpassword = htmlspecialchars($_POST["cpassword"]);
    $account_type = htmlspecialchars($_POST["account_type"]);

    if ($cpassword === $Password){
        if(empty($Email) || empty($Password) || empty($cpassword) || empty($account_type)) {
            $_SESSION['errorpo'] = "All fields are required";
            header("location: SignUpMain.php");
            $conn->close();
        }else {
            $query = "INSERT INTO login_tbl (email, password, account_type) 
            VALUES ('$Email', '$Password', '$account_type')";
            $query_run = mysqli_query($conn, $query);
            if($query_run) {
                $_SESSION['errorpo'] = "Account Successfully Registered";
                header("location: /Login/loginMain.php");
                $conn->close();
            }
        else {
            echo "Something went wrong!";
        }
        }
    }
    else {
        $_SESSION['errorpo'] = "Password did not match";
        header("location: SignUpMain.php");
        $conn->close();
    }
}