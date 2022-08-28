<?php

require_once 'core.inc.php';

if (loggedin()) {
    $id = getuserfield('id');
    $name = getuserfield('name');
    $email = getuserfield('email');
    $created_at = getuserfield('created_at');
    
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];
    $q5 = $_POST['q5'];

    //print_r($_POST);
    //die();

    if (!empty($q1) && !empty($q2) && !empty($q3) && !empty($q4) && !empty($q5)) {

        if ($q1 == 'Yes') {
            $q1 = 100;
        }elseif($q1 == 'No'){
            $q1 = 0;

        }
        if($q2 == 'Yes'){
            $q2 = 100;

        }elseif($q2== 'No'){
            $q2 = 0;
        }

        if($q3 == 'Yes'){
            $q3 = 100;

        }elseif($q3== 'No'){
            $q3 = 0;
        }


        if($q4 == 'Yes'){
            $q4 = 100;

        }elseif($q4== 'No'){
            $q4 = 0;
        }


        if($q5 == 'Yes'){
            $q5 = 100;

        }elseif($q5== 'No'){
            $q5 = 0;
        }
        
        $score = $q1 + $q2 + $q3 + $q4 + $q5;

        echo '<script>alert("Your score is '.$score.'."); window.location.href="home.php";</script>';

    }else{
        echo '<script>alert("You to answer all the questions in the topic."); window.location.href="home.php";</script>';
    }
}
else{
    header('Location: login.php');
}