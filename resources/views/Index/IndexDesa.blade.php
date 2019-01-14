@extends('layouts.Dash')
@section('content')
<?php
  $pr='';
  $pr2='';
  $pr3='';
 ?>
<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->




    <form action="" method="get" >
    <select name="var2" class="pull-right clearfix"  onchange="this.form.submit();">
    <option value="0">kabupaten</option>
    @foreach ($Kab as $k)
    <option value="{{$k->id}}">{{$k->kabupaten}}</option>
    @endforeach
    </select>
    <?php
    if (isset($_GET['var2'])) {$pr2=$_GET['var2'];}
    $kabt = DB::select('SELECT id,kecamatan,idKab FROM kec WHERE (idKab)=:j', ['j' => $pr2]);
     ?>
    </form>

    <form action="" method="get" >
    <select name="var3" class="pull-right clearfix"  onchange="this.form.submit();">
    <option value="0">Kecamatan</option>
    @foreach ($kabt as $ke)
    <option value="{{$ke->id}}">{{$ke->kecamatan}}</option>
    @endforeach
    </select>
    <?php
    if (isset($_GET['var3'])) {$pr3=$_GET['var3'];}
    $kect = DB::select('SELECT id,Des,idKec FROM desa WHERE (idKec)=:j', ['j' => $pr3]);
     ?>
    </form>




    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <span class="pull-right clearfix">
      <a href="/admin/des/create" class="btn btn-xs btn-primary ">Buat Desa</a>

    </span>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example4" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                              <th>No</th>
                                <th>Desa</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $num=0;?>
                            @foreach ($kect as $de)
                            <th>
                              <?php $num=$num+1;
                              echo $num;
                              ?>
                            </th>

                        <th>{{$de->Des}}</th>
                        <th><form class="" action="/admin/des/{{$de->id}}" method="post">
                        <a href="/admin/des/{{$de->id}}/edit" class="btn btn-xs btn-primary">Edit</a>
                        </form></th>
                      <th>
                        <form class="" action="/admin/des/{{$de->id}}" method="post">
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
