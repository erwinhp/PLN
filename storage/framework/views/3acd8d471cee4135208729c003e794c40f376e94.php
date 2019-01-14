<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card">
              <h5 class="card-header">Input Kecamatan</h5>
              <div class="card-body">
                <div class="panel-bSody">
                    <form class="form-horizontal" role="form" method="POST" action="/admin/kec">
                        <?php echo e(csrf_field()); ?>



                        <div class="form-group<?php echo e($errors->has('idKab') ? ' has-error' : ''); ?>">
                    <label for="idKab" class="col-md-4 control-label">Kabupaten</label>

                    <div class="col-md-6">
                      <select class="form-control input-sm"name="idKab" value="<?php echo e(old('idKab')); ?>" required>
                        <?php $__currentLoopData = $Kab; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($u->id); ?>"-><?php echo e($u->kabupaten); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select >
                        <?php if($errors->has('idKab')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('idKab')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>



                        <div class="form-group<?php echo e($errors->has('har_bes') ? ' has-error' : ''); ?>">
                            <label for="har_bes" class="col-md-4 control-label">Kecamatan</label>

                            <div class="col-md-6">
                                <input id="kecamatan" type="kecamatan" class="form-control" name="kecamatan" value="<?php echo e(old('kecamatan')); ?>" required>

                                <?php if($errors->has('kecamatan')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kecamatan')); ?></strong>
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