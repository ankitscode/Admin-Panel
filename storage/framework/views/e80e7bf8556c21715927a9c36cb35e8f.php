<?php $__env->startSection('title'); ?>
    <?php echo e(__('main.dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('assets/libs/jsvectormap/jsvectormap.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('assets/libs/swiper/swiper.min.css')); ?>" rel="stylesheet" type="text/css" />
<style>
    .bg-user{
        background: #FF9702 0% 0% no-repeat padding-box !important;
        opacity: 1;
    }
    .bg-product{
        background: #00D683 0% 0% no-repeat padding-box !important;
        opacity: 1;
    }
    .bg-package{
        background: #FF142B 0% 0% no-repeat padding-box !important;
        opacity: 1;
    }
    .bg-order{
        background: #38B7FE 0% 0% no-repeat padding-box !important;
        opacity: 1;
    }
    .bg-revenue{
        background: #4769CA 0% 0% no-repeat padding-box !important;
        opacity: 1;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('title'); ?> <?php echo e(__('main.dashboard')); ?> <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-animate bg-user">
            <div class="card-body">
                <div class="row d-flex align-items-center">
                    <div class="col-4">
                        <img src="<?php echo e(asset('assets/images/total_users.svg')); ?>" alt="usericon" >
                    </div>
                    <div class="col-8">
                        <p class="text-uppercase fw-bold text-white text-truncate mb-0"><?php echo e(__('main.number_of_users')); ?></p>
                        <h4 class="fs-22 fw-bold ff-secondary text-white mb-4"><span class="counter-value" data-target="<?php echo e(isset($userCount) ? $userCount : 0); ?>">0</span></h4>

                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div>
    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-animate bg-product">
            <div class="card-body">
                <div class="row d-flex align-items-center">
                    <div class="col-4">
                        <img src="<?php echo e(asset('assets/images/total_product.svg')); ?>" alt="usericon" >
                    </div>
                    <div class="col-8">
                        <p class="text-uppercase fw-bold text-white text-truncate mb-0"><?php echo e(__('main.number_of_product')); ?></p>
                        <h4 class="fs-22 fw-bold ff-secondary text-white mb-4"><span class="counter-value" data-target="<?php echo e(isset($productCount) ? $productCount : 0); ?>">0</span></h4>

                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div>
    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-animate bg-order">
            <div class="card-body">
                <div class="row d-flex align-items-center">
                    <div class="col-4">
                        <img src="<?php echo e(asset('assets/images/total_users.svg')); ?>" alt="usericon" >
                    </div>
                    <div class="col-8">
                        <p class="text-uppercase fw-bold text-white text-truncate mb-0"><?php echo e(__('main.number_of_order')); ?></p>
                        <h4 class="fs-22 fw-bold ff-secondary text-white mb-4"><span class="counter-value" data-target="<?php echo e(isset($orderCount) ? $orderCount : 0); ?>">0</span></h4>

                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div>
    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-animate bg-revenue">
            <div class="card-body">
                <div class="row d-flex align-items-center">
                    <div class="col-4">
                        <img src="<?php echo e(asset('assets/images/total_users.svg')); ?>" alt="usericon" >
                    </div>
                    <div class="col-8">
                        <p class="text-uppercase fw-bold text-white text-truncate mb-0"><?php echo e(__('main.total_revenue')); ?></p>
                        <h4 class="fs-22 fw-bold ff-secondary text-white mb-4"><span class="counter-value" data-target="<?php echo e(isset($totalRevenue) ? $totalRevenue : 0); ?>">0</span></h4>

                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<!-- apexcharts -->
<script src="<?php echo e(URL::asset('/assets/libs/apexcharts/apexcharts.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/libs/jsvectormap/jsvectormap.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/libs/swiper/swiper.min.js')); ?>"></script>
<!-- dashboard init -->
<script src="<?php echo e(URL::asset('/assets/js/pages/dashboard-ecommerce.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Project\laravel\resources\views/admin/dashboard/dashboard.blade.php ENDPATH**/ ?>