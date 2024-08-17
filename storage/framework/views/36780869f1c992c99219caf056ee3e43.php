<!-- Your HTML structure remains the same -->

<!-- JavaScript section -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo e(asset('assets/libs/jquery-toast-plugin-master/src/jquery.toast.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="<?php echo e(asset('assets/libs/prismjs/prismjs.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/pages/dropify.min.js')); ?>"></script>


<!-- Your custom scripts -->
<script src="<?php echo e(asset('assets/libs/bootstrap/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/simplebar/simplebar.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/node-waves/node-waves.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/feather-icons/feather-icons.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/pages/plugins/lord-icon-2.1.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/app.min.js')); ?>"></script>




<script>
    <?php if(Session::has('success')): ?>
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("<?php echo e(session('success')); ?>");
    <?php endif; ?>

    <?php if(Session::has('alert-success')): ?>
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("<?php echo e(session('alert-success')); ?>");
    <?php endif; ?>

    <?php if(Session::has('alert-error')): ?>
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("<?php echo e(session('alert-error')); ?>");
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("* <?php echo e($error); ?>");
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function() {
        $('body').on('click', ".mutli-lang", function(e) {
            var lang_field = $(this).attr('data-lang-field');
            var lang_type = $(this).attr('data-lang-type');
            var field_type = $(this).attr('data-field-type');
            console.log(lang_field, 'lang_field', lang_type, 'lang_type', field_type, 'field_type', "" +
                field_type + "[name='" + lang_field + "[en]']");
            if (lang_type == 'en') {
                $("" + field_type + "[name='" + lang_field + "[en]']").show();
                $("" + field_type + "[name='" + lang_field + "[ar]']").hide();
                $(this).parent().children().css("color", "");
                $(this).css("color", "#38b7fe");
            } else if (lang_type == 'ar') {
                $("" + field_type + "[name='" + lang_field + "[en]']").hide();
                $("" + field_type + "[name='" + lang_field + "[ar]']").show();
                $(this).parent().children().css("color", "");
                $(this).css("color", "#38b7fe");
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });


    $(document).ready(function() {
        $('.mark-as-read').on('click', function(e) {
            e.preventDefault();
            var notificationId = $(this).data('id');
            $.ajax({
                url: "<?php echo e(route('admin.markNotification')); ?>",
                type: 'POST',
                data: {
                    id: notificationId
                },
                success: function(response) {
                    console.log('Notification marked as read');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error('Error marking notification as read:', error);
                }
            });
        });
    });
</script>
<!-- Additional script sections as needed -->
<?php if(auth()->guard()->check()): ?>
    
<?php endif; ?>
<?php echo $__env->yieldContent('script'); ?>
<?php echo $__env->yieldContent('script-bottom'); ?>
<?php /**PATH D:\laravel\Project\laravel\resources\views/layouts/admin/footer/footerJS.blade.php ENDPATH**/ ?>