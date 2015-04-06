<div id="progressContainer">
    <div id="progressContainer-fixer">

<?php
    include 'flow.php';

    function ignore($name) {
      $ignore = array('Demographics', 'Instructions', 'Ratings');

      foreach($ignore as $key => $value) {
        if ($name == $value) return true;
      }
    }

    //get current activity and next
    $current = $_SESSION['activity'];
    $backgroundStyle = 'style="background-color: #ddd"';

    foreach($flow as $key => $value){

        //set the name without the -number in the string
        $name = explode('-', $value); //split next by the dash
        $name = $name[0];

        if (!ignore($name)) {
          if ($key > 0) echo '<div class="connection" '.$backgroundStyle.'></div>';
          echo '<div class="circle" '.$backgroundStyle.'><div class="circleText" id="circleText1S">'.$name.'</div></div>';
        }

        //set the background style to none (white)
        //once we get to the current activity
        if ($value == $current) {
          $backgroundStyle = '';
        }
    }

?>

    </div>
</div>
