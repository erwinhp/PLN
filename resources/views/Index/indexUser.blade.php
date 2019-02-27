@extends('layouts.Dash')
@section('content')

<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->

<link rel="stylesheet" href="{{URL::to('/')}}/assets/libs/css/Index.css">


    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="tab">
<div class="button">
  <a href="/register">
    Buat User
  </a>
  <div class="mask"></div>
</div>
</div>
    <span class="pull-right clearfix">
    </span>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example4" class="table table-striped table-bordered" style="width:100%">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>USER</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $num=0;?>
                            @foreach ($User as $k)
                            <th>
                              <?php $num=$num+1;
                              echo $num;
                              ?>
                            </th>

                        <th>{{$k->name}}</th>
                        <th><form class="" action="/admin/user/{{$k->id}}" method="post">
                        <a href="/admin/user/{{$k->id}}/edit" class="btn btn-xs btn-primary">EDIT</a>
                        </form>
                      <th>
                        <form class="" action="/admin/user/{{$k->id}}" method="post">
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
