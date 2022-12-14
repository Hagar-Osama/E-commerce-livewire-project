<div class="main-navbar shadow-sm sticky-top">
    <div class="top-navbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                    <h5 class="brand-name">{{$appSettings->website_name ?? 'website name'}}</h5>
                </div>
                <div class="col-md-5 my-auto">
                    <form method="GET" action="{{route('searchProducts')}}" role="search">
                        <div class="input-group">
                            <input type="search" name="search" value="{{Request::get('search')}}" placeholder="Search your product" class="form-control" />
                            <button class="btn bg-white" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 my-auto">
                    <ul class="nav justify-content-end">

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('cart.index')}}">
                                <i class="fa fa-shopping-cart"></i> Cart (<livewire:end-user.add-to-cart-count />)
                            </a>
                        </li>
                        <li class="nav-item">
                            @if(auth()->user())
                            <a class="nav-link" href="{{route('wishlist.index')}}">
                                <i class="fa fa-heart"></i> Wishlist (<livewire:end-user.wishlist-count />)
                            </a>
                            @else
                            <a class="nav-link" href="{{route('home.index')}}">
                                <i class="fa fa-heart"></i> Wishlist (0)
                            </a>
                            @endif
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user"></i> @auth
                                {{auth()->user()->name}}
                                @endauth
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{route('profile.index')}}"><i class="fa fa-user"></i> Profile</a></li>
                                <li><a class="dropdown-item" href="{{route('orders.index')}}"><i class="fa fa-list"></i> My Orders</a></li>
                                <li><a class="dropdown-item" href="{{route('wishlist.index')}}"><i class="fa fa-heart"></i> My Wishlist</a></li>
                                <li><a class="dropdown-item" href="{{route('cart.index')}}"><i class="fa fa-shopping-cart"></i> My Cart</a></li>
                                <form method="post" action="{{route('logout')}}">
                                    @csrf
                                <li><button class="dropdown-item"><i class="fa fa-sign-out"></i> Logout</button></li>
                                </form>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
                Ecom
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home.index')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('categories.home')}}">All Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('newArrivals.index')}}">New Arrivals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('featuredProducts.index')}}">Featured Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Electronics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Fashions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Accessories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Appliances</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
