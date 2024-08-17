<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18"><?php echo e($title ?? ''); ?></h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <?php if(isset($li_1)): ?>
                        <li class="breadcrumb-item"><?php echo e($li_1); ?></li>
                    <?php endif; ?>
                    <?php if(isset($li_2)): ?>
                        <li class="breadcrumb-item"><?php echo e($li_2); ?></li>
                    <?php endif; ?>
                    <?php if(isset($title)): ?>
                        <li class="breadcrumb-item active"><a href="<?php echo e($link ?? '#'); ?>"><?php echo e($title); ?></a></li>
                    <?php endif; ?>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<?php /**PATH D:\laravel\Project\laravel\resources\views/components/breadcrumb.blade.php ENDPATH**/ ?>