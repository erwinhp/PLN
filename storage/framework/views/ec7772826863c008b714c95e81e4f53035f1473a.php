<?php $__env->startSection('content'); ?>


<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->
<link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/assets/libs/css/index.css">



  <?php $numb=0;?>
     <?php $__currentLoopData = $Kab; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $numb=$numb+1;?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div style="width:100%;margin-top: 20px;">

<div class="button" >
  <a href="/admin/kab/create">
    Buat Kabupaten
  </a>
  <div class="mask"></div>
</div>

<div class="button">
  <a href="/admin/kec/create">
    Buat Kecamatan
  </a>
  <div class="mask"></div>
</div>

<div class="button1">
  <a> TOTAL KABUPATEN = <?php echo $numb; ?></a>
  <div class="mask1"></div>
</div>

     <span class="pull-right clearfix"></span>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example4" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>KABUPATEN</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
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
                        <a href="/admin/kab/<?php echo e($k->id); ?>/edit" class="btn btn-xs btn-primary">EDIT</a>
                        </form>
                      <th>
                        <form class="" action="/admin/kab/<?php echo e($k->id); ?>" method="post">
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



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.Dash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>