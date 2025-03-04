<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
                <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('admin/orders*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/orders') }}">
                <i class="mdi mdi-cart-outline menu-icon"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>

        <!-- Category Menu (Updated condition) -->
        <li class="nav-item {{ Request::is('admin/category*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#category-menu" aria-expanded="{{ Request::is('admin/category*') ? 'true' : 'false' }}" aria-controls="category-menu">
                <i class="mdi mdi-tag-outline menu-icon"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/category*') ? 'show' : '' }}" id="category-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link {{ Request::is('admin/category/create') ? 'active' : '' }}" href="{{ url('admin/category/create') }}">Add Category</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('admin/category') || Request::is('admin/category/*/edit') ? 'active' : '' }}" href="{{ url('admin/category') }}">View Category</a></li>
                </ul>
            </div>
        </li>

        <!-- Product Menu (Updated condition) -->
        <li class="nav-item {{ Request::is('admin/products*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#product-menu" aria-expanded="{{ Request::is('admin/products*') ? 'true' : 'false' }}" aria-controls="product-menu">
                <i class="mdi mdi-cube-outline menu-icon"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/products*') ? 'show' : '' }}" id="product-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link {{ Request::is('admin/products/create') ? 'active' : '' }}" href="{{ url('admin/products/create') }}">Add Product</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('admin/products') ? 'active' : '' }}" href="{{ url('admin/products') }}">View Product</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item {{ Request::is('admin/brands') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/brands') }}">
                <i class="mdi mdi-label-outline menu-icon"></i>
                <span class="menu-title">Brands</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('admin/variations') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/variations') }}">
                <i class="mdi mdi-palette-outline menu-icon"></i>
                <span class="menu-title">Variations</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('admin/users*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#user-menu" aria-expanded="{{ Request::is('admin/users*') ? 'true' : 'false' }}" aria-controls="user-menu">
                <i class="mdi mdi-account-group-outline menu-icon"></i>
                <span class="menu-title">Users</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/users*') ? 'show' : '' }}" id="user-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}" href="{{ url('admin/users') }}">Manage Users</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item {{ Request::is('admin/sliders') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/sliders') }}">
                <i class="mdi mdi-view-carousel menu-icon"></i>
                <span class="menu-title">Home Slider</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('admin/settings') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/settings') }}">
                <i class="mdi mdi-cog-outline menu-icon"></i>
                <span class="menu-title">Site Settings</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('admin/settings*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#forms-menu" aria-expanded="{{ Request::is('admin/settings*') ? 'true' : 'false' }}" aria-controls="product-menu">
                <i class="mdi mdi-form-dropdown menu-icon"></i> <!-- Changed icon here -->
                <span class="menu-title">Forms</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/settings*') ? 'show' : '' }}" id="forms-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item {{ Request::is('admin/settings/aboutus') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/settings/aboutus') }}">About Us</a>
                    </li>
                    <li class="nav-item {{ Request::is('admin/settings/contact-us') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.contact.index') }}">Contact Us</a>
                    </li>
                </ul>
            </div>
        </li>
        
    </ul>
</nav>
