var goingForward = false;
var startTime;


window.onload = function() {
  console.log('loaded!');
  var startTime = Date.now();
  window.onbeforeunload = function() {
    var confirmationMessage = 'If you leave this page, progress will be lost and';
    confirmationMessage += 'you will have to start over';

    if (goingForward) {
      return undefined;
    } else {
      alertMessage = 'If you leave now, progress will be lost and you won\'t be able to continue';
      return alertMessage;
    }
  };
};


function nextPage() {
    location.href = "forward.php";
    goingForward = true;
}


function numberCheck(e) {
    var key = e.which;
    var verified = ((key==null) || (key==0) || (key==8) || (key==9) || (key==13) || (key==27) || (key == undefined)) ? false : String.fromCharCode(key).match(/[^0-9]/);

    return verified;
}

function barTimer(seconds, intSpeed, type, callback){
    var repSize = 10000;
    var inter = 10000/seconds/intSpeed;
    var location = repSize;
    var barSize = document.getElementById('bar').offsetWidth;
    var start = Date.now();
    var current;
    var milli = seconds * 1000;
    var barSpan = document.getElementById("barSpan");

    if (type == 1) {

        var timer = setInterval(function(){

            current = Date.now();

            if ((current - start) >= milli) {
                clearInterval(timer);
                if (callback !== undefined) callback();
            }

            barSpan.style.width = barSize - (barSize * ((current - start)/milli)) + "px";

        }, 1000/intSpeed);

    } else if (type == 3) {
        //IN THIS CASE, INTSPEED BECOMES THE AMOUNT OF PROGRESS YOU WILL PERFORM OUT OF [0 - 1]
        barSpan.style.webkittransition = "width 0.4";
        barSpan.style.moztransition =  "width 0.4s";
        barSpan.style.mstransition =  "width 0.4s";
        barSpan.style.transition = "width 0.4s";

        if ((barSpan.offsetWidth + intSpeed*barSize) < barSize) {
            barSpan.style.width = barSpan.offsetWidth + intSpeed*barSize + "px";
        } else {
            barSpan.style.width = barSize + "px";
        }

    } else {
        alert("When calling barTimer, please put a 1, 2, 3 in the third input argument");
    }
}

