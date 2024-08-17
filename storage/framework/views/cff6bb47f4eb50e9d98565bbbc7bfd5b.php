<?php echo $__env->yieldContent('css'); ?>
<!-- Layout config Js -->
<script src="<?php echo e(URL::asset('assets/js/layout.js')); ?>"></script>
<!-- Bootstrap Css -->
<link href="<?php echo e((Session::get('locale')=='ar') ?  URL::asset('assets/css/bootstrap.rtl.css') : URL::asset('assets/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('assets/css/button.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="<?php echo e(URL::asset('assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="<?php echo e((Session::get('locale')=='ar') ? URL::asset('assets/css/app.rtl.css') : URL::asset('assets/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('assets/css/app_css.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />

<!--Bootstrap Select Styles -->

<!-- Styles -->
<link rel="stylesheet" href="<?php echo e(URL::asset('assets/libs/select2/css/select2.min.css')); ?>">

<!-- custom Css-->
<link href="<?php echo e((Session::get('locale')=='ar') ? URL::asset('assets/css/custom.min.css') : URL::asset('assets/css/custom.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" href=<?php echo e(asset("assets/css/dropify.css")); ?>>

<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" rel="stylesheet">


<style>
:root {
  --vz-body-bg: #38B7FE17;
  }

  #userssubscriptiontable_length {
    display: none;
}

</style>
<?php /**PATH D:\laravel\Project\laravel\resources\views/layouts/admin/header/header.blade.php ENDPATH**/ ?>