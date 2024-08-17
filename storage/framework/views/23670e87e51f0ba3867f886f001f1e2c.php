
<?php $__env->startSection('title'); ?>
    <?php echo e(__('main.view_user')); ?>

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
            <?php echo e(__('main.users')); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('link'); ?>
            <?php echo e(route('admin.usersList')); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="container">
        <div class="row equal-height-row">
            <div class="col-lg-8">
                <!-- User Details Card -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary flex-grow-1"><?php echo e(__('main.user_details')); ?></h6>
                        <div class="flex-shrink-0">
                            <a
                              <?php if($userDetails->id === Auth::user()->id): ?> href="javascript:void(0)"
                                class="btn btn-disable"
                                <?php if(true): echo 'disabled'; endif; ?>
                            <?php else: ?>
                                href="<?php echo e(route('admin.editUser', ['id' => $userDetails->id])); ?>"
                                class="btn btn-primary edit-item-btn" <?php endif; ?>><i
                                    class="ri-edit-line fs-16"></i></a>
                            <a href="javascript:void(0)"
                                <?php if($userDetails->id === Auth::user()->id): ?> class="btn btn-disable"
                                <?php if(true): echo 'disabled'; endif; ?>
                            <?php else: ?>
                                class="btn btn-danger remove-item-btn"
                                data-id="<?php echo e($userDetails->id); ?>" <?php endif; ?>><i
                                    class="ri-delete-bin-2-line fs-16"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td class="font-bold-600" style="width: 25%;"><?php echo e(__('main.full_name')); ?></td>
                                        <td><?php echo e($userDetails->full_name ? $userDetails->full_name : null); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold-600" style="width: 25%;"><?php echo e(__('main.email')); ?></td>
                                        <td><?php echo e($userDetails->email ? $userDetails->email : null); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold-600" style="width: 25%;"><?php echo e(__('main.phone_number')); ?></td>
                                        <td><?php echo e($userDetails->phone ? $userDetails->phone : null); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold-600" style="width: 25%;"><?php echo e(__('main.birthday')); ?></td>
                                        <td><?php echo e(!empty($userDetails->birthdate) ? date('F jS Y', strtotime($userDetails->birthdate)) : '-'); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold-600" style="width: 25%;"><?php echo e(__('main.gender')); ?></td>
                                        <td><?php echo e(isset($userDetails->genderType->name) ? $userDetails->genderType->name : ''); ?>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 ">
                <!-- Profile Picture Card -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('main.profile_picture')); ?></h6>
                    </div>
                    <div class="card-body">
                        <div class="card-body text-center">
                            <img class="rounded-circle mb-2 avater-ext"
                                src="<?php echo e(!empty($userDetails->media->name) ? asset(config('image.profile_image_path_view') . $userDetails->media->name) : asset('assets/images/users/user-dummy-img.jpg')); ?>"
                                style="height: 10rem;width: 10rem;">
                            <div class="large text-muted mb-4">
                                <span
                                    class="badge rounded-pill badge-outline-<?php echo e($userDetails->is_active == 1 ? 'success' : 'danger'); ?>">
                                    <?php echo e($userDetails->is_active ? __('main.active') : __('main.in_active')); ?>

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
    <?php echo $__env->make('layouts.admin.scripts.Datatables_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        $(document).ready(function() {
            $('#usersubscription-datatable').DataTable({
                responsive: true,
                paging: true,
                lengthChange: false,
                searching: false,
                info: true,
                ordering: false,
                autoWidth: true,
                paginate: true,
            });

            $('#userinterest-datatables').DataTable({
                responsive: true,
                paging: true,
                lengthChange: false,
                searching: false,
                info: true,
                ordering: false,
                autoWidth: true,
                paginate: true,
            });
            $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $('body').on('click','.remove-item-btn',function(e) {
        e.preventDefault();
        var id = $(this).data("id");
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this user!",
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
                url: "<?php echo e(route('admin.destroyUser', '')); ?>" + "/" + id,
                data: data,
                success: function(response) {
                    swal(response.status, {
                        icon: "success",
                        timer: 3000,
                    })
                    .then((result) => {
                        window.location =
                        '<?php echo e(route('admin.usersList')); ?>'
                    });
                }
                });
            }
            });
        });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Project\laravel\resources\views/admin/users/view_user.blade.php ENDPATH**/ ?>