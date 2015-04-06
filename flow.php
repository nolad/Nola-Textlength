<?php


    /* Link and Flow array define the flow of the program.
     * How to use:
     *
     * Link:
     * The link matches the activiy to what webpage is next
     * For example, the Study activity might match to study.php
     * In most cases, you will not need to add the dash and number
     * if the webpage is the same. However, if you want the activity
     * to stay the same, but webpages to be different, include the
     * dash and number.
     * Example:
     * Stop-2 and Stop-1 will match to Stop
     * Stop-2 however will match to Stop-2 and not Stop-1
     * However, Stop-2 matches to Stop, you won't be able
     * to inlude a generic Stop, you'll have to define it
     * for all numbers (Stop-1 to Stop-N)
     *
     * Flow:
     * The flow array defines the activity and what to do next
     * Every item has to be unique, but you can use a dash and
     * number so that the link array matches the generic activity
     * Stop -> Study -> Stop does not have unique stops, so will
     * not match correctly. Instead use Stop-1 -> Study -> Stop-2
     */

    session_start();

    $link = array(
        "Consent" => "consent.php", 
        "Demographics" => "demographics.php",
        "Instructions" => "instructions.php",
        "Study" => "study.php",
        "Recall" => "recall1.php",
        "Pacman" => "pacman.php",
        "Finish" => "finish.php"
    );

    if ($_SESSION['condition'] == 1) {
      $flow = array(
        "Start",
        "Demographics",
        "Instructions-1", //study instructions 1/2
        "study-1", 
        "Instructions-2",//recall instructions 1/2
        "Recall",
        "Instructions-3", //study instructions 2/2
        "study-2", 
        "Instructions-4",//recall instructions 2/2
        "Recall",
        "Instructions-5",//pacman instructions
        "Pacman-1", //Activity = pacman
        "Instructions-6",//final recall instructions 
        "Recall",
        "Finish"
      );
    }

    if ($_SESSION['condition'] == 2) {
      $flow = array(
            "Start",
        "Demographics",
        "Instructions-1", //Study instructions 1/4
        "study-1",        //Read 1/4
        "Instructions-2", //Recall instruction 1/4
        "Recall",       //recall 1/4
        "Instructions-3", //Study instructions 2/4
        "study-2",  // read 2/4
        "Instructions-4", //Recall instructions 2/4
        "Recall",       // recall 2/4
        "Instructions-5",  //Study instructions 3/4
        "study-3", //Read 3/4
        "Instructions-6", //Recall instructions 3/4
        "Recall",     //recall 3/4
        "Instructions-7",  //Study instructions 4/4
        "study-4", //study 4/4
        "Instructions-8", //Recall instructions 4/4
        "Recall",// recall 4/4
        "Instructions-9", //Pacman instructions
        "Pacman-1", //Activity = pacman
        "Instructions-10", //Final recall instructions
        "Recall",
        "Finish"
      );
    }

    if ($_SESSION['condition'] == 3) {
      $flow = array(
        "Start",
        "Demographics",
        "Instructions-1", //Read instructions
        "study-1", //Read text
        "Instructions-2",//recall instructions
        "Recall",
        "Instructions-3",//pacman instructions
        "Pacman-1", //Activity = pacman
        "Instructions-4",//final recall instructions 
        "Recall",
        "Finish"
      );
    }


?>
