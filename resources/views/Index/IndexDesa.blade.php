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
<link rel="stylesheet" href="{{URL::to('/')}}/assets/libs/css/Index.css">

<div class="select">
    <form action="" method="get" >
    <select name="var2" class="center-on-page"  onchange="this.form.submit();">
    <option value="0" style="display:none;font-size:20px;">Kabupaten</option>
    @foreach ($Kab as $k)
    <option value="{{$k->id}}">{{$k->kabupaten}}</option>
    @endforeach
    </select>
    <?php
    if (isset($_GET['var2'])) {$pr2=$_GET['var2'];}
    $kabt = DB::select('SELECT id,kecamatan,idKab FROM kec WHERE (idKab)=:j', ['j' => $pr2]);
     ?>
    </form>
</div>
  
<div class="select">
    <form action="" method="get" >
    <select id="foo" name="var3" class="center-on-page"  onchange="this.form.submit();">
    <option value="0" style="display:none;font-size:20px;">Kecamatan</option>
    @foreach ($kabt as $ke)
    <option value="{{$ke->id}}">{{$ke->kecamatan}}</option>
    @endforeach
    </select>
    <?php
    if (isset($_GET['var3'])) {$pr3=$_GET['var3'];}
    $kect = DB::select('SELECT id,Des,idKec FROM desa WHERE (idKec)=:j', ['j' => $pr3]);
     ?>
    </form>
</div>


<?php $numb=0;?>
     @foreach ($kect as $de)
    <?php $numb=$numb+1;?>
@endforeach

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div style="width:100%;margin-top: 20px;">

<div class="button" >
  <a href="/admin/des/create">
    Buat Desa
  </a>
  <div class="mask"></div>
</div>

<div class="button">
  <a href="/admin/dus/create">
    Buat Dusun
  </a>
  <div class="mask"></div>
</div>

<div class="button1">
  <a >TOTAL DESA = <?php echo $numb; ?></a>
  <div class="mask1"></div>
</div>

    <span class="pull-right clearfix"></span>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example4" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                              <th>No</th>
                                <th>DESA</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
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
                        <a href="/admin/des/{{$de->id}}/edit" class="btn btn-xs btn-primary">EDIT</a>
                        </form></th>
                      <th>
                        <form class="" action="/admin/des/{{$de->id}}" method="post">
                          <input type="hidden" name="_method" value="delete">
                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                          <input onclick="return confirm('Apakah anda yakin untuk menghapus? Lanjutkan')" type="submit" class="btn btn-xs btn-primary" value="DELETE">
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


<!--
<script src="{{URL::to('/')}}/assets/libs/js/Index.js"></script>
-->
@endsection
