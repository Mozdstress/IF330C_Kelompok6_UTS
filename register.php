<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.3.54/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/form.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <title>Register</title>
</head>

<body>
    <div class="wrapper" style="background-image: url('images/bg-registration-form.jpg');">
        <div class="inner">
            <div class="image-holder">
                <img src="images/registration-form.jpg" alt="">
            </div>
            <form action="register_process.php" method="post">
                <h3>Registration Form</h3>
                <div class="form-group">
                    <input type="text" name="first_name" placeholder="First Name" class="form-control">
                    <input type="text" name="last_name" placeholder="Last Name" class="form-control">
                </div>
                <div class="form-wrapper">
                    <input type="text" name="username" placeholder="Username" class="form-control">
                    <i class="zmdi zmdi-account"></i>
                </div>
                <div class="form-wrapper">
                    <input type="text" name="email" placeholder="Email Address" class="form-control">
                    <i class="zmdi zmdi-email"></i>
                </div>
                <div class="form-wrapper">
                    <input type="date" name="birthdate" placeholder="Birthdate" class="form-control">
                    <i class="zmdi zmdi-calendar"></i>
                </div>
                <div class="form-wrapper">
                    <select name="gender" id="" class="form-control">
                        <option value="" disabled selected>Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                </div>
                <div class="form-wrapper">
                    <input type="password" name="password" placeholder="Password" class="form-control" id="passwordField">
                    <i class="zmdi zmdi-lock"></i>
                </div>
                <div class="form-wrapper" hidden>
                    <input type="text" name="role" value="Customer" class="form-control" readonly>
                    <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                </div>
                <button>Register
                    <i class="zmdi zmdi-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>
</body>

</html>