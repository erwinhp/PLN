@extends('layouts.Dash2')
@section('content')
<!--JQUERY -->
<script src="{{URL::to('/')}}/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="{{ asset('js/DD.js') }}"></script>
<?php
$pr4='';
if (isset($_GET['valuedes'])) {$pr4=$_GET['valuedes'];}
$kect = DB::select('SELECT id,Dusun,idDes FROM Dus WHERE (idDes)=:j', ['j' => $pr4]);
 ?>

 <select name="var4" class="pull-right clearfix" id="dropdus"  onchange="this.form.submit();">
 <option value="0" style="display:none;font-size:20px;">Dusun</option>
 @foreach ($kect as $kec1)
 <option value="{{$kec1->id}}">{{$kec1->Dusun}}</option>
 @endforeach
 </select>


@endsection
