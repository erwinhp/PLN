@extends('layouts.Dash')
@section('content')
<?php
  $pr='';
  $tmp='';
 ?>
<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->
<link rel="stylesheet" href="{{URL::to('/')}}/assets/libs/css/Index.css">
<script src="{{URL::to('/')}}/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="{{ asset('js/DD.js') }}"></script>


<div class="select">
    <form action="" method="get" >
    <select name="var2" class="center-on-page" id="dropkab">
    <option value="0" style="display:none;font-size:20px;">Kabupaten</option>
    @foreach ($Kab as $k)
    <option value="{{$k->id}}">{{$k->kabupaten}}</option>
    @endforeach
    </select>
    </form>
</div>


<div class="select">
  <form action="" method="get" id="ddKec">
  </form>
</div>


<div class="select">
    <form action="" method="get" id="dddes">
    <?php
    //var4= name of the select in the AjaxDropDes
    if (isset($_GET['var4'])) {$pr=$_GET['var4'];}
    $Dest = DB::select('SELECT id,Dusun,idDes FROM dus WHERE (idDes)=:j', ['j' => $pr]);
     ?>
    </form>
</div>


<?php $numb=0;?>
     @foreach ($Dest as $de)
    <?php $numb=$numb+1;?>
@endforeach

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div style="width:100%;margin-top: 20px;">

<div class="button">
  <a href="/admin/dusun/create">
    Buat Dusun
  </a>
  <div class="mask"></div>
</div>

<div class="button1">
  <a>TOTAL DUSUN = <?php echo $numb; ?></a>
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
                                <th>DUSUN</th>
                                <th>Persentase Listrik PLN</th>
                                <th>DETAIL DUSUN</th>
                                <th>EDIT</th>
                                <th>DELETE</th>

                            </tr>
                          </thead>
                          <tbody>
                            <?php $num=0;?>
                            @foreach ($Dest as $de)
                        <th>
                              <?php $num=$num+1;
                              echo $num;
                              ?>
                        </th>
                        <th>{{$de->Dusun}}</th>


                        <th>
                          <?php
                          $hasil=0;
                          $PLN=0;
                          $TOTAL=0;
                          ?>



                                    @foreach($Ket as $ketz)
                                      @if ($ketz->idDus===$de->id)
                                        <?php
                                          $TOTAL=$TOTAL+1;
                                        ?>
                                        @if ($ketz->Keterangan==="PLN")
                                        <?php
                                          $PLN=$PLN+1;
                                        ?>
                                        @endif
                                      @endif
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


                        <th>


                            <form method="get" action="{{URL::to('/')}}/admin/ket">
                                <input type="hidden" name="idDus" value="{{$de->id}}">
                                <input type="submit" class="btn btn-xs btn-primary" value="Detail">

                            </form>

                          </th>


                        <th><form class="" action="/admin/dusun/{{$de->id}}" method="post">
                        <a href="/admin/dusun/{{$de->id}}/edit" class="btn btn-xs btn-primary">EDIT</a>
                        </form></th>
                      <th>
                        <form class="" action="/admin/dusun/{{$de->id}}" method="post">
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


@endsection
