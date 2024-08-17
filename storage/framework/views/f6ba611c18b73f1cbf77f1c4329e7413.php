<!-- start page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <?php if(isset($card_heard) || isset($create_button_href) || isset($create_button_title)): ?>
                <div class="card-header d-flex align-items-center">
                    <?php if(isset($card_heard)): ?>
                        <h5 class="card-title mb-0 flex-grow-1"><?php echo e($card_heard); ?></h5>
                    <?php endif; ?>
                    <?php if(isset($create_button_href) && isset($create_button_title) ): ?>
                    <div>
                        <a href="<?php echo e($create_button_href); ?>" type="button" class="btn btn-secondary add-btn" id="create-btn">
                            <i class="ri-add-line align-bottom me-1"></i> <?php echo e($create_button_title); ?></a>
                    </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="card-body">
                <?php if(isset($search_label)): ?>
                    <div class="card-body border border-dashed border-end-0 border-start-0">
                        <?php echo e($search_label); ?>

                    </div>
                <?php endif; ?>
                <div class="card-body pt-0">
                    <table id="<?php echo e($table_id); ?>" class="table table-nowrap dt-responsive table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <?php echo e($table_th); ?>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->
<?php /**PATH D:\laravel\Project\laravel\resources\views/components/list_view.blade.php ENDPATH**/ ?>