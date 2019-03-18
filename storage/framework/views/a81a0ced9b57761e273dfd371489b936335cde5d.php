<?php $__env->startSection('content'); ?>

<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->

<link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/assets/libs/css/Index.css">


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
                  <a class="nav-link active" href="<?php echo e(URL::to('/')); ?>/admin/user">Admin</a>
                </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(URL::to('/')); ?>/admin/user">User</a>
                  </li>
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
                            <?php $__currentLoopData = $User; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th>
                              <?php $num=$num+1;
                              echo $num;
                              ?>
                            </th>

                        <th><?php echo e($k->name); ?></th>
                        <th><form class="" action="/admin/user/<?php echo e($k->id); ?>" method="post">
                        <a href="/admin/user/<?php echo e($k->id); ?>/edit" class="btn btn-xs btn-primary">EDIT</a>
                        </form>
                      <th>
                        <form class="" action="/admin/user/<?php echo e($k->id); ?>" method="post">
                          <input type="hidden" name="_method" value="delete">
                          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                          <input onclick="return confirm('Apakah anda yakin untuk menghapus? Lanjutkan')" type="submit" class="btn btn-xs btn-primary" value="DELETE">
                        </form>
                      </th>
                          </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>

                    </div>
                  </ul>
                  </div>
                </div>
              </div>
            </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.Dash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>