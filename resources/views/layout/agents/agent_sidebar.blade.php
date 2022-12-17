<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        {{-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> --}}
        <div class="sidebar-brand-text mx-3">Unity Property</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Menus
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#property"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Property</span>
        </a>
        <div id="property" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Property :</h6>
                <a class="collapse-item" href="{{ route('agent.property') }}">My Properties</a>
                <a class="collapse-item" href="{{ route('agent.newproperty') }}">List New Properties</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#custompage"
            aria-expanded="true" aria-controls="custompage">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Custom Page</span>
        </a>
        <div id="custompage" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Page:</h6>
                <a class="collapse-item" href="#">Public Profile</a>
                <a class="collapse-item" href="#">Preview Page</a>
            </div>
        </div>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('agent.property') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Create Properties</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('agent.newproperty') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>List New Properties</span>
        </a>
    </li> --}}
    {{-- <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Penjualan
    </div> --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#customer"
            aria-expanded="true" aria-controls="customer">
            <i class="fas fa-fw fa-cog"></i>
            <span>Customer</span>
        </a>
        <div id="customer" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Customer :</h6>
                <a class="collapse-item" href="{{ route('agent.customer') }}">Customer</a>
                <a class="collapse-item" href="#">My Customer</a>
                <a class="collapse-item" href="#">Closing Database</a>
            </div>
        </div>
    </li>

    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('agent.customer') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Customer</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#">
            <i class="fas fa-fw fa-cog"></i>
            <span>My Customer</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#">
            <i class="fas fa-fw fa-cog"></i>
            <span>Closing Database</span>
        </a>
    </li> --}}
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Setting
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Setting</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Setting</h6>
                <a class="collapse-item" href="{{ route('agent.profile') }}">Profile</a>
                <a class="collapse-item" href="{{ route('agent.change-password') }}">Change Password</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
