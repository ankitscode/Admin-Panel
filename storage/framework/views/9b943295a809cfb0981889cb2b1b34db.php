<div class="modal fade" id="adminProfileImageUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('main.update_profile_image')); ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
          <form class="form" method="POST" action="<?php echo e(route('admin.updateProfileImage')); ?>" id="updateProfileImage" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <div class="form-group">
                  <input type="file" name="image" required class="dropify" accept="image/png, image/jpeg, image/jpg" data-default-file="<?php echo e(isset($userDetails->profile_image) && !empty($userDetails->profile_image)? $userDetails->profile_image:''); ?>">
              </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="updateProfileImage"><?php echo e(__('main.update')); ?></button>
        </div>
      </div>
    </div>
  </div>
  <?php /**PATH D:\laravel\Project\laravel\resources\views/admin/component/modal/admin_profile_image_update_modal.blade.php ENDPATH**/ ?>