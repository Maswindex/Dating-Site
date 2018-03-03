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
require_once 'vendor/autoload.php';
require_once '/home/mhernand/config.php';

//start a session
session_start();

//create an instance of the Base class
$f3 = Base::instance();

$f3->set('states', $states = array(
    'AL'=>'Alabama',
    'AK'=>'Alaska',
    'AZ'=>'Arizona',
    'AR'=>'Arkansas',
    'CA'=>'California',
    'CO'=>'Colorado',
    'CT'=>'Connecticut',
    'DE'=>'Delaware',
    'DC'=>'District of Columbia',
    'FL'=>'Florida',
    'GA'=>'Georgia',
    'HI'=>'Hawaii',
    'ID'=>'Idaho',
    'IL'=>'Illinois',
    'IN'=>'Indiana',
    'IA'=>'Iowa',
    'KS'=>'Kansas',
    'KY'=>'Kentucky',
    'LA'=>'Louisiana',
    'ME'=>'Maine',
    'MD'=>'Maryland',
    'MA'=>'Massachusetts',
    'MI'=>'Michigan',
    'MN'=>'Minnesota',
    'MS'=>'Mississippi',
    'MO'=>'Missouri',
    'MT'=>'Montana',
    'NE'=>'Nebraska',
    'NV'=>'Nevada',
    'NH'=>'New Hampshire',
    'NJ'=>'New Jersey',
    'NM'=>'New Mexico',
    'NY'=>'New York',
    'NC'=>'North Carolina',
    'ND'=>'North Dakota',
    'OH'=>'Ohio',
    'OK'=>'Oklahoma',
    'OR'=>'Oregon',
    'PA'=>'Pennsylvania',
    'RI'=>'Rhode Island',
    'SC'=>'South Carolina',
    'SD'=>'South Dakota',
    'TN'=>'Tennessee',
    'TX'=>'Texas',
    'UT'=>'Utah',
    'VT'=>'Vermont',
    'VA'=>'Virginia',
    'WA'=>'Washington',
    'WV'=>'West Virginia',
    'WI'=>'Wisconsin',
    'WY'=>'Wyoming',
));

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

            if($f3->get('isPremium'))
                $f3->set('interests', $user->getInterests());

            $database = new DatingDatabase();
            $database->memberInsert($user);
            echo Template::instance()->render('pages/setup/profileSummary.php');
    }
});

$f3->route('GET /admin', function($f3){
    $database = new DatingDatabase();
    $f3->set('memberList', $database->getAllMembers());
    echo Template::instance()->render('pages/admin.html');
});

//run fat free
$f3->run();