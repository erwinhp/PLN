@extends('layouts.dash')
@section('content')
<?php
  $pr2='';
 ?>
<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->

    <?php
    $kabt = DB::select('SELECT id,RtRw,PotPel,Status,idDus,idUser FROM req WHERE (idUser)=:j', ['j' => $UID]);
     ?>





    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <span class="pull-right clearfix">
      <a href="/req/create" class="btn btn-xs btn-primary ">Buat Request</a>

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
                                <th>Status</th>
                                <th>Ubah</th>
                                <th>Hapus</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $num=0;?>
                            @foreach ($kabt as $ke)
                            <th>
                              <?php $num=$num+1;
                              echo $num;
                              ?>
                            </th>

                        <th>{{$ke->RtRw}}</th>
                        <th>{{$ke->PotPel}}</th>
                        <th>{{$ke->Status}}</th>
                        <th><form class="" action="/req/{{$ke->id}}" method="post">
                        <a href="/req/{{$ke->id}}/edit" class="btn btn-xs btn-primary">Edit</a>
                        </form></th>
                      <th>
                        <form class="" action="/req/{{$ke->id}}" method="post">
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
