<?php

//reuire the autoload file
require_once('vendor/autoload.php');

//start a session
session_start();

//create an instance of the Base class
$f3 = Base::instance();

$f3->set('states', array('Alaska', 'Alabama', 'Arkansas', 'Arizona', 'California',
    'Colorado', 'Connecticut', 'District of Columbia', 'Delaware', 'Florida',
    'Georgia', 'Guam', 'Hawaii', 'Iowa', 'Idaho', 'Illinois', 'Indiana',
    'Kansas', 'Kentucky', 'Louisiana', 'Massachusetts', 'Maryland', 'Maine',
    'Michigan', 'Minnesota', 'Missouri', 'Mississippi', 'Montana', 'North Carolina',
    'North Dakota', 'Nebraska', 'New Hampshire', 'New Jersey', 'New Mexico', 'Nevada',
    'New York', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Puerto Rico',  'Rhode Island',
    'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Virginia',
    'Virgin Islands', 'Vermont', 'Washington', 'Wisconsin', 'West Virginia', 'Wyoming'));

$f3->set('outoor', array('hiking', 'biking', 'swimming', 'collecting', 'walking', 'climbing'));

$f3->set('indoor', array('tv', 'movies', 'cooking', 'puzzles', 'reading', 'playing cards', 'board games', 'video games'));

//Define a default route
$f3->route('GET /', function() {
    $view = new View;
    echo $view->render
    ('pages/home.html');
});

//Define a account setup route
$f3->route('GET|POST /setup/@part', function($f3, $params) {

    $stage = $params['part'];

    include 'model/validation.php';

    switch($stage){
        case('personal'):
            $temp = new Template();
            echo $temp->render('pages/setup/personalSetup.php');
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