<?php

$errors = array();
global $f3;

//exists so code doesn't break
$fname = $lname = $age = $gender = $phone = $email = $state = "";
$outdoor = $indoor = array();


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
    return ($gender == 'male' || $gender == 'female')&&!empty($gender);
}

function validPhone($phone)
{
    $pattern = "/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/";

    return preg_match($pattern, $phone)&&!empty($phone);
}

function validEmail($email)
{
    $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";

    return preg_match($pattern, $email)&&!empty($email);
}

function validState($state, $f3)
{
    return in_array($state, $f3->get('states'))&&!empty($state);
}

function validOutdoor($selection, $f3)
{
    return in_array($selection, $f3->get('outdoor_ops'))&&!empty($selection);
}

function validIndoor($selection, $f3)
{
    return in_array($selection, $f3->get('indoor_ops'))&&!empty($selection);
}

if(isset($_POST['submit'])){

    switch ($stage){

        //On the personal info setup page
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

                $_SESSION['fname'] = $fname;
                $_SESSION['lname'] = $lname;
                $_SESSION['age'] = $age;
                $_SESSION['gender'] = $gender;
                $_SESSION['phone'] = $phone;

                //change the page
                header( "Location: ./profile" );

            //ya got errors
            } else {

                //store errors in fat free global
                foreach ($errors as $error=>$message ){
                    $f3->set($error."_err", $message);
                }
            } break;

        //On the profile setup page
        case 'profile':

            $email = strip_tags($_POST['email']);
            $state = strip_tags($_POST['state']);
            $seeking = strip_tags($_POST['seeking']);
            $bio = strip_tags($_POST['bio']);

            $f3->set('email', $email);
            $f3->set('state', $state);
            $f3->set('seeking', $seeking);
            $f3->set('bio', $bio);

            if(!validEmail($email)){
                $errors['email'] = 'Please enter a valid email';
            }

            if(!validState($state, $f3)){
                $errors['state'] = 'Please select from the states presented';
            }

            if(!validGender($seeking)){
                $errors['seeking'] = 'Please enter a valid gender';
            }

            //no errors
            if(sizeof($errors) == 0){

                $_SESSION['email'] = $email;
                $_SESSION['state'] = $state;
                $_SESSION['seeking'] = $seeking;
                $_SESSION['bio'] = $bio;

                //change the page
                header( "Location: ./interests" );
            } else {
                //store errors in fat free global
                foreach ($errors as $error=>$message ){
                    $f3->set($error."_err", $message);
                }
            }break;

        //On the interest setup page
        case 'interests':

            if(empty($_POST['outdoor'])||empty($_POST['indoor'])){
                $errors['no_select'] = 'Please select at least one of each option';
            } else {

                $outdoor_choices = $_POST['outdoor'];
                $indoor_choices = $_POST['indoor'];

                foreach ($outdoor_choices as $activity){
                    $outdoor_act = strip_tags($activity);
                    if(!validOutdoor($outdoor_act, $f3)){
                        $errors['outdoor'] = 'Please select from the outdoor options presented';
                    }
                }

                foreach ($indoor_choices as $activity){
                    $indoor_act = strip_tags($activity);
                    if(!validIndoor($indoor_act, $f3)){
                        $errors['indoor'] = 'Please select from the indoor options presented';
                    }
                }
            }

            //no errors
            if(sizeof($errors) == 0){

                $_SESSION['outdoor'] = $outdoor_choices;
                $_SESSION['indoor'] = $indoor_choices;

                //change the page
                header( "Location: ./setup-summary" );
            } else {
                //store variables in fat free global
                foreach ($errors as $error=>$message ){
                    $f3->set($error."_err", $message);
                }
            }break;
    }


}