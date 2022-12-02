<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');


if (isset($_POST['draft'])) {

    $_SESSION["name"] = $_POST["visitorname"];
    $_SESSION["mobilenumber"] = $_POST["mobilenumber"];
    $_SESSION["apartmentno"] = $_POST["apartmentno"];
    $_SESSION["wing"] = $_POST["wing"];
    // $_SESSION["pov"] = $_POST["pov"];
    $_SESSION["whomtomeet"] = $_POST["whomtomeet"];

    // var_dump($_SESSION);
}

$error_vname = $error_apt = $error_del = $error_mob = $error_pov = $error_wing = $error_wtm = "";

if (isset($_POST["submit"])) {

    $err = false;
    $visitorname = $_POST['visitorname'];
    $mobilenumber = $_POST['mobilenumber'];
    $apartmentno = $_POST['apartmentno'];
    $wing = $_POST['wing'];
    $delivery = $_POST['delivery'];
    $purposeofvisit = $_POST['pov'];
    $whomtomeet = $_POST['whomtomeet'];

    if ($delivery == "Yes") {
        $purposeofvisit = "Product Delivery";
        // $err = True;
    }
    if ($visitorname == "") {
        $error_vname = "Visitor name cannot be empty";
        $err = True;
    }
    if ($mobilenumber == "" || $mobilenumber < 10) {
        $error_mob = "Enter valid mobile number with length greater than 10";
        $err = True;
    }
    if ($apartmentno == "") {
        $error_apt = "Enter apartment number you will be visiting";
        $err = True;
    }
    if ($wing == "") {
        $error_wing = "Select Wing";
        $err = True;
    }
    if ($delivery == "") {
        $error_del = "Select appropriate option. If No, enter purpose of visit";
        $err = True;
    }
    if ($delivery == "Yes") {
        $purposeofvisit = "Product Delivery";
    } elseif (($delivery == "No" && $purposeofvisit == "")) {
        $error_pov = "Enter purpose of visit";
        $err = True;
    }
    if ($whomtomeet == "") {
        // $err = True;
        $error_wtm = "Enter the person's name you wish to meet";
    } elseif (!$err) {
        $query = mysqli_query($con, "insert into tblvisitor(VisitorName,MobileNumber,FlatNumber,Wing,WhomToMeet,ReasonToMeet) value('$visitorname','$mobilenumber','$apartmentno','$wing','$whomtomeet','$purposeofvisit')");

        // $_SESSION["name"] = "";
        // $_SESSION["mobilenumber"] = "";
        // $_SESSION["apartmentno"] = "";
        // $_SESSION["wing"] = "";
        // $_SESSION["pov"] = "";
        // $_SESSION["whomtomeet"] = "";

        unset($_SESSION['name']);
        unset($_SESSION['mobilenumber']);
        unset($_SESSION['apartmentno']);
        unset($_SESSION['wing']);
        // unset($_SESSION['pov']);
        unset($_SESSION['whomtomeet']);

        if ($query) {
            $msg = "Added";
        } else {
            $msg = "Something Went Wrong. Please try again";
        }
    }
}


