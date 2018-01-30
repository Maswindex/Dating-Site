<?php
/**
 * User: Mason Hernandez
 * Date: 1/27/2018
 * Time: 4:56 PM
 */



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dating Site</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/home-styles.css">
    <style>
        #head, #navbar {
            background-color: lightgrey !important;
        }
    </style>
<body>
<div class="container mx-auto px-0 ">

    <!--Navbar-->
    <nav class="navbar navbar-light bg-faded mb-4" id="navbar">
        <h4 class="navbar-text p-0">
            My Dating Site
        </h4>
    </nav>

    <!-- Main Content Section -->
    <div class="row">
        <div class="mx-auto container p-4 border border-secondary rounded">
            <h1>Personal Setup Page</h1><hr>

            <form action="#" method="post">
                <div class="row">
                    <div class="col-12">
                        <label for="fname" class="form-label font-weight-bold" mb-1>First Name</label>
                    </div>
                    <div class="col-8">

                        <input class="form-control mb-2" type="text" value="" name="fname" id="fname">

                        <label for="lname" class="form-label font-weight-bold mb-1">Last Name</label>
                        <input class="form-control mb-2" type="text" value="" name="lname" id="lname">

                        <label for="age" class="form-label font-weight-bold mb-1" name="age">Age</label>
                        <input class="form-control mb-2" type="number" value="" name="age" id="age">

                        <label for="gender" class="form-label font-weight-bold mb-0" name="gender">Gender</label><br>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio"
                                       name="gender" id="gender" value=""> Male
                            </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio"
                                       name="gender" id="gender" value=""> Female
                            </label>
                        </div>

                    </div> <!--<div class="col-8">-->

                    <!-- Privacy Policy -->
                    <div class="col-4 pt4">
                        <div class="text-center rounded border border-secondary  px-2 py-2" id="head">
                            <strong>Note:</strong> All our information entered is protected by our
                            <span class="text-primary">privacy policy</span>. Profile information
                            can only be viewed by others with your permission.
                        </div>
                    </div> <!--div class="col-4"-->

                    <div class="col-8">
                        <label for="example-text-input" class="form-label font-weight-bold mb-1">Phone Number</label>
                        <input class="form-control" type="text" value=""
                               required pattern="([0-9]{3})-[0-9]{3}-[0-9]{4}">
                    </div> <!--div class="col-4"-->


                    <!--Submit Button-->
                    <div class="col-4">
                        <div class="text-right">
                            <input type="submit" value="next" class="btn btn-primary my-4">
                        </div>
                    </div> <!--div class="col-4"-->

                </div> <!--<div class="row">-->
            </form> <!--End form-->
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery.js"></script>
</div>
</body>
</html>
