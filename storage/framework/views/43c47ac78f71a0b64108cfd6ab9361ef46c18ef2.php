<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card">
              <h5 class="card-header">Input Kabupaten</h5>
              <div class="card-body">
                <div class="panel-bSody">
                    <form class="form-horizontal" role="form" method="POST" action="/admin/kab">
                        <?php echo e(csrf_field()); ?>



                        <div class="form-group<?php echo e($errors->has('har_bes') ? ' has-error' : ''); ?>">
                            <label for="har_bes" class="col-md-4 control-label">kabupaten</label>

                            <div class="col-md-6">
                                <input id="kabupaten" type="kabupaten" class="form-control" name="kabupaten" value="<?php echo e(old('kabupaten')); ?>" required>

                                <?php if($errors->has('kabupaten')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kabupaten')); ?></strong>
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
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>