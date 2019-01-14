<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card">
              <h5 class="card-header">Edit Dusun</h5>
              <div class="card-body">
                <div class="panel-bSody">
                    <form class="form-horizontal" role="form" method="post" action="/admin/dusun/<?php echo e($Dus->id); ?>" >


                        <?php echo e(csrf_field()); ?>



                        <div class="form-group<?php echo e($errors->has('idKab') ? ' has-error' : ''); ?>">
                    <label for="idDes" class="col-md-4 control-label">Desa</label>

                    <div class="col-md-6">
                      <select class="form-control input-sm"name="idDes" value="<?php echo e($Dus->idDes); ?>" required>
                        <?php $__currentLoopData = $Desa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($u->id); ?>"-><?php echo e($u->Des); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select >
                        <?php if($errors->has('idDes')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('idDes')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>


                        <div class="form-group<?php echo e($errors->has('har_bes') ? ' has-error' : ''); ?>">
                            <label for="har_bes" class="col-md-4 control-label">Dusun</label>

                            <div class="col-md-6">
                                <input id="Dusun" type="Dusun" class="form-control" name="Dusun" value="<?php echo e($Dus->Dusun); ?>" required>

                                <?php if($errors->has('Dusun')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('Dusun')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>



                        <input type="hidden" name="_method" value="put">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>