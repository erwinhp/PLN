@extends('layouts.Dash')
@section('content')


<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->
<link rel="stylesheet" href="{{URL::to('/')}}/assets/libs/css/index.css">


<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div style="width:100%;margin-top: 20px;">


     <span class="pull-right clearfix"></span>
        <div class="card">
            <div class="card-body">

                @foreach (auth()->user()->readNotifications as $notification)
                @if( $Datenow->diffInDays($notification->read_at ) < 8 )
                  <a href="{{URL::to('/')}}/req/{{$notification->data['req']['id']}}">
                      <div class="notification-info">
                          <div class="list-group-item"><span class="notification-list-user-name">{{$notification->data['User']['name']}}</span> Melakukan Request RT {{$notification->data['req']['RtRw']}}
                              <div class="notification-date">{{$notification->created_at}}</div>
                          </div>
                      </div>
                  </a>
                <br>
                @endif
                @endforeach
            </div>
        </div>
  </div>
</div>



@endsection
