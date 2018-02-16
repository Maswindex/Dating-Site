<!--
    author: Mason Hernandez
    date: 02/02/2018
    file: personalSetup.php

    This file contains the form layout for the personal information
    part of setting up an account on the Dating-Site
-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dating Site</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/home-styles.css">
</head>
<body>
<div class="container mx-auto px-0">

    <!--Navbar-->
    <nav class="navbar navbar-light bg-faded mb-4 py-2" id="navbar">
        <h4 class="navbar-text">
            My Dating Site
        </h4>
    </nav>

    <!-- Main Content Section -->
    <div class="row">
        <div class="mx-auto container p-4 border border-secondary rounded">
            <h1>Personal Information</h1><hr>

            <form action="#" method="post">
                <div class="row">

                    <!--Placed outside col-8 to lower privacy policy visually-->
                    <div class="col-12">
                        <label for="fname" class="form-label font-weight-bold mb-1" >
                            First Name <small class="text-danger">{{@fname_err}}</small>
                        </label>
                    </div>

                    <!--Most inputs except phone number-->
                    <div class="col-8">

                        <!--First Name-->
                        <input class="form-control mb-2" type="text" value="{{@fname}}" name="fname" id="fname"
                               minlength="1">

                        <!--Last Name-->
                        <label for="lname" class="form-label font-weight-bold mb-1">
                            Last Name <small class="text-danger">{{@lname_err}}</small>
                        </label>
                        <input class="form-control mb-2" type="text" value="{{@lname}}" name="lname" id="lname"
                            minlength="1">

                        <!--Age-->
                        <label for="age" class="form-label font-weight-bold mb-1">
                            Age <small class="text-danger">{{@age_err}}</small>
                        </label>
                        <input class="form-control mb-2" type="number" value="{{@age}}" name="age" id="age"
                            min="18" max="110">

                        <!--Seeking-->
                        <label class="form-label font-weight-bold mt-2">
                            Gender <small class="text-danger">{{@gender_err}}</small></label><br>
                        <div class="form-check form-check-inline"><!--Male-->
                            <label class="form-check-label">
                                <check if="{{@gender}}==male">
                                    <true>
                                        <input class="form-check-input" type="radio"
                                               name="gender" value="male" checked="checked">
                                        Male
                                    </true>
                                    <false>
                                        <input class="form-check-input" type="radio"
                                               name="gender" value="male"> Male
                                    </false>
                                </check></label></div>
                                <div class="form-check form-check-inline"><!--Female-->
                                    <label class="form-check-label">
                                        <check if="{{@gender}}==female">
                                            <true>
                                                <input class="form-check-input" type="radio"
                                                       name="gender" value="female" checked="checked">
                                                Female
                                            </true>
                                            <false>
                                                <input class="form-check-input" type="radio"
                                                    name="gender" value="female"> Female
                                            </false>
                                        </check></label></div>

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
                    <div class="col-8 mb-3">
                        <label class="form-label font-weight-bold mb-1">
                            Phone Number (xxx-xxx-xxxx) <small class="text-danger">{{@phone_err}}</small>
                        </label>
                        <input class="form-control" type="text" value="{{@phone}}" name="phone">
                    </div> <!--div class="col-8"-->

                    <!--Phone Number-->
                    <div class="col-8">
                        <label class="font-weight-bold mb-1">
                            Premium Membership?
                        </label><br>
                        <h6>
                            Sign me up!
                            <check if="{{@isPremium}}">
                                <true>
                                    <input class="form-check-label" type="checkbox" checked="checked" name="premium">
                                </true>
                                <false>
                                    <input class="form-check-label" type="checkbox" name="premium">
                                </false>
                            </check>
                        </h6>
                    </div> <!--div class="col-8"-->


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