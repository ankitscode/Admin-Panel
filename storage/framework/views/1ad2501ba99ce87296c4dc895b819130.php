
<?php $__env->startSection('title'); ?>
    <?php echo e(__('main.users')); ?>

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
            <?php echo e(__('main.users')); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('link'); ?>
            <?php echo e(route('admin.usersList')); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <?php if (isset($component)) { $__componentOriginal4e8ded160d73e5d31a77c952f5132830 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4e8ded160d73e5d31a77c952f5132830 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.list_view','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('list_view'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
         <?php $__env->slot('card_heard', null, []); ?>  <?php echo e(__('main.all_users')); ?>  <?php $__env->endSlot(); ?>
        
         <?php $__env->slot('search_label', null, []); ?> 
            <div class="row g-3">
                <div class="col-xxl-5 col-sm-6">
                    <div class="search-box">
                        <input type="text" name="filter_search_key" id="filter_search_key" class="form-control search"
                            placeholder="<?php echo e(__('main.search')); ?>">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </div>
                <!--end col-->
                <div class="col-xxl-2 col-sm-4">
                    <div class="form-group">
                        <select class="form-control" name="filter_status" id="filter_status">
                            <option value="all"><?php echo e(__('main.all')); ?></option>
                            <option value="1"><?php echo e(__('main.active')); ?></option>
                            <option value="0"><?php echo e(__('main.in_active')); ?></option>
                        </select>
                    </div>
                </div>
                <!--end col-->
               
                <!--end col-->
                <div class="col-xxl-3 col-sm-4">
                    <div class="d-flex">
                        <button type="button" id="search_filter" class="btn btn-primary w-100 mx-1" ><i class=" ri-search-line me-1 align-bottom"></i> <?php echo e(__('main.search')); ?></button>
                        <button type="button" id="reset_filter" class="btn btn-success w-100 mx-1"><i class="ri-refresh-line me-1 align-bottom"></i> <?php echo e(__('main.reset')); ?></button>
                    </div>
                </div>
                <!--end col-->
            </div>
         <?php $__env->endSlot(); ?>
         <?php $__env->slot('table_id', null, []); ?>  usersTable  <?php $__env->endSlot(); ?>
         <?php $__env->slot('table_th', null, []); ?> 
            <th><?php echo e(__('main.image')); ?></th>
            <th><?php echo e(__('fullname')); ?></th>
            <th><?php echo e(__('main.email')); ?></th>
            <th><?php echo e(__('main.phone')); ?></th>
            <th><?php echo e(__('main.status')); ?></th>
            <th><?php echo e(__('main.action')); ?></th>
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4e8ded160d73e5d31a77c952f5132830)): ?>
<?php $attributes = $__attributesOriginal4e8ded160d73e5d31a77c952f5132830; ?>
<?php unset($__attributesOriginal4e8ded160d73e5d31a77c952f5132830); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4e8ded160d73e5d31a77c952f5132830)): ?>
<?php $component = $__componentOriginal4e8ded160d73e5d31a77c952f5132830; ?>
<?php unset($__componentOriginal4e8ded160d73e5d31a77c952f5132830); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('layouts.admin.scripts.Datatables_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        $(document).ready(function() {
            $('#usersTable').DataTable({
            'responsive'    : true,
            'paging'        : true,
            'lengthChange'  : false,
            'searching'     : false,
            'ordering'      : true,
            'info'          : true,
            'autoWidth'     : false,
            "processing"    : true,
            "serverSide"    : true,
                ajax: {
                    "url": "<?php echo e(route('dataTable.dataTableUsersListTable')); ?>",
                    "type": "GET",
                    "data": function ( d ) {
                                        d.filterSearchKey = $("#filter_search_key").val();
                                        d.filterStatus = $("#filter_status").val();
                                        d.filterDate = $("#filter_date").val();
                                }
                },
                columns: [{
                        data: 'profile_image',
                        render: function(data, type, row) {
                            return data ? '<img src="' + data +
                                '" alt="Profile Image" class="img-fluid d-block">' : '';
                        }
                    },
                    {
                        data: 'full_name',
                        name: 'full_name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'is_active',
                        render: function(data, type, row) {
                            return data == 1 ?
                                '<span class="badge badge-soft-success text-uppercase">Active</span>' :
                                '<span class="badge badge-soft-danger text-uppercase">Not Active</span>';
                        }
                    },
                    {
                        data: 'Action',
                        name: 'Action',
                        render: function(data, type, row) {
                            return data;
                        }
                    },
                ],
                columnDefs: [{
                        targets: 0,
                        className: "text-center avatar-sm bg-light rounded p-1",
                        searchable:false,
                        orderable: false,
                    },
                    {
                        targets: [1, 2, 3,4,5],
                        className: "text-center",
                        searchable:false,
                        orderable: true,
                        defaultContent: '-'
                    },
                ],
                // language: {
                //     url: '<?php echo e(asset('js/Arabic.json')); ?>' // Adjust language file path as needed
                // }
            });
        });


        $("#search_filter").click(function(e) {
            e.preventDefault();
            $('#usersTable').DataTable().ajax.reload();
        });

        $("#reset_filter").click(function(e) {
            e.preventDefault();
            $('#filter_search_key').val('');
            $('#filter_status').prop('selectedIndex', 0);
            $('#filter_date').val('');
            $('#usersTable').DataTable().ajax.reload();
        });
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '.remove-item-btn', function(e) {
                e.preventDefault();
                var id = $(this).data("id");

                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this User!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: "DELETE",
                                url: "<?php echo e(route('admin.destroyUser', '')); ?>" + "/" + id,
                                data: {
                                    "_token": "<?php echo e(csrf_token()); ?>",
                                    "id": id,
                                },
                                success: function(response) {
                                    swal(response.status, {
                                            icon: "success",
                                            timer: 3000,
                                        })
                                        .then((result) => {
                                            window.location =
                                                '<?php echo e(route('admin.usersList')); ?>';
                                        });
                                },
                                error: function(xhr, status, error) {
                                    swal('Error!', 'Failed to delete user.', 'error');
                                }
                            });
                        }
                    });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Project\laravel\resources\views/admin/users/all_users_list.blade.php ENDPATH**/ ?>