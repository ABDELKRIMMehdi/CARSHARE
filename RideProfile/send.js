function sendTo(target, source){   
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