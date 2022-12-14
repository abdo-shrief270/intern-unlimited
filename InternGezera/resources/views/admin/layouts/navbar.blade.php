<!--  BEGIN NAVBAR  -->
<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>
        <ul class="navbar-item flex-row navbar-dropdown search-ul">

            <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{URL::asset('assetsAdmin/shared/img/90x90.jpg')}}" alt="admin-profile" class="img-fluid">
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="user-profile-section">
                        <div class="media mx-auto">
                            <img src="{{URL::asset('assetsAdmin/shared/img/90x90.jpg')}}" class="img-fluid mr-2" alt="avatar">
                            <div class="media-body">
                                <h5>
                                    @if(Auth::guard('admin')->check())
                                        {{Auth::guard('admin')->user()->name}}
                                    @elseif(Auth::guard('manager')->check())
                                        {{Auth::guard('manager')->user()->name}}
                                    @else
                                        {{Auth::user()->name}}
                                    @endif


                                </h5>
                                <p>
                                    @if(Auth::guard('admin')->check())
                                       Admin
                                    @elseif(Auth::guard('manager')->check())
                                       Manager
                                    @else
                                       User
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> <span> Profile Information</span>
                        </a>
                    </div>
                    <div class="dropdown-item">
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> <span>Change Password</span>
                        </a>
                    </div>

                    <div class="dropdown-item">
                        <form action="{{route('auth.logout')}}" method="post">
                            @csrf
                            <a href="#">
                                <button type="submit"  style="border: none; background-color: #fff">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <span>Log Out</span>
                                </button>

                            </a>
                        </form>

                    </div>
                </div>
            </li>
        </ul>
    </header>
</div>
<!--  END NAVBAR  -->
