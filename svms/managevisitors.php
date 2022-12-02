<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');


if (strlen($_SESSION['svmsaid'] == 0)) {
    header('location:logout.php');
} else {




    if (isset($_GET['exitvid'])) {

        $exitvid = $_GET['exitvid'];
        $query1 = "update tblvisitor set outtime=NOW() where ID='$exitvid';";
        $query1 .= "delete from tblguest where ID='$exitvid';";

        $success = mysqli_multi_query($con, $query1);

        if ($success) {

            header('location:managevisitors.php');
        }
    }


    if (isset($_GET['delvid'])) {

        $delvid = $_GET['delvid'];
        $query1 .= "delete from tblvisitor where ID='$delvid';";
        // $query .= "select * from tblvisitor where ID='$exitvid';";


        $success = mysqli_multi_query($con, $query1);

        if ($success) {

            header('location:managevisitors.php');
        }
    }

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Visitors</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </head>

    <body>

        <header>
            <?php include_once('includes/header.php'); ?>
        </header>

        <div class="main-content container mt-4 mb-4 ">

            <table class="table table-striped" style="background-color: white;">
                <thead class="table-dark fs-5 text-center">
                    <th scope="col">Sr. No.</th>
                    <th scope="col">Wing</th>
                    <th scope="col">Apartment No.</th>
                    <th scope="col">Guest Name</th>
                    <th scope="col">Details</th>
                    <th scope="col">Status</th>
                    <th scope="col">Delete</th>

                </thead>
                <?php
                $ret = mysqli_query($con, "select * from tblvisitor");
                $cnt = 1;

                while ($row = mysqli_fetch_array($ret)) {

                ?>

                    <tr class="fs-5" id="<?php echo $row['ID'] ?>">
                        <td class="text-center"><?php echo $cnt; ?></td>
                        <td class="text-center"><?php echo $row['Wing']; ?></td>
                        <td class="text-center"><?php echo $row['FlatNumber']; ?></td>
                        <td class="text-center"><?php echo $row['VisitorName']; ?></td>
                        <td class="text-center">
                            <a href="showdetails.php?vid=<?php echo $row['ID']; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#6b6968" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                </svg>
                            </a>
                        </td>

                        <?php

                        if ($row['outtime'] == NULL) { ?>

                            <td class="text-center" id="<?php echo $row['ID']; ?>">
                                <a href="managevisitors.php?exitvid=<?php echo $row['ID']; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke=" #ff0000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg>
                                </a>
                            </td>
                            <td></td>

                        <?php } else { ?>
                            <td class="text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke=" #00ff55" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </td>

                            <td class="text-center">
                                <a href="managevisitors.php?delvid=<?php echo $row['ID']; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#1f3266" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg>
                                </a>
                            </td>
                        <?php } ?>

                    </tr>
                <?php
                    $cnt = $cnt + 1;
                } ?>
            </table>

            <hr>


        </div>

        <footer>
            <?php include_once('includes/footer.php'); ?>
        </footer>


    </body>

    </html>

<?php } ?>