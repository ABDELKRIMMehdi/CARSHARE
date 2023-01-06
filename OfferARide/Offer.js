/*$(document).ready(function () {
    var checkboxes = $(':checkbox'),
        span = $('#allChecked');

    checkboxes.prop('checked', true);

    checkboxes.on('change', function () {
        var checked = checkboxes.filter(':checked');
        if (checked.length == checkboxes.length)
            span.text('(All Days Selected)');
        else {
            var days = jQuery.map(checked, function (n, i) { return n.id; });
            span.text('(' + days.join(', ') + ' Selected)');
        }
    });
});*/


/*document.getElementById("checkspan").addEventListener("click", function () {
    if (document.getElementById("switcher").checked == false) {
        document.getElementById("switcher").checked = true;
        document.getElementById("repeat").style.maxHeight = '150px';
        document.getElementById("repeat").style.transition = 'max-height 0.35s';
    } else {
        document.getElementById("switcher").checked = false;
        document.getElementById("repeat").style.maxHeight = '0px';
        document.getElementById("repeat").style.transition = 'max-height 0.35s';
    }
});*/



$(function () {
    var now = new Date(),
        minDate = now.toISOString().substring(0, 10);

    $('#date').prop('min', minDate);
});
$(function () {
    var now = new Date(),
        maxDate = now.toISOString().substring(0, 10);
        newyear = parseInt(maxDate.substring(0,4)) + 1;
        maxDate= maxDate.replace(maxDate.substring(0,4), newyear.toString());
    $('#date').prop('max', maxDate);
});


document.getElementById("musicBox").addEventListener("change", function () {
    if (document.getElementById("musicBox").checked == false) {
        document.getElementById("note").style.color = "red";
    }
    if (document.getElementById("musicBox").checked == true) {
        document.getElementById("note").style.color = "rgb(63, 135, 230)";
    }
})
document.getElementById("animalBox").addEventListener("change", function () {
    if (document.getElementById("animalBox").checked == false) {
        document.getElementById("animals").style.color = "red";
    }
    if (document.getElementById("animalBox").checked == true) {
        document.getElementById("animals").style.color = "rgb(63, 135, 230)";
    }
})
document.getElementById("smokingBox").addEventListener("change", function () {
    if (document.getElementById("smokingBox").checked == false) {
        document.getElementById("cigarette").style.color = "red";
    }
    if (document.getElementById("smokingBox").checked == true) {
        document.getElementById("cigarette").style.color = "rgb(63, 135, 230)";
    }
})
document.getElementById("luggageBox").addEventListener("change", function () {
    if (document.getElementById("luggageBox").checked == false) {
        document.getElementById("luggage").style.color = "red";
    }
    if (document.getElementById("luggageBox").checked == true) {
        document.getElementById("luggage").style.color = "rgb(63, 135, 230)";
    }
})



window.addEventListener("load", function () {
    if (document.getElementById("musicBox").checked == false) {
        document.getElementById("note").style.color = "red";
    }
    if (document.getElementById("musicBox").checked == true) {
        document.getElementById("note").style.color = "rgb(63, 135, 230)";
    }
    if (document.getElementById("animalBox").checked == false) {
        document.getElementById("animals").style.color = "red";
    }
    if (document.getElementById("animalBox").checked == true) {
        document.getElementById("animals").style.color = "rgb(63, 135, 230)";
    }
    if (document.getElementById("smokingBox").checked == false) {
        document.getElementById("cigarette").style.color = "red";
    }
    if (document.getElementById("smokingBox").checked == true) {
        document.getElementById("cigarette").style.color = "rgb(63, 135, 230)";
    }
    if (document.getElementById("luggageBox").checked == false) {
        document.getElementById("luggage").style.color = "red";
    }
    if (document.getElementById("luggageBox").checked == true) {
        document.getElementById("luggage").style.color = "rgb(63, 135, 230)";
    }
})


