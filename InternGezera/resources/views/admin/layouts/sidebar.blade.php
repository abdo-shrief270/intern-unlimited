@php
    // $currentRoute=explode('/',URL::current())[5];
 $currentRoute='test';
@endphp
<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id=container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">

        <nav id="compactSidebar">
            <ul class="navbar-nav theme-brand flex-row">
                <li class="nav-item theme-logo">
                    <a href="#">
                        <img src="{{ URL::asset('assetsAdmin/shared/img/90x90.jpg') }}" class="navbar-logo"
                             alt="logo">
                    </a>
                </li>
            </ul>
            <ul class="menu-categories">
                <li class="menu">
                    <a href="#"
                       data-active="{{$currentRoute=='index'?'true':'false'}}"
                       class="menu-toggle">
                        <div class="base-menu">
                            <div class="base-icons">
                                <i class="fa-solid fa-house"></i>
                            </div>
                            <span>Dashboard</span>
                        </div>
                    </a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-chevron-left">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </li>
                @auth('admin')

                <li class="menu">
                    <a href="#client"
                       data-active="{{$currentRoute=='orders'?'true':'false'}}"
                       class="menu-toggle">
                        <div class="base-menu">
                            <div class="base-icons">
                                <i class="fa-solid fa-cart-shopping text-danger"></i>
                            </div>
                            <span>Clients</span>
                        </div>
                    </a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-chevron-left">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </li>
                    <li class="menu">
                        <a href="#product"
                           class="menu-toggle">
                            <div class="base-menu">
                                <div class="base-icons">
                                    <i class="fa-solid fa-cart-shopping text-danger"></i>
                                </div>
                                <span>Products</span>
                            </div>
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-chevron-left">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </li>


                @endauth
            </ul>
        </nav>

        <div id="compact_submenuSidebar" class="submenu-sidebar  pt-0">

            <!--Start SubMenu Clients -->
            @auth('admin')

            <div class="submenu" id="product">
                <ul class="submenu-list" data-parent-element="#client">
                    <a href="{{route('admin.product.index')}}"><h6 style="font-size:14px;" class="pl-2 mt-4">Products</h6></a>
                    <div class="dropdown-divider"></div>


                </ul>
            </div>
            <!--End SubMenu Clients -->

            @endauth
        </div>
    </div>
    <!--  END SIDEBAR  -->

