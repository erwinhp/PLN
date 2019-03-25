@extends('layouts.Dash2')
@section('content')
<!--JQUERY -->
<script src="{{URL::to('/')}}/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="{{ asset('js/DD.js') }}"></script>

<?php
$pr2='';
if (isset($_GET['valuedes'])) {$pr2=$_GET['valuedes'];}
$kabt = DB::select('SELECT id,Des,idKec FROM Desa WHERE (idKec)=:j', ['j' => $pr2]);
 ?>

 <select class="form-control input-sm"name="idDes" id="ajaxdesdrops" value="{{ old('idDes') }}" required>
   @foreach ($kabt as $u)
    <option value="0" style="display:none;font-size:20px;">Desa</option>
     <option value="{{$u->id}}"->{{$u->Des}}</option>
   @endforeach
 </select >





@endsection

</script>
