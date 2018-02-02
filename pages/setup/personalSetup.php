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
            My Dating Site hello
        </h4>
    </nav>

    <!-- Main Content Section -->
    <div class="row">
        <div class="mx-auto container p-4 border border-secondary rounded">
            <h1>Personal Setup Page</h1><hr>

            <form action="#" method="post">
                <div class="row">

                    <!--Placed outside col-8 to lower privacy policy visually-->
                    <div class="col-12">
                        <label for="fname" class="form-label font-weight-bold mb-1" >
                            First Name <span class="text-danger">{{@fname_err}}</span>
                        </label>
                    </div>

                    <!--Most inputs except phone number-->
                    <div class="col-8">

                        <!--First Name-->
                        <input class="form-control mb-2" type="text" value="{{@fname}}" name="fname" id="fname"
                               minlength="1">

                        <!--Last Name-->
                        <label for="lname" class="form-label font-weight-bold mb-1">
                            Last Name <span class="text-danger">{{@lname_err}}</span>
                        </label>
                        <input class="form-control mb-2" type="text" value="{{@lname}}" name="lname" id="lname"
                            minlength="1">

                        <!--Age-->
                        <label for="age" class="form-label font-weight-bold mb-1">
                            Age <span class="text-danger">{{@age_err}}</span>
                        </label>
                        <input class="form-control mb-2" type="number" value="{{@age}}" name="age" id="age"
                            min="18" max="110">

                        <label for="gender" class="form-label font-weight-bold mb-0">
                            Gender <span class="text-danger">{{@gender_err}}</span>
                        </label><br>
                        <!--Male-->
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio"
                                       name="gender" value="male"> Male
                            </label>
                        </div>

                        <!--Female-->
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio"
                                       name="gender" value="female"> Female
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

                    <!--Phone Number-->
                    <div class="col-8">
                        <label for="phone" class="form-label font-weight-bold mb-1">
                            Phone Number <span class="text-danger">{{@phone_err}}</span>
                        </label>
                        <input class="form-control" type="text" value="{{@phone}}" name="phone"
                               required pattern="([0-9]{3})-[0-9]{3}-[0-9]{4}">
                    </div> <!--div class="col-4"-->


                    <!--Submit Button-->
                    <div class="col-4">
                        <div class="text-right">
                            <input type="submit" value="next" name="submit" class="btn btn-primary my-4">
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