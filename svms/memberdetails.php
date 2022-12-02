<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['svmsaid'] == 0)) {
    header('location:logout.php');
} else {

    if (isset($_POST['submit'])) {
        $adminid = $_SESSION['svmsaid'];
        $editid = $_GET['editid'];
        $membername = $_POST['membername'];
        $mobno = $_POST['mobilenumber'];
        $totfamnum = $_POST['totfamnum'];

        $query = mysqli_query($con, "update tblmember set Name='$membername', ContactNumber ='$mobno', TotFamNumber='$totfamnum' where ID='$editid';");
        if ($query) {
            $msg = "Member profile has been updated.";
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <title>Member Details</title>
    </head>
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

    <body>
        <?php include_once('includes/header.php'); ?>

        <?php

        if (isset($_POST['submit'])) {
            echo "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>";
            echo "<strong>$msg</strong>";
            echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        }


        ?>
        <div class="main-content container mt-4 mb-4">

            <?php

            $adminid = $_SESSION['svmsaid'];
            $editid = $_GET['editid'];
            $ret = mysqli_query($con, "select * from tblmember where ID='$editid'");
            $cnt = 1;
            while ($row = mysqli_fetch_array($ret)) {

            ?>
                <form class="p-3" action="" method="post">
                    <legend class="text-center fs-2">Update Society Member's Profile</legend>
                    <hr>
                    <div class="row mb-3">
                        <label for="adminname" class="col-sm-3 col-form-label">Member Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control border-dark" value="<?php echo $row['Name']; ?>" id="membername" name="membername">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="mobilenumber" class="col-sm-3 col-form-label">Mobile Number</label>
                        <div class="col-sm-9">
                            <input type="tel" class="form-control border-dark" value="<?php echo $row['ContactNumber']; ?>" id="mobilenumber" name="mobilenumber">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-sm-3 col-form-label">Total Family Members</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control border-dark" id="totfamnum" name="totfamnum" value="<?php echo $row['TotFamNumber']; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="username" class="col-sm-3 col-form-label">Apartment Number</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control border-dark" id="aptnum" name="aptnum" disabled value="<?php echo $row['AptNumber']; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="whomtomeet" class="col-sm-3 col-form-label">Wing</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control border-dark" disabled value="<?php echo $row['Wing']; ?>" id="wing" name="wing">
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
        <?php include_once('includes/footer.php'); ?>

    </body>

    </html>


<?php } ?>