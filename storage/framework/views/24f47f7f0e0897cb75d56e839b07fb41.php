
<?php $__env->startSection('title'); ?>
    <?php echo e(__('main.admin')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> <?php echo e(__('main.create')); ?> <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> <?php echo e(__('main.admin')); ?> <?php $__env->endSlot(); ?>
<?php $__env->slot('link'); ?> <?php echo e(route('admin.adminList')); ?> <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
	<div class="col-xxl-3">
		<div class="card shadow-sm">
			<div class="card-body p-4">
				<div class="text-center">
					<div class="profile-user position-relative d-inline-block mx-auto">
                        <div class="mx-auto">
                            <input class="dropify" type="file" id="profile-img-upload" name="image" accept="image/png, image/jpeg, image/jpg" name="image" form="storeAdmin" data-show-remove="false">
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xxl-9">
		<div class="card shadow-sm">
			<div class="card-body">
                <form method="POST" action="<?php echo e(route('admin.storeAdmin')); ?>" enctype="multipart/form-data" id="storeAdmin">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <input type="hidden" name="usertype" value="1">
                            </div>
                            <div class="mb-3">
                                <label for="full_name" class="form-label"><?php echo e(__('main.full_name')); ?></label>
                                <input type="text" class="form-control <?php $__errorArgs = ['full_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="full_name" name="full_name" value="<?php echo e(old('full_name')); ?>" placeholder="<?php echo e(__('main.Enter your full name')); ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="email" class="form-label"><?php echo e(__('main.email')); ?></label>
                                <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('main.Enter email adderss')); ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="email" class="form-label"><?php echo e(__('main.password')); ?></label>
                                <input type="text" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password" name="password" placeholder="<?php echo e(__('main.enter_password')); ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="birthdate"><?php echo e(__('main.birthday')); ?></label>
                                <input class="form-control <?php $__errorArgs = ['birthdate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="birthdate" name="birthdate" type="date" max="<?php echo e(date("Y-m-d")); ?>" placeholder="<?php echo e(__('main.Enter your birthday')); ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="gender_type" class="form-label"><?php echo e(__('main.gender')); ?></label>
                                <select class="form-select mb-3 <?php $__errorArgs = ['gender_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="gender_type" id="gender_type"  data-choices data-choices-search-false>
                                    <option value=""><?php echo e(__('main.select')); ?></option>
                                    <?php $__currentLoopData = \App\Models\Lockup::getByTypeKey('genderType'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>" <?php echo e(old('gender_type') == $key ? 'selected' : ''); ?>><?php echo e($gender); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="phone"><?php echo e(__('main.phone_number')); ?></label>
                                <input class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="phone" name="phone" type="tel" placeholder="<?php echo e(__('main.Enter your phone number')); ?>"  required autofocus>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="role_ids" class="form-label"><?php echo e(__('main.role')); ?></label>
                                <select class="form-select mb-3 <?php $__errorArgs = ['role_ids'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="role_ids" id="role_ids" data-choices >
                                    <?php if(count($roles)): ?>
                                        <option value=""><?php echo e(__('main.select')); ?></option>
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($role->name); ?>"><?php echo e($role->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="form-check form-switch form-check-right mt-4">
                                <input type="checkbox" id="is_active" name="is_active" role="switch" class="form-check-input" checked />
                                <label class="form-check-label" for="is_active"><?php echo e(__('main.is_active')); ?></label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="submit" class="btn btn-primary"><?php echo e(__('main.save')); ?></button>
                                <a type="button" class="btn btn-danger" href="<?php echo e(url()->previous()); ?>"><?php echo e(__('main.cancel')); ?></a>
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
<script>
$(function () {
    $('#profile-img-upload').dropify({
        messages: {
            'default': '<span style="font-size:12px;"><?php echo e(__('message.Drag & Drop your picture here or click to Browse')); ?></span>',
            'replace': '<?php echo e(__('message.Drag and drop or click to replace')); ?>',
            'remove':  '<?php echo e(__('main.remove')); ?>',
            'error':   '<?php echo e(__('message.Ooops something wrong happended.')); ?>'
        }
    });
});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Project\laravel\resources\views/admin/users/admin/create_admin.blade.php ENDPATH**/ ?>