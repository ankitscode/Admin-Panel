
<?php $__env->startSection('title'); ?>
    <?php echo e(__('main.import_user')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <?php $__env->startComponent('components.breadcrumb'); ?>
  <?php $__env->slot('li_1'); ?> <?php echo e(__('main.import')); ?> <?php $__env->endSlot(); ?>
  <?php $__env->slot('title'); ?> <?php echo e(__('main.users')); ?> <?php $__env->endSlot(); ?>
  <?php $__env->slot('link'); ?> <?php echo e(route('admin.usersList')); ?> <?php $__env->endSlot(); ?>
  <?php echo $__env->renderComponent(); ?>
  <form action="<?php echo e(route('admin.importUsers')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="row">
      <div class="col-lg-8">
          <div class="card shadow mb-4">
              <div class="card-header py-3 d-flex align-items-center" style="background: none">
                  <h6 class="col-10 m-0 font-weight-bold text-primary flex-grow-1">Choose file</h6>
              </div>
              <div class="card-body">
                <input type="file" name="file" class="form-control custom-file-input" id="customFile" required>
                <div class="col-4 mt-2">
                  <button  class="btn btn-primary" id="submitButton">Import Users</button>
                </div>
              </div>
            </div>
        </div>
    </div>
  </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Project\laravel\resources\views/admin/users/import_user_file.blade.php ENDPATH**/ ?>