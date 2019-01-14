<?php $__env->startSection('content'); ?>

<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->


    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <span class="pull-right clearfix">
      <a href="/admin/kab/create" class="btn btn-xs btn-primary">Buat Kabupaten</a>

      <a href="/admin/kec/create" class="btn btn-xs btn-primary">Buat Kecamatan</a>
    </span>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example4" class="table table-striped table-bordered" style="width:100%">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kabupaten</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $num=0;?>
                            <?php $__currentLoopData = $Kab; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th>
                              <?php $num=$num+1;
                              echo $num;
                              ?>
                            </th>

                        <th><?php echo e($k->kabupaten); ?></th>
                        <th><form class="" action="/admin/prov/<?php echo e($k->id); ?>" method="post">
                        <a href="/admin/kab/<?php echo e($k->id); ?>/edit" class="btn btn-xs btn-primary">Edit</a>
                        </form>
                      <th>
                        <form class="" action="/admin/kab/<?php echo e($k->id); ?>" method="post">
                          <input type="hidden" name="_method" value="delete">
                          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                          <input type="submit" class="btn btn-xs btn-primary" value="Delete">
                        </form>
                      </th>
                          </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>

                    </div>
                  </div>
                </div>
              </div>
            </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.Dash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>