<?php

$errors = array();
global $f3;

//exists so code doesn't break
$fname = $lname = $age = $gender = $phone = $email = $state = $outdoor = $indoor = '';


function validName($name)
{
    return ctype_alpha($name)&&!empty($name);
}

function validAge($age)
{
    return is_numeric($age)&&!empty($age);
}

function validGender($gender)
{
    return ($gender == 'male' || $gender == 'female')||!empty($gender);
}

function validPhone($phone)
{
    $pattern = "/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/";

    return preg_match($pattern, $phone)||!empty($phone);
}

function validEmail($email)
{
    $pattern = "/[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/";

    if (!preg_match($pattern, $email)||empty($email)) {
        $errors['email'] = 'Please enter a valid email';
    }
}

function validState($state, $f3)
{
    if(!in_array($state, $f3->get('$states'))||empty($state)){
        $errors['state'] = 'Please select from the states presented';
    }
}

function validOutdoor($selection, $f3)
{
    if(!in_array($selection, $f3->get('outdoor'))||empty($selection)) {
        $errors['outdoor'] = 'Please select from the outdoor options presented';
    }
}

function validIndoor($selection, $f3)
{
    if(!in_array($selection, $f3->get('indoor'))||empty($selection)) {
        $errors['indoor'] = 'Please select from the indoor options presented';
    }
}

if(isset($_POST['submit'])){

    switch ($stage){
        case 'personal':

            //strip of possible tages
            $fname = strip_tags($_POST['fname']);
            $lname = strip_tags($_POST['lname']);
            $age = strip_tags($_POST['age']);
            $gender = strip_tags($_POST['gender']);
            $phone = strip_tags($_POST['phone']);

            //stores in fat free global variables
            $f3->set('fname', $fname);
            $f3->set('lname', $lname);
            $f3->set('age', $age);
            $f3->set('gender', $gender);
            $f3->set('phone', $phone);

            //validate each input
            if(!validName($fname))
                $errors['fname'] = 'Please enter a valid first name';

            //validate each input
            if(!validName($lname))
                $errors['lname'] = 'Please enter a valid last name';

            //validate each input
            if(!validAge($age))
                $errors['age'] = 'Please enter a valid age';

            if(!validGender($gender))
                $errors['gender'] = 'Please enter a valid gender';

            if(!validPhone($phone))
                $errors['phone'] = 'Please enter a valid phone number (e.g. 123-456-7890)';

            //no errors
            if(sizeof($errors) == 0){

                //store values in session variables
                $_SESSION['fname'] = $fname;
                $_SESSION['lname'] =  $lname;
                $_SESSION['age'] = $age;
                $_SESSION['gender'] =  $gender;
                $_SESSION['phone'] =  $phone;

                //change the page
                header( "Location: ./profile" );

            //ya got errors
            } else {

                //store errors in fat free global
                foreach ($errors as $error=>$message ){
                    $f3->set($error."_err", $message);
                }
            } break;

        case 'profile':

            $email = strip_tags($_POST['email']);
            $state = strip_tags($_POST['state']);
            $seeking = strip_tags($_POST['seeking']);
            $bio = strip_tags($_POST['bio']);

            $f3->set('email', $email);
            $f3->set('state', $state);
            $f3->set('seeking', $seeking);
            $f3->set('bio', $bio);

            validEmail($email);
            validState($state, $f3);
            validGender($seeking);

            //no errors
            if(sizeof($errors) == 0){

                $_SESSION('email', $email);
                $_SESSION('state', $state);
                $_SESSION('seeking', $seeking);
                $_SESSION('bio', $bio);

                //change the page
                header( "Location: ./interests" );
            } else {
                //store errors in fat free global
                foreach ($errors as $error=>$message ){
                    $f3->set($error."_err", $message);
                }
            }break;

        case 'interests':

            $outdoor = strip_tags($_POST['outdoor']);
            $indoor = strip_tags($_POST['indoor']);

            validIndoor($indoor, $f3);
            validOutdoor($outdoor, $f3);

            //no errors
            if(sizeof($errors) == 0){

                $_SESSION('outdoor', $outdoor);
                $_SESSION('indoor', $indoor);

                //change the page
                header( "Location: ./setup-summary" );
            } else {
                //store variables in fat free global
                foreach ($errors as $error=>$message ){
                    $f3->set($error, $message);
                }
            }break;
    }


}