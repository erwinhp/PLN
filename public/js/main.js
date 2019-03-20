$(document).ready(function(){
$("#notifs").click(function() {
  $.get('/markAsRead',function(data,status){
    $("#nums").html(0);
  });
});
});
