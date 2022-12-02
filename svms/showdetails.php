<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['svmsaid'] == 0)) {
    header('location:logout.php');
} else { ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <title>Show Details</title>
    </head>
    <style>
        .table-fit {
            white-space: nowrap;
            width: 1%;
        }

        .main-content {
            margin: 0 auto;
            border-radius: 25px;
            font-size: 1.3rem;
        }
    </style>

    <body>
        <?php include_once('includes/header.php'); ?>

        <?php
        $vid = $_GET['vid'];
        $data = mysqli_query($con, "select * from tblvisitor where ID='$vid';");
        $fetch_data = mysqli_fetch_array($data);
        ?>


        <div class="main-content container mt-5 d-flex justify-content-center">
            <table class="table table-striped table-fit" style="background-color: white;border:0px; border-radius: 20px;">
                <tr class="text-center">
                    <th scope="row">Visitor ID</th>
                    <td><?php echo $fetch_data['ID']; ?></td>
                </tr>
                <tr class="text-center">
                    <th scope="row">Visitor Name</th>
                    <td><?php echo $fetch_data['VisitorName']; ?></td>
                </tr>
                <tr class="text-center">
                    <th scope="row">Mobile Number</th>
                    <td><?php echo $fetch_data['MobileNumber']; ?></td>
                </tr>
                <tr class="text-center">
                    <th scope="row">Flat Number</th>
                    <td><?php echo $fetch_data['FlatNumber']; ?></td>
                </tr>
                <tr class="text-center">
                    <th scope="row">Wing</th>
                    <td><?php echo $fetch_data['Wing']; ?></td>
                </tr>
                <tr class="text-center">
                    <th scope="row">Whom to meet</th>
                    <td><?php echo $fetch_data['WhomtoMeet']; ?></td>
                </tr>
                <tr class="text-center">
                    <th scope="row">Reason to meet</th>
                    <td><?php echo $fetch_data['ReasontoMeet']; ?></td>
                </tr>
                <tr class="text-center">
                    <th scope="row">In time</th>
                    <td><?php echo $fetch_data['EnterDate']; ?></td>
                </tr>
                <tr class="text-center">
                    <th scope="row">Out time</th>
                    <td><?php echo $fetch_data['outtime']; ?></td>
                </tr>
            </table>
        </div>

        <?php include_once('includes/footer.php'); ?>

    </body>

    </html>


<?php } ?>