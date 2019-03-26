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
<link rel="stylesheet" href="{{URL::to('/')}}/assets/libs/css/Indexreq.css">
<script src="{{URL::to('/')}}/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="{{ asset('js/DD.js') }}"></script>


<div class="select">
    <form action="" method="get" >
    <select name="var2" class="center-on-page" id="dropkabReq">
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
    </form>
</div>

<div class="select">
    <form action="" method="get" id="dddus">
    <?php
    if (isset($_GET['var4'])) {$pr=$_GET['var4'];}
    $Dest = DB::select('SELECT id,RtRw,PotPel,Status,idDus,idUser FROM req WHERE (idDus)=:j', ['j' => $pr]);
     ?>
    </form>
</div>


<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div style="width:100%;margin-top: 20px;">

  <?php $numb=0;?>
  @forelse ($Dest as $de)
      @if($de->Status!="Selesai")
        <?php $numb=$numb+1;?>
        @endif
    @empty
      @foreach($req as $reqz)
        @if($reqz->Status!="Selesai")
          <?php $numb=$numb+1;?>
        @endif
    @endforeach
  @endforelse

<div class="button1">
  <a>TOTAL REQUEST = <?php echo $numb; ?></a>
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
                                <th>Dusun</th>
                                <th>RtRw</th>
                                <th>Potensi Pelanggan</th>
                                <th>Status</th>
                                <th>User</th>
                                <th>EDIT</th>
                                <th>DELETE</th>

                            </tr>
                          </thead>
                          <tbody>
                            <?php $num=0;?>

                            @forelse ($Dest as $de)
                              @if($de->Status!="Selesai")
                                    <th>
                                          <?php $num=$num+1;
                                          echo $num;
                                          ?>
                                    </th>

                                    <?php
                                    $GetDus = DB::select('SELECT Dusun FROM dus WHERE (id)=:j', ['j' => $de->idDus]);
                                    $GetUser = DB::select('SELECT name FROM users WHERE (id)=:j', ['j' => $de->idUser]);
                                    ?>
                                      @foreach ($GetDus as $dr)
                                        <th>{{$dr->Dusun}}</th>
                                      @endforeach
                                    <th>{{$de->RtRw}}</th>
                                    <th>{{$de->PotPel}}</th>
                                    <th>{{$de->Status}}</th>
                                      @foreach ($GetUser as $du)
                                        <th>{{$du->name}}</th>
                                      @endforeach

                                    <th><form class="" action="/admin/req/{{$de->id}}" method="post">
                                    <a href="/admin/req/{{$de->id}}/edit" class="btn btn-xs btn-primary">EDIT</a>
                                    </form></th>
                                  <th>
                                    <form class="" action="/admin/req/{{$de->id}}" method="post">
                                      <input type="hidden" name="_method" value="delete">
                                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                                      <input onclick="return confirm('Apakah anda yakin untuk menghapus? Lanjutkan')" type="submit" class="btn btn-xs btn-primary" value="DELETE">
                                    </form>
                                  </th>
                                      </tbody>
                              @endif
                              @empty
                                @foreach($req as $de)
                                  @if($de->Status!="Selesai")
                                        <th>
                                              <?php $num=$num+1;
                                              echo $num;
                                              ?>
                                        </th>

                                        <?php
                                        $GetDus = DB::select('SELECT Dusun FROM dus WHERE (id)=:j', ['j' => $de->idDus]);
                                        $GetUser = DB::select('SELECT name FROM users WHERE (id)=:j', ['j' => $de->idUser]);
                                        ?>
                                          @foreach ($GetDus as $dr)
                                            <th>{{$dr->Dusun}}</th>
                                          @endforeach
                                        <th>{{$de->RtRw}}</th>
                                        <th>{{$de->PotPel}}</th>
                                        <th>{{$de->Status}}</th>
                                          @foreach ($GetUser as $du)
                                            <th>{{$du->name}}</th>
                                          @endforeach

                                        <th><form class="" action="/admin/req/{{$de->id}}" method="post">
                                        <a href="/admin/req/{{$de->id}}/edit" class="btn btn-xs btn-primary">EDIT</a>
                                        </form></th>
                                      <th>
                                        <form class="" action="/admin/req/{{$de->id}}" method="post">
                                          <input type="hidden" name="_method" value="delete">
                                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                                          <input onclick="return confirm('Apakah anda yakin untuk menghapus? Lanjutkan')" type="submit" class="btn btn-xs btn-primary" value="DELETE">
                                        </form>
                                      </th>
                                          </tbody>
                                  @endif
                                @endforeach
                            @endforelse
                        </table>

                    </div>
                  </div>
                </div>
              </div>
            </div>



@endsection
