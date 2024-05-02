<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="assets/logo.png">
    <link rel="stylesheet" href="assets/style.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="container">
       <div class="box">
        <?php
        if (isset($_SESSION['errorpo'])) {
            ?>
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
             <?php echo "<strong>" . $_SESSION['errorpo'] . "!" . "</strong>"; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> 
            <?php
            unset($_SESSION['errorpo']);
        }
        ?>
        <div class="header">
            <p>Sign Up</p>
        </div>
        <form action="SignUpProcess.inc.php" method="POST">
        <div class="input-box">
                <label for="email">Email: </label>
                <input type="text" name="Email" class="input-field" id="email">
                <i class="bx bx-envelope"></i>
            </div>
            <div class="input-box">
                <label for="pass">Password: </label>
                <input type="password" name="password" class="input-field" id="pass">
                <i class="bx bx-lock"></i>
            </div>
            <div class="input-box">
                <label for="pass">Confirm Password: </label>
                <input type="password" name="cpassword" class="input-field" id="pass2">
                <i class="bx bx-lock"></i>
            </div>
            <div class="input-box">
                <label for="account_type">Account Type (1-10): </label>
                <input type="text" name="account_type" class="input-field" id="account_type">
                <i class="bx bx-lock"></i>
            </div>
            <div class="input-box">
                <input type="submit" class="input-submit" value="SIGN UP">
            </div>
            <div class="bottom">
                <span><a href="../Login/loginMain.php">Login</a></span>
                <span><a href="#">Forgot Password?</a></span>
            </div>
        </form>
       </div>
       <div class="wrapper"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>