<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="{{url ('admin/dashboard')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Hostels</div>
            <a href="{{ route('admin.hostels.create') }}" class="sidebar-link">
                <i class="fas fa-home"></i>
                <span>Add Hostel</span>
            </a>
            <a  href="{{ route('admin.bookings.index') }}" class="sidebar-link">
                <i class="fas fa-book"></i>
                <span>View Bookings</span>
            </a>

         

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Edit Hostel
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="sb-sidenav-menu-heading">Tables</div>
            <a href="{{ route('admin.users.index') }}" class="sidebar-link">
                <i class="fas fa-users"></i>
                <span>Students</span>
            </a>
        </li>
            <a class="nav-link" href="tables.html">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Hostels
            </a>
            <a class="nav-link" href="tables.html">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Payments
            </a>
        </div>
    </div>
</nav>