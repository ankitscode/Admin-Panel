
<?php $__env->startSection('title'); ?>
    <?php echo e(__('main.create_product')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.10.2/dropzone.min.css" rel="stylesheet">
    <link rel="stylesheet" href=<?php echo e(asset('assets/css/dropify.css')); ?>>
    <style>
        #dropzone-container {
    border: 2px dashed #007bff;
    border-radius: 5px;
    background: #f9f9f9;
    min-height: 150px;
    padding: 20px;
}

    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo e(__('main.create')); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo e(__('main.product')); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('link'); ?>
            <?php echo e(route('admin.productList')); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-xxl-3">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="profile-user position-relative d-inline-block mx-auto">
                            <div id="dropzone-container" class="dropzone"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-9">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('admin.storeProduct')); ?>" enctype="multipart/form-data"
                        id="storeProduct">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="product_name" class="form-label"><?php echo e(__('main.product_name')); ?></label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['product_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="product_name" name="product_name" value="<?php echo e(old('product_name')); ?>"
                                        placeholder="<?php echo e(__('main.Enter Product Name')); ?>" required>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label"><?php echo e(__('main.price')); ?></label>
                                    <input type="number" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="price" name="price" value="<?php echo e(old('price')); ?>"
                                    placeholder="<?php echo e(__('main.Enter Product Price')); ?>" required>
                                
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="description" class="form-label"><?php echo e(__('main.description')); ?></label>
                                    <textarea required class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    name="description" id="description" cols="30" rows="10"><?php echo e(old('description')); ?></textarea>
                                
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="category" class="form-label"><?php echo e(__('main.category')); ?></label>
                                    <select class="form-select mb-3 <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        name="category_id" id="category" data-choices data-choices-search-false required
                                        autofocus>
                                        <option autofocus value=""><?php echo e(__('main.select')); ?></option>
                                        <?php $__currentLoopData = \App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>"
                                                <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>>
                                                <?php echo e($category->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-check form-switch form-check-right mt-4">
                                    <input type="checkbox" id="is_active" name="is_active" role="switch"
                                        class="form-check-input" checked />
                                    <label class="form-check-label" for="is_active"><?php echo e(__('main.is_active')); ?></label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="submit" class="btn btn-primary"><?php echo e(__('main.save')); ?></button>
                                    <a type="button" class="btn btn-danger"
                                        href="<?php echo e(url()->previous()); ?>"><?php echo e(__('main.cancel')); ?></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.10.2/dropzone.min.js"></script>
    <script>
        // $(function() {
        //     $('#profile-img-upload').dropify({
        //         messages: {
        //             'default': '<span style="font-size:12px;"><?php echo e(__('message.Drag & Drop your picture here or click to Browse')); ?></span>',
        //             'replace': '<?php echo e(__('message.Drag and drop or click to replace')); ?>',
        //             'remove': '<?php echo e(__('main.remove')); ?>',
        //             'error': '<?php echo e(__('message.Ooops something wrong happended.')); ?>'
        //         }
        //     });
        // });
        document.addEventListener('DOMContentLoaded', function() {
    // Initialize Dropzone
    new Dropzone("#dropzone-container", {
      url: '/your-upload-endpoint', // Replace with your upload URL
      acceptedFiles: 'image/png, image/jpeg, image/jpg',
      addRemoveLinks: true,
      maxFilesize: 2, // Max file size in MB
      dictDefaultMessage: "Drag an image here to upload", // Custom message
      init: function() {
        this.on("error", function(file, response) {
          // Handle errors
          console.log(response);
        });

        this.on("success", function(file, response) {
          // Handle successful upload
          console.log(response);
        });
      }
    });
  });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Project\laravel\resources\views/admin/catalog/products/create_product.blade.php ENDPATH**/ ?>