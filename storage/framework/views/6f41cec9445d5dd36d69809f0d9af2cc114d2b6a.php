<?php $__env->startSection('content'); ?>

<?php
  $pr2='';
 ?>
<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->
<link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/assets/libs/css/Index.css">


<div class="select">
    <form name="refreshForm" action="" method="get" style="font-family: 'Russo One', sans-serif;font-style: bold">
      <select id="foo" name="var2" class="center-on-page" onchange="this.form.submit();">
<?php
      if (isset($_GET['var2'])) {$pr2=$_GET['var2'];}
      $kabt = DB::select('SELECT id,kecamatan,idKab FROM kec WHERE (idKab)=:j', ['j' => $pr2]);
?>
       <option value="$kab" style="display:none;font-size:20px;">Kabupaten</option>
        <?php $__currentLoopData = $Kab; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option name="visited" value="<?php echo e($k->id); ?>"><?php echo e($k->kabupaten); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
    </form>
</div>

<?php $numb=0;?>
     <?php $__currentLoopData = $kabt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ke): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $numb=$numb+1;?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div style="width:100%;margin-top: 20px;">

<div class="button1">
  <a>TOTAL KECAMATAN = <?php echo $numb; ?></a>
  <div class="mask1"></div>
</div>

<div class="button">
  <a href="/admin/kec/create">Buat Kecamatan</a>
  <div class="mask"></div>
</div>

<div class="button">
  <a href="/admin/des/create">Buat Desa</a>
  <div class="mask"></div>
</div>


     <span class="pull-right clearfix"></span>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example4" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>KECAMATAN</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
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
                        <div class="container">
                        <a href="/admin/kec/<?php echo e($ke->id); ?>/edit" class="btn btn-xs btn-primary">EDIT</a>
                      </div>
                        </form></th>
                      <th>
                        <form class="" action="/admin/kec/<?php echo e($ke->id); ?>" method="post">
                          <input type="hidden" name="_method" value="delete">
                          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                          <input onclick="return confirm('Apakah anda yakin untuk menghapus? Lanjutkan')" type="submit" class="btn btn-xs btn-primary" value="DELETE">
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
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.Dash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>