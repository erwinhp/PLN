<?php $__env->startSection('content'); ?>
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
                            <?php $__currentLoopData = $Prov; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th>
                            </th>
                        <th><?php echo e($p->provinsi); ?></th>
                        <th>
                          <a href="/admin/kab/create" class="btn btn-xs btn-primary">Tambah</a>
                        </th> 
                        
                        <th><form class="" action="/admin/prov/<?php echo e($p->id); ?>" method="post">
                        <a href="/admin/prov/<?php echo e($p->id); ?>/edit" class="btn btn-xs btn-primary">Edit</a>
                        </form></th>
                      <th>
                        <form class="" action="/admin/prov/<?php echo e($p->id); ?>" method="post">
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