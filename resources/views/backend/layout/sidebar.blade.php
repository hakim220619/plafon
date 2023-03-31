<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <!-- ! Hide app brand if navbar-full -->
    <div class="app-brand demo">
        <a href="/dashboard" class="app-brand-link">
            <img src="{{ asset('') }}storage/images/logo/{{ Helper::apk()->logo }}" alt=""
                style="width: 100%;">

        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    @if (request()->user()->role == 1)
        <ul class="menu-inner py-1">
            <li class="menu-item">
                <a href="/dashboard" class="menu-link ">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div>Dashboards</div>
                </a>
            </li>
            {{-- <li class="menu-item ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-book"></i>
                    <div>Master data</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item ">
                        <a href="/category" class="menu-link">
                            <div>Category</div>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a href="/users" class="menu-link">
                            <div>Users</div>
                        </a>
                    </li>
                </ul>
            </li> --}}

            <li class="menu-item ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class='menu-icon tf-icons bx bx-cog'></i>
                    <div>Setting</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item ">
                        <a href="/aplikasi" class="menu-link">
                            <div>Aplikasi</div>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    @endif

</aside>
