<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');


if (strlen($_SESSION['svmsaid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $adminid = $_SESSION['svmsaid'];
        $AName = $_POST['adminname'];
        $mobno = $_POST['mobilenumber'];
        $email = $_POST['email'];

        $query = mysqli_query($con, "update tbladmin set AdminName='$AName', MobileNumber ='$mobno', Email= '$email' where ID='$adminid'");
        if ($query) {
            $msg = "Admin profile has been updated.";
        } else {
            $msg = "Something Went Wrong. Please try again.";
        }
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Profile</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </head>

    <body>
        <style>
            input[type=number]::-webkit-inner-spin-button,
            input[type=number]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            .main-content {
                margin: 0 auto;
                background-color: #efefef;
                border-radius: 25px;
                font-size: 1.3rem;
            }
        </style>
        <header>
            <?php include_once('includes/header.php'); ?>
        </header>

        <div class="main-content container mt-4 mb-4">

            <?php
            if (isset($_POST['submit'])) {
                echo "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>";
                echo "Admin Profile <strong>Updated</strong>";
                echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            }
            $adminid = $_SESSION['svmsaid'];
            $ret = mysqli_query($con, "select * from tbladmin where ID='$adminid'");
            $cnt = 1;
            while ($row = mysqli_fetch_array($ret)) {

            ?>
                <form class="p-3" action="" method="post">
                    <legend class="text-center fs-2">Update Admin Profile</legend>
                    <hr>
                    <div class="row mb-3">
                        <label for="adminname" class="col-sm-3 col-form-label">Admin Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control border-dark" value="<?php echo $row['AdminName']; ?>" id="adminname" name="adminname">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="mobilenumber" class="col-sm-3 col-form-label">Mobile Number</label>
                        <div class="col-sm-9">
                            <input type="tel" class="form-control border-dark" value="<?php echo $row['MobileNumber']; ?>" id="mobilenumber" name="mobilenumber">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control border-dark" id="email" name="email" value="<?php echo $row['Email']; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="username" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control border-dark" id="username" name="username" disabled value="<?php echo $row['UserName']; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="whomtomeet" class="col-sm-3 col-form-label">Registration Date</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control border-dark" disabled value="<?php echo $row['AdminRegdate']; ?>" id="whomtomeet" name="whomtomeet">
                        </div>
                    </div>
                <?php } ?>

                <div class="row">

                    <!-- <div class="col-sm-5"></div> -->
                    <button type="submit" name="submit" class="btn btn-primary col-sm-2 offset-sm-5 fs-4">Update</button>
                    <!-- <div class="col-sm-5"></div> -->
                </div>

                </form>
        </div>



        </div>
        <footer>
            <?php include_once('includes/footer.php'); ?>
        </footer>

    </body>

    </html>

<?php } ?>