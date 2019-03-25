@extends('layouts.Dash2')
@section('content')
<!--JQUERY -->
<script src="{{URL::to('/')}}/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="{{ asset('js/DD.js') }}"></script>

<?php
$pr2='';
if (isset($_GET['valuekec'])) {$pr2=$_GET['valuekec'];}
$kabt = DB::select('SELECT id,kecamatan,idKab FROM kec WHERE (idKab)=:j', ['j' => $pr2]);
 ?>

 <select class="form-control input-sm"name="idKec" value="{{ old('idKec') }}" id="dropinkec" required>
   @foreach ($kabt as $u)
    <option value="0" style="display:none;font-size:20px;">Kecamatan</option>
     <option value="{{$u->id}}"->{{$u->kecamatan}}</option>
   @endforeach
 </select >





@endsection

</script>
