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

        <title>Dashboard</title>
    </head>
    <style>
        body {
            background-color: <?php echo $_COOKIE['theme']; ?>;
        }
        .main-content {
            font-style: italic;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 500;
        }

        #card-1 {
            background: linear-gradient(212deg, rgba(255, 255, 255, 1) 0%, rgba(250, 252, 210, 1) 32%, rgba(238, 245, 110, 1) 100%);

        }

        #card-2 {
            background: linear-gradient(212deg, rgba(255, 255, 255, 1) 0%, rgba(223, 252, 210, 1) 32%, rgba(155, 255, 77, 1) 100%);

        }

        #card-3 {
            background: linear-gradient(212deg, rgba(255, 255, 255, 1) 0%, rgba(210, 225, 252, 1) 32%, rgba(77, 147, 255, 1) 100%);

        }

        #card-4 {
            background: linear-gradient(212deg, rgba(255, 255, 255, 1) 0%, rgba(252, 210, 210, 1) 32%, rgba(255, 77, 77, 1) 100%);

        }
    </style>

    <body>
        <?php include_once('includes/header.php'); ?>

        <div class="main-content ">

            <div class="container">

                <?php
                //todays visitors
                $query = mysqli_query($con, "select ID from tblvisitor where date(EnterDate)=CURDATE();");
                $count_today_visitors = mysqli_num_rows($query);
                ?>
                <div class="row mt-3">

                    <div class="col">
                        <div class="card text-dark bg-light mb-3 mt-3" id="card-1">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 26px;font-weight: bold;">Today's Visitors</h5>
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <p class="card-text" style="font-size: 38px;font-style:normal;"><?php echo $count_today_visitors; ?></p>
                            </div>
                        </div>
                    </div>


                    <?php
                    //Yesterdays visitors
                    $query1 = mysqli_query($con, "select ID from tblvisitor where date(EnterDate)=DATE_SUB(CURDATE(), INTERVAL 1 DAY)");
                    $count_yesterday_visitors = mysqli_num_rows($query1);

                    ?>
                    <div class="col">
                        <div class="card text-dark bg-light mb-3 mt-3" id="card-2">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 26px;font-weight: bold;">Yesterday's Visitors</h5>
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <p class="card-text" style="font-size: 38px;font-style:normal;"><?php echo $count_yesterday_visitors; ?></p>
                            </div>
                        </div>
                    </div>

                    <?php
                    //Last Sevendays visitors
                    $query2 = mysqli_query($con, "select ID from tblvisitor where date(EnterDate)>=(DATE(NOW()) - INTERVAL 7 DAY);");
                    $count_lastsevendays_visitors = mysqli_num_rows($query2);
                    ?>

                    <div class="col">
                        <div class="card text-dark bg-light mb-3 mt-3" id="card-3">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 26px;font-weight: bold;">Last 7 Days' Visitors</h5>
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>

                                <p class="card-text" style="font-size: 38px;font-style:normal;"><?php echo $count_lastsevendays_visitors; ?></p>
                            </div>
                        </div>
                    </div>

                    <?php
                    //Total Visitors visitors
                    $query3 = mysqli_query($con, "select ID from tblvisitor");
                    $count_total_visitors = mysqli_num_rows($query3);
                    ?>

                    <div class="col">
                        <div class="card text-dark bg-light mb-3 mt-3" id="card-4">
                            <div class="card-body">

                                <h5 class="card-title" style="font-size: 26px;font-weight: bold;">Total Visitors</h5>
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <p class="card-text" style="font-size: 38px;font-style:normal;"> <?php echo $count_total_visitors; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php include_once('includes/footer.php'); ?>

    </body>

    </html>


<?php } ?>