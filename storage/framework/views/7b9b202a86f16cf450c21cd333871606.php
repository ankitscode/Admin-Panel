
<?php $__env->startSection('title'); ?>
    <?php echo e(__('User Notification')); ?>

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
        #allnotificationtable_length{
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
            <?php echo e(__(' User Notification List')); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('link'); ?>
            <?php echo e(route('admin.getNotification')); ?>

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
         <?php $__env->slot('card_heard', null, []); ?>  <?php echo e(__('All Notifications')); ?>  <?php $__env->endSlot(); ?>
         <?php $__env->slot('search_label', null, []); ?> 
            <div class="row g-3">
                <div class="col-xxl-5 col-sm-5">
                    <div class="search-box">
                        <input type="text" name="filter_search_key" id="filter_search_key" class="form-control search"
                            placeholder="<?php echo e(__('main.search')); ?>">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </div>
                <!--end col-->

                <div class="col-xxl-3 col-sm-4">
                    <div class="d-lg-inline-flex">
                        <button type="button" id="search_filter" class="btn btn-primary mx-1 btn-custom"
                            style="width: 120px;"><i class="ri-search-line me-1 align-bottom"></i>
                            <?php echo e(__('main.search')); ?></button>
                        <button type="button" id="reset_filter" class="btn btn-success mx-1 btn-custom"
                            style="width: 120px;"><i class="ri-refresh-line me-1 align-bottom"></i>
                            <?php echo e(__('main.reset')); ?></button>
                        <button type="button" id="delete_all_notifications" class="btn btn-danger mx-1 btn-custom"
                            style="width: 120px;"><i class="ri-delete-bin-line me-1 align-bottom remove-item-btn"></i>
                            <?php echo e(__('main.truncate')); ?></button>
                    </div>
                </div>
                <!--end col-->
            </div>
         <?php $__env->endSlot(); ?>
         <?php $__env->slot('table_id', null, []); ?> allnotificationtable <?php $__env->endSlot(); ?>
         <?php $__env->slot('table_th', null, []); ?> 
            <th><?php echo e(__('main.user')); ?></th>
            <th><?php echo e(__('main.email')); ?></th>
            <th><?php echo e(__('main.type')); ?></th>
            <th><?php echo e(__('main.message')); ?></th>
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
    <script src="<?php echo e(asset('assets/js/pages/dropify.min.js')); ?>"></script>

    <script>
        $(document).ready(function() {
         $('.dropify').dropify();
         $('#allnotificationtable').DataTable({
                keys: true,
                info: true,
                sort: true,
                searching: false,
                select: false,
                ordering: true,
                scrollX: true,
                scrollCollapse: true,
                jQueryUI: true,
                displayStart: 0,
                stateSave: true,
                autoWidth: false,
                paging: true,
                fixedHeader: true,
                fixedColumns: false,
                responsive: true,
                processing: true,
                serverSide: true, // Indicate that server-side processing is enabled
                ajax: {
                    url: "<?php echo e(route('dataTable.userNotificationdataTable')); ?>",
                    type: "GET",
                    data: function(d) {
                        d.filterSearchKey = $("#filter_search_key").val();
                    }
                },
                columns: [
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'type',
                        name: 'type',
                        render: function(data, type, row) {
                            return data === 'App\\Notifications\\OrderReminder' ? 'Order Reminder Notification' : 'New Order Notification';
                        }
                    },
                    {
                        data: 'message',
                        name: 'message'
                    },
              
                ]
            });
        });
    

        $("#search_filter").click(function(e) {
            e.preventDefault();
            $('#allnotificationtable').DataTable().ajax.reload();
        });

        $("#reset_filter").click(function(e) {
            e.preventDefault();
            $('#filter_search_key').val('');
            $('#filter_status').prop('selectedIndex', 0);
            $('#filter_date').val('');
            $('#allnotificationtable').DataTable().ajax.reload();
        });

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '#delete_all_notifications', function(e) {
                e.preventDefault();
                swal({
                        title: "Are you sure you wan to delete all notifications?",
                        text: "Once deleted, you will not be able to recover these notifications!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: "GET",
                                url: "<?php echo e(route('admin.deleteNotification')); ?>",
                                data: {
                                    "_token": "<?php echo e(csrf_token()); ?>",
                                },
                                success: function(response) {
                                    if (response.status === 'No notifications to delete') {
                                        swal({
                                            title: "No Notifications",
                                            text: response.status,
                                            icon: "info",
                                            button: "Okay",
                                        });
                                    } else {
                                        swal({
                                            title: "Success!",
                                            text: response.status,
                                            icon: "success",
                                            timer: 3000,
                                        }).then((result) => {
                                            window.location =
                                                '<?php echo e(route('admin.getNotification')); ?>';
                                        });
                                    }
                                },
                                error: function(xhr, status, error) {
                                    swal('Error!', 'Failed to delete notificatios.',
                                        'error');
                                }
                            });
                        }
                    });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Project\laravel\resources\views/admin/users/notification/all_user_notification.blade.php ENDPATH**/ ?>