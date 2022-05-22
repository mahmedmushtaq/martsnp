<header class="header-v2">
    <!-- Header desktop -->
    <div class="container-menu-desktop trans-03">
        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop p-l-45">

                <!-- Logo desktop -->
                <a href="{{route('home')}}" class="logo">
                    <h3>martSNP</h3>
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li>
                            <a href="{{route('home')}}">Home</a>
                        </li>

                        <li>
                            <a href="{{route('productsoverview')}}">Products</a>
                        </li>

                        <li>
                            <a href="{{route('storesoverview')}}">Store</a>
                        </li>






                        @auth
                            <li>
                            <a href="{{ url('/dashboard') }}">Dashboard</a>
                            </li>
                            <li>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                            </li>

                        @else
                            <li>
                            <a href="{{ route('login') }}">Login</a>
                            </li>


                                <li>
                                <a href="{{ route('register') }}">Register</a>
                                </li>

                        @endauth

                        <li >
                            <a href="{{route('stores.index')}}" class="flex-c-m text-white stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                                Create a store
                            </a>
                        </li>




                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m h-full">
                    <div class="flex-c-m h-full p-r-24">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
                            <i class="zmdi zmdi-search"></i>
                        </div>
                    </div>

                    <div class="flex-c-m h-full p-l-18 p-r-25 bor5">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11   js-show-cart"
                        >
                            {{--                            data-notify="2"--}}
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
                    </div>

                    <div class="flex-c-m h-full p-lr-19">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
                            <i class="zmdi zmdi-menu"></i>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <h3>martSNP</h3>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
            <div class="flex-c-m h-full p-r-10">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
                    <i class="zmdi zmdi-search"></i>
                </div>
            </div>

            <div class="flex-c-m h-full p-lr-10 bor5">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11  js-show-cart" >
                    {{--                    data-notify="2"--}}
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>
            </div>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu-m">
            <li>
                <a href="{{route('home')}}">Home</a>


            </li>

            <li>
                <a href="{{route('productsoverview')}}">Products</a>
            </li>

            <li>
                <a  href="{{route('storesoverview')}}">Stores</a>
            </li>



            @auth
                <li>
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                </li>
                <li>


                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                </li>

            @else
                <li>
                    <a href="{{ route('login') }}">Login</a>
                </li>


                <li>
                    <a href="{{ route('register') }}">Register</a>
                </li>

            @endauth


            <li >
                <a href="{{route('stores.index')}}" class="flex-c-m text-white stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                    Create a store
                </a>
            </li>



        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="{{asset('assets/images/icons/icon-close2.png')}}" alt="CLOSE">
            </button>

            <form method="GET" action="/search" class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh2" type="text" name="search_product" placeholder="Search Products...">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search_store" placeholder="Search Store...">
            </form>
        </div>
    </div>
</header>
