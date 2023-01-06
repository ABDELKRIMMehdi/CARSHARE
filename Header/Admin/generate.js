function joinFNC(id, rideId){   
    $.ajax({
      type: "POST",
      url: "join.php",
      data: {function: 'join', userId: id, ride : rideId},
      success: function() {
        window.location.reload();
}
    });
}

function CancelThisRide(lastname, firstname, from, to, the, driver, ride, id){
  $.ajax({
      type: "POST",
      url: "cancelRide.php",
      data: {function: 'cancel', userLname : lastname, userFname : firstname, start : from, finish : to, day : the, driverId : driver, rideId: ride, userId : id},
      success: function() {
        window.location.reload();
}
    });
}


function deleteThisRide(id, startingpoint, arrival, date, time ){   
  $.ajax({
    type: "POST",
    url: "deleteRide.php",
    data: {function: 'deleteRide', rideId: id , start : startingpoint, finish : arrival, day : date, hour : time},
    success: function() {
      window.location.reload();
}
  });
}



$(window).on('load', function() {
  $("#SubmitButtonRed").click(function(){
     $('#hover_bg_Delete').show();
  });
  $('.close').click(function(){
      $('#hover_bg_Delete').hide();
  });

  $("#SubmitButtonBlue").click(function(){
      $('#hover_bg_Form').show();
   });
   
   $('.close').click(function(){
       $('#hover_bg_Form').hide();
   });

   $(".trigger_popup_friccREP").click(function(){
    $('.hover_bkgr_friccREP').show();
 });

 $('.popupCloseButtonREP').click(function(){
     $('.hover_bkgr_friccREP').hide();
 });
});


function initreply(target, source){
  $("#sendRep").attr("onclick", "reply(" + target.toString() + "," + source.toString() + ")");
}


function reply(target, source){   
  var message = document.getElementById("message").value;
  $.ajax({
    type: "POST",
    url: "send.php",
    data: {function: 'send', targetId: target, sourceId : source, mess : message},
    success: function() {
      window.location.reload();
}
  });
}