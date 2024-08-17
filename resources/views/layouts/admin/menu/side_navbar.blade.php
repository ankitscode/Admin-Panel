<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{route('admin.dashboard')}}" class="logo logo-dark">
            <span class="logo-sm">
                {{-- Admin panel --}}
                <img src="{{ URL::asset('assets/images/logo.jpg') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                {{-- Admin panel --}}
                <img src="{{ URL::asset('assets/images/logo.jpg') }}" alt="" height="" class="w-50">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{route('admin.dashboard')}}" class="logo logo-light">
            <span class="logo-sm">
                {{-- Admin panel --}}
                <img src="{{ URL::asset('assets/images/logo.jpg') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                {{-- Admin panel --}}
                <img src="{{ URL::asset('assets/images/svgviewer-output.svg') }}" alt="" height="17">
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
                    <a class="nav-link {{ (request()->is('dashboard*')) ? 'menu-link active' : 'menu-link' }}" href="{{route('admin.dashboard')}}">
                        <i class="ri-dashboard-2-line"></i> <span>@lang('main.dashboard')</span>
                    </a>
                </li> <!-- end Dashboard Menu -->
                 @canany(['View All Users','View All Admin','View All Import Users'])
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ (request()->is('users*')) ? 'active collaspe' : 'collapsed' }}" href="#users"  data-bs-toggle="collapse" role="button" aria-expanded="{{ (request()->is('users*')) ? 'true' : 'false' }}" aria-controls="users">
                            <i class="ri-account-circle-line"></i> <span>@lang('User Management')</span>
                        </a>
                        <div class="menu-dropdown {{ (request()->is('users*')) ? 'collapse show' : 'collapse' }}" id="users">
                            <ul class="nav nav-sm flex-column">
                              @can('View All Users')  
                                <li class="nav-item">
                                    <a href="{{route('admin.usersList')}}" class="nav-link {{ (request()->is('users/userlist*')) ? 'active' : '' }}">@lang('main.users')</a>
                                </li>
                                @endcan
                                @can('View All Admin')
                                <li class="nav-item">
                                    <a href="{{route('admin.adminList')}}" class="nav-link {{ (request()->is('users/admin*')) ? 'active' : '' }}">@lang('main.admin')</a>
                                </li>
                                @endcan
                                @can('View All Import Users')
                                <li class="nav-item">
                                    <a href="{{route('admin.importViewUsers')}}" class="nav-link {{ (request()->is('users/userlist/import*')) ? 'active' : '' }}">@lang('main.import_user')</a>
                                </li>
                                @endcan
                                @can('View All Subscriptions')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.subscription') }}" class="nav-link {{ (request()->is('users/subscription*')) ? 'active' : '' }}">@lang('Subscription')</a>
                                    </li>
                                @endcan
                                @can('View All Roles')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.roleList') }}" class="nav-link {{ (request()->is('users/role*')) ? 'active' : '' }}">@lang('main.roles')</a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li> <!-- end Users Menu -->
                @endcanany
                @canany(['View All Products','View All Import Products','View All Categories'])
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ (request()->is('catalog*')) ? 'active collaspe' : 'collapsed' }}" href="#catalog"  data-bs-toggle="collapse" role="button" aria-expanded="{{ (request()->is('catalog*')) ? 'true' : 'false' }}" aria-controls="catalog" data-key="t-email">
                            <i class="ri-layout-3-line"></i> <span>@lang('main.catalog')</span>
                        </a>
                        <div class="menu-dropdown {{ (request()->is('catalog*')) ? 'collapse show' : 'collapse' }}" id="catalog">
                            <ul class="nav nav-sm flex-column">
                                @can('View All Products')
                                    <li class="nav-item">
                                        <a href="{{route('admin.productList')}}" class="nav-link {{ (request()->is('catalog/products*')) ? 'active' : '' }}">@lang('Products')</a>
                                    </li>
                               @endcan
                                @can('View All Categories')
                                    <li class="nav-item">
                                        <a href="{{route('admin.categoriesList')}}" class="nav-link {{ (request()->is('catalog/categories/allcategories*')) ? 'active' : '' }}">@lang('Category')</a>
                                    </li>
                               @endcan
                               @can('View All Import Products')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.importViewProducts') }}" class="nav-link {{ (request()->is('catalog/products/importproducts*')) ? 'active' : '' }}">@lang('Import Products')</a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li> <!--- Catalog -->
                @endcanany
                @canany(['View All User Subscriptions'])
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ (request()->is('subscription*')) ? 'active collaspe' : 'collapsed' }}" href="#subscription"  data-bs-toggle="collapse" role="button" aria-expanded="{{ (request()->is('Subscriptions*')) ? 'true' : 'false' }}" aria-controls="subscription" data-key="t-email">
                            <i class="ri-function-fill"></i> <span>@lang('main.subscription')</span>
                        </a>
                        <div class="menu-dropdown {{ (request()->is('subscription*')) ? 'collapse show' : 'collapse' }}" id="subscription">
                            <ul class="nav nav-sm flex-column">
                                @if(Auth::user()->can('View All User Subscriptions'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.userSubscriptionList') }}" class="nav-link {{ (request()->is('subscription/usersubscriptionlist*')) ? 'active' : '' }}">@lang('User Subscription')</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                        <div class="menu-dropdown {{ (request()->is('subscription*')) ? 'collapse show' : 'collapse' }}" id="subscription">
                            <ul class="nav nav-sm flex-column">
                                @if(Auth::user()->can('View All User Subscriptions'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.userSubscriptionHistoryList') }}" class="nav-link {{ (request()->is('subscription/usersubscriptionhistory*')) ? 'active' : '' }}">@lang('Subscription History')</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </li> <!--- Subscription-->
                @endcanany
                @canany(['View All User Interest'])
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ (request()->is('interest*')) ? 'active collaspe' : 'collapsed' }}" href="#interest"  data-bs-toggle="collapse" role="button" aria-expanded="{{ (request()->is('interest*')) ? 'true' : 'false' }}" aria-controls="subscription" data-key="t-email">
                            <i class="ri-command-line"></i> <span>@lang('main.interest')</span>
                        </a>
                        <div class="menu-dropdown {{ (request()->is('interest*')) ? 'collapse show' : 'collapse' }}" id="interest">
                            <ul class="nav nav-sm flex-column">
                                @if(Auth::user()->can('View All User order'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.userInterestList') }}" class="nav-link {{ (request()->is('interest/userinterestlist*')) ? 'active' : '' }}">@lang('User Interest')</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </li> <!--- Interest-->
                @endcanany
                @canany(['View All User order'])
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ (request()->is('sale*')) ? 'active collaspe' : 'collapsed' }}" href="#order"  data-bs-toggle="collapse" role="button" aria-expanded="{{ (request()->is('order*')) ? 'true' : 'false' }}" aria-controls="subscription" data-key="t-email">
                            <i class="ri-shopping-bag-fill"></i> <span>@lang('main.orders')</span>
                        </a>
                        <div class="menu-dropdown {{ (request()->is('sale*')) ? 'collapse show' : 'collapse' }}" id="order">
                            <ul class="nav nav-sm flex-column">
                                @if(Auth::user()->can('View All User order details'))
                                <li class="nav-item">
                                <a href="{{ route('admin.allOrderList') }}" class="nav-link {{ (request()->is('sale/order*')) ? 'active' : '' }}">@lang('Order')</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </li> <!--- Order-->
                @endcanany
{{-- 
               @canany(['View All Lockup','View All Configuration'])
                <li class="nav-item">
                    <a href="#settings" class="nav-link menu-link {{ (request()->is('settings*')) ? 'active collaspe' : 'collapsed' }}" data-bs-toggle="collapse" role="button" aria-expanded="{{ (request()->is('settings*')) ? 'true' : 'false' }}" aria-controls="settings" data-key="t-email">
                        <i class="ri-settings-2-line"></i> <span>@lang('main.setting')</span>
                    </a>
                    <div class="menu-dropdown {{ (request()->is('settings*')) ? 'collapse show' : 'collapse' }}" id="settings">
                        <ul class="nav nav-sm flex-column">
                            @if(Auth::user()->can('View All Lockup'))
                            <li class="nav-item">
                                <a href="{{route('admin.indexListType')}}" class="nav-link {{ (request()->is('settings/list-type*')) ? 'active' : '' }}">@lang('main.lockup')</a>
                            </li>
                            @endif
                            @if(Auth::user()->can('View All Configuration'))
                            <li class="nav-item">
                                <a href="{{route('admin.indexConfiguration')}}" class="nav-link {{ (request()->is('settings/configuration*')) ? 'active' : '' }}">@lang('main.configuration')</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li> 
                @endcanany<!--- setting --> --}}

      <!---notification section-->  
      @canany(['View All Notifications'])        
                <li class="nav-item">
                    <a href="#notification" class="nav-link menu-link {{ (request()->is('notification*')) ? 'active collaspe' : 'collapsed' }}" data-bs-toggle="collapse" role="button" aria-expanded="{{ (request()->is('notification*')) ? 'true' : 'false' }}" aria-controls="notification" data-key="t-email">
                        <i class="ri-notification-3-line"></i> <span>@lang('main.notifications')</span>
                    </a>
                    <div class="menu-dropdown {{ (request()->is('notification*')) ? 'collapse show' : 'collapse' }}" id="notification">
                        <ul class="nav nav-sm flex-column">
                            @if(Auth::user()->can('View All Notifications'))
                            <li class="nav-item">
                                <a href="{{ route('admin.getNotification') }}" class="nav-link {{ (request()->is('notification/allnotification*')) ? 'active' : '' }}">@lang('main.notification')</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li> 
                @endcanany

      <!-- delivery section-->
                {{-- <li class="nav-item">
                    <a href="#delivery" class="nav-link menu-link {{ (request()->is('delivery*')) ? 'active collaspe' : 'collapsed' }}" data-bs-toggle="collapse" role="button" aria-expanded="{{ (request()->is('delivery*')) ? 'true' : 'false' }}" aria-controls="delivery" data-key="t-email">
                        <i class="ri-truck-line"></i> <span>@lang('main.delivery')</span>
                    </a>
                    <div class="menu-dropdown {{ (request()->is('delivery*')) ? 'collapse show' : 'collapse' }}" id="delivery">
                        <ul class="nav nav-sm flex-column"> --}}
                            {{-- @if(Auth::user()->can('View All Lockup')) --}}
                            {{-- <li class="nav-item">
                                <a href="{{ route('admin.getDelivery') }}" class="nav-link {{ (request()->is('delivery/delivery*')) ? 'active' : '' }}">@lang('main.delivery')</a>
                            </li>
                        </ul>
                    </div>
                </li>  --}}
                {{-- @endcanany --}}
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
