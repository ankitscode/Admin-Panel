<!doctype html>
<html lang="<?php echo e(Session::get('locale')); ?>" data-layout="vertical" data-layout-style="default" data-layout-position="fixed"
    data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-layout-width="fluid" data-sidebar-image="none"
    dir="<?php echo e(Session::get('locale') == 'ar' ? 'rtl' : 'ltr'); ?>">
<head>
    <title><?php echo e(env('APP_NAME', 'Admin Panel')); ?> - <?php echo $__env->yieldContent('title'); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Admin & Dashboard" name="description" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(URL::asset('assets/images/favicon.ico')); ?>">
    <?php echo $__env->make('layouts.admin.header.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<?php $__env->startSection('body'); ?>
    <?php echo $__env->make('layouts.admin.body.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldSection(); ?>
<!-- Begin page -->
<div id="layout-wrapper">
    <?php echo $__env->make('layouts.admin.menu.top_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.admin.menu.side_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <!-- container-fluid -->
        </div>
        
        <!-- End Page-content -->
        <?php echo $__env->make('layouts.admin.footer.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->



<!-- JAVASCRIPT -->
<?php echo $__env->make('layouts.admin.footer.footerJS', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



</body>

</html>
<?php /**PATH D:\laravel\Project\laravel\resources\views/layouts/admin/layout.blade.php ENDPATH**/ ?>