<!--
    author: Mason Hernandez
    date: 02/02/2018
    file: profileSetup.php

    This file contains the form layout for the profile information
    part of setting up an account on the Dating-Site
--><!DOCTYPE html>
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
<div class="container mx-auto px-0 ">

    <!--Navbar-->
    <nav class="navbar navbar-light bg-faded mb-4 py-2" id="navbar">
        <h4 class="navbar-text">
            My Dating Site
        </h4>
    </nav>

    <!-- Main Content Section -->
    <div class="row">
        <div class="mx-auto container p-4 border border-secondary rounded">
            <h1>Profile</h1><hr>

            <form action="#" method="post">
                <div class="row">

                    <!--Most inputs except phone number-->
                    <div class="col-6">

                        <!--Email-->
                        <label for="email" class="form-label font-weight-bold mb-1" >
                            Email <small class="text-danger">{{@email_err}}</small></label>
                        <input class="form-control mb-2" type="text" value="{{@email}}" name="email" id="email"
                               minlength="1">

                        <!--State-->
                        <label class="form-label font-weight-bold mb-1">
                            State <small class="text-danger">{{@state_err}}</small></label><br>
                        <select class="custom-select" name="state">
                            <option>Select a state</option>
                            <repeat group="{{@states}}" value="{{@indState}}">

                                <!--Previouly selected option-->
                                <check if="{{@indState}}=={{@state}}">
                                    <option value="{{@indState}}" selected>{{@indState}}</option>
                                </check>
                                <option value="{{@indState}}">{{@indState}}</option>
                            </repeat>
                        </select><br>

                        <!--Seeking-->
                        <label class="form-label font-weight-bold mt-2">
                            Seeking <small class="text-danger">{{@seeking_err}}</small></label><br>
                        <div class="form-check form-check-inline"><!--Male-->
                            <label class="form-check-label">
                                <check if="{{@seeking}}==male">
                                    <true>
                                        <input class="form-check-input" type="radio"
                                               name="seeking" value="male" checked="checked">
                                        Male</label></div>
                                    </true>
                                    <false>
                                        <input class="form-check-input" type="radio"
                                               name="seeking" value="male"> Male
                                    </false>
                                </check></label></div>
                        <div class="form-check form-check-inline"><!--Female-->
                            <label class="form-check-label">
                                <check if="{{@seeking}}==female">
                                    <true>
                                        <input class="form-check-input" type="radio"
                                               name="seeking" value="female" checked="checked">
                                        Female</label></div>
                                    </true>
                                    <false>
                                        <input class="form-check-input" type="radio"
                                               name="seeking" value="female"> Female
                                    </false>
                                </check></label></div>


                    </div> <!--<div class="col-6">-->

                    <!-- Privacy Policy -->
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-labl font-weight-bold">Bio</label>
                            <textarea class="form-control" rows="4" name="bio">{{@bio}}</textarea>
                        </div>
                    </div> <!--div class="col-4"-->


                    <!--Submit Button-->
                    <div class="col-12">
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