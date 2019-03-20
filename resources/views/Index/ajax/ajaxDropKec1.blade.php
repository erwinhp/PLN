@extends('layouts.Dash2')
@section('content')
<!--JQUERY -->
<script src="{{URL::to('/')}}/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="{{ asset('js/DD.js') }}"></script>

<?php
$pr2='';
if (isset($_GET['valueKab'])) {$pr2=$_GET['valueKab'];}
$kabt = DB::select('SELECT id,kecamatan,idKab FROM kec WHERE (idKab)=:j', ['j' => $pr2]);
 ?>

<select id="dropkec" name="var3" class="center-on-page" onchange="this.form.submit();">
<option value="0" style="display:none;font-size:20px;">Kecamatan</option>
@foreach ($kabt as $ke)
<option value="{{$ke->id}}">{{$ke->kecamatan}}</option>
@endforeach
</select>
@endsection

</script>
