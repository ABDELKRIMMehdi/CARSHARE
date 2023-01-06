function delUser(idU, lN, fN) {
    $.ajax({
        type: "POST",
        url: "deleteUser.php",
        data: { function: 'deleteUser', id: idU, lastname : lN, firstname : fN },
        success: function() {
           window.location.reload();
        }
    });
}

function delRides(idU, startingpoint, arrival, date, time ) {
    $.ajax({
        type: "POST",
        url: "deleteRides.php",
        data: { function: 'deleteRides', rideId: idU, start : startingpoint, finish : arrival, day : date, hour : time },
        success: function() {
            window.location.reload();
        }
    });
}