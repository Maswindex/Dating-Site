<!--
    author: Mason Hernandez
    date: 02/02/2018
    file: profileSummary.php

    this file contains the form layout for the the summary of
    setting up  profile in the Dating-Site
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
        <div class="col col-8 col-offset-2 mx-auto container
                    p-4 border border-secondary rounded">
            <div class="row">
                <div class="col-md-6 col-12">
                    <ul class="list-group">
                        <li class="list-group-item">Name: {{@fname}} {{@lname}}</li>
                        <li class="list-group-item">Gender: {{@gender}}</li>
                        <li class="list-group-item">Age: {{@age}}</li>
                        <li class="list-group-item">Email: {{@email}}</li>
                        <li class="list-group-item">State: {{@state}}</li>
                        <li class="list-group-item">Seeking: {{@seeking}}</li>
                        <li class="list-group-item">Interests: {{@interests}}</li>
                    </ul>
                </div>

                <div class="col-md-6 col-12 text-center">
                    <img src="../images/account_icon.png" alt="male silhouette">
                    <h3 class="text-left">Biography</h3><br>
                    <p>{{@bio}}</p>
                </div>
            </div>


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
