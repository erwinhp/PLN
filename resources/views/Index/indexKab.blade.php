@extends('layouts.Dash')
@section('content')
<?php
  $pr='';
 ?>
<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->
<form action="" method="get" >
<select name="var" class="pull-right clearfix"  onchange="this.form.submit();">
<option value="0">Kabupaten</option>
@foreach ($Prov as $p)
<option value="{{$p->id}}">{{$p->provinsi}}</option>
@endforeach
</select>
    <?php
    if (isset($_GET['var'])) {$pr=$_GET['var'];}
    $provt = DB::select('SELECT id,kabupaten,idProv FROM kab WHERE (idProv)=:j', ['j' => $pr]);
     ?>
</form>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <span class="pull-right clearfix">
      <a href="/admin/kab/create" class="btn btn-xs btn-primary ">Buat Kabupaten</a>
    </span>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example4" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Kabupaten</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($provt as $k)
                        <th>{{$k->kabupaten}}</th>
                        <th><form class="" action="/admin/prov/{{$k->id}}" method="post">
                        <a href="/admin/prov/{{$k->id}}/edit" class="btn btn-xs btn-primary">Edit</a>
                        </form></th>
                      <th>
                        <form class="" action="/admin/prov/{{$k->id}}" method="post">
                          <input type="hidden" name="_method" value="delete">
                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                          <input type="submit" class="btn btn-xs btn-primary" value="delete">
                        </form>
                      </th>
                          </tbody>
                            @endforeach
                        </table>

                    </div>
                  </div>
                </div>
              </div>
            </div>



@endsection
