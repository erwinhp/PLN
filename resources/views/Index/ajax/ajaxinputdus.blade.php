@extends('layouts.Dash2')
@section('content')
<!--JQUERY -->
<script src="{{URL::to('/')}}/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="{{ asset('js/DD.js') }}"></script>

<?php
$pr2='';
if (isset($_GET['valuedus'])) {$pr2=$_GET['valuedus'];}
$kabt = DB::select('SELECT id,Dusun,idDes FROM Dus WHERE (idDes)=:j', ['j' => $pr2]);
 ?>

 <select class="form-control input-sm" name="idDus" value="{{ old('idDus') }}" required>
   @foreach ($kabt as $u)
    <option value="0" style="display:none;font-size:20px;">Dusun</option>
     <option value="{{$u->id}}"->{{$u->Dusun}}</option>
   @endforeach
 </select >




@endsection

</script>
