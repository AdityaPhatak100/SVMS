<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');


if (strlen($_SESSION['svmsaid'] == 0)) {
    header('location:logout.php');
} else {

    if (isset($_POST['add'])) {

        $cvmsaid = $_SESSION['cvmsaid'];
        $gname = $_POST['guestname'];
        $wing = $_POST['wing'];
        $flatno = $_POST['flatno'];

        // $query = mysqli_query($con, "insert into tblguest(GuestName,Wing,FlatNumber) value('$gname','$wing','$flatno')");
        $query = "insert into tblvisitor(VisitorName,FlatNumber,Wing,ReasonToMeet) value('$gname','$flatno','$wing','Expected Guest');";
        $query .= "insert into tblguest(ID,GuestName,Wing,FlatNumber) value((select ID from tblvisitor order by ID desc limit 1),'$gname','$wing','$flatno');";
        $mysql_query = mysqli_multi_query($con, $query);

        if ($mysql_query) {
            $msg = "Guest Details has been added.";
        } else {
            $msg = "Something Went Wrong. Please try again";
        }

        header('location:expectingguests.php');
    }
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Guests</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </head>
    <style>
        .border-curve {
            background-color: #efefef;
            border-radius: 25px;
            font-size: 1.3rem;
        }
    </style>

    <body>

        <header>
            <?php include_once('includes/header.php'); ?>
        </header>

        <div class="main-content container mt-4 mb-4">
            <?php if (isset($msg)) {
                echo $msg;
            } ?>
            <table class="table table-striped" style="background-color: white;">
                <thead class="table-dark fs-5 text-center">
                    <th scope="col">Sr. No.</th>
                    <th scope="col">Wing</th>
                    <th scope="col">Apartment No.</th>
                    <th scope="col">Guest Name</th>
                </thead>
                <?php
                $ret = mysqli_query($con, "select *from tblguest");
                $cnt = 1;

                while ($row = mysqli_fetch_array($ret)) {

                ?>

                    <tr class="fs-5">
                        <td class="text-center"><?php echo $cnt; ?></td>
                        <td class="text-center"><?php echo $row['Wing']; ?></td>
                        <td class="text-center"><?php echo $row['FlatNumber']; ?></td>
                        <td class="text-center"><?php echo $row['GuestName']; ?></td>
                        <!-- <td><a href="visitor-detail.php?editid=<?php echo $row['ID']; ?>" title="View Full Details"><i class="fa fa-edit fa-1x"></i></a></td> -->
                    </tr>
                <?php
                    $cnt = $cnt + 1;
                } ?>
            </table>

            <hr>
            <form class="p-3 needs-validation border-curve" action="" method="post" style="background-color: white;">
                <legend class="text-center fs-2">Add New Guest</legend>
                <hr>
                <div class="row mb-3 was-validated">
                    <label for="guestname" class="col-sm-3 col-form-label">Guest Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control border-dark" id="guestname" name="guestname" required>
                    </div>
                </div>

                <div class="row mb-3 was-validated">
                    <label for="wing" class="col-sm-3 col-form-label">Wing</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control border-dark" id="wing" name="wing" required maxlength="1" minlength="1">
                    </div>
                </div>

                <div class="row mb-3 was-validated">
                    <label for="flatno" class="col-sm-3 col-form-label">Flat no.</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control border-dark" id="flatno" name="flatno" required maxlength="3" minlength="3">
                    </div>
                </div>

                <button name="add" type="submit" class="btn btn-primary col-sm-2 offset-sm-5 fs-4">Add
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="8.5" cy="7" r="4"></circle>
                        <line x1="20" y1="8" x2="20" y2="14"></line>
                        <line x1="23" y1="11" x2="17" y2="11"></line>
                    </svg>
                </button>

            </form>

        </div>

        <footer>
            <?php include_once('includes/footer.php'); ?>
        </footer>


    </body>

    </html>

<?php } ?>