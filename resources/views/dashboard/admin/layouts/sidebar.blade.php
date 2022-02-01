 @php

        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        {
          $link = "https";
        }
        else
        {
          $link = "http";

          // Here append the common URL characters.
          $link .= "://";

          // Append the host(domain name, ip) to the URL.
          $link .= $_SERVER['HTTP_HOST'];

          // Append the requested resource location to the URL
          $link .= $_SERVER['REQUEST_URI'];
        }

    @endphp
 <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile" style="background: url({{asset('assets/images/background/user-info.jpg')}}) no-repeat;">
                    <!-- User profile image -->
                    <div class="profile-img">
                          
                         @if (Auth::guard('admin')->user()->image == '0')
                            <img src="{{asset('assets/images/users/profile.png')}}" alt="user" /> 
                        @else
                            <img src="{{asset(Auth::guard('admin')->user()->image)}}" width="50" height="50" alt="userp">
                        @endif
                        
                        </div>
                    <!-- User profile text-->
                    <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">{{Auth::guard('admin')->user()->name}}</a>
                        <div class="dropdown-menu animated flipInY"> 
                              <a href="{{route('admin.profile')}}" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('admin.logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a>
                            <form action="{{ route('admin.logout') }}" id="logout-form" method="post">@csrf</form>
                         </div>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                    {{-- dashboard --}}
                        <li class="{{ $link == route('admin.dashboard')? 'active':'' }}"> <a class="waves-effect waves-dark" href="{{route('admin.dashboard')}}" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboards</span></a></li>
                        {{-- users --}}
                         <li class="{{ $link == route('admin.users') ? 'active':'' }}"> 
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account" style="font-size: 18px" aria-hidden="true"></i><span class="hide-menu">Users</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('admin.users')}}" class="{{ $link == route('admin.users') ? 'active':'' }}">All Users</a></li>
                                {{-- <li><a href="{{route('admin.plan.requests')}}" class="{{ $link == route('admin.plan.requests') ? 'active':'' }}">Plan Purchase Requests</a></li> --}}
                            </ul>
                        </li>
                        {{-- plans --}}
                          <li class="{{ $link == route('admin.plans') || $link == route('admin.plan.create') || $link == route('admin.plan.requests') ? 'active':'' }}"> 
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-paper-plane" style="font-size: 18px" aria-hidden="true"></i><span class="hide-menu">Plans</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('admin.plans')}}" class="{{ $link == route('admin.plans') ? 'active':'' }}">All Plans</a></li>
                                <li><a href="{{route('admin.plan.requests')}}" class="{{ $link == route('admin.plan.requests') ? 'active':'' }}">Plan Purchase Requests</a></li>
                            </ul>
                        </li>
                        {{-- withdrawals --}}
                        <li class="{{ $link == route('admin.withdrawals')? 'active':'' }}"><a class="waves-effect waves-dark" href="{{route('admin.withdrawals')}}"  aria-expanded="false"><i class="ti-money" style="font-size: 18px" aria-hidden="true"></i><span class="hide-menu">Withdrawals</span></a></li>

                        {{-- settings --}}
                        <li class="{{ $link == route('admin.setting')? 'active':'' }}"><a class="waves-effect waves-dark" href="{{route('admin.setting')}}"  aria-expanded="false"><i class="ti-settings" style="font-size: 18px" aria-hidden="true"></i><span class="hide-menu">Settings</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item--><a href="{{route('admin.setting')}}" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
                <!-- item--><a href="{{ route('admin.logout') }}" data-toggle="tooltip" title="Logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="mdi mdi-power"></i></a>
                            <form action="{{ route('admin.logout') }}" id="logout-form" method="post">@csrf</form>

            <!-- End Bottom points-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->