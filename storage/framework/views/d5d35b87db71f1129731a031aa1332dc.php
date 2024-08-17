<?php
    $lang = Session::get('locale');
?>

<?php $__env->startSection('title'); ?>
    <?php echo e(__('main.view_product')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href=<?php echo e(asset('assets/css/dropify.css')); ?>>
    <link href="<?php echo e(URL::asset('assets/libs/swiper/swiper.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo e(__('main.view')); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo e(__('main.product')); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('link'); ?>
            <?php echo e(route('admin.productList')); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <section class="content">
        <div class="card shadow mb-4">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">
                        <?php echo e(__('main.package_detail')); ?>

                    </h5>
                    <div class="flex-shrink-0">
                        <a class="btn btn-primary edit-item-btn"
                            href="<?php echo e(route('admin.editProduct', ['id' => $productDetails->id])); ?>"><i
                                class="ri-edit-line fs-16"></i></a>
                        <a href="javascript:void(0)" id='deleteProduct' class="btn btn-danger remove-item-btn"
                            data-id="<?php echo e($productDetails->id); ?>"><i class="ri-delete-bin-2-line fs-16"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-none">
                        <div class="card-body">
                            <div class="row gx-lg-5">
                                <div class="col-xl-4 col-md-8 mx-auto">
                                    <div class="product-img-slider sticky-side-div">
                                        <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                                            <div class="swiper-wrapper">
                                                <!-- Main product image -->
                                                <div class="swiper-slide">
                                                    <div class="customeslider-container-image">
                                                        <?php if($productDetails->media && $productDetails->media->name): ?>
                                                            <img src="/storage/images/product/<?php echo e($productDetails->media->name); ?>" class="img-fluid d-block" alt="Product Image" />
                                                        <?php else: ?>
                                                            <img src="/assets/images/users/user-dummy-img.jpg" class="img-fluid d-block" alt="Default Image" />
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <!-- Additional product gallery images -->
                                                <?php if(isset($productDetail['productgallery']) && !empty($productDetail['productgallery'])): ?>
                                                    <?php $__currentLoopData = $productDetail['productgallery']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(isset($value) && !empty($value)): ?>
                                                            <div class="swiper-slide">
                                                                <div class="customeslider-container-image">
                                                                    <img src="<?php echo e(isset($value->thumbnail_name) ? '/storage/images/product/' . $value->thumbnail_name : '/assets/images/users/user-dummy-img.jpg'); ?>" alt="Product Image" class="img-fluid d-block" />
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </div>
                                            <!-- Navigation buttons -->
                                            <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
                                        </div>
                                        
                                        <!-- Thumbnail Navigation Slider -->
                                        <div class="swiper product-nav-slider mt-2">
                                            <div class="swiper-wrapper">
                                                <!-- Main product thumbnail -->
                                                <div class="swiper-slide">
                                                    <div class="nav-slide-item">
                                                        <img src="<?php echo e($productDetails->media && $productDetails->media->thumbnail_name 
                                                        ? '/storage/images/product/' . $productDetails->media->thumbnail_name 
                                                        : '/assets/images/users/user-dummy-img.jpg'); ?>" 
                                                        alt="Product Thumbnail" class="img-fluid d-block" />

                                                        

                                                    </div>
                                                </div>
                                                <!-- Additional product gallery thumbnails -->
                                                <?php if(isset($productDetail['productgallery']) && !empty($productDetail['productgallery'])): ?>
                                                <?php $__currentLoopData = $productDetail['productgallery']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(isset($value) && !empty($value)): ?>
                                                        <div class="swiper-slide" style="width: 100px;height: 100px;">
                                                            <div class="nav-slide-item" style="width: 100px;height: 100px;">
                                                                
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
    
                                            </div>
                                        </div>
                                        <!-- end swiper nav slide -->
                                    </div>
                                </div>
                                <div class="col-xl-8">
                                    <div class="table-responsive table-card mb-1">
                                        <table class="table align-middle">
                                            <tbody class="">
                                                <tr>
                                                    <td><strong><?php echo e(__('main.product_name')); ?></strong></td>
                                                    <td style="width: 30%">
                                                        <?php echo e(isset($productDetails->productname) ? $productDetails->productname : ''); ?>

                                                    </td>
                                                </tr>
                                                <tr>
                                                <tr>
                                                    <td><strong><?php echo e(__('main.price')); ?></strong></td>
                                                    <td style="width: 30%">
                                                        <?php echo e(isset($productDetails->price) ? $productDetails->price : ''); ?>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong><?php echo e(__('main.description')); ?></strong></td>
                                                    <td style="width: 30%">
                                                        <?php echo e(isset($productDetails->description) ? $productDetails->description : ''); ?>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 30%"><strong><?php echo e(__('main.categories')); ?></strong>
                                                    </td>
                                                    <td style="width: 30%">
                                                        <?php echo e(isset($productDetails->category->name) ? $productDetails->category->name : ''); ?>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong><?php echo e(__('main.is_active')); ?></strong></td>
                                                    <td>
                                                        <?php switch($productDetails->is_active):
                                                            case (1): ?>
                                                                <span
                                                                    class="badge badge-soft-success text-uppercase"><?php echo e(__('main.active')); ?></span>
                                                            <?php break; ?>

                                                            <?php default: ?>
                                                                <span
                                                                    class="badge badge-soft-danger text-uppercase"><?php echo e(__('main.in_active')); ?></span>
                                                        <?php endswitch; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8 d-flex flex-row justify-content-center">

                </div>
                <div class="col-4">

                </div>
            </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src=<?php echo e(asset('assets/libs/swiper/swiper.min.js')); ?>></script>
    <script src=<?php echo e(asset('assets/js/pages/ecommerce-product-details.init.js')); ?>></script>
    
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
    <script>
    $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '.remove-item-btn', function(e) {
                e.preventDefault();
                var id = $(this).data("id");

                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this Product!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: "GET",
                                url: "<?php echo e(route('admin.destroyProduct', '')); ?>" + "/" + id,
                                data: {
                                    "_token": "<?php echo e(csrf_token()); ?>",
                                    "id": id,
                                },
                                success: function(response) {
                                    swal(response.status, {
                                            icon: "success",
                                            timer: 3000,
                                        })
                                        .then((result) => {
                                            window.location =
                                                '<?php echo e(route('admin.productList')); ?>';
                                        });
                                },
                                error: function(xhr, status, error) {
                                    swal('Error!', 'Failed to delete user.', 'error');
                                }
                            });
                        }
                    });
            });
        });

        

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Project\laravel\resources\views/admin/catalog/products/view_product.blade.php ENDPATH**/ ?>