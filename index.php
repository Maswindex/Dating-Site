<?php
/**
 * author: Mason Hernandez
 * date: 02/02/2018
 * file: index.php
 *
 * this file contains all the logic for routing using the Fat-Free Framework
 * in the Dating-Site
 */

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

$f3->set('outdoor_ops', array('hiking', 'biking', 'swimming', 'collecting', 'walking', 'climbing'));

$f3->set('indoor_ops', array('tv', 'movies', 'cooking', 'puzzles', 'reading', 'playing cards', 'board games', 'video games'));

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

            //after setup pull from session for local use
            $f3->set('fname', $_SESSION['fname']);
            $f3->set('lname', $_SESSION['lname']);
            $f3->set('age', $_SESSION['age']);
            $f3->set('gender', $_SESSION['gender']);
            $f3->set('phone', $_SESSION['phone']);
            $f3->set('email', $_SESSION['email']);
            $f3->set('seeking', $_SESSION['seeking']);
            $f3->set('state', $_SESSION['state']);
            $f3->set('bio', $_SESSION['bio']);

            $interests = "";

            //loops through the multiple interest options and adds the selected
            foreach ($_SESSION['outdoor'] as $interest)
                $interests = $interests.', '.$interest;
            foreach ($_SESSION['indoor'] as $interest)
                $interests = $interests.', '.$interest;
            $interests = substr($interests, 1);
            $f3->set('interests', $interests);

            echo Template::instance()->render('pages/setup/profileSummary.php');
    }
});

//run fat free
$f3->run();