
//ini DUSUN without onchange()
$(document).ready(function(){
$("#dropkab").change(function(e) {
var valueKab= $('#dropkab').val();
$.get("/admin/ajaxkecd", {valueKab: valueKab}, function(data){
  $("#ddKec").html(data);
});
});
});

//ini DD DESA dengan onchange
$(document).ready(function(){
$("#dropkab1").change(function(e) {
var valueKab= $('#dropkab1').val();
$.get("/admin/ajaxkecd1", {valueKab: valueKab}, function(data){
  $("#ddKec").html(data);
});
});
});


$(document).ready(function(){
$("#dropkec").change(function(e) {
var valueKec= $('#dropkec').val();
$.get("/admin/ajaxdesd", {valueKec: valueKec}, function(data){
  $("#dddes").html(data);
});
});
});
