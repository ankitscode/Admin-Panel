<?php $__env->startSection('content'); ?>
    <!-- auth-page wrapper -->
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4 auth-one-bg h-100">
                                        <div class="bg-overlay"></div>
                                        <div class="position-relative h-100 d-flex flex-row justify-content-center">
                                            <div class="mt-5">
                                                <img src="<?php echo e(URL::asset('assets/images/logo.jpg')); ?>" alt=""
                                                    height="auto" width="auto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4">
                                        <div>
                                            <h2 class="text-primary">Welcome Back !</h2>
                                            <p class="text-muted fs-4"><strong>Sign in to continue to
                                                    <?php echo e(config('app.name')); ?>.</strong></p>
                                        </div>

                                        <div class="mt-4">
                                            <form action="<?php echo e(route('login')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <div class="mb-4">
                                                    <label for="username" class="form-label fs-4">Username</label>
                                                    <input type="text"
                                                        class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        value="<?php echo e(old('email')); ?>" id="username" name="email"
                                                        placeholder="Enter username">
                                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>

                                                <div class="mb-3">
                                                    <div class="float-end">
                                                        <a href="<?php echo e(route('password.request')); ?>"
                                                            class="text-muted fs-5"><?php echo e(__('main.forgot_password?')); ?></a>
                                                    </div>
                                                    <label class="form-label fs-4"
                                                        for="password-input"><?php echo e(__('main.password')); ?></label>
                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                        <input type="password" style="z-index: 10"
                                                            class="form-control position-relative pe-5 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            name="password" placeholder="Enter password"
                                                            id="password-input">
                                                        <button
                                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted "
                                                            onclick=togglePasswordVisibility() style="z-index: 100"
                                                            type="button"><i class="ri-eye-fill align-middle closed"
                                                                id="toggle-password-btn"></i></button>
                                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong><?php echo e($message); ?></strong>
                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="auth-remember-check">
                                                    <label class="form-check-label"
                                                        for="auth-remember-check"><?php echo e(__('main.remember_me')); ?></label>
                                                </div>

                                                <div class="mt-4">
                                                    <button class="btn btn-success w-100 fs-4"
                                                        type="submit"><?php echo e(__('main.sign_in')); ?></button>
                                                </div>

                                                <div class="mt-4 text-center">
                                                    <div class="signin-other-title">
                                                        
                                                        <h5 class="fs-13 mb-4 title"></h5>
                                                    </div>
                                                    <div class="mt-5 text-center">
                                                        
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            @
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Admin Panel Crafted by HangingPanda</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
                <script>
                function togglePasswordVisibility() {
                var passwordInput = document.getElementById('password-input');
                if (passwordInput.type === 'text') {
                passwordInput.type = 'password';
                } else {
                passwordInput.type = 'text';
                }
                }
                </script>
          <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Project\laravel\resources\views/auth/login.blade.php ENDPATH**/ ?>