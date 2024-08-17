
<?php $__env->startSection('title'); ?>
    <?php echo e(__('main.users')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('assets/libs/jsvectormap/jsvectormap.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('assets/libs/swiper/swiper.min.css')); ?>" rel="stylesheet" type="text/css" />
    <!--datatable css-->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href=<?php echo e(asset("assets/css/dropify.css")); ?>>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> <?php echo e(__('main.view')); ?> <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> <?php echo e(__('main.roles')); ?> <?php $__env->endSlot(); ?>
<?php $__env->slot('link'); ?> <?php echo e(route('admin.roleList')); ?> <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-xxl-12">
        <div class="card shadow-sm">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h5 class="card-title flex-grow-1 mb-0"><?php echo e(__('main.role_detail')); ?></h5>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['Edit Role', 'Delete Role'])): ?>
                    <div class="flex-shrink-0">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Role')): ?>
                        <a href="<?php echo e(route('admin.editRole', $role->id)); ?>" class="btn btn-primary btn-sm"><i class="ri-edit-2-line align-middle me-1"></i> <?php echo e(__('main.edit')); ?></a>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive border-bottom border-primary">
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th class="ps-0" scope="row" style="width:10%;"><?php echo e(__('main.name')); ?></th>
                                <td class="text-muted"><span class="badge badge-soft-primary fs-12"><?php echo e($role->name); ?></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row mt-3">
                    <?php if(!empty($permission['allGroups'])): ?>
                        <?php $__currentLoopData = $permission['allGroups']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!empty($permission['allPermissionsLists'])): ?>
                                <?php
                                    $allPermissionsLists = $permission['allPermissionsLists']
                                        ->filter(function ($item) use ($group) {
                                            if ($item->group == $group) {
                                                return $item;
                                            }
                                        })
                                        ->values();
                                ?>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <ul style="list-style-type: none;padding-inline-start: 15px;">
                                            <li>
                                                <h6><i class="mdi mdi-link-variant"></i><strong> <?php echo e(ucwords($group)); ?></strong></h6>
                                                <ul style="list-style-type: none;padding-left: 20px;">
                                                    <?php $__currentLoopData = $allPermissionsLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $allPermissionsList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li>
                                                            <?php if(in_array($allPermissionsList->id, $permission['rolePermissions'])): ?>
                                                                <i class="mdi mdi-check-bold text-success"></i>
                                                            <?php else: ?>
                                                                <i class="mdi mdi-close-thick text-danger"></i>
                                                            <?php endif; ?>
                                                            <?php echo e($allPermissionsList->name); ?>

                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Role')): ?>
<form id="deleteRecordForm" method="post">
    <?php echo csrf_field(); ?>
</form>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Role')): ?>
function deleteRecord(element) {
    Swal.fire({
        title: "<?php echo e(__('message.are_you_sure')); ?>",
        text: "<?php echo e(__('message.you_will_not_be_able_to_recover_data')); ?>",
        showCancelButton: true,
        confirmButtonClass: 'btn btn-primary w-xs me-2 mb-1',
        cancelButtonClass: 'btn btn-danger w-xs mb-1',
        confirmButtonText: "<?php echo e(__('message.delete_it')); ?>",
        buttonsStyling: false,
    }).then((result) => {
        if (result.isConfirmed) {
            var href = $(element).attr('data-href');
            $("#deleteRecordForm").attr("action", href);
            $('#deleteRecordForm').submit();
        }
    })
}
<?php endif; ?>
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Project\laravel\resources\views/admin/role/show.blade.php ENDPATH**/ ?>