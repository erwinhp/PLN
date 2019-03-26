
//ini DDKEC DUSUN without onchange()
$(document).ready(function(){
$("#dropkab").change(function(e) {
var valueKab= $('#dropkab').val();
$.get("/admin/ajaxkecd", {valueKab: valueKab}, function(data){
  $("#ddKec").html(data);
});
});
});

//DDdes onchange
$(document).ready(function(){
$("#dropkecDus").change(function(e) {
var valueKec= $('#dropkecDus').val();
$.get("/admin/ajaxdesd", {valueKec: valueKec}, function(data){
  $("#dddes").html(data);
});
});
});


//ini DDKEC DESA dengan onchange
$(document).ready(function(){
$("#dropkab1").change(function(e) {
var valueKab= $('#dropkab1').val();
//url ny membuat oncahnge atau tidak
$.get("/admin/ajaxkecd1", {valueKab: valueKab}, function(data){
  $("#ddKec").html(data);
});
});
});


//ini DDKEC without onchange for request()
$(document).ready(function(){
$("#dropkabReq").change(function(e) {
var valueKab= $('#dropkabReq').val();
$.get("/admin/ajaxkecd2", {valueKab: valueKab}, function(data){
  $("#ddKec").html(data);
});
});
});

$(document).ready(function(){
$("#dropkecreq").change(function(e) {
var valueKec= $('#dropkecreq').val();
$.get("/admin/ajaxdesd1", {valueKec: valueKec}, function(data){
  $("#dddes").html(data);
});
});
});

$(document).ready(function(){
$("#dropdesreq").change(function(e) {
var valuedes= $('#dropdesreq').val();
$.get("/admin/ajaxdusd", {valuedes: valuedes}, function(data){
  $("#dddus").html(data);
});
});
});


















///AJAX INPUT===================================================================
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
