window.onload = function(){setTimes();};

function setTimes() {
    var time = new Date();
    var utcHours = time.getUTCHours();
    var admins = new Array("uds", "mag", "jon", "dru");
    var timezones = new Array(0, 0, -5, -5);
    var hours = new Array();
    var jan = new Date(time.getFullYear(), 0, 1);
    var jul = new Date(time.getFullYear(), 6, 1);
    var dst = 0;
    if(Math.max(jan.getTimezoneOffset(), jul.getTimezoneOffset()) > time.getTimezoneOffset()) {
        dst = 1;
    }
    var minutes = addLeadingZero(time.getUTCMinutes());
    var flash = time.getSeconds() % 2;
    for(var i = 0; i < admins.length; i++) {
        timezones[i] += dst;
        hours[i] = (utcHours + timezones[i] + 24) % 24;
        var pam = "AM";
        if(hours[i] > 12) {
            pam = "PM";
        }
        hours[i] %= 12;
        document.getElementById(admins[i] + "-clock").innerHTML = hours[i] + (flash === 1 ? ":" : " ") + minutes + pam + " (UTC" + (timezones[i] < 0 ? "" : "+") + timezones[i] + ")";
    }
    timer = setTimeout(function(){setTimes();},500);
}

function addLeadingZero(i) {
    if(i < 10) {
        i = "0" + i;
    }
    return i;
}