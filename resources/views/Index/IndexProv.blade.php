@extends('layouts.Dash')
@section('content')
<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <span class="pull-right clearfix">
      <a href="/admin/prov/create" class="btn btn-xs btn-primary ">Buat Provinsi</a>
    </span>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example4" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Provinsi</th>
                                <th>Tambah Kabupaten</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($Prov as $p)
                            <th>
                            </th>
                        <th>{{$p->provinsi}}</th>
                        <th>
                          <a href="/admin/kab/create" class="btn btn-xs btn-primary">Tambah</a>
                        </th> 
                        
                        <th><form class="" action="/admin/prov/{{$p->id}}" method="post">
                        <a href="/admin/prov/{{$p->id}}/edit" class="btn btn-xs btn-primary">Edit</a>
                        </form></th>
                      <th>
                        <form class="" action="/admin/prov/{{$p->id}}" method="post">
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
