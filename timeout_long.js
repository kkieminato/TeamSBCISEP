var timer = document.getElementById("timer");
var duration = 1000; //10 minutes

setInterval(updateTimer, 1000);

function updateTimer() {
    duration--;
    if (duration < 1) {
        window.location = "logout.php";
    } else {
        timer.innertext = duration;
    }
} 

window.addEventListener("mousemove", resetTimer);

function resetTimer(){
    duration = 5000;
}

//<div id="timer"></div>
//<script src="timeout_long.js"></script>

