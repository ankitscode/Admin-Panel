<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" data-topbar="light">

<head>
    <meta charset="utf-8" />
    <title><?php echo $__env->yieldContent('title'); ?> | Admin & Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Admin & Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(URL::asset('assets/images/favicon.ico')); ?>">
    <?php echo $__env->make('layouts.admin.header.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<?php echo $__env->yieldContent('body'); ?>

<?php echo $__env->yieldContent('content'); ?>

<script src="<?php echo e(asset('assets/libs/bootstrap/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/simplebar/simplebar.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/node-waves/node-waves.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/feather-icons/feather-icons.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/pages/plugins/lord-icon-2.1.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins.min.js')); ?>"></script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src=<?php echo e(asset("assets/libs/jquery-toast-plugin-master/src/jquery.toast.js")); ?>></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="<?php echo e(URL::asset('assets/libs/prismjs/prismjs.min.js')); ?>"></script>
<script src=<?php echo e(asset("assets/js/pages/dropify.min.js")); ?>></script>
<script>
    <?php if(Session::has('success')): ?>
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
        toastr.success("<?php echo e(session('success')); ?>");
    <?php endif; ?>

    <?php if(Session::has('alert-success')): ?>
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
    toastr.success("<?php echo e(session('alert-success')); ?>");
    <?php endif; ?>

    <?php if(Session::has('alert-error')): ?>
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("<?php echo e(session('alert-error')); ?>");
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.error("* <?php echo e($error); ?>");
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
 
</script>
<?php echo $__env->yieldContent('script'); ?>
</body>

</html>
<?php /**PATH D:\laravel\Project\laravel\resources\views/layouts/auth.blade.php ENDPATH**/ ?>