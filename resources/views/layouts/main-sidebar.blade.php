<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{Request::is('dashboard') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('dashboard')}}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{Request::is('order*') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('order.index')}}">
                <i class="mdi mdi-cash-usd menu-icon"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>
        <li class="nav-item {{Request::is('category*') ? 'active' : ''}}">
            <a class="nav-link" data-bs-toggle="collapse" href="#category" aria-expanded="{{Request::is('category*') ? 'true' : 'false'}}">
                <i class="mdi mdi-hanger menu-icon"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{Request::is('category*') ? 'show' : ''}}" id="category">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link {{Request::is('category*') ? 'active' : ''}}" href="{{route('category.index')}}">View Category</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{Request::is('product*') ? 'active' : ''}}">
            <a class="nav-link" data-bs-toggle="collapse" href="#products" aria-expanded="{{Request::is('product*') ? 'true' : 'false'}}">
                <i class="mdi mdi-cart-outline menu-icon"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{Request::is('product*') ? 'show' : ''}}" id="products">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link {{Request::is('product*') ? 'active' : ''}}" href="{{route('product.index')}}">View Product</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{Request::is('brand.index') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('brand.index')}}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Brands</span>
            </a>
        </li>
        <li class="nav-item {{Request::is('color.index') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('color.index')}}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Colors</span>
            </a>
        </li>
        <li class="nav-item {{Request::is('users.index') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('users.index')}}">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>
        <li class="nav-item {{Request::is('slider.index') ? 'active' : ''}}">
            <a href="{{route('slider.index')}}" class="nav-link">
                <i class="mdi mdi-film menu-icon"></i>
                <span class="menu-title">Home Sliding</span>
            </a>
        </li>
        <li class="nav-item {{Request::is('settings/create') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('settings.create')}}">
                <i class="mdi mdi-brightness-5 menu-icon"></i>
                <span class="menu-title">Site Settings</span>
            </a>
        </li>
    </ul>
</nav>
