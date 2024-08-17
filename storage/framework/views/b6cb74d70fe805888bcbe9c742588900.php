<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="logo logo-dark">
            <span class="logo-sm">
                
                <img src="<?php echo e(URL::asset('assets/images/logo.jpg')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                
                <img src="<?php echo e(URL::asset('assets/images/logo.jpg')); ?>" alt="" height="" class="w-50">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="logo logo-light">
            <span class="logo-sm">
                
                <img src="<?php echo e(URL::asset('assets/images/logo.jpg')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                
                <img src="<?php echo e(URL::asset('assets/images/svgviewer-output.svg')); ?>" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php echo e((request()->is('dashboard*')) ? 'menu-link active' : 'menu-link'); ?>" href="<?php echo e(route('admin.dashboard')); ?>">
                        <i class="ri-dashboard-2-line"></i> <span><?php echo app('translator')->get('main.dashboard'); ?></span>
                    </a>
                </li> <!-- end Dashboard Menu -->
                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['View All Users','View All Admin','View All Import Users'])): ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?php echo e((request()->is('users*')) ? 'active collaspe' : 'collapsed'); ?>" href="#users"  data-bs-toggle="collapse" role="button" aria-expanded="<?php echo e((request()->is('users*')) ? 'true' : 'false'); ?>" aria-controls="users">
                            <i class="ri-account-circle-line"></i> <span><?php echo app('translator')->get('User Management'); ?></span>
                        </a>
                        <div class="menu-dropdown <?php echo e((request()->is('users*')) ? 'collapse show' : 'collapse'); ?>" id="users">
                            <ul class="nav nav-sm flex-column">
                              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('View All Users')): ?>  
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.usersList')); ?>" class="nav-link <?php echo e((request()->is('users/userlist*')) ? 'active' : ''); ?>"><?php echo app('translator')->get('main.users'); ?></a>
                                </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('View All Admin')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.adminList')); ?>" class="nav-link <?php echo e((request()->is('users/admin*')) ? 'active' : ''); ?>"><?php echo app('translator')->get('main.admin'); ?></a>
                                </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('View All Import Users')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.importViewUsers')); ?>" class="nav-link <?php echo e((request()->is('users/userlist/import*')) ? 'active' : ''); ?>"><?php echo app('translator')->get('main.import_user'); ?></a>
                                </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('View All Subscriptions')): ?>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.subscription')); ?>" class="nav-link <?php echo e((request()->is('users/subscription*')) ? 'active' : ''); ?>"><?php echo app('translator')->get('Subscription'); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('View All Roles')): ?>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.roleList')); ?>" class="nav-link <?php echo e((request()->is('users/role*')) ? 'active' : ''); ?>"><?php echo app('translator')->get('main.roles'); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </li> <!-- end Users Menu -->
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['View All Products','View All Import Products','View All Categories'])): ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?php echo e((request()->is('catalog*')) ? 'active collaspe' : 'collapsed'); ?>" href="#catalog"  data-bs-toggle="collapse" role="button" aria-expanded="<?php echo e((request()->is('catalog*')) ? 'true' : 'false'); ?>" aria-controls="catalog" data-key="t-email">
                            <i class="ri-layout-3-line"></i> <span><?php echo app('translator')->get('main.catalog'); ?></span>
                        </a>
                        <div class="menu-dropdown <?php echo e((request()->is('catalog*')) ? 'collapse show' : 'collapse'); ?>" id="catalog">
                            <ul class="nav nav-sm flex-column">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('View All Products')): ?>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.productList')); ?>" class="nav-link <?php echo e((request()->is('catalog/products*')) ? 'active' : ''); ?>"><?php echo app('translator')->get('Products'); ?></a>
                                    </li>
                               <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('View All Categories')): ?>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.categoriesList')); ?>" class="nav-link <?php echo e((request()->is('catalog/categories/allcategories*')) ? 'active' : ''); ?>"><?php echo app('translator')->get('Category'); ?></a>
                                    </li>
                               <?php endif; ?>
                               <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('View All Import Products')): ?>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.importViewProducts')); ?>" class="nav-link <?php echo e((request()->is('catalog/products/importproducts*')) ? 'active' : ''); ?>"><?php echo app('translator')->get('Import Products'); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </li> <!--- Catalog -->
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['View All User Subscriptions'])): ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?php echo e((request()->is('subscription*')) ? 'active collaspe' : 'collapsed'); ?>" href="#subscription"  data-bs-toggle="collapse" role="button" aria-expanded="<?php echo e((request()->is('Subscriptions*')) ? 'true' : 'false'); ?>" aria-controls="subscription" data-key="t-email">
                            <i class="ri-function-fill"></i> <span><?php echo app('translator')->get('main.subscription'); ?></span>
                        </a>
                        <div class="menu-dropdown <?php echo e((request()->is('subscription*')) ? 'collapse show' : 'collapse'); ?>" id="subscription">
                            <ul class="nav nav-sm flex-column">
                                <?php if(Auth::user()->can('View All User Subscriptions')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.userSubscriptionList')); ?>" class="nav-link <?php echo e((request()->is('subscription/usersubscriptionlist*')) ? 'active' : ''); ?>"><?php echo app('translator')->get('User Subscription'); ?></a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="menu-dropdown <?php echo e((request()->is('subscription*')) ? 'collapse show' : 'collapse'); ?>" id="subscription">
                            <ul class="nav nav-sm flex-column">
                                <?php if(Auth::user()->can('View All User Subscriptions')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.userSubscriptionHistoryList')); ?>" class="nav-link <?php echo e((request()->is('subscription/usersubscriptionhistory*')) ? 'active' : ''); ?>"><?php echo app('translator')->get('Subscription History'); ?></a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </li> <!--- Subscription-->
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['View All User Interest'])): ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?php echo e((request()->is('interest*')) ? 'active collaspe' : 'collapsed'); ?>" href="#interest"  data-bs-toggle="collapse" role="button" aria-expanded="<?php echo e((request()->is('interest*')) ? 'true' : 'false'); ?>" aria-controls="subscription" data-key="t-email">
                            <i class="ri-command-line"></i> <span><?php echo app('translator')->get('main.interest'); ?></span>
                        </a>
                        <div class="menu-dropdown <?php echo e((request()->is('interest*')) ? 'collapse show' : 'collapse'); ?>" id="interest">
                            <ul class="nav nav-sm flex-column">
                                <?php if(Auth::user()->can('View All User order')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.userInterestList')); ?>" class="nav-link <?php echo e((request()->is('interest/userinterestlist*')) ? 'active' : ''); ?>"><?php echo app('translator')->get('User Interest'); ?></a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </li> <!--- Interest-->
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['View All User order'])): ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?php echo e((request()->is('sale*')) ? 'active collaspe' : 'collapsed'); ?>" href="#order"  data-bs-toggle="collapse" role="button" aria-expanded="<?php echo e((request()->is('order*')) ? 'true' : 'false'); ?>" aria-controls="subscription" data-key="t-email">
                            <i class="ri-shopping-bag-fill"></i> <span><?php echo app('translator')->get('main.orders'); ?></span>
                        </a>
                        <div class="menu-dropdown <?php echo e((request()->is('sale*')) ? 'collapse show' : 'collapse'); ?>" id="order">
                            <ul class="nav nav-sm flex-column">
                                <?php if(Auth::user()->can('View All User order details')): ?>
                                <li class="nav-item">
                                <a href="<?php echo e(route('admin.allOrderList')); ?>" class="nav-link <?php echo e((request()->is('sale/order*')) ? 'active' : ''); ?>"><?php echo app('translator')->get('Order'); ?></a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </li> <!--- Order-->
                <?php endif; ?>


      <!---notification section-->  
      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['View All Notifications'])): ?>        
                <li class="nav-item">
                    <a href="#notification" class="nav-link menu-link <?php echo e((request()->is('notification*')) ? 'active collaspe' : 'collapsed'); ?>" data-bs-toggle="collapse" role="button" aria-expanded="<?php echo e((request()->is('notification*')) ? 'true' : 'false'); ?>" aria-controls="notification" data-key="t-email">
                        <i class="ri-notification-3-line"></i> <span><?php echo app('translator')->get('main.notifications'); ?></span>
                    </a>
                    <div class="menu-dropdown <?php echo e((request()->is('notification*')) ? 'collapse show' : 'collapse'); ?>" id="notification">
                        <ul class="nav nav-sm flex-column">
                            <?php if(Auth::user()->can('View All Notifications')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.getNotification')); ?>" class="nav-link <?php echo e((request()->is('notification/allnotification*')) ? 'active' : ''); ?>"><?php echo app('translator')->get('main.notification'); ?></a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </li> 
                <?php endif; ?>

      <!-- delivery section-->
                
                            
                            
                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
<?php /**PATH D:\laravel\Project\laravel\resources\views/layouts/admin/menu/side_navbar.blade.php ENDPATH**/ ?>