<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="icon" href="<?php echo e(URL::to('/')); ?>/pln.png">
    <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo e(URL::to('/')); ?>/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/assets/libs/css/style.css">
    <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
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
                <a class="navbar-brand" href="../home">STABILITAS RD KALSEL</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background-color: blue">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">



                      <!--NOTIFICATION-->
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
                        <li class="nav-item dropdown notification" >
                          <a class="nav-link nav-icons" href="#"  id="markAsRead" onclick="markNotificationAsRead('<?php echo e(count(auth()->user()->unreadNotifications)); ?>')" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="glyphicon glyphicon-globe"></span>

                            <span class="badge"><?php echo e(count(auth()->user()->unreadNotifications)); ?></span>
                          </a>


                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notification</div>
                                    <div class="notification-list">
                                        <div class="list-group">
                                          <?php $__currentLoopData = auth()->user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="<?php echo e(URL::to('/')); ?>/req/<?php echo e($notification->data['req']['id']); ?>" class="list-group-item list-group-item-action active">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name"><?php echo e($notification->data['User']['name']); ?></span> Melakukan Request RT <?php echo e($notification->data['req']['RtRw']); ?>

                                                        <div class="notification-date"><?php echo e($notification->created_at); ?></div>
                                                    </div>
                                                </div>
                                            </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer"> <a href="#">View all notifications</a></div>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <!-- NOTIFICATION USER-->
                        <!--
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isUser')): ?>
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
                        <?php endif; ?>
                      -->
                          <!-- DORPDOWN  USER SIGN OUT-->
                        <li class="nav-item dropdown connection">
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-icons" href="<?php echo e(URL::to('/')); ?>/markAsRead" id="navbarDropdownMenuLink1" data-toggle="dropdown" ><i class="fa fa-bars"></i></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">USERS </h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>

                                <a class="dropdown-item" href="admin/user//edit"><i class="fas fa-user mr-2"></i>Pengguna</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Pengaturan</a>
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" class="fas fa-power-off mr-2"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="fas fa-power-off mr-2"></i> Keluar

                                </a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo e(csrf_field()); ?>

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
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
                            <li class="nav-item ">
                                <a class="nav-link active" href="#" data-toggle="" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-home"></i>Beranda <span class="badge badge-success">6</span></a>

                            </li>
                           <li class="nav-item ">
                               <a class="nav-link" href="<?php echo e(URL::to('/')); ?>/admin/user" data-toggle="" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-user mr-2"></i>  Pengguna</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../pages/data-tables.html" data-toggle="" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Grafik</a>
                            </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isUser')): ?>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo e(URL::to('/')); ?>/req" data-toggle="" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-info-circle"></i>  Request</a>
                             </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Tabel</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">

                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo e(URL::to('/')); ?>/admin/kab">Kabupaten</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo e(URL::to('/')); ?>/admin/kec">Kecamatan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo e(URL::to('/')); ?>/admin/des">Desa</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo e(URL::to('/')); ?>/admin/dusun">Dusun</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <?php endif; ?>

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
                      <?php echo $__env->yieldContent('content'); ?>
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
    <script src="<?php echo e(URL::to('/')); ?>/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="<?php echo e(URL::to('/')); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>

    <!-- slimscroll js -->
    <script src="<?php echo e(URL::to('/')); ?>/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="<?php echo e(URL::to('/')); ?>/assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="<?php echo e(URL::to('/')); ?>/assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="<?php echo e(URL::to('/')); ?>/assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="<?php echo e(URL::to('/')); ?>/assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="<?php echo e(URL::to('/')); ?>/assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="<?php echo e(URL::to('/')); ?>/assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="<?php echo e(URL::to('/')); ?>/assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="<?php echo e(URL::to('/')); ?>/assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="<?php echo e(URL::to('/')); ?>/assets/libs/js/dashboard-ecommerce.js"></script>
    <script src="<?php echo e(URL::to('/')); ?>/assets/libs/js/dashboard-ecommerce.js"></script>
    <script src="<?php echo e(URL::to('/')); ?>/asset/js/main.js"></script>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
</body>
</div>
</html>
