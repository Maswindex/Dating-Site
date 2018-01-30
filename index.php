<?php

//reuire the autoload file
require_once('vendor/autoload.php');

//create an instance of the Base class
$f3 = Base::instance();

//Define a default route
$f3->route('GET /', function() {
    $view = new View;
    echo $view->render
    ('pages/home.html');
});

//Define a setup route
$f3->route('GET|POST /setup/@part', function($f3, $params) {
    switch($params['part']){
        case('personal'):
            echo Template::instance()->render('pages/setup/personalSetup.php');
            break;
        case('profile'):
            echo Template::instance()->render('pages/setup/profileSetup.php');
            break;
        case('interests'):
            echo Template::instance()->render('pages/setup/interestsSetup.php');
            break;
        case('setup-summary'):
            echo Template::instance()->render('pages/setup/profileSummary.php');
    }
});

//run fat free
$f3->run();