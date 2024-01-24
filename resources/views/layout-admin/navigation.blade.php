@section('navbar')
@php
$user = auth()->guard('admin')->user();
@endphp
<div class="container-fluid">
    <div class="collapse" id="search-nav">
        <form class="navbar-left navbar-form nav-search mr-md-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pr-1">
                        <i class="fa fa-search search-icon"></i>
                    </button>
                </div>
                <input type="text" placeholder="Search ..." class="form-control" id="nav-search-input">
            </div>
        </form>
    </div>
    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
        <li class="nav-item toggle-nav-search hidden-caret">
            <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                <i class="fa fa-search"></i>
            </a>
        </li>

        <li class="nav-item dropdown hidden-caret">
            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                <div class="avatar-sm">
                    @if ($user->profile)
                    <img src="{{ asset('/' . $user->profile) }}" alt="..." class="avatar-img rounded-circle">
                    @else
                    <img src="{{ asset('landing-page/images/user.svg') }}" alt="..." class="avatar-img rounded-circle">
                    @endif
                </div>
            </a>

            <ul class="dropdown-menu dropdown-user animated fadeIn">
                <div class="dropdown-user-scroll scrollbar-outer">
                    <li>
                        <div class="user-box">
                            <div class="avatar-lg">
                                @if ($user->profile)
                                <img src="{{ asset('/' . $user->profile) }}" alt="image profile" class="avatar-img rounded-circle rounded"></div>
                                @else
                                <img src="{{ asset('landing-page/images/user.svg') }}" alt="image profile" class="avatar-img rounded-circle rounded"></div>
                                @endif
                            <div class="u-text">
                                <h4>{{ Auth::guard('admin')->user()->username }}</h4>
                                <p class="text-muted">{{ Auth::guard('admin')->user()->level }}</p></a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('admin.data.profile') }}">Profile</a>
                        <a class="dropdown-item" href="{{route('password.admin.edit')}}">Update Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                    </li>
                </div>
            </ul>
        </li>
    </ul>
</div>
@endsection


@section('sidebar')
      <div class="sidebar-content">
        <div class="user">
            <div class="avatar-sm float-left mr-2">
                @if ($user->profile)
                <img src="{{ asset('/' . $user->profile) }}" alt="..." class="avatar-img rounded-circle">
                @else
                <img src="{{ asset('landing-page/images/user.svg') }}" alt="..." class="avatar-img rounded-circle">
                @endif
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                    <span>
                        {{ Auth::guard('admin')->user()->username }}
                        <span class="user-level">{{ Auth::guard('admin')->user()->level }}</span>
                        <span class="caret"></span>
                    </span>
                </a>
                <div class="clearfix"></div>

                <div class="collapse in" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="{{ route('admin.data.profile') }}">
                                <span class="link-collapse">Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('password.admin.edit') }}">
                                <span class="link-collapse">Update Password</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav nav-danger">
            <li class="nav-item {{ request()->is('dashboard/admin') ? 'active' : '' }}">
                <a href="{{ route('dashboard.admins') }}">
                    <i class="icofont-dashboard fw-bold"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-section">
                <span class="sidebar-mini-icon">
                    <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Users</h4>
            </li>
            <li class="nav-item {{ request()->is('account/adopter') ? 'active' : '' }}">
                <a href="{{ route('account.adopter') }}">
                    <i class="icofont-users"></i>
                    <p>Account</p>
                </a>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#adopter">
                    <i class="icofont-ui-check"></i>
                    <p>Validasi Data</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="adopter">
                    <ul class="nav nav-collapse">
                        <li class="nav-item {{ request()->is('data/adopter') ? 'active' : '' }}">
                            <a href="{{ route('adoption.data') }}">
                                <span class="sub-item">Data Pengadopsi</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('validation/adopter') ? 'active' : '' }}">
                            <a href="{{ route('validation.adoption') }}">
                                <span class="sub-item">Validasi Adopsi</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ request()->is('history/adoption') ? 'active' : '' }}">
                <a href="{{ route('admin.history.adoption') }}">
                    <i class="icofont-search-document fw-bold"></i>
                    <p>Riwayat Adopsi</p>
                </a>
            </li>
            <li class="nav-section">
                <span class="sidebar-mini-icon">
                    <i class="icofont-dog-alt"></i>
                </span>
                <h4 class="text-section">Hewan</h4>
            </li>
            <li class="nav-item {{ request()->is('animals') ? 'active' : '' }}">
                <a href="{{ route('animals.list') }}">
                    <i class="icofont-dog"></i>
                    <p>Data Hewan</p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('rescue') ? 'active' : '' }}">
                <a href="{{ route('rescue.list') }}">
                    <i class="icofont-ui-love-add"></i>
                    <p>Data Rescue</p>
                </a>
            </li>
            @if (Auth::guard('admin')->user()->level == "Master Admin")
            <li class="nav-section">
                <span class="sidebar-mini-icon">
                    <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Admin</h4>
            </li>
            <li class="nav-item {{ request()->is('data/admin') ? 'active' : '' }}">
                <a href="{{ route('admin.account') }}">
                    <i class="icofont-user"></i>
                    <p>Data Admin</p>
                </a>
            </li>
            @endif
        </ul>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        function filterNavItems(searchQuery) {
            const navItems = $('.nav-danger .nav-item');
            const searchQueryLowerCase = searchQuery.toLowerCase();

            navItems.each(function () {
                const navItemText = $(this).text().toLowerCase();
                if (navItemText.includes(searchQueryLowerCase)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        $('#nav-search-input').on('keyup', function () {
            const searchQuery = $(this).val();
            filterNavItems(searchQuery);
        });

        filterNavItems('');
    });
</script>
@endsection
