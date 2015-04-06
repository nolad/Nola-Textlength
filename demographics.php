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
        <h1 class="title">Recall</h1>

        <div class="bodyTextHolder">

            <div class="bodyText">
                <textarea class="bigTextBox" placeholder="Please put what you remember here."></textarea>
            </div>

            <div class="timer" id="bar">
                <span id="barSpan"></span>
            </div>

            <div class="nextButton" >
                <div class="nextButtonText" onClick="next()">Continue</div>
            </div>

        </div>
    </div>
</div>

<script type="application/javascript">

//Delay time in seconds before
//continue can be clicked
var delay = 5;

function next() {
  $.ajax({        
    type: "POST",
    url: "saveRecall.php",       
    data: {
      response: $(".bigTextBox").val(),
      time: Math.round(((Date.now() - startTime)))
    },
    success: function(result) {
      nextPage();
    }
  }); 
}



$(".nextButton").toggle();
barTimer(delay, 50, 1, function() {
    $(".nextButton").toggle();
    $(".timer").toggle();
});

</script>
</body>
</html>
