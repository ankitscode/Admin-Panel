
<?php $__env->startSection('title'); ?>
    <?php echo e(__('main.profile')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('title'); ?>
            <?php echo e(__('main.profile')); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('link'); ?>
            <?php echo e(route('admin.profile')); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('main.account_details')); ?></h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('admin.updateProfile')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="full_name"><?php echo e(__('main.full_name')); ?></label>
                                <input class="form-control <?php $__errorArgs = ['full_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="full_name"
                                    name="full_name" type="text" placeholder="<?php echo e(__('main.Enter your full name')); ?>"
                                    value="<?php echo e(Auth::user()->full_name); ?>" required autofocus>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="email"><?php echo e(__('main.email')); ?></label>
                                <input class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email"
                                    name="email" type="email" placeholder="<?php echo e(__('main.Enter email adderss')); ?> "
                                    value="<?php echo e(Auth::user()->email); ?>" readonly>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="phone"><?php echo e(__('main.phone_number')); ?></label>
                                <input class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="phone"
                                    name="phone" type="tel" placeholder="<?php echo e(__('main.Enter your phone number')); ?>"
                                    value="<?php echo e(Auth::user()->phone); ?>" required autofocus>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="birthdate"><?php echo e(__('main.birthday')); ?></label>
                                <input class="form-control <?php $__errorArgs = ['birthdate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="birthdate"
                                    name="birthdate" type="date" max="<?php echo e(date('Y-m-d')); ?>"
                                    placeholder="<?php echo e(__('main.Enter your birthday')); ?>"
                                    value="<?php echo e(Auth::user()->birthdate); ?>" required autofocus>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1"><?php echo e(__('main.gender')); ?></label>
                                <select class="form-control <?php $__errorArgs = ['gender_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="gender_type">
                                    <?php
                                        $genders = \App\Models\Lockup::getByTypeKey('genderType');
                                    ?>
                                    <?php $__currentLoopData = $genders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>"
                                            <?php echo e(isset(Auth::user()->gender_type) && Auth::user()->gender_type == $key ? 'selected' : ''); ?>>
                                            <?php echo e($gender); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1"><?php echo e(__('main.address')); ?></label>
                                <input class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="address"
                                    name="address" type="tel" placeholder="<?php echo e(__('main.Enter your address')); ?>"
                                    value="<?php echo e(Auth::user()->address); ?>" required autofocus>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1"><?php echo e(__('main.city')); ?></label>
                                <select class="form-control <?php $__errorArgs = ['city_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="city_type">
                                    <option value=""><?php echo e(__('main.select')); ?></option>
                                    <?php
                                        $cityTypes = \App\Models\Lockup::getByTypeKey('cityType');
                                    ?>
                                    <?php $__currentLoopData = $cityTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cityType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>"
                                            <?php echo e(isset(Auth::user()->city_type) && Auth::user()->city_type == $key ? 'selected' : ''); ?>>
                                            <?php echo e($cityType); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1"><?php echo e(__('main.country')); ?></label>
                                <select class="form-control <?php $__errorArgs = ['country_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    name="country_type">
                                    <option value=""><?php echo e(__('main.select')); ?></option>
                                    <?php
                                        $countryTypes = \App\Models\Lockup::getByTypeKey('countryType');
                                    ?>
                                    <?php $__currentLoopData = $countryTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $countryType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>"
                                            <?php echo e(isset(Auth::user()->country_type) && Auth::user()->country_type == $key ? 'selected' : ''); ?>>
                                            <?php echo e($countryType); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit"><?php echo e(__('main.save_changes')); ?></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('main.profile_picture')); ?></h6>
                </div>
                <div class="card-body">
                    <div class="card-body text-center">
                        <img class="rounded-circle mb-2 avater-ext"
                            src="<?php echo e(!empty(Auth::user()->media->name) ? '/storage/images/profile/' . Auth::user()->media->name : asset('assets/images/users/user-dummy-img.jpg')); ?>"
                            style="height: 10rem; width: 10rem;">
                        <div class="large text-muted mb-4">

                            <span class="badge badge-pill badge-<?php echo e(Auth::user()->is_active == 1 ? 'success' : 'danger'); ?>">
                                <?php echo e(Auth::user()->is_active ? __('main.active') : __('main.in_active')); ?>

                            </span>
                        </div>
                        <button class="btn btn-soft-primary" data-bs-toggle="modal"
                            data-bs-target="#adminProfileImageUpdateModal"><?php echo e(__('main.update_profile_image')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('admin.component.modal.admin_profile_image_update_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Project\laravel\resources\views/admin/profile/user_profile.blade.php ENDPATH**/ ?>