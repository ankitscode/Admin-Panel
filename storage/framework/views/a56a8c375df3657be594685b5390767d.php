
<?php $__env->startSection('title'); ?>
    <?php echo e(__('main.view_admin')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <style>
        .equal-height-row {
            display: flex;
            flex-wrap: wrap;
        }

        .equal-height-row .col-lg-8,
        .equal-height-row .col-lg-4 {
            display: flex;
            flex-direction: column;
        }

        .equal-height-row .card {
            flex: 1;
        }

        .pagination {
            float: right;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo e(__('main.view')); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo e(__('main.admin')); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('link'); ?>
            <?php echo e(route('admin.adminList')); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="container">
        <div class="row equal-height-row">
            <div class="col-lg-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary flex-grow-1"><?php echo e(__('main.admin_details')); ?></h6>
                        <div class="flex-shrink-0">
                            <a
                                <?php if(!$adminDetails->uuid === Auth::user()->uuid): ?> href="javascript:void(0)" class="btn btn-disable" <?php if(true): echo 'disabled'; endif; ?> <?php else: ?> class="btn btn-primary edit-item-btn" href="<?php echo e(route('admin.editAdmin', ['uuid' => $adminDetails->uuid])); ?>" <?php endif; ?>><i
                                    class="ri-edit-line fs-16"></i></a>

                            <a href="javascript:void(0)"
                                <?php if(!$adminDetails->uuid === Auth::user()->uuid): ?> class="btn btn-disable" <?php if(true): echo 'disabled'; endif; ?> <?php else: ?> class="btn btn-danger remove-item-btn" data-id="<?php echo e($adminDetails->uuid); ?>" <?php endif; ?>><i
                                    class="ri-delete-bin-2-line fs-16"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td class="font-bold-600" style="width: 25%;"><?php echo e(__('main.full_name')); ?></td>
                                        <td><?php echo e(isset($adminDetails->full_name) ? $adminDetails->full_name : ''); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold-600" style="width: 25%;"><?php echo e(__('main.email')); ?></td>
                                        <td><?php echo e(isset($adminDetails->email) ? $adminDetails->email : ''); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold-600" style="width: 25%;"><?php echo e(__('main.phone_number')); ?></td>
                                        <td><?php echo e(isset($adminDetails->phone) ? $adminDetails->phone : ''); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold-600" style="width: 25%;"><?php echo e(__('main.birthday')); ?></td>
                                        <td><?php echo e(!empty($adminDetails->birthdate) ? date('F jS Y', strtotime($adminDetails->birthdate)) : '-'); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold-600" style="width: 25%;"><?php echo e(__('main.gender')); ?></td>
                                        <td><?php echo e(isset($adminDetails->genderType->name) ? $adminDetails->genderType->name : ''); ?>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('main.profile_picture')); ?></h6>
                    </div>
                    <div class="card-body">
                        <div class="card-body text-center">
                            <img class="rounded-circle mb-2 avater-ext"
                                src="<?php echo e(!empty($adminDetails->media->name) ? asset(config('image.profile_image_path_view') . $adminDetails->media->name) : asset('assets/images/users/user-dummy-img.jpg')); ?>"
                                style="height: 10rem;width: 10rem;">
                            <div class="large text-muted mb-4">
                                <span
                                    class="badge rounded-pill badge-outline-<?php echo e($adminDetails->is_active == 1 ? 'success' : 'danger'); ?>">
                                    <?php echo e($adminDetails->is_active ? __('main.active') : __('main.in_active')); ?>

                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('body').on('click', '.remove-item-btn', function(e) {
                e.preventDefault();
                var id = $(this).data("id");
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this Admin!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            var data = {
                                "_token": $('a[name="csrf-token"]').val(),
                                "id": id,
                            }
                            $.ajax({
                                type: "DELETE",
                                url: "<?php echo e(route('admin.destroyAdmin', '')); ?>" + "/" + id,
                                data: data,
                                success: function(response) {
                                    swal(response.status, {
                                            icon: "success",
                                            timer: 3000,
                                        })
                                        .then((result) => {
                                            window.location =
                                                '<?php echo e(route('admin.adminList')); ?>'
                                        });
                                }
                            });
                        }
                    });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Project\laravel\resources\views/admin/users/admin/view_admin.blade.php ENDPATH**/ ?>