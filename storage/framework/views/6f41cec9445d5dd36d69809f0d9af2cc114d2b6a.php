<?php $__env->startSection('content'); ?>
<?php
  $pr2='';
 ?>
<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->
    <form action="" method="get" >
    <select name="var2" class="pull-right clearfix"  onchange="this.form.submit();">
    <option value="0">kabupaten</option>
    <?php $__currentLoopData = $Kab; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($k->id); ?>"><?php echo e($k->kabupaten); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php
    if (isset($_GET['var2'])) {$pr2=$_GET['var2'];}
    $kabt = DB::select('SELECT id,kecamatan,idKab FROM kec WHERE (idKab)=:j', ['j' => $pr2]);
     ?>
    </form>





    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <span class="pull-right clearfix">
      <a href="/admin/kab/create" class="btn btn-xs btn-primary ">Buat Kecamatan</a>

      <a href="/admin/des/create" class="btn btn-xs btn-primary ">Buat Desa</a>
    </span>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example4" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>kecamatan</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $num=0;?>
                            <?php $__currentLoopData = $kabt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ke): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th>
                              <?php $num=$num+1;
                              echo $num;
                              ?>
                            </th>

                        <th><?php echo e($ke->kecamatan); ?></th>
                        <th><form class="" action="/admin/kec/<?php echo e($ke->id); ?>" method="post">
                        <a href="/admin/kec/<?php echo e($ke->id); ?>/edit" class="btn btn-xs btn-primary">Edit</a>
                        </form></th>
                      <th>
                        <form class="" action="/admin/kec/<?php echo e($ke->id); ?>" method="post">
                          <input type="hidden" name="_method" value="delete">
                          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                          <input type="submit" class="btn btn-xs btn-primary" value="delete">
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