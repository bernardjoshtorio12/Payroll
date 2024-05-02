<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="assets/logo.png">
    <link rel="stylesheet" href="assets/style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
       <div class="box">
       <?php
        if (isset($_SESSION['errorpo'])) {
            ?>
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
             <?php echo "<strong>" . $_SESSION['errorpo'] . "!" . "</strong>"; ?>
            </div> 
            <?php
            unset($_SESSION['errorpo']);
        }
        ?>
        <div class="header">
            <p>Login</p>
        </div>
        <form action="loginProcess.inc.php" method="POST">
        <div class="input-box">
                <label for="email">Email</label>
                <input type="text" name="Email" class="input-field" id="email">
                <i class="bx bx-envelope"></i>
                <span class="errorMessage"><?php echo isset($_SESSION['EmailErr']) ? $_SESSION['EmailErr'] : ''; ?></span>
            </div>
            <div class="input-box">
                <label for="pass">Password</label>
                <input type="password" name="password" class="input-field" id="pass">
                <i class="bx bx-lock"></i>
                <span class="errorMessage"><?php echo isset($_SESSION['passwordErr']) ? $_SESSION['passwordErr'] : ''; ?></span>
            </div>
            <div class="input-box">
                <input type="submit" class="input-submit" value="LOGIN">
            </div>
            <div class="bottom">
                <span><a href="../Sign Up/SignUpMain.php">Sign Up</a></span>
                <span><a href="#">Forgot Password?</a></span>
            </div>
        </form>
       </div>
       <div class="wrapper"></div>
    </div>
</body>
</html>