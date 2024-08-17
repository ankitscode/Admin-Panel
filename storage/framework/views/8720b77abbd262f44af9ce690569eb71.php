
<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="index" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="<?php echo e(URL::asset('assets/images/Group130.svg')); ?>" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="<?php echo e(URL::asset('assets/images/Group130.svg')); ?>" alt="" height="17">
                        </span>
                    </a>
                    <a href="index" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="<?php echo e(URL::asset('assets/images/Group130.svg')); ?>" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="<?php echo e(URL::asset('assets/images/Group130.svg')); ?>" alt="" height="17">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                    id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

                <!-- App Search
                <form class="app-search d-none d-md-block">
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Search..." autocomplete="off"
                            id="search-options" value="">
                        <span class="mdi mdi-magnify search-widget-icon"></span>
                        <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                            id="search-close-options"></span>
                    </div>
                    <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                        <div data-simplebar style="max-height: 320px;">
                            <!-- item
                            <div class="dropdown-header">
                                <h6 class="text-overflow text-muted mb-0 text-uppercase">Recent Searches</h6>
                            </div>

                            <div class="dropdown-item bg-transparent text-wrap">
                                <a href="index" class="btn btn-soft-secondary btn-sm btn-rounded">how to setup <i
                                        class="mdi mdi-magnify ms-1"></i></a>
                                <a href="index" class="btn btn-soft-secondary btn-sm btn-rounded">buttons <i
                                        class="mdi mdi-magnify ms-1"></i></a>
                            </div>
                            <!-- item
                            <div class="dropdown-header mt-2">
                                <h6 class="text-overflow text-muted mb-1 text-uppercase">Pages</h6>
                            </div>

                            <!-- item
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="ri-bubble-chart-line align-middle fs-18 text-muted me-2"></i>
                                <span>Analytics Dashboard</span>
                            </a>

                            <!-- item
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="ri-lifebuoy-line align-middle fs-18 text-muted me-2"></i>
                                <span>Help Center</span>
                            </a>

                            <!-- item
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="ri-user-settings-line align-middle fs-18 text-muted me-2"></i>
                                <span>My account settings</span>
                            </a>

                            <!-- item
                            <div class="dropdown-header mt-2">
                                <h6 class="text-overflow text-muted mb-2 text-uppercase">Members</h6>
                            </div>

                            <div class="notification-list">
                                <!-- item
                                <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                    <div class="d-flex">
                                        <img src="<?php echo e(URL::asset('assets/images/users/avatar-2.jpg')); ?>"
                                            class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="m-0">Angela Bernier</h6>
                                            <span class="fs-11 mb-0 text-muted">Manager</span>
                                        </div>
                                    </div>
                                </a>
                                <!-- item
                                <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                    <div class="d-flex">
                                        <img src="<?php echo e(URL::asset('assets/images/users/avatar-3.jpg')); ?>"
                                            class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="m-0">David Grasso</h6>
                                            <span class="fs-11 mb-0 text-muted">Web Designer</span>
                                        </div>
                                    </div>
                                </a>
                                <!-- item
                                <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                    <div class="d-flex">
                                        <img src="<?php echo e(URL::asset('assets/images/users/avatar-5.jpg')); ?>"
                                            class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="m-0">Mike Bunch</h6>
                                            <span class="fs-11 mb-0 text-muted">React Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="text-center pt-3 pb-1">
                            <a href="pages-search-results" class="btn btn-primary btn-sm">View All Results <i
                                    class="ri-arrow-right-line ms-1"></i></a>
                        </div>
                    </div>
                </form> -->
            </div>

            <div class="d-flex align-items-center">

                

                <div class="dropdown ms-1 topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php switch(Session::get('locale')):
                            case ('ar'): ?>
                                <img src="<?php echo e(URL::asset('/assets/images/flags/uae.svg')); ?>" class="rounded"
                                    alt="Header Language" height="20">
                            <?php break; ?>

                            

                            <?php default: ?>
                                <img src="<?php echo e(URL::asset('/assets/images/flags/us.svg')); ?>" class="rounded"
                                    alt="Header Language" height="20">
                        <?php endswitch; ?>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">

                        <!-- item-->
                        <a href="<?php echo e(route('admin.changeLanguage', ['lang' => 'en'])); ?>"
                            class="dropdown-item notify-item language py-2" data-lang="en"
                            title="<?php echo e(__('main.english')); ?>">
                            <img src="<?php echo e(URL::asset('assets/images/flags/us.svg')); ?>" alt="user-image"
                                class="me-2 rounded" height="20" width="20">
                            <span class="align-middle"><?php echo e(__('main.english')); ?></span>
                        </a>

                        <!-- item-->
                        <a href="<?php echo e(route('admin.changeLanguage', ['lang' => 'ar'])); ?>"
                            class="dropdown-item notify-item language" data-lang="ar"
                            title="<?php echo e(__('main.arabic')); ?>">
                            <img src="<?php echo e(URL::asset('assets/images/flags/uae.svg')); ?>" alt="user-image"
                                class="me-2 rounded" height="20" width="20">
                            <span class="align-middle"><?php echo e(__('main.arabic')); ?></span>
                        </a>

                        
                    </div>
                </div>



                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        data-toggle="fullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>

                

                <div class="dropdown topbar-head-dropdown ms-1 header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class='bx bx-bell fs-22'></i>
                        <span class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger">
                            <span class="notification-count"
                                data-id="<?php echo e(isset($notifications) ? count($notifications) : 0); ?>">
                                <?php echo e(isset($notifications) ? count($notifications) : 0); ?> 
                            </span>
                            <span class="visually-hidden"><?php echo e(__('main.unread_messages')); ?></span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-notifications-dropdown">
                
                        <div class="dropdown-head bg-primary bg-pattern rounded-top">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0 fs-16 fw-semibold text-white"><?php echo e(__('main.notifications')); ?></h6>
                                    </div>
                                    <div class="col-auto dropdown-tabs">
                                        <span class="badge badge-soft-light fs-13">
                                            <span class="notification-count">
                                                <?php echo e(isset($notifications) ? count($notifications) : 0); ?>

                                            </span>
                                            <?php echo e(__('main.notifications')); ?>

                                        </span>
                                    </div>
                                </div>
                            </div>
                
                            <div class="px-2 pt-2">
                                <ul class="nav nav-tabs dropdown-tabs nav-tabs-custom d-block" data-dropdown-tabs="true" id="notificationItemsTab" role="tablist">
                                    <li class="nav-item waves-effect waves-light custom-margin">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#new-orders-tab" role="tab" aria-selected="true">
                                            <?php echo e(__('main.new_inquery')); ?> (<span class="notification-count"><?php echo e(isset($newProductInformation) ? $newProductInformation : 0); ?></span>)
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                
                        <div class="tab-content" id="notificationItemsTabContent">
                            <?php if(isset($notifications) && count($notifications) > 0): ?>
                                <div class="tab-pane fade show active py-2 ps-2 notification-inner-menu"
                                    id="new-orders-tab" role="tabpanel">
                                    <div data-simplebar style="max-height: 300px;" class="pe-2">
                                        <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($notification->type == "App\Notifications\ProductInformation"): ?>
                                                <?php
                                                    $message = $notification->data['message'] ?? 'No message provided';
                                                ?>
                                                <div class="text-reset notification-item d-block dropdown-item position-relative">
                                                    <div class="d-flex">
                                                        <div class="avatar-xs me-3">
                                                            <span class="avatar-title bg-soft-info text-info rounded-circle fs-16"
                                                                data-bs-toggle="tooltip" data-bs-placement="top" title="New query received">
                                                                <i class="bx bx-message-check"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-1">
                                                            <div class="pb-3">
                                                                <a class="stretched-link mark-as-read"
                                                                    href="<?php echo e(route('admin.getNotification')); ?>"
                                                                    data-id="<?php echo e($notification->id); ?>"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Message Content: <?php echo e($message); ?>">
                                                                    <h6 class="mt-0 mb-2 lh-base">
                                                                        <?php echo e(__('main.new_message')); ?>

                                                                    </h6>
                                                                    <p class="mb-0">
                                                                        <?php echo e($message); ?>

                                                                    </p>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <div class="my-3 text-center">
                                            <a class="btn btn-soft-success waves-effect waves-light mark-all"
                                                href="<?php echo e(route('admin.getNotification')); ?>">
                                                <?php echo e(__('main.view_all')); ?><i class="ri-arrow-right-line align-middle"></i></a>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="tab-pane fade show active py-2 ps-2 notification-inner-menu"
                                    id="new-orders-tab" role="tabpanel" aria-labelledby="new-orders-tab">
                                    <div class="w-25 w-sm-50 pt-3 mx-auto">
                                        <img src="<?php echo e(URL::asset('assets/images/svg/bell.svg')); ?>" class="img-fluid" alt="user-pic">
                                    </div>
                                    <div class="text-center pb-5 mt-2">
                                        <h6 class="fs-18 fw-semibold lh-base">
                                            <?php echo e(__('main.Hey! You have no any notifications')); ?></h6>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                

                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user"
                               src="<?php echo e(!empty(Auth::user()->media->name) ? '/storage/images/profile/' . Auth::user()->media->name: asset('assets/images/users/user-dummy-img.jpg')); ?>"
                                alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                                <span
                                    class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?php echo e(Auth::user()->name); ?></span>
                                
                        </span>
                    </button>

                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header"><?php echo e(__('main.welcome')); ?> <?php echo e(Auth::user()->name); ?></h6>
                        <a class="dropdown-item" href="<?php echo e(route('admin.profile')); ?>"><i
                                class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle"><?php echo e(__('main.profile')); ?></span></a>
                        <a class="dropdown-item" href="<?php echo e(route('admin.changePassword')); ?>"><i
                                class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle"><?php echo e(__('main.change_password')); ?></span></a>
                        
                        <a class="dropdown-item " href="javascript:void();"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="bx bx-power-off font-size-16 align-middle me-1"></i> <span
                                key="t-logout"><?php echo app('translator')->get('main.logout'); ?></span></a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                            style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php /**PATH D:\laravel\Project\laravel\resources\views/layouts/admin/menu/top_navbar.blade.php ENDPATH**/ ?>