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
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile" style="background: url({{asset('assets/images/background/user-info.jpg')}}) no-repeat;">
                    <!-- User profile image -->
                    <div class="profile-img">
                         @if (Auth::guard('web')->user()->image == '0')
                            <img src="{{asset('assets/images/users/profile.png')}}" alt="user" /> 
                        @else
                            <img src="{{asset(Auth::guard('web')->user()->image)}}" alt="userp">
                        @endif
                        </div>
                    <!-- User profile text-->
                    <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">{{Auth::guard('web')->user()->first_name}} {{Auth::guard('web')->user()->last_name }}</a>
                        <div class="dropdown-menu animated flipInY">
                               <a href="{{route('user.profile')}}" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('user.logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a>
                            <form action="{{ route('user.logout') }}" id="logout-form" method="post">@csrf</form>
                         </div>
                    </div>
                </div>
                <!-- End User profile text-->
                <?php
                    $addproved = App\Models\PurchasedPlan::where('user_id', '=', Auth::user()->id)->where('status', 'Approved')->exists();
                 ?>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="{{ $link == route('user.dashboard') ? 'active':'' }}"> <a class="waves-effect waves-dark" href="{{route('user.dashboard')}}" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a></li>
                        @if ($addproved == true)
                            <li class="{{ $link == route('user.client.area') ||$link == route('user.client.withdrawal')  ? 'active':'' }}"> <a class="waves-effect waves-dark" href="{{route('user.client.area')}}" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Client Area </span></a></li>
                        @endif
                        <li class="{{ $link == route('user.plans') ? 'active':'' }}"> <a class="waves-effect waves-dark" href="{{route('user.plans')}}" aria-expanded="false"><i class="fa fa-paper-plane"></i><span class="hide-menu">Plans </span></a></li>
                        {{-- history --}}
                        <li class="{{ $link == route('user.transaction.history') ? 'active':'' }}"> <a class="waves-effect waves-dark" href="{{route('user.transaction.history')}}" aria-expanded="false"><i class="fa fa-history"></i><span class="hide-menu">Transaction History</span></a></li>

                        @if(Auth::guard('web')->user()->refferal_code !=null)
                        <li class="{{ $link == route('user.refferal.code') ? 'active':'' }}"> <a class="waves-effect waves-dark" href="{{route('user.refferal.code')}}" aria-expanded="false"><i class="fa fa-key"></i><span class="hide-menu">Refferal Code</span></a></li>
                        @endif
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item--><a href="{{ route('user.logout') }}" data-toggle="tooltip" title="Logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="mdi mdi-power"></i></a>
                            <form action="{{ route('user.logout') }}" id="logout-form" method="post">@csrf</form>

            <!-- End Bottom points-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->