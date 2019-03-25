@extends('layouts.dash')
@section('content')
<?php
  $pr2='';
 ?>
<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->




    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <span class="pull-right clearfix">
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
                            <th>1</th>
                        <th>{{$req->RtRw}}</th>
                        <th>{{$req->PotPel}}</th>
                        <th>{{$req->Status}}</th>
                        <th><form class="" action="/admin/req/{{$req->id}}" method="post">
                        <a href="/admin/req/{{$req->id}}/edit" class="btn btn-xs btn-primary">Edit</a>
                        </form></th>
                      <th>
                        <form class="" action="/admin/req/{{$req->id}}" method="post">
                          <input type="hidden" name="_method" value="delete">
                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                          <input type="submit" class="btn btn-xs btn-primary" value="delete">
                        </form>
                      </th>
                          </tbody>
                        </table>

                    </div>
                  </div>
                </div>
              </div>
            </div>



@endsection
