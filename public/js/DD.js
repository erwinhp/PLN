
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
$("#dropkab2").change(function(e) {
var valueKab= $('#dropkab2').val();
$.get("/admin/ajaxinputkecs", {valuekec: valueKab}, function(data){
  $("#ddKec").html(data);
});
});
});



$(document).ready(function(){
$("#dropinkec").change(function(e) {
var valuedes= $('#dropinkec').val();
$.get("/admin/ajaxinputdess", {valuedes: valuedes}, function(data){
  $("#dddes").html(data);
});
});
});


$(document).ready(function(){
$("#ajaxdesdrops").change(function(e) {
var valuedus= $('#ajaxdesdrops').val();
$.get("/admin/ajaxinputduss", {valuedus: valuedus}, function(data){
  $("#dddus").html(data);
});
});
});


$(document).ready(function(){
$("#dropkab2").change(function(e) {
var valueKab= $('#dropkab2').val();
$.get("/admin/ajaxinputkecs", {valuekec: valueKab}, function(data){
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
