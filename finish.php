<?php

  include 'mysql.php';
  session_start();

  $exp = 'test1';

  if (($_SESSION['workerId'] != '') && (is_numeric($_SESSION['condition'])) && (empty($_SESSION['mturkCode']))) {
    
    $_SESSION['mturkCode'] = strtoupper(dechex(mt_rand(4096, 65535)));

    $condition = $_SESSION['condition'];
    if ($condition < 4) {

        if ($condition == 1) {
          $conditionName = 'Control';
        } else if ($condition == 2) {
          $conditionName = 'PromptedRecall';
        } else if ($condition == 3) {
          $conditionName = 'FreeRecall';
        }


        $query = 'UPDATE `promptede2_conditions` SET `'.$conditionName.'`= '.$conditionName.'+1 WHERE Experiment = "'.$exp.'"';

        //check if any errors occured.
        if (($result = $db->query($query))===false) {
          printf("Invalid query: %s\n", $db->error);
        }

    }

    $query = 'UPDATE `promptede2_demo` SET `mturkCode`= "'.$_SESSION['mturkCode'].'" WHERE workerId = "'.$_SESSION['workerId'].'"';

    //check if any errors occured.
    if (($result = $db->query($query))===false) {
      printf("Invalid query: %s\n", $db->error);
    }

  }






?>
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
        <h1 class="title">Prompted Retrieval</h1>

        <div class="bodyTextHolder">
            <div class="bodyText" style="font-size: 32px; text-align: center;">

            <?php if ($_SESSION['workerId'] != '') { ?>
                Thank you for your participation! Please put the code below into the box on Mturk to confirm your participation.<br><br>
                <div style="text-align: center; margin: 0 auto;"><?php echo $_SESSION['mturkCode']; ?></div><br>
                <a href='debrief.pdf'>Here</a> is a debriefing page to what you have done.
            <?php } ?>

            </div>
        </div>
    </div>
</div>
  <script type="application/javascript">
    goingForward = true;
  </script>
</body>
</html>
