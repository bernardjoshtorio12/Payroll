<?php
$connections = mysqli_connect("localhost", "root", "", "payroll", 3307);
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else {  
    echo "Connected Successfully"; 
}
?>
