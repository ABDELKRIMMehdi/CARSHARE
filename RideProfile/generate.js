function joinFNC(id, firstname, lastname, from, to, the, driver, rideId, numleft){   
  var reservations = document.getElementById("nbplaces").value;
  if(reservations <= 0 || reservations > numleft){
    tourl = "rideProfile.php?error=invalidinput&rideId=" + rideId;
    window.location.replace(tourl);
    return;
  }
    $.ajax({
      type: "POST",
      url: "join.php",
      data: {function: 'join', userId: id, userFname : firstname, userLname : lastname, start : from, finish : to, day : the, driverId : driver, ride : rideId, res : reservations, max : numleft},
      success: function() {
        window.location.reload();
}
    });
}

function CancelThisRide(ride, id , from, to, the){
  $.ajax({
      type: "POST",
      url: "cancelRide.php",
      data: {function: 'cancel', rideId: ride, userId : id, startingPoint : from, arrival : to, day : the},
      success: function() {
        window.location.reload();
}
    });
}

$(window).on('load', function(){
  $(".trigger_popup_fricc").click(function(){
     $('.hover_bkgr_fricc').show();
  });
  $('.popupCloseButton').click(function(){
      $('.hover_bkgr_fricc').hide();
  });
});
