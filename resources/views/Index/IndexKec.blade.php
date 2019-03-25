@extends('layouts.Dash')
@section('content')

<?php
  $pr2='';
 ?>
<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->
<link rel="stylesheet" href="{{URL::to('/')}}/assets/libs/css/Index.css">


<div class="select">
    <form name="refreshForm" action="" method="get" style="font-family: 'Russo One', sans-serif;font-style: bold">
      <select id="foo" name="var2" class="center-on-page" onchange="this.form.submit();">
<?php
      if (isset($_GET['var2'])) {$pr2=$_GET['var2'];}
      $kabt = DB::select('SELECT id,kecamatan,idKab FROM kec WHERE (idKab)=:j', ['j' => $pr2]);
?>
       <option value="$kab" style="display:none;font-size:20px;">Kabupaten</option>
        @foreach ($Kab as $k)
        <option name="visited" value="{{$k->id}}">{{$k->kabupaten}}</option>
        @endforeach
      </select>
    </form>
</div>

<?php $numb=0;?>
     @foreach ($kabt as $ke)
    <?php $numb=$numb+1;?>
@endforeach

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div style="width:100%;margin-top: 20px;">

<div class="button1">
  <a>TOTAL KECAMATAN = <?php echo $numb; ?></a>
  <div class="mask1"></div>
</div>

<div class="button">
  <a href="/admin/kec/create">Buat Kecamatan</a>
  <div class="mask"></div>
</div>

<div class="button">
  <a href="/admin/des/create">Buat Desa</a>
  <div class="mask"></div>
</div>


     <span class="pull-right clearfix"></span>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example4" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>KECAMATAN</th>
                                <th>Persentase Listrik PLN</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
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
                          <?php
                          $hasil=0;
                          $PLN=0;
                          $TOTAL=0;
                          ?>

                            @foreach ($Des as $dez)
                              @if($dez->idKec===$ke->id)
                                @foreach($Dus as $duz)
                                  @if ($duz->idDes===$dez->id)
                                    @foreach($Ket as $ketz)
                                      @if ($ketz->idDus===$duz->id)
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
                                  @endif
                                @endforeach
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

                        <th><form class="" action="/admin/kec/{{$ke->id}}" method="post">
                        <div class="container">
                        <a href="/admin/kec/{{$ke->id}}/edit" class="btn btn-xs btn-primary">EDIT</a>
                      </div>
                        </form></th>
                      <th>
                        <form class="" action="/admin/kec/{{$ke->id}}" method="post">
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
</div>

@endsection
