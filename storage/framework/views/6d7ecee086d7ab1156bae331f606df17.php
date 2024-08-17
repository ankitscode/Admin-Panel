
<?php $__env->startSection('title'); ?>
    <?php echo e(__('main.admin')); ?>

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
    <style>
     #adminTable_length{
        display: none;
     }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo e(__('main.index')); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo e(__('main.admin')); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('link'); ?>
            <?php echo e(route('admin.adminList')); ?>

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
         <?php $__env->slot('card_heard', null, []); ?>  <?php echo e(__('main.all_admins')); ?>  <?php $__env->endSlot(); ?>
         <?php $__env->slot('create_button_href', null, []); ?>  <?php echo e(route('admin.createAdmin')); ?>  <?php $__env->endSlot(); ?>
         <?php $__env->slot('create_button_title', null, []); ?>  <?php echo e(__('main.create_admin')); ?>  <?php $__env->endSlot(); ?>
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
                <div class="col-xxl-3 col-sm-4">
                    <div class="d-flex">
                        <button type="button" id="search_filter" class="btn btn-primary w-100 mx-1"><i
                                class=" ri-search-line me-1 align-bottom"></i> <?php echo e(__('main.search')); ?></button>
                        <button type="button" id="reset_filter" class="btn btn-success w-100 mx-1"><i
                                class="ri-refresh-line me-1 align-bottom"></i> <?php echo e(__('main.reset')); ?></button>
                    </div>
                </div>
                <!--end col-->
            </div>
         <?php $__env->endSlot(); ?>
         <?php $__env->slot('table_id', null, []); ?>  adminTable
         <?php $__env->endSlot(); ?>
         <?php $__env->slot('table_th', null, []); ?> 
            <th><?php echo e(__('main.image')); ?></th>
            <th><?php echo e(__('main.fullname')); ?></th>
            <th><?php echo e(__('main.email')); ?></th>
            <th><?php echo e(__('main.phone')); ?></th>
            <th><?php echo e(__('main.status')); ?></th>
            <th><?php echo e(__('main.role')); ?></th>
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
        const lang = sessionStorage.getItem('lang');
        $(document).ready(function() {
            $('#adminTable').DataTable({
                responsive: true,
                processing: true,
                keys: true,
                info: true,
                sort: true,
                searching: false,
                select: false,
                ordering: true,
                scrollY: '50vh',
                scrollX: true,
                scrollCollapse: true,
                jqueryUI: true,
                displayStart: 0,
                stateSave: true,
                autoWidth: false,
                paging: true,
                fixedHeader: true,
                fixedColumns: false,
                columnReorder: true,
                "ajax": {
                    "url": "<?php echo route('dataTable.dataTableAdminsListTable'); ?>",
                    "type": "GET",
                    "data": function(d) {
                        d.filterSearchKey = $("#filter_search_key").val();
                        d.filterStatus = $("#filter_status").val();
                        d.filterDate = $("#filter_date").val();
                    }
                },
                "columns": [{
                        data: 'profile_image',
                        render: function(data, type, row) {
                            return data ? '<img src="' + data +
                                '" alt="Profile Image" class="img-fluid d-block">' : '';
                        }
                    },
                    {
                        "data": "full_name",
                        "render": function(data, type, row) {
                            return row.full_name;
                        },
                    },
                    {
                        "data": "email"
                    },
                    {
                        "data": "phone"
                    },
                    {
                        "data": "is_active",
                        "render": function(data, type, row) {
                            if (data == 1) {
                                return '<span class="badge badge-soft-success text-uppercase">Active</span>';
                            } else {
                                return '<span class="badge badge-soft-danger text-uppercase">Not Active</span>';
                            }
                        },
                    },
                    {
                        "data": "roles",
                        "render": function(data, type, row) {
                            return (data.length > 0) ? data[0].name :
                                '<span class="badge badge-soft-danger text-uppercase"><?php echo e(__('main.no_role_found')); ?></span>';
                        }
                    },
                    {
                        "data": "uuid",
                        "render": function(data, type, row) {
                            return '<li class="list-inline-item edit"><a href="<?php echo e(route('admin.viewAdmin', '')); ?>/' +
                                row.uuid + '" data-id="' + row.uuid +
                                '" class="text-primary d-inline-block edit-btn"><i class="ri-eye-fill fs-16"></i></a></li><li class="list-inline-item edit"><a href="<?php echo e(route('admin.editAdmin', '')); ?>/' +
                                row.uuid + '" data-id="' + row.uuid +
                                '" class="text-primary d-inline-block edit-btn"><i class="ri-pencil-fill fs-16"></i></a></li><li class="list-inline-item"><a class="text-danger d-inline-block remove-item-btn"  data-id="' +
                                row.uuid +
                                '" href="javascript:void(0)"><i class="ri-delete-bin-5-fill fs-16"></i></a></li>';
                        },
                    },
                ],
                'columnDefs': [{
                        "targets": 0,
                        'searchable': false,
                        'orderable': false,
                        'width': '10%',
                        'className':'text-center avatar-sm bg-light rounded p-1',
                        'defaultContent': '-'
                    },
                    {
                        "targets": 1,
                        'searchable': true,
                        'orderable': true,
                        'width': '15%',
                        'className': 'text-center',
                        'defaultContent': '-'
                    },
                    {
                        "targets": 2,
                        'searchable': true,
                        'orderable': false,
                        'width': '15%',
                        'className': 'text-center',
                        'defaultContent': '-'
                    },
                    {
                        "targets": 3,
                        'searchable': true,
                        'orderable': false,
                        'width': '15%',
                        'className': 'text-center',
                        'defaultContent': '-'
                    },
                    {
                        "targets": 4,
                        'searchable': false,
                        'orderable': false,
                        'width': '15%',
                        'className': 'text-center',
                        'defaultContent': '-'
                    },
                    {
                        "targets": 5,
                        'searchable': false,
                        'orderable': false,
                        'width': '20%',
                        'className': 'text-center',
                        'defaultContent': '-'
                    },
                    {
                        "targets": 6,
                        'searchable': false,
                        'orderable': false,
                        'width': '30%',
                        'className': 'text-center',
                        'defaultContent': '-'
                    },
                ],
                language: {
                    url: '<?php if(session()->get('locale') == 'ar'): ?> <?php echo e(asset('js/Arabic.json')); ?> <?php elseif(session()->get('locale') == 'fr'): ?> <?php echo e(asset('js/French.json')); ?> <?php endif; ?>'
                }
            });
        });

        $("#search_filter").click(function(e) {
            e.preventDefault();
            $('#adminTable').DataTable().ajax.reload();
        });

        $("#reset_filter").click(function(e) {
            e.preventDefault();
            $('#filter_search_key').val('');
            $('#filter_status').prop('selectedIndex', 0);
            $('#adminTable').DataTable().ajax.reload();
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

<?php echo $__env->make('layouts.admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Project\laravel\resources\views/admin/users/admin/all_admin_list.blade.php ENDPATH**/ ?>