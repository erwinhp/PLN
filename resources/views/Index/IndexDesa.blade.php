@extends('layouts.Dash')
@section('content')
<script src="{{URL::to('/')}}/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="{{ asset('js/DD.js') }}"></script>

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
    <select name="var2" class="center-on-page" id="dropkab1">
    <option value="0" style="display:none;font-size:20px;">Kabupaten</option>
    @foreach ($Kab as $k)
    <option value="{{$k->id}}">{{$k->kabupaten}}</option>
    @endforeach
    </select>
    </form>
</div>


<div class="select">
  <form action="" method="get" id="ddKec">
    <?php
      //var 3=ajaxdropKec1 name of the select
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
  <a href="/admin/dusun/create">
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
                                <th>Persentase Listrik PLN</th>
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

                        <th>
                          <?php
                          $hasil=0;
                          $PLN=0;
                          $TOTAL=0;
                          $dusz = DB::select('SELECT id,Dusun,idDes FROM Dus WHERE (idDes)=:j', ['j' => $de->id]);
                          ?>


                                @foreach($dusz as $duz)
                                <?php
                                  $ketsz = DB::select('SELECT id,RtRw,PotPel,Keterangan,idDus FROM Ket WHERE (idDus)=:j', ['j' => $duz->id]);
                                ?>
                                    @foreach($ketsz as $ketz)
                                        <?php
                                          $TOTAL=$TOTAL+1;
                                        ?>
                                        @if ($ketz->Keterangan==="PLN")
                                        <?php
                                          $PLN=$PLN+1;
                                        ?>
                                        @endif
                                    @endforeach
                                @endforeach



                        <?php
                        if ($PLN==0) {
                          echo "0%";
                        }else {
                          $hasil=($PLN/$TOTAL)*100;
                          echo (round($hasil))."%";
                        }
                        ?>
                        </th>



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

<script src="{{ asset('js/DD.js') }}"></script>
<!--
<script src="{{URL::to('/')}}/assets/libs/js/Index.js"></script>
-->


@endsection
