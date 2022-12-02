<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (isset($_POST['login'])) {
    $adminuser = $_POST['username'];
    $password = sha1($_POST['password']);
    $query = mysqli_query($con, "select ID from tbladmin where  UserName='$adminuser' && Password='$password' ");
    $ret = mysqli_fetch_array($query);
    echo $ret;
    if ($ret > 0) {
        $_SESSION['svmsaid'] = $ret['ID'];
        header('location:dashboard.php');
    } else {
        $msg = "Invalid. Enter Correct details.";
    }
}

if (isset($_POST['set'])) {
    setcookie("theme", $_POST['theme'], time() + (86400 * 30), "/"); // 86400 = 1 day
    header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SVMS Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<style>
    * {
        margin: 0;
        box-sizing: border-box;
    }

    body {
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login {
        width: 450px;
        height: min-content;
        padding: 24px;
        border-radius: 15px;
        background: #ffffff;
    }

    .login h1 {
        font-size: 28px;
        margin-bottom: 25px;
        font-weight: bold;
    }

    .login form {
        font-size: 20px;
    }

    .login form .form-group {
        margin-bottom: 12px;
    }

    .login form input[type="submit"] {
        font-size: 20px;
        margin-top: 15px;
    }

    .table-fit {
        white-space: nowrap;
        width: 1%;
    }
</style>

<body style="background-color: <?php if (isset($_COOKIE['theme'])) {
                                    echo $_COOKIE['theme'];
                                } ?>;">
    <div class="login" style="background-color: #ededed;">

        <h1 class="text-center">Society Visitor Management System Login</h1>
        <?php
        if ($msg) {

            echo '<div class="alert alert-warning text-center" role="alert">Invalid login - Enter Correct Details.</div>';
        }
        ?>
        <form class="needs-validation" action="" method="POST" name="login">

            <div class="form-group was-validated">
                <label class="form-label" for="username">Username</label>
                <input class="form-control" type="username" id="username" name="username" required>
                <div class="invalid-feedback">
                    Please enter your email address
                </div>
            </div>

            <div class="form-group was-validated">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password" required>
                <div class="invalid-feedback">
                    Please enter your password
                </div>
            </div>

            <button class="btn btn-success w-100" type="submit" name="login">SIGN IN</button>

        </form>

        <form class="form-group mt-4 d-flex justify-content-end" action="" method="post">

            <select name="theme" id="theme" style="margin-right: 5px;">
                <optgroup label="Theme">
                    <option value="#dbdbdb">Light</option>
                    <option value="#333333">Dark</option>
                </optgroup>
            </select>
            <button class="btn-sm btn-success fs-6" type="submit" name="set">SET</button>
        </form>
    </div>

</body>

</html>