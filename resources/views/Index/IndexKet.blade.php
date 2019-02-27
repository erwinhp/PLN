@extends('layouts.Dash')
@section('content')

<?php
  $pr='';
  $pr2='';
  $pr3='';
  $pr4='';
$ses = $_SESSION['idDus'];
if(!isset($_SESSION))
{
session_start();
}
//$_COOKIE['Getids'] = $_GET['idDus'];
$ses = $_REQUEST['idDus'];
$_SESSION['GD'] = $ses;
 //$_SESSION['Getz'] = $ses;
 //

 ?>

<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->



    <?php
    $Dsn = DB::select('SELECT id,RtRw,PotPel,Keterangan,idDus FROM ket WHERE (idDus)=:j', ['j' => $_SESSION['GD']]);
     ?>


    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <span class="pull-right clearfix">
      <a href="/admin/ket/create" class="btn btn-xs btn-primary ">Buat Rt/Rw</a>

    </span>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example4" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                              <th>No</th>
                                <th>RtRw</th>
                                <th>Potensi Pelanggan</th>
                                <th>Keterangan</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                          </thead>
                          <tbody>
                            <?php $num=0;?>
                            @foreach ($Dsn as $de)
                            <th>
                              <?php $num=$num+1;
                              echo $num;
                              ?>
                            </th>
                        <th>{{$de->RtRw}}</th>
                        <th>{{$de->PotPel}}</th>
                        <th>{{$de->Keterangan}}</th>
                        <th><form class="" action="/admin/ket/{{$de->id}}" method="post">
                        <a href="/admin/ket/{{$de->id}}/edit" class="btn btn-xs btn-primary">Edit</a>
                        </form></th>
                      <th>
                        <form class="" action="/admin/ket/{{$de->id}}" method="post">
                          <input type="hidden" name="_method" value="delete">
                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                          <input onclick="return confirm('Apakah anda yakin untuk menghapus? Lanjutkan')" type="submit" class="btn btn-xs btn-primary" value="delete">
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
