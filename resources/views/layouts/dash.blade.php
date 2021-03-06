<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->

    <link rel="icon" href="{{URL::to('/')}}/pln.png">
    <link rel="stylesheet" href="{{URL::to('/')}}/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="{{URL::to('/')}}/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::to('/')}}/assets/libs/css/style.css">
    <link rel="stylesheet" href="{{URL::to('/')}}/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="{{URL::to('/')}}/assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="{{URL::to('/')}}/assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="{{URL::to('/')}}/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{URL::to('/')}}/assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="{{URL::to('/')}}/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>STABILITAS RD KALSEL</title>

</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="../home"><img src="{{URL::to('/')}}/iconLogo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">



                      <!--NOTIFICATION-->

                      <!--SELECT NOTIF-->

                      @can('isAdmin')
                        <li class="nav-item dropdown notification" >
                          <a class="nav-link nav-icons" href="#"  id="notifs"  data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"><i class="fas fa-fw fa-bell" onclick="markNotificationAsRead('{{count(auth()->user()->unreadNotifications)}}')"></i> <span class="glyphicon glyphicon-globe" ></span>

                            <span class="badge" id="nums">{{count(auth()->user()->unreadNotifications)}}</span>
                          </a>


                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown" >
                                <li>
                                    <div class="notification-title"> Notification</div>
                                    <div class="notification-list">
                                        <div class="list-group">
                                          @foreach (auth()->user()->unreadNotifications as $notification)
                                            <a href="{{URL::to('/')}}/req/{{$notification->data['req']['id']}}" class="list-group-item list-group-item-action active">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">{{$notification->data['User']['name']}}</span> Melakukan Request RT {{$notification->data['req']['RtRw']}}
                                                        <div class="notification-date">{{$notification->created_at}}</div>
                                                    </div>
                                                </div>
                                            </a>
                                            @endforeach
                                          </div>
                                        </div>
                                </li>

                                <li>
                                    <div class="list-footer"> <a href="{{URL::to('/')}}/admin/notifall">View all notifications</a></div>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        <!-- NOTIFICATION USER-->
                        <!--
                        @can('isUser')
                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notification</div>
                                    <div class="notification-list">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="assets/images/avatar-2.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Jeremy Rakestraw</span>accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
-                                    <div class="list-footer"> <a href="#">View all notifications</a></div>
                                </li>
                            </ul>
                        </li>
                        @endcan
                      -->
                          <!-- DORPDOWN  USER SIGN OUT-->
                        <li class="nav-item dropdown connection">
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" ><i class="fa fa-bars"></i></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                  @can('isAdmin')
                                    <h5 class="mb-0 text-white nav-user-name">Admin</h5>
                                  @endcan
                                  @can('isUser')
                                    <h5 class="mb-0 text-white nav-user-name">User</h5>
                                  @endcan

                                </div>
                                <?php
                                $a =auth()->user()->id;
                                ?>
                                @can('isAdmin')
                                <a class="dropdown-item" href="{{URL::to('/')}}/admin/user/{{$a}}/edit"><i class="fas fa-user mr-2"></i>Pengguna</a>
                                @endcan
                                <a class="dropdown-item" href="{{ route('logout') }}" class="fas fa-power-off mr-2"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="fas fa-power-off mr-2"></i> Keluar

                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
           <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="{{URL::to('/')}}/home">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            @can('isAdmin')
                            <li class="nav-item ">
                                <a class="nav-link active" href="{{URL::to('/')}}/home" data-toggle="" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-home"></i>Beranda <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{URL::to('/')}}/admin/chart" data-toggle="" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-fw fa-chart-pie"></i>  Chart</a>
                             </li>
                           <li class="nav-item ">
                               <a class="nav-link" href="{{URL::to('/')}}/admin/user" data-toggle="" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-user mr-2"></i>  Pengguna</a>
                            </li>

                            @endcan
                            @can('isUser')
                            <li class="nav-item ">
                                <a class="nav-link" href="{{URL::to('/')}}/req" data-toggle="" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-info-circle"></i>  Request</a>
                             </li>
                            @endcan
                            @can('isAdmin')
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Tabel</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/')}}/admin/kab">Kabupaten</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/')}}/admin/kec">Kecamatan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/')}}/admin/des">Desa</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/')}}/admin/dusun">Dusun</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/')}}/admin/req">Request</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            @endcan

                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                      @yield('content')
                    <!-- ============================================================== -->
                  </div>

                  </div>
                </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->


            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->


    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->

    <!-- jquery 3.3.1 -->
    <script src="{{URL::to('/')}}/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="{{URL::to('/')}}/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>

    <!-- slimscroll js -->
    <script src="{{URL::to('/')}}/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="{{URL::to('/')}}/assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="{{URL::to('/')}}/assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="{{URL::to('/')}}/assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="{{URL::to('/')}}/assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="{{URL::to('/')}}/assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="{{URL::to('/')}}/assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="{{URL::to('/')}}/assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="{{URL::to('/')}}/assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="{{URL::to('/')}}/assets/libs/js/dashboard-ecommerce.js"></script>
    <script src="{{URL::to('/')}}/assets/libs/js/dashboard-ecommerce.js"></script>
    <script src="{{URL::to('/')}}/asset/js/main.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>



</body>
</div>
</html>
