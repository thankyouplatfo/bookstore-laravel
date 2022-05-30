<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion pr-0" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center my-5" href="/">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('images/logos/main-logo.png') }}" alt="main Logo" width="70%">
        </div>

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active text-right">
        <a class="nav-link w3-xlarge text-right {{ request()->is('admin') ? 'active' : '' }}"
            href="{{ route('admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('site.dashboard') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link w3-xlarge text-right {{ request()->is('admin/books') ? 'active' : '' }}"
            href="{{ route('books.index') }}">
            <i class="fa-solid fa-book"></i>
            <span>{{ __('site.books') }}</span>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link w3-xlarge text-right {{ request()->is('admin/categories') ? 'active' : '' }}"
            href="{{ route('categories.index') }}" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fa-solid fa-puzzle-piece"></i>
            <span>{{ __('site.categories') }}</span>
        </a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link w3-xlarge text-right {{ request()->is('admin/authors') ? 'active' : '' }}"
            href="{{ route('authors.index') }}">
            <i class="fa-solid fa-pencil"></i>
            <span>{{ __('site.authors') }}</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link w3-xlarge text-right {{ request()->is('admin/publishers') ? 'active' : '' }}"
            href="{{ route('publishers.index') }}">
            <i class="fa-solid fa-upload"></i>
            <span>{{ __('site.publishers') }}</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link w3-xlarge text-right {{ request()->is('admin/users') ? 'active' : '' }}"
            href="{{ route('users.index') }}">
            <i class="fa-solid fa-users"></i>
            <span>{{ __('site.users') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
