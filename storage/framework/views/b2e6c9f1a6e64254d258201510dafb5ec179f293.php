<?php $__env->startSection('content'); ?>
<?php
  $pr='';
  $pr2='';
  $pr3='';
 ?>
<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->


    <form action="" method="get" >
    <select name="var" class="pull-right clearfix"  onchange="this.form.submit();">
    <option value="0">Provinsi</option>
    <?php $__currentLoopData = $Prov; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($p->id); ?>"><?php echo e($p->provinsi); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php
    if (isset($_GET['var'])) {$pr=$_GET['var'];}
    $provt = DB::select('SELECT id,Kabupaten,idProv FROM kab WHERE (idProv)=:j', ['j' => $pr]);
     ?>
    </form>



    <form action="" method="get" >
    <select name="var2" class="pull-right clearfix"  onchange="this.form.submit();">
    <option value="0">kabupaten</option>
    <?php $__currentLoopData = $provt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($k->id); ?>"><?php echo e($k->Kabupaten); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php
    if (isset($_GET['var2'])) {$pr2=$_GET['var2'];}
    $kabt = DB::select('SELECT id,kecamatan,idKab FROM kec WHERE (idKab)=:j', ['j' => $pr2]);
     ?>
    </form>

    <form action="" method="get" >
    <select name="var3" class="pull-right clearfix"  onchange="this.form.submit();">
    <option value="0">Kecamatan</option>
    <?php $__currentLoopData = $kabt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ke): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($ke->id); ?>"><?php echo e($ke->kecamatan); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php
    if (isset($_GET['var3'])) {$pr3=$_GET['var3'];}
    $kect = DB::select('SELECT id,Des,idKec FROM desa WHERE (idKec)=:j', ['j' => $pr3]);
     ?>
    </form>




    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <span class="pull-right clearfix">
      <a href="/admin/kab/create" class="btn btn-xs btn-primary ">Buat Kecamatan</a>
    </span>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example4" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>kecamatan</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $__currentLoopData = $kect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $de): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th><?php echo e($de->Des); ?></th>
                        <th><form class="" action="/admin/des/<?php echo e($de->id); ?>" method="post">
                        <a href="/admin/kec/<?php echo e($de->id); ?>/edit" class="btn btn-xs btn-primary">Edit</a>
                        </form></th>
                      <th>
                        <form class="" action="/admin/des/<?php echo e($de->id); ?>" method="post">
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