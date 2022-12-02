<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
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
        <title>Society Members</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </head>

    <body>
        <header>
            <?php include_once('includes/header.php'); ?>
        </header>

        <div class="main-content container mt-4 pt-4 ">

            <table class="table table-striped" style="background-color: white;">
                <thead class="table-dark fs-5 text-center">
                    <th scope="col">Sr. No.</th>
                    <th scope="col">Wing</th>
                    <th scope="col">Apartment No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact No.</th>
                    <th scope="col">Total Family Members</th>
                    <th scope="col">Edit</th>

                </thead>
                <?php
                $ret = mysqli_query($con, "select *from tblmember");
                $cnt = 1;
                while ($row = mysqli_fetch_array($ret)) {

                ?>

                    <tr class="fs-5">
                        <td class="text-center"><?php echo $cnt; ?></td>
                        <td class="text-center"><?php echo $row['Wing']; ?></td>
                        <td class="text-center"><?php echo $row['AptNumber']; ?></td>
                        <td class="text-center"><?php echo $row['Name']; ?></td>
                        <td class="text-center"><?php echo $row['ContactNumber']; ?></td>
                        <td class="text-center"><?php echo $row['TotFamNumber']; ?></td>
                        <td class="text-center"><a href="memberdetails.php?editid=<?php echo $row['ID']; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                            </a></td>
                    </tr>
                <?php
                    $cnt = $cnt + 1;
                } ?>
            </table>

        </div>


        <footer>
            <?php include_once('includes/footer.php'); ?>
        </footer>
    </body>

    </html>
<?php }  ?>