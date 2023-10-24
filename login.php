<?php
session_start();
require "captcha.php";
$PHPCAP = new Captcha();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.3.54/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/form.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <title>Login Page</title>
</head>

<body>
    <div class="wrapper" style="background-image: url('images/bg-registration-form.jpg');">
        <div class="inner">
            <div class="image-holder">
                <img src="images/registration-form.jpg" alt="">
            </div>
            <form action="login_process.php" method="post">
                <h3>Login Form</h3>
                <?php
                if (isset($_SESSION['login_error'])) {
                    echo '<p class="error-message">' . $_SESSION['login_error'] . '</p>';
                    unset($_SESSION['login_error']);
                }
                ?>
                <div class="form-wrapper">
                    <input type="text" name="username" placeholder="Username" class="form-control" required>
                    <i class="zmdi zmdi-account"></i>
                </div>
                <div class="form-wrapper">
                    <input type="password" name="password" placeholder="Password" class="form-control" required>
                    <i class="zmdi zmdi-lock"></i>
                </div>

                <!-- CAPTCHA -->
                <div class="form-wrapper">
                <label>Are you human?</label>
                <?php
                $PHPCAP->prime();
                $PHPCAP->draw();
                ?>
                <input type="text" name="captcha" required>
                </div>
                <!-- End CAPTCHA -->

                <button>Login
                    <i class="zmdi zmdi-arrow-right"></i>
                </button>
                <p>Don't Have an Account? <a href="register.php">Register Now</a></p>
            </form>
        </div>
    </div>
</body>

</html>