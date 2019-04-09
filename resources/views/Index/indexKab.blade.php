@extends('layouts.Dash')
@section('content')


<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->
<link rel="stylesheet" href="{{URL::to('/')}}/assets/libs/css/index.css">



  <?php $numb=0;?>
     @foreach ($Kab as $k)
    <?php $numb=$numb+1;?>
@endforeach


<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div style="width:100%;margin-top: 20px;">

<div class="button" >
  <a href="/admin/kab/create">
    Buat Kabupaten
  </a>
  <div class="mask"></div>
</div>

<div class="button">
  <a href="/admin/kec/create">
    Buat Kecamatan
  </a>
  <div class="mask"></div>
</div>

<div class="button1">
  <a> TOTAL KABUPATEN = <?php echo $numb; ?></a>
  <div class="mask1"></div>
</div>

     <span class="pull-right clearfix"></span>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>KABUPATEN</th>
                                <th>Persentase Listrik PLN</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $num=0;?>
                            @foreach ($Kab as $k)
                            <th>
                              <?php $num=$num+1;
                              echo $num;
                              ?>
                            </th>

                        <th>{{$k->kabupaten}}</th>
                        <th>
                          <?php
                          $hasil=0;
                          $PLN=0;
                          $TOTAL=0;
                          $kect = DB::select('SELECT id,kecamatan,idKab FROM Kec WHERE (idKab)=:j', ['j' => $k->id]);
                          ?>
                        @foreach ($kect as $ke)
                          <?php
                            $desz = DB::select('SELECT id,Des,idKec FROM Desa WHERE (idKec)=:j', ['j' => $ke->id]);
                          ?>
                            @foreach ($desz as $dez)
                            <?php
                              $dusz = DB::select('SELECT id,Dusun,idDes FROM Dus WHERE (idDes)=:j', ['j' => $dez->id]);
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
                        <th><form class="" action="/admin/prov/{{$k->id}}" method="post">
                        <a href="/admin/kab/{{$k->id}}/edit" class="btn btn-xs btn-primary">EDIT</a>
                        </form>
                      <th>
                        <form class="" action="/admin/kab/{{$k->id}}" method="post">
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
