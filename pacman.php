<!DOCTYPE html>
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
        <h1 class="title">Pacman</h1>

        <div class="bodyTextHolder">

            <div class="bodyText">
                <div id="hidden"></div><div id= "pacman" align="center"><embed src="http://www.classicgamesarcade.com/games/pacman.swf" width="415px" height="500px" autostart="true" loop="false" controller="true"></embed><br /></div>
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

<script type="application/javascript">

$(".nextButton").toggle();
barTimer(30, 50, 1, function() {
    $(".nextButton").toggle();
    $(".timer").toggle();
    document.getElementById('pacman').style.display = 'none';
});

</script>
</body>
</html>

