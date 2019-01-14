<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card">
              <h5 class="card-header">Input Desa</h5>
              <div class="card-body">
                <div class="panel-bSody">
                    <form class="form-horizontal" role="form" method="POST" action="/admin/des">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('idProv') ? ' has-error' : ''); ?>">
                    <label for="idProv" class="col-md-4 control-label">Kecamatan</label>

                    <div class="col-md-6">
                      <select class="form-control input-sm"name="idKec" value="<?php echo e(old('idKec')); ?>" required>
                        <?php $__currentLoopData = $Kec; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($u->id); ?>"-><?php echo e($u->kecamatan); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select >
                        <?php if($errors->has('idKec')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('idKec')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                        <div class="form-group<?php echo e($errors->has('har_bes') ? ' has-error' : ''); ?>">
                            <label for="Desa" class="col-md-4 control-label">Desa</label>

                            <div class="col-md-6">
                                <input id="Des" type="Des" class="form-control" name="Des" value="<?php echo e(old('Des')); ?>" required>

                                <?php if($errors->has('Des')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('Des')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
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