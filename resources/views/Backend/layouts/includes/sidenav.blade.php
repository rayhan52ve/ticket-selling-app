{{-- <style>
    .scroll-sidebar {
        overflow-y: auto;
        height: 100%;
    }
</style> --}}
<style>
    /* Custom styles for sub-menu items */
    .sub-menu-item {
        font-size: 10px;
        /* Smaller font size */
        color: #042d49;
        /* Different color */
        padding-left: 10px;
        /* Less indentation */
        /* font-weight: 500; */
        /* Slightly bold */
        margin-left: 10px;
        /* Additional left margin to distinguish from main categories */
    }

    .sub-menu-item:hover {
        color: #2980b9;
        /* Darker color on hover */
    }

    /* Additional styling for sub-menu icons */
    .sidebar-item .mdi-cart-outline,
    .sidebar-item .mdi-heart-outline {
        color: #3498db;
        /* Match the icon color with the text color */
    }

    .sidebar-item .mdi-cart-outline:hover,
    .sidebar-item .mdi-heart-outline:hover {
        color: #2980b9;
        /* Darker color on hover */
    }
</style>
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" style="height: 95vh;">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <!-- User Menu Start -->
            <div class="text-center">
                @if (auth()->user()->image)
                    <img class="profile" style="border-radius: 50%; height:85px;width:85px" alt="profile"
                        src="/uploads/profile/{{ auth()->user()->image }}" />
                @else
                    <img class="profile w-50" style="border-radius: 50%" alt="profile"
                        src="{{ asset('backend/assets/images/users/avatar.png') }}" />
                @endif
                <h3>{{ auth()->user()->name }}</h3>
                <a href="{{ route('profile') }}" title="Edit Profile">Change Profile</a>
            </div>
            <hr>
            <!-- User Menu End -->
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('dashboard') }}" aria-expanded="false"><i class="mdi me-2 mdi-gauge"></i><span
                            class="hide-menu">Dashboard</span></a></li>

                @if (auth()->user()->role == 2)
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route('lottery.create') }}" aria-expanded="false"><i
                                class="mdi me-2 mdi-ticket"></i><span class="hide-menu">Book Lottery</span></a></li>
                @endif

                {{-- admin or superadmin only --}}
                @if (auth()->user()->role == 1)
                    <li class="sidebar-item">
                        <a class="sidebar-link  waves-effect waves-dark" href="javascript:void(0)"
                            aria-expanded="false">
                            <i class="mdi me-2 mdi-ticket-account"></i><span class="hide-menu">Lottery Request</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('admin.lottery.index') }}" class="sidebar-link">
                                    <span class="hide-menu sub-menu-item"><i class="mdi mdi-gift"></i>
                                        Pending request</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('admin.acceptedLottery') }}" class="sidebar-link">
                                    <span class="hide-menu sub-menu-item"><i class="mdi mdi-truck"></i>
                                        Accepted Request</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('admin.lotteryIdlist') }}" class="sidebar-link">
                                    <span class="hide-menu sub-menu-item"><i class="mdi mdi-truck"></i>
                                        Lottery List</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route('admin.user.index') }}" aria-expanded="false">
                            <i class="mdi me-2 mdi-account-check"></i><span class="hide-menu">Agent Request</span></a>
                    </li>

                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route('admin.agentList') }}" aria-expanded="false">
                            <i class="mdi me-2 mdi-account-check"></i><span class="hide-menu">Agent List</span></a>
                    </li>

                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route('admin.prize.index') }}" aria-expanded="false">
                            <i class="mdi me-2 mdi-gift"></i><span class="hide-menu">Manage Prize</span></a>
                    </li>

                    {{-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route('user.create') }}" aria-expanded="false">
                            <i class="mdi me-2 mdi-account-plus"></i><span class="hide-menu">Add User
                                Data</span></a>
                    </li> --}}
                @endif
                {{-- admin or agent only --}}

            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <div class="sidebar-footer">
        <div class="row">
            <div class="col-4 link-wrap">
                <!-- item-->
                <a href="{{ route('admin.editWebsiteInfo') }}" class="link" data-toggle="tooltip" title="Settings"
                    data-original-title="Settings"><i class="ti-settings"></i></a>
            </div>
            <div class="col-4 link-wrap">
                <!-- item-->
                <a href="https://mail.google.com/" class="link" data-toggle="tooltip" title="Gmail"
                    data-original-title="Email"><i class="mdi mdi-gmail"></i></a>
            </div>
            <div class="col-4 link-wrap">
                <!-- item-->
                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="link" data-toggle="tooltip" title="Sign Out" data-original-title="Sign Out">
                        <i class="mdi mdi-power"></i>
                    </a>
                </form>
            </div>
        </div>
    </div>
</aside>
