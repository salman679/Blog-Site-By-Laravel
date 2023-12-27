    <!-- back to top start -->
    <div class="back-to-top d-none">
        <i class="fa-solid fa-turn-up"></i>
    </div>
    <!-- back to top end -->

    <!-- header start -->
    <header class="header">
        <div class="topber">
            <div class="container">
                <div class="topber-container">
                    <ul class="top-bar-list m-0">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Privacy & Policy</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                    <ul class="top-bar-social m-0">
                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-google-plus-g"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main-menu">
            <div class="container">
                <div class="menu-content">
                    <div class="logo">
                        <a href="{{ route('front.index') }}"><img src="{{ asset('front/image/logo.png') }}" alt="logo"></a>
                    </div>
                    <ul class="menu-list">
                        <li><a class="active" href="{{ route('front.index') }}">Home</a></li>
                        <li><a href="{{ route('front.contact') }}">Contact</a></li>
                    </ul>
                    <div class="search" href="">
                        <a href="#"><i class="fas fa-search"></i></a>

                        <div class="search-area">
                            <form action="">
                                <input type="text" name="searchItem" placeholder="Search Here...">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <div class="overflow"></div>
                    </div>
                    <div class="mobil-icon d-md-none">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                    <div class="ovarflow"></div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->