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

$f3->set('outdoor_ops', PremiumMember::getOutdoor());

$f3->set('indoor_ops', PremiumMember::getIndoor());

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
            echo Template::instance()->render('pages/setup/personalSetup.php');
            break;
        case('profile'):
            echo Template::instance()->render('pages/setup/profileSetup.php');
            break;
        case('interests'):
            echo Template::instance()->render('pages/setup/interestsSetup.php');
            break;
        case('setup-summary'):

            $user = $_SESSION['user'];

            //after setup pull from session for local use
            $f3->set('fname', $user->getFname());
            $f3->set('lname', $user->getLname());
            $f3->set('age', $user->getAge());
            $f3->set('gender', $user->getGender());
            $f3->set('phone', $user->getPhone());
            $f3->set('email', $user->getEmail());
            $f3->set('seeking', $user->getSeeking());
            $f3->set('state', $user->getState());
            $f3->set('bio', $user->getBio());
            $f3->set('isPremium', $user->isPremium());

            if($f3->get('isPremium')) {

                $interests = "";
                $userInterests = $user->getInterests();
                //loops through the multiple interest options and adds the selected
                foreach ($userInterests as $interest) {
                    $interests = $interests.', '.$interest;
                }


                print $interests;

                //gets rid of comma initially created
                $interests = substr($interests, 1);
                $f3->set('interests', $interests);
            }

            echo Template::instance()->render('pages/setup/profileSummary.php');
    }
});

//run fat free
$f3->run();