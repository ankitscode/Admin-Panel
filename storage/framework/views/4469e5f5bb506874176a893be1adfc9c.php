
<?php $__env->startSection('title'); ?>
    <?php echo e(__('main.edit_product')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href=<?php echo e(asset('assets/css/dropify.css')); ?>>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo e(__('main.edit')); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo e(__('main.product')); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('link'); ?>
            <?php echo e(route('admin.productList')); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <form method="POST" id="Updateproduct"
                    action="<?php echo e(route('admin.updateProduct', ['id' => $productDetails->id])); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card-header py-3 d-flex justify-content-between align-items-center" style="background: none">
                        <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('main.product_details')); ?></h6>
                        <div class="form-check form-switch">
                            <input type="checkbox" id="is_active" name="is_active" class="form-check-input mx-1"
                                <?php if($productDetails->is_active): ?> checked <?php endif; ?>>
                            <label class="form-check-label mx-1" for="is_active"><?php echo e(__('main.is_active')); ?></label>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label for="product_name" class="form-label"><?php echo e(__('main.product_name')); ?></label>
                                <input type="text" class="form-control <?php $__errorArgs = ['product_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="product_name" name="product_name"
                                    value="<?php echo e(old('product_name', $productDetails->productname)); ?>"
                                    placeholder="<?php echo e(__('main.Enter Product Name')); ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="price" class="form-label"><?php echo e(__('main.price')); ?></label>
                                <input type="number" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="price" name="price" value="<?php echo e(old('price', $productDetails->price)); ?>"
                                    placeholder="<?php echo e(__('main.Enter Product Price')); ?>" required>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label for="description" class="form-label"><?php echo e(__('main.description')); ?></label>
                                <textarea class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="description" id="description"
                                    cols="30" rows="10"><?php echo e(old('description', $productDetails->description)); ?></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="category" class="form-label"><?php echo e(__('main.category')); ?></label>
                                <select class="form-select mb-3 <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="category_id"
                                    id="category" data-choices data-choices-search-false required>

                                    <?php
                                        $selectedCategoryId = $productDetails->category->id ?? null;
                                    ?>

                                    <?php if($selectedCategoryId): ?>
                                        <option value="<?php echo e($selectedCategoryId); ?>" selected>
                                            <?php echo e($productDetails->category->name); ?>

                                        </option>
                                        <?php $__currentLoopData = \App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($category->id != $selectedCategoryId): ?>
                                                <option value="<?php echo e($category->id); ?>">
                                                    <?php echo e($category->name); ?>

                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <option value="" selected disabled><?php echo e(__('Select a category')); ?></option>
                                        <?php $__currentLoopData = \App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>">
                                                <?php echo e($category->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit"><?php echo e(__('main.save_changes')); ?></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('main.product_picture')); ?></h6>
                </div>
                <div class="card-body">
                    <div class="card-body text-center">
                        <img class="rounded-circle mb-2 avater-ext"
                            src="<?php echo e(!empty($productDetails->media->name) ? asset('storage/images/product/' . $productDetails->media->name) : asset('assets/images/users/user-dummy-img.jpg')); ?>"
                            style="height: 10rem; width: 10rem;">
                        <div class="large text-muted mb-4">
                            <span
                                class="badge rounded-pill badge-outline-<?php echo e($productDetails->is_active ? 'success' : 'danger'); ?>">
                                <?php echo e($productDetails->is_active ? __('main.active') : __('main.in_active')); ?>

                            </span>
                        </div>
                        <button class="btn btn-soft-primary" data-bs-toggle="modal"
                            data-bs-target="#EditProductModal"><?php echo e(__('main.update_product_image')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for updating product image -->
    <div class="modal fade" id="EditProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('main.update_product_image')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('admin.uploadProductImage', ['id' => $productDetails->id])); ?>" class="dropzone"
                        id="myDropzone" method="post" enctype="multipart/form-data">

                        <?php echo csrf_field(); ?>
                        <div class="fallback">
                            <input name="images[]" type="file" multiple />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="myDropzone"><?php echo e(__('main.update')); ?></button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
    <script>
        Dropzone.options.myDropzone = {
            paramName: "images[]", // The name that will be used to transfer the files
            maxFilesize: 2, // MB
            uploadMultiple: true,
            addRemoveLinks: true,
            maxFiles: 5,
            acceptedFiles: ".jpeg,.jpg,.png,.svg",
            success: function(file, response) {
                console.log("File uploaded successfully.");
            },
            error: function(file, response) {
                console.log("Error uploading file.");
            }
        };
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Project\laravel\resources\views/admin/catalog/products/edit_product.blade.php ENDPATH**/ ?>