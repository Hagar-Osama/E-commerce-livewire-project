<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('order.index')}}">
                <i class="mdi mdi-cash-usd menu-icon"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category">
                <i class="mdi mdi-hanger menu-icon"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="category">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('category.create')}}">Add Category</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('category.index')}}">View Category</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#products" aria-expanded="false" aria-controls="products">
                <i class="mdi mdi-cart-outline menu-icon"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="products">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('product.create')}}">Add Product</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('product.index')}}">View Product</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('brand.index')}}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Brands</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('color.index')}}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Colors</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('users.index')}}">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('slider.index')}}" class="nav-link">
                <i class="mdi mdi-film menu-icon"></i>
                <span class="menu-title">Home Sliding</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('settings.create')}}">
                <i class="mdi mdi-brightness-5 menu-icon"></i>
                <span class="menu-title">Site Settings</span>
            </a>
        </li>
    </ul>
</nav>