if (strlen($_SESSION['svmsaid'] == 0)) {
    header('location:logout.php');
} else {

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>New Visitor</title>
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

            h6 {
                color: red;
            }
        </style>
        <header>
            <?php include_once('includes/header.php'); ?>
        </header>

        <?php if (isset($_POST['draft'])) {
            echo '<div class="alert alert-warning text-center" role="alert">';
            echo '<strong>Draft Saved</strong>';
            echo '</div>';
        } ?>

        <?php if ($msg == "Added") {
            echo '<div class="alert alert-success text-center" role="alert">';
            echo '<strong>Visitor Information Added!</strong>';
            echo '</div>';
        } ?>
        <div class="main-content container mt-4 mb-4">
            <form class="p-3" action="" method="post">
                <legend class="text-center fs-2">New Visitor Form</legend>
                <hr>
                <div class="row mb-3">
                    <label for="visitorname" class="col-sm-3 col-form-label">Visitor Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control border-dark" id="visitorname" value="<?php if (isset($_SESSION["name"])) {
                                                                                                        echo $_SESSION["name"];
                                                                                                    } ?>" name="visitorname">
                        <?php echo "<h6>" . $error_vname . "</h6>"; ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="mobilenumber" class="col-sm-3 col-form-label">Mobile Number</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control border-dark" id="mobilenumber" name="mobilenumber" value="<?php if (isset($_SESSION["mobilenumber"])) {
                                                                                                                                echo $_SESSION["mobilenumber"];
                                                                                                                            } ?>">
                        <?php echo "<h6>" . $error_mob . "</h6>"; ?>
                    </div>
                </div>

                <div class="row mb-3">

                    <label for="apartmentno" class="col-sm-3 col-form-label">Apartment/Flat No.</label>
                    <div class="col-sm-9">
                        <select class="form-select border-dark" aria-label="" size="" name="apartmentno" id="apartmentno">
                            <option value="<?php if (isset($_SESSION["apartmentno"])) {
                                                echo $_SESSION["apartmentno"];
                                            } ?>" selected><?php if ($_SESSION["apartmentno"] != "") {
                                                                echo $_SESSION["apartmentno"];
                                                            } else {
                                                                echo "Select Apartment No.";
                                                            } ?></option>
                            <?php
                            for ($i = 100; $i <= 800; $i = $i + 100) {
                                for ($j = 1; $j <= 3; $j++) {
                                    echo '<option value="' . $i + $j . '">' . $i + $j . '</option>';
                                }
                            }
                            ?>
                        </select>

                        <!-- <label for="apartmentno" class="col-sm-3 col-form-label">Apartment/Flat No.</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control border-dark" id="apartmentno" name="apartmentno"> -->
                        <?php echo "<h6>" . $error_apt . "</h6>"; ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="wing" class="col-sm-3 col-form-label">Wing</label>
                    <div class="col-sm-9">
                        <select class="form-select border-dark" id="wing" name="wing" aria-label="">
                            <option value="<?php if (isset($_SESSION["wing"])) {
                                                echo $_SESSION["wing"];
                                            } ?>" selected> <?php if ($_SESSION["wing"] != "") {
                                                                echo $_SESSION["wing"];
                                                            } else {
                                                                echo "Select Wing";
                                                            } ?></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                        <!-- <input type="text" class="form-control border-dark" id="wing" name="wing"> -->
                        <?php echo "<h6>" . $error_wing . "</h6>"; ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="pov" class="col-sm-3 col-form-label">Product Delivery?</label>
                    <div class="col-sm-9">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="delivery" id="yes" value="Yes">
                            <label class="form-check-label" for="yes">
                                Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="delivery" id="no" value="No">
                            <label class="form-check-label" for="no">
                                No
                            </label>
                        </div>
                        <?php echo "<h6>" . $error_del . "</h6>"; ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="pov" class="col-sm-3 col-form-label">Purpose of Visit</label>
                    <div class="col-sm-9">
                        <textarea class="form-control border-dark" placeholder="If Product Delivery, then leave Blank" name="pov" id="pov" cols="30" rows="10"></textarea>
                        <?php echo "<h6>" . $error_pov . "</h6>"; ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="whomtomeet" class="col-sm-3 col-form-label">Whom to Meet</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control border-dark" id="whomtomeet" name="whomtomeet" value="<?php if (isset($_SESSION["whomtomeet"])) {
                                                                                                                            echo $_SESSION["whomtomeet"];
                                                                                                                        } ?>">
                        <?php echo "<h6>" . $error_wtm . "</h6>"; ?>
                    </div>
                </div>
                <div class="row">

                    <!-- <div class="col-sm-5"></div> -->
                    <button type="submit" class="btn btn-primary col-sm-2 offset-sm-5 fs-4" name="submit">Add
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="8.5" cy="7" r="4"></circle>
                            <line x1="20" y1="8" x2="20" y2="14"></line>
                            <line x1="23" y1="11" x2="17" y2="11"></line>
                        </svg>
                    </button>
                    <!-- <div class="col-sm-5"></div> -->
                </div>
                <hr>
                <button type="submit" name="draft" class="btn btn-secondary col-sm-2 offset-sm-5 fs-4">Save Draft</button>
            </form>
        </div>



        </div>
        <footer>
            <?php include_once('includes/footer.php'); ?>
        </footer>

    </body>

    </html>

<?php } ?>