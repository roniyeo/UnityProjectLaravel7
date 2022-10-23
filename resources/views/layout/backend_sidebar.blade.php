<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sidebar-item {{ Request::is('admin/agent') ? 'active' : '' }}">
            <a href="{{ route('agent') }}" class='sidebar-link'>
                <i class="bi bi-hexagon-fill"></i>
                <span>Agent</span>
            </a>
        </li>

        <li class="sidebar-item {{ Request::is('admin/aminities') ? 'active' : '' }}">
            <a href="{{ route('aminities') }}" class='sidebar-link'>
                <i class="bi bi-hexagon-fill"></i>
                <span>Aminities</span>
            </a>
        </li>

        <li class="sidebar-item {{ Request::is('admin/tipeprice') ? 'active' : '' }}">
            <a href="{{ route('tipeprice') }}" class='sidebar-link'>
                <i class="bi bi-hexagon-fill"></i>
                <span>Tipe Price</span>
            </a>
        </li>

        <li class="sidebar-item {{ Request::is('admin/property') ? 'active' : '' }}">
            <a href="{{ route('property') }}" class='sidebar-link'>
                <i class="bi bi-house-fill"></i>
                <span>Properties</span>
            </a>
        </li>

        <li class="sidebar-item {{ Request::is('admin/property/approved') ? 'active' : '' }}">
            <a href="{{ route('property.approved') }}" class='sidebar-link'>
                <i class="bi bi-house-fill"></i>
                <span>Approved</span>
            </a>
        </li>

        <li class="sidebar-title">Front End</li>
        <li class="sidebar-item">
            <a href="{{ route('slider') }}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Slider</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('partners') }}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Partners</span>
            </a>
        </li>

    </ul>
</div>
