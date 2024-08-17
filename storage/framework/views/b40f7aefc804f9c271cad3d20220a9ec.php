
<?php $__env->startSection('title'); ?>
    <?php echo e(__('main.roles')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('assets/libs/jsvectormap/jsvectormap.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('assets/libs/swiper/swiper.min.css')); ?>" rel="stylesheet" type="text/css" />
    <!--datatable css-->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href=<?php echo e(asset('assets/css/dropify.css')); ?>>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo e(__('main.index')); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo e(__('main.roles')); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('link'); ?>
            <?php echo e(route('admin.roleList')); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm" id="customerList">
                <div class="card-header border-bottom-dashed">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm">
                            <div>
                                <h5 class="card-title mb-0"><?php echo e(__('main.roles_list')); ?></h5>
                            </div>
                        </div>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Role')): ?>
                            <div class="col-sm-auto">
                                <div>
                                    <a href="<?php echo e(route('admin.createRole')); ?>" class="btn btn-primary btn-sm" id="create-btn"><i
                                            class="ri-add-line align-bottom me-1"></i><?php echo e(__('main.create_role')); ?></a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card mb-1">
                        <table class="table nowrap align-middle w-100" style="margin-top: 0px !important;" id="roleTable">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th class="sort"><?php echo e(__('main.name')); ?></th>
                                    <th><?php echo e(__('main.action')); ?></th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete User')): ?>
        <form id="deleteRecordForm" method="post">
            <?php echo csrf_field(); ?>
        </form>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('layouts.admin.scripts.Datatables_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        $(document).ready(function() {
            $('#roleTable').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false,
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "<?php echo route('dataTable.dataTableRolesListTable'); ?>",
                    "type": "GET"
                },

                "columns": [{
                        "data": "name",
                        "render": function(data, type, row) {
                            <?php if(auth()->user()->can('View Role Details')): ?>
                                return '<a href="<?php echo e(route('admin.showRole', '')); ?>/' + row.id +
                                    '" class="text-primary" style="text-decoration: none !important;">' +
                                    data + '</a>';
                            <?php else: ?>
                                return data;
                            <?php endif; ?>
                        },
                    },
                    {
                        "data": "id",
                        "render": function(data, type, row) {
                            return ' <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['View Role Details', 'Edit Role'])): ?><ul class="list-inline hstack gap-2 mb-0"><?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('View Role Details')): ?><li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="<?php echo e(__('main.view')); ?>"><a href="<?php echo e(route('admin.showRole', '')); ?>/' +
                                data +
                                '" class="text-success d-inline-block"><i class="ri-eye-fill fs-16"></i></a></li> <?php endif; ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Role')): ?><li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="<?php echo e(__('main.edit')); ?>"><a href="<?php echo e(route('admin.editRole', '')); ?>/' +
                                data +
                                '" class="text-primary d-inline-block edit-item-btn"><i class=" ri-edit-2-fill fs-16"></i></a></li><?php endif; ?></ul><?php endif; ?>';
                        },
                    },
                ],
                'columnDefs': [{
                    "targets": 1,
                    "width": "15%",
                    'searchable': false,
                    'orderable': false,
                }],
                language: {
                    url: "<?php if(Auth::user()->lang == 'ar'): ?> <?php echo e(asset('assets/js/arabic.json')); ?> <?php elseif(Auth::user()->lang == 'de'): ?> <?php echo e(asset('assets/js/german.json')); ?>  <?php endif; ?>"
                }
            });
        });
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete User')): ?>
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

<?php echo $__env->make('layouts.admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Project\laravel\resources\views/admin/role/index.blade.php ENDPATH**/ ?>