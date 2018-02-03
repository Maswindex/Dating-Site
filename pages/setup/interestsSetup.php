<!--
    author: Mason Hernandez
    date: 02/02/2018
    file: interestsSetup.php

    This file contains the form layout for the interests
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
            <h1>Interests</h1><small class="text-danger">{{@no_select_err}} {{@indoor_err}} {{@outdoor_err}}</small><hr>

            <form action="#" method="post">
                <div class="row p-4">

                    <label class="font-weight-bold form-label">Out-Door Interests</label>
                    <div class="container border rounded pt-3" id="outdoor_ops">
                        <div class="form-group form-check-inline">
                            <repeat group="{{@indoor_ops}}" value="{{@activity}}">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="indoor[]"
                                    value="{{@activity}}">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">{{@activity}}</span>
                                </label>
                            </repeat>
                        </div>
                    </div>


                    <label class="font-weight-bold form-label">In-Door Interests</label>
                    <div class="container border rounded pt-3" id="indoor_ops">
                        <div class="form-group form-check-inline">
                            <repeat group="{{@outdoor_ops}}" value="{{@activity}}">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="outdoor[]"
                                    value="{{@activity}}">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">{{@activity}}</span>
                                </label>
                            </repeat>
                        </div>
                    </div>

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
