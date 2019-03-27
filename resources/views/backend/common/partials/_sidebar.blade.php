<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
                <span class="menu-title">{{ trans('common.dashboard') }}</span>
            </a>
        </li>

        @if (auth()->guard('admin')->user()->type == 'HIA')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#admin" aria-expanded="false" aria-controls="admin">
                    <i class="mdi mdi-hospital menu-icon"></i>
                    <span class="menu-title">Health Providers</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="admin">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{ route('admins.create') }}"> Create HP </a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admins.index') }}"> View HP </a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#patient" aria-expanded="false" aria-controls="patient">
                    <i class="mdi mdi-account-circle menu-icon"></i>
                    <span class="menu-title">Patients</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="patient">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{ route('patients.create') }}"> Create Patient </a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('patients.index') }}"> View Patients </a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.claims.money') }}">
                    <i class="mdi mdi-currency-usd menu-icon"></i>
                    <span class="menu-title">Claims For Money</span>
                </a>
            </li>

        @endif

        @if (auth()->guard('admin')->user()->type != 'HIA')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#admin" aria-expanded="false" aria-controls="admin">
                    <i class="mdi mdi-hospital menu-icon"></i>
                    <span class="menu-title">Claims</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="admin">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{ route('claims.create') }}"> Create Claim </a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('claims.index') }}"> View Claims </a></li>
                    </ul>
                </div>
            </li>

        @endif

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.transactions') }}">
                <i class="mdi mdi-arrow-down-bold-circle menu-icon"></i>
                <span class="menu-title">Transactions</span>
            </a>
        </li>
    </ul>
</nav>
