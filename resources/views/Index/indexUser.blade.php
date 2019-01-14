@extends('layouts.Dash')
@section('content')

<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->


    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <span class="pull-right clearfix">
      <a href="/register" class="btn btn-xs btn-primary">Buat User</a>
    </span>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example4" class="table table-striped table-bordered" style="width:100%">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Edit</th>
                                <th>Delete</th>
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
                        <a href="/admin/user/{{$k->id}}/edit" class="btn btn-xs btn-primary">Edit</a>
                        </form>
                      <th>
                        <form class="" action="/admin/user/{{$k->id}}" method="post">
                          <input type="hidden" name="_method" value="delete">
                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                          <input type="submit" class="btn btn-xs btn-primary" value="Delete">
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