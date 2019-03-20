@extends('layouts.Dash2')
@section('content')
<!--JQUERY -->
<script src="{{URL::to('/')}}/assets/vendor/jquery/jquery-3.3.1.min.js"></script>

<?php
$pr3='';
if (isset($_GET['valueKec'])) {$pr3=$_GET['valueKec'];}
$kect = DB::select('SELECT id,Des,idKec FROM desa WHERE (idKec)=:j', ['j' => $pr3]);
 ?>

 <select name="var4" class="pull-right clearfix"  onchange="this.form.submit();">
 <option value="0" style="display:none;font-size:20px;">Desa</option>
 @foreach ($kect as $kec1)
 <option value="{{$kec1->id}}">{{$kec1->Des}}</option>
 @endforeach
 </select>
@endsection
