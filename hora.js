    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function checkCookie() {
        var user = getCookie("productOfferCounter");
        if (user != "") {
            return true;
        } else {
            return false;
        }
    }
    // fecha actual
    function getNewDate(dias = 0) {
        var newDate = new Date();
        var month = new Array();
        month[0] = "Jan";
        month[1] = "Feb";
        month[2] = "Mar";
        month[3] = "Apr";
        month[4] = "May";
        month[5] = "Jun";
        month[6] = "Jul";
        month[7] = "Aug";
        month[8] = "Sep";
        month[9] = "Oct";
        month[10] = "Nov";
        month[11] = "Dec";
        var n = month[newDate.getMonth()];

        var myCurrentDate = new Date(n + " " + newDate.getDate() + ", " + newDate.getFullYear() + " 00:00:00");
        var myFutureDate = new Date(myCurrentDate);
        if (dias > 0) myFutureDate.setDate(myFutureDate.getDate() + dias); else myFutureDate.setDate(myFutureDate.getDate());
        myFutureDate = myFutureDate.getTime();
        var cadena = new String(myFutureDate);
        cadena = cadena.toString();
        return cadena;
    }

    // Set the date we're counting down to
    // se coloca la fecha desde cuando empieza el contador
    var countDownDate = new Date("Jan 27, 2022 23:59:59").getTime();
    var now1 = new Date().getTime();
    var distance1 = countDownDate - now1;
    if (distance1 < 0) {
        if (checkCookie()) {
            if (getCookie("productOfferCounter") > 0) {
                countDownDate = getCookie("productOfferCounter");
            } else {
                setCookie("productOfferCounter", getNewDate(2), 365);
                countDownDate = getNewDate(2);
            }
        } else {
            setCookie("productOfferCounter", getNewDate(0), 365);
            countDownDate = getNewDate(0);
        }
    }

    // Update the count down every 1 second
    var x = setInterval(function () {

        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // If the count down is finished, write some text 
        if (distance < 0) {
            //clearInterval(x);
            //document.getElementById("demo").innerHTML = "EXPIRED";
            document.getElementById("demo").innerHTML = "0 <small>días</small> 00 <small>horas</small> 00 <small>minutos</small> 00 <small>segundos</small> ";
            setCookie("productOfferCounter", getNewDate(2), 365);
            countDownDate = getNewDate(2);

        } else {
            document.getElementById("demo").innerHTML = days + " <small>días</small> " + hours + " <small>horas</small> " +
                minutes + " <small>minutos</small> " + seconds + " <small>segundos</small> ";
        }
    }, 1000);