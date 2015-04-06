<!DOCTYPE html>
<?php

    include 'pcllab-library.php';
    session_start();

    if (!isset($_SESSION["workerId"])) {
       header('Location: consent.php');
    }

    $activity = ses('activity');

    if (cond() == 1) {
        switch($activity) {
            case "study-1":
                $text = 0;
                $prompt = 1;
                var delay = 5;
                break;
            case "study-2":
                $text = 1;
                $prompt = 1;
                var delay = 5;
                break;
            case "study-3":
                $text = 2;
                $prompt = 1;
                var delay = 5;
                break;
            case "study-4":
                $text = 3;
                $prompt = 1;
                var delay = 5;
                break;
        }
    }


    if (cond() == 2) {
        switch($activity) {
            case "study-1":
                $text = 4;
                $prompt = 1;
                var delay = 5;
                break;
            case "study-2":
                $text = 5;
                $prompt = 1;
                var delay = 5;
                break;
        }
    }


    if (cond() == 3) {
        switch($activity) {
            case "study-1":
                $text = 6;
                $prompt = 1;
                var delay = 5;
                break;
        
        }
    }



    $json = json_decode(file_get_contents('study.json'));
    $title = $json[$text][0];
    $instructions = $json[$text][$prompt];

?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Prompted Retrieval</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" media="screen" title="no title"/>
    <script type="application/javascript" src="js/main.js"></script>
    <script type="application/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>

<?php include 'progress-bar.php'; ?>

<div id="globalContainer">
    <div class="card">
    <h1 class="title"><?php echo $title ?></h1>
        <div class="bodyTextHolder">
            <div class="bodyText">
                <?php echo $story ?>
            </div>

            <div class="timer" id="bar">
                <span id="barSpan"></span>
            </div>
            <div class="nextButton" >
                <div class="nextButtonText" onClick="nextPage()">Continue</div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
