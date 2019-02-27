@extends('layouts.Dash')
@section('content')
<?php
  $pr2='';
 ?>
<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->
    <form action="" method="get" >
    <select id="kecs" name="var2" class="pull-right clearfix"  onchange="this.form.submit();">
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





    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <span class="pull-right clearfix">
      <a href="/admin/kab/create" class="btn btn-xs btn-primary ">Buat Kecamatan</a>

      <a href="/admin/des/create" class="btn btn-xs btn-primary ">Buat Desa</a>
    </span>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example4" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>kecamatan</th>
                                <th>Edit</th>
                                <th>Delete</th>
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

                        <th>{{$ke->kecamatan}}</th>
                      <th>
                        <form class="" action="/admin/kec/{{$ke->id}}" method="post">
                          <a href="/admin/kec/{{$ke->id}}/edit" class="btn btn-xs btn-primary">Edit</a>
                        </form>
                      </th>
                      <th>
                        <form class="" action="/admin/kec/{{$ke->id}}" method="post">
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

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script>
            $(document).ready(function(){
              $("button").click(function(){
                $("p").slideToggle();
              });
            });
            </script>

@endsection
