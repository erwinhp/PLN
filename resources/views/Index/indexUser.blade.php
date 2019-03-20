@extends('layouts.Dash')
@section('content')
<!--JQUERY -->
<script src="{{URL::to('/')}}/assets/vendor/jquery/jquery-3.3.1.min.js"></script>

<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->

<link rel="stylesheet" href="{{URL::to('/')}}/assets/libs/css/Index.css">


    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="tab">
<div class="button">
  <a href="/admin/user/create">
    Buat User
  </a>
  <div class="mask"></div>
</div>
</div>
    <span class="pull-right clearfix">
    </span>
        <div class="card">
            <div class="card-body">
              <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                  <a class="nav-link" id="admin" href="#" data-toggle="tab">Admin</a>
                </li>
                  <li class="nav-item">
                    <a class="nav-link" id="user" href="#" data-toggle="tab">User</a>
                  </li>
                <div class="table-responsive">
                    <table id="example4" class="table table-striped table-bordered" style="width:100%">
                      </table>
                    </div>
                  </ul>
                  </div>
                </div>
              </div>
            </div>


<script>
            $(document).ready(function(){
            $("#admin").click(function(e) {
            e.preventDefault();
            $.get('/admin/useradmin',function(data,status){
            $("#example4").html(data);
            });
            });
            });
</script>

<script>
            $(document).ready(function(){
            $("#user").click(function(e) {
            e.preventDefault();
            $.get('/admin/useruser',function(data,status){
            $("#example4").html(data);
            });
            });
            });
</script>

@endsection
