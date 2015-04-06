<?php

include 'mysql.php';
session_start();

$exp = 'test1';

$query = 'SELECT * FROM promptede2_conditions WHERE Experiment = "'.$exp.'"';

$results = $db->query($query);

if ($results) {


  $row = mysqli_fetch_array($results);

  $max = $row[1];

  $condition1 = $row[2];
  $condition2 = $row[3];
  $condition3 = $row[4];

  $condition = mt_rand(1,3);

  if ($condition1 >= $max && $condition2 >= $max && $condition3 >= $max) {
    //At this point the expirement should be done, but if
    //they somehow get here give them a 1
    $conditon = 1;
  } else {
    //deal with cases
  
    if ($condition == 1 && $condition1 >= $max) {
      $condition = $condition2 < $max ? 2 : 3;
    } else if ($condition == 2 && $condition2 >= $max) {
      $condition = $condition3 < $max ? 3 : 1;
    } else if ($condition == 3 && $condition3 >= $max) {
      $condition = $condition2 < $max ? 2 : 1;
    }
  }

  $_SESSION['condition'] = $condition;

} else {
  $_SESSION['condition'] = mt_rand(1,3);
}
?>

