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

    <form action="" method="get" >
    <select name="var4" class="pull-right clearfix"  onchange="this.form.submit();">
    <option value="0">Desa</option>
    <?php $__currentLoopData = $kect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kec1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($kec1->id); ?>"><?php echo e($kec1->Des); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php
    if (isset($_GET['var4'])) {$pr=$_GET['var4'];}
    $Dest = DB::select('SELECT id,Dusun,idDes FROM dus WHERE (idDes)=:j', ['j' => $pr]);
     ?>
    </form>


    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <span class="pull-right clearfix">
      <a href="/admin/dusun/create" class="btn btn-xs btn-primary ">Buat Dusun</a>

    </span>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example4" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                              <th>No</th>
                                <th>Dusun</th>
                                <th>Detail Dusun</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                          </thead>
                          <tbody>
                            <?php $num=0;?>
                            <?php $__currentLoopData = $Dest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $de): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th>
                              <?php $num=$num+1;
                              echo $num;
                              ?>
                            </th>
                        <th><?php echo e($de->Dusun); ?></th>
                        <th>button Detail with ahref</th>
                        <th><form class="" action="/admin/dusun/<?php echo e($de->id); ?>" method="post">
                        <a href="/admin/dusun/<?php echo e($de->id); ?>/edit" class="btn btn-xs btn-primary">Edit</a>
                        </form></th>
                      <th>
                        <form class="" action="/admin/dusun/<?php echo e($de->id); ?>" method="post">
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