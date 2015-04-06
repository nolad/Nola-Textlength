<?php
    
    include 'flow.php';

    session_start(); 

    //get current activity and next
    $current = $_SESSION['activity'];

    $key = array_search($current, $flow) + 1;
    $next = $flow[$key];

    //find the link to the next activity
    $nextX = explode('-', $next); //split next by the dash
    $key = search($nextX[0], $nextX[1], $link); //search for the key in link array
    $location = 'Location: '.$link[$key]; //set the next location to the link

    function search($keyword, $num, $array){
        foreach($array as $key => $key){
            if (preg_match('/^'.$keyword.'(-'.$num.')?$/', $key)){
                return $key;
            }
        }
    }

    //set next and change location
    $_SESSION['activity'] = $next;
    header($location);
?>
