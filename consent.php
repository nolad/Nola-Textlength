<?php

    session_start();
    session_destroy();
    session_start();

    include 'pcllab-library.php';
    include 'assign-condition.php';

    //possibly do error checking on these? 
    //don't know what what they are limited to
    $_SESSION['hitId'] = get('hitId');
    $_SESSION['assignmentId'] = get('assignmentId');
    $_SESSION['workerId'] =  get('workerId');
    $_SESSION['activity'] = "Start";

    if ($_GET['condition'] == 4) {
      $_SESSION['condition'] = 4;
    }


?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
    <title>Prompted Retrieval</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" media="screen" title="no title"/>
    <script type="application/javascript" src="js/main.js"></script>
    <script type="application/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>

    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
      console.log("Screen too small.");
      goingForward = true;
      location.href = "nomobile.php";
    } else {

      function consent() {
        goingForward = true;
        location.href = "forward.php";
      }

      function noConsent() {
        goingForward = true;
        location.href = "noparticipation.php";
      }
    }
    </script>
</head>

<body>

<div id="globalContainer">
    <div class="card">
        <h1 class="title">Scaffolded Retrieval</h1>

        <div class="bodyTextHolder">
            <div class="bodyText" id="bodyText">

                <?php if (ses('workerId') == '') { ?>
                <p class="alert"><b>You currently do not have any valid Worker ID attached to your profile, please go back through mechanical turk and accept this HIT before you do this test.</b></p>
                <?php } ?>

                <b>Purpose of Research</b><br>
                The overall purpose of this research is to investigate the effects of different study techniques on learning.br><br>

                <b>Specific Procedures</b><br>
                Your participation will involve studying a set of material and taking memory tests.<br><br>

                <b>Duration of Participation and Compensation</b><br>
                The total duration of participation will be approximately 25 to 30 minutes. You will be compensated $2.00 for your participation.<br><br>

                <b>Risks</b><br>
                Minimal: The risks are not greater than those ordinarily encountered in daily life. However, breach of confidentiality is a possible risk in this type of research. Safeguards to minimize this risk are discussed in the Confidentiality section below.<br><br>

                <b>Benefits</b><br>
                There are no direct benefits to participants. You will have the opportunity to learn about experimental psychology tasks and the specific phenomenon under study.<br><br>

                <b>Confidentiality</b><br>
                Data and contact information will be collected via a secure website and stored on a secure server. Any data collected during this experiment will not be directly associated with any of your contact information. However, in some instances it may be necessary to maintain a key file that links your data to your contact information. In this situation the key file and contact information will be securely stored and then destroyed once all data have been collected. The anonymous data will be retained indefinitely in digital files accessible only to members of the research team. The project's research records may be reviewed by the National Science Foundation, by the Institute of Education Sciences within the U.S. Department of Education, and by departments at Purdue University responsible for regulatory and research oversight.<br><br>

                <b>Voluntary Nature of Participation</b><br>
                You do not have to participate in this research project. If you agree to participate you can withdraw your participation at any time without penalty.<br><br>

                <b>Contact Information</b><br>
                If you have any questions about this research project, you can contact the Cognition and Learning Laboratory (Email: learninglab@purdue.edu). If you have concerns about the treatment of research participants, you can contact the Institutional Review Board at Purdue University, 155 S. Grant St., West Lafayette, IN 47907-2114. The phone number for the Board is (765) 494-5942. The email address is irb@purdue.edu.<br><br>

                <?php if (ses('workerId') != '') { ?>
                <br><b>Do you consent to the content above?</b><br>

                <div class="buttonContainer">

                    <div id="consent-yes" class="consentButtons floatLeft" onclick="consent();">
                        <div class="nextButtonText">Yes</div>
                    </div>

                    <div id="consent-no" class="consentButtons floatRight" onclick="noConsent();">
                        <div class="nextButtonText">No</div>
                    </div>

                </div>

                <?php } ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>
