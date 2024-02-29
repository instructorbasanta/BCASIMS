<header class="hdr-wrap">
    <div class="hdr-content hdr-content-sticky">
        <div class="container">
            <div class="row">
                <div class="col-auto show-mobile">
                    <div class="menu-toggle"> <a href="#" class="mobilemenu-toggle"><i class="icon-menu"></i></a> </div>
                </div>
                <div class="col-auto hdr-logo">
                    <a href="index-2.html" class="logo"><img srcset="{{asset('assets/frontend/images/logo.webp')}}" alt="Logo"></a>
                </div>
                <div class="hdr-phone hide-mobile">
                    <i class="icon-phone"></i><span>{{$data['setting']->phone}}</span>
                </div>
                <div class="hdr-nav hide-mobile nav-holder-s">
                </div>
                <div class="hdr-links-wrap col-auto ml-auto">
                    <div class="hdr-inline-link">
                        <div class="search_container_desktop">
                            <div class="dropdn dropdn_search dropdn_fullwidth">
                                <a href="#" class="dropdn-link  js-dropdn-link only-icon"><i class="icon-search"></i><span class="dropdn-link-txt">Search</span></a>
                                <div class="dropdn-content">
                                    <div class="container">
                                        <form method="get" action="#" class="search search-off-popular">
                                            <input name="search" type="text" class="search-input input-empty" placeholder="What are you looking for?">
                                            <button type="submit" class="search-button"><i class="icon-search"></i></button>
                                            <a href="#" class="search-close js-dropdn-close"><i class="icon-close-thin"></i></a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdn dropdn_wishlist">
                            <a href="account-wishlist.html" class="dropdn-link only-icon wishlist-link ">
                                <i class="icon-heart"></i><span class="dropdn-link-txt">Wishlist</span><span class="wishlist-qty">3</span>
                            </a>
                        </div>
                        <div class="dropdn dropdn_account dropdn_fullheight">
                            <a href="#" class="dropdn-link js-dropdn-link js-dropdn-link only-icon" data-panel="#dropdnAccount"><i class="icon-user"></i><span class="dropdn-link-txt">Account</span></a>
                        </div>
                        <div class="dropdn dropdn_fullheight minicart">
                            <a href="#" class="dropdn-link js-dropdn-link minicart-link only-icon" data-panel="#dropdnMinicart">
                                <i class="icon-basket"></i>
                                <span class="minicart-qty">{{\Gloudemans\Shoppingcart\Facades\Cart::count()}}</span>
                                <span class="minicart-total hide-mobile">{{\Gloudemans\Shoppingcart\Facades\Cart::total()}}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hdr hdr-style2">
        <div class="hdr-topline js-hdr-top">
            <div class="container">
                <div class="row">
                    <div class="col hdr-topline-left">
                        <div class="hdr-line-separate">
                            <ul class="social-list list-unstyled">
                                <li>
                                    <a href="#"><i class="icon-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-google"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-vimeo"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col hdr-topline-right hide-mobile">
                        <div class="hdr-inline-link">
                            <div class="dropdn_language">
                                <div class="dropdn dropdn_language dropdn_language--noimg dropdn_caret">
                                    <a href="#" class="dropdn-link js-dropdn-link"><span class="js-dropdn-select-current">English</span><i class="icon-angle-down"></i></a>
                                    <div class="dropdn-content">
                                        <ul>
                                            <li class="active"><a href="{{route('change_locale','en')}}">English</a></li>
                                            <li><a href="{{route('change_locale','np')}}">Nepali</a></li>
                                            <li><a href="{{route('change_locale','gr')}}">German</a></li>
                                            <li><a href="{{route('change_locale','fr')}}">French</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdn_currency">
                                <div class="dropdn dropdn_caret">
                                    <a href="#" class="dropdn-link js-dropdn-link">US dollars<i class="icon-angle-down"></i></a>
                                    <div class="dropdn-content">
                                        <ul>
                                            <li class="active"><a href="#"><span>US dollars</span></a></li>
                                            <li><a href="#"><span>Euro</span></a></li>
                                            <li><a href="#"><span>UK pounds</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdn dropdn_account dropdn_fullheight">
                                <a href="#" class="dropdn-link js-dropdn-link" data-panel="#dropdnAccount"><i class="icon-user"></i><span class="dropdn-link-txt">Account</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hdr-content">
            <div class="container">
                <div class="row">
                    <div class="col-auto show-mobile">
                        <div class="menu-toggle"> <a href="#" class="mobilemenu-toggle"><i class="icon-menu"></i></a> </div>
                    </div>
                    <div class="col-8 hdr-nav hide-mobile nav-holder">
                        <ul class="mmenu mmenu-js">
                            <li class="mmenu-item--simple"><a href="{{route('frontend.home')}}">{{__('message.home')}}</a></li>
                            @foreach($data['menus']  as $menu)
                                <li class="mmenu-item--simple"><a href="{{route('frontend.category',$menu->slug)}}">
                                    @if(\Illuminate\Support\Facades\App::getLocale() == 'np')
                                        {{$menu->name_np}}
                                        @else
                                            {{$menu->name}}
                                        @endif

                                    </a>
                                    <div class="mmenu-submenu">
                                        <ul class="submenu-list">
                                            @foreach($menu->subcategories as $subcategory)
                                                @if($subcategory->productLines()->count() > 0)
                                                    <li><a href="{{route('frontend.subcategory',$subcategory->slug)}}">{{$subcategory->name}}</a>
                                                        <ul>
                                                            @foreach($subcategory->productLines as $product_line)
                                                                <li><a href="{{route('frontend.product_line',$product_line->slug)}}">{{$product_line->name}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="hdr-logo">
                        <a href="{{route('frontend.home')}}" class="logo"><img src="{{asset('setting/images/' . $data['setting']->logo_header)}}" alt="Logo" width="100"></a>
                    </div>
                    <div class="col col-lg-8 hdr-links-wrap">
                        <div class="hdr-links">
                            <div class="hdr-phone">
                                <i class="icon-phone"></i><span>{{$data['setting']->phone}}</span>
                            </div>
                            <div class="hdr-inline-link">
                                <div class="search_container_desktop">
                                    <div class="dropdn dropdn_search dropdn_fullwidth">
                                        <a href="#" class="dropdn-link  js-dropdn-link only-icon"><i class="icon-search"></i><span class="dropdn-link-txt">Search</span></a>
                                        <div class="dropdn-content">
                                            <div class="container">
                                                <form method="get" action="#" class="search search-off-popular">
                                                    <input name="search" type="text" class="search-input input-empty" placeholder="What are you looking for?">
                                                    <button type="submit" class="search-button"><i class="icon-search"></i></button>
                                                    <a href="#" class="search-close js-dropdn-close"><i class="icon-close-thin"></i></a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdn dropdn_compare">
                                    <a href="#" class="dropdn-link only-icon compare-link ">
                                        <i class="icon-compare"></i><span class="dropdn-link-txt">Wishlist</span><span class="compare-qty">3</span>
                                    </a>
                                </div>
                                <div class="hdr_container_mobile show-mobile">
                                    <div class="dropdn dropdn_account dropdn_fullheight">
                                        <a href="#" class="dropdn-link js-dropdn-link" data-panel="#dropdnAccount"><i class="icon-user"></i><span class="dropdn-link-txt">Account</span></a>
                                    </div>
                                </div>
                                <div class="dropdn dropdn_fullheight minicart">
                                    <a href="#" class="dropdn-link js-dropdn-link minicart-link" data-panel="#dropdnMinicart">
                                        <i class="icon-basket"></i>
                                        <span class="minicart-qty">{{\Gloudemans\Shoppingcart\Facades\Cart::count()}}</span>
                                        <span class="minicart-total hide-mobile">{{\Gloudemans\Shoppingcart\Facades\Cart::total()}}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hdr-promoline hdr-topline hdr-topline--dark">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <div class="custom-text js-custom-text-carousel" data-slick='{"speed": 1000, "autoplaySpeed": 3000}'>
                            <div class="custom-text-item"><i class="icon-fox"></i> Use promocode <span>FOXIC</span> to get 15% discount!</div>
                            <div class="custom-text-item"><i class="icon-air-freight"></i> <span>Free</span> plane shipping over <span>$250</span></div>
                            <div class="custom-text-item"><i class="icon-gift"></i> Today only! Post <span>holiday</span> Flash Sale! 2 for $20</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="header-side-panel">
    <div class="mobilemenu js-push-mbmenu">
        <div class="mobilemenu-content">
            <div class="mobilemenu-close mobilemenu-toggle">Close</div>
            <div class="mobilemenu-scroll">
                <div class="mobilemenu-search"></div>
                <div class="nav-wrapper show-menu">
                    <div class="nav-toggle">
                        <span class="nav-back"><i class="icon-angle-left"></i></span>
                        <span class="nav-title"></span>
                        <a href="#" class="nav-viewall">view all</a>
                    </div>
                    <ul class="nav nav-level-1">
                        <li><a href="index-2.html">Layouts<span class="menu-label menu-label--color1">New</span><span class="arrow"><i class="icon-angle-right"></i></span></a>
                            <ul class="nav-level-2">
                                <li><a href="index-2.html">Fashion (Default) Skin</a></li>
                                <li><a href="index-sport.html">Sport Skin</a></li>
                                <li><a href="index-helloween.html">Halloween Skin</a></li>
                                <li><a href="index-medical.html">Medical Skin</a></li>
                                <li><a href="index-food.html">Food Market Skin</a></li>
                                <li><a href="index-cosmetics.html">Cosmetics Skin</a></li>
                                <li><a href="index-fishing.html">Fishing Skin</a></li>
                                <li><a href="#">Books Skin<span class="menu-label menu-label--color1">Coming Soon</span></a></li>
                                <li><a href="#">Electronics Skin<span class="menu-label menu-label--color2">Coming Soon</span></a></li>
                                <li><a href="#">Games Skin<span class="menu-label menu-label--color3">Coming Soon</span></a></li>
                                <li><a href="#">Vaping Skin<span class="menu-label">Coming Soon</span></a></li>
                                <li><a href="index-02.html">Home page 2</a></li>
                                <li><a href="index-03.html">Home page 3</a></li>
                                <li><a href="index-04.html">Home page 4</a></li>
                                <li><a href="index-05.html">Home page 5</a></li>
                                <li><a href="index-06.html">Home page 6</a></li>
                                <li><a href="index-07.html">Home page 7</a></li>
                                <li><a href="index-08.html">Home page 8</a></li>
                                <li><a href="index-09.html">Home page 9</a></li>
                                <li><a href="index-10.html">Home page 10</a></li>
                                <li><a href="index-rtl.html">Home page RTL</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Pages<span class="arrow"><i class="icon-angle-right"></i></span></a>
                            <ul class="nav-level-2">
                                <li><a href="product.html">Product page<span class="arrow"><i class="icon-angle-right"></i></span></a>
                                    <ul class="nav-level-3">
                                        <li><a href="product.html">Product page variant 1<span class="menu-label menu-label--color3">Popular</span></a></li>
                                        <li><a href="product-2.html">Product page variant 2</a></li>
                                        <li><a href="product-3.html">Product page variant 3</a></li>
                                        <li><a href="product-4.html">Product page variant 4</a></li>
                                        <li><a href="product-5.html">Product page variant 5</a></li>
                                        <li><a href="product-6.html">Product page variant 6</a></li>
                                        <li><a href="product-7.html">Product page variant 7</a></li>
                                    </ul>
                                </li>
                                <li><a href="category.html">Category page<span class="arrow"><i class="icon-angle-right"></i></span></a>
                                    <ul class="nav-level-3">
                                        <li><a href="category.html">Left sidebar filters</a></li>
                                        <li><a href="category-closed-filter.html">Closed filters</a></li>
                                        <li><a href="category-horizontal-filter.html">Horizontal filters</a></li>
                                        <li><a href="category-listview.html">Listing View</a></li>
                                        <li><a href="category-empty.html">Empty category</a></li>
                                    </ul>
                                </li>
                                <li><a href="cart.html">Cart & Checkout<span class="arrow"><i class="icon-angle-right"></i></span></a>
                                    <ul class="nav-level-3">
                                        <li><a href="cart.html">Cart Page</a></li>
                                        <li><a href="cart-empty.html">Empty cart</a></li>
                                        <li><a href="checkout.html">Checkout variant 1</a></li>
                                        <li><a href="checkout-2.html">Checkout variant 2</a></li>
                                        <li><a href="checkout-3.html">Checkout variant 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="account-create.html">Account<span class="arrow"><i class="icon-angle-right"></i></span></a>
                                    <ul class="nav-level-3">
                                        <li><a href="account-create.html">Login</a></li>
                                        <li><a href="account-create.html">Create account</a></li>
                                        <li><a href="account-details.html">Account details</a></li>
                                        <li><a href="account-addresses.html">Account addresses</a></li>
                                        <li><a href="account-history.html">Order History</a></li>
                                        <li><a href="account-wishlist.html">Wishlist</a></li>
                                    </ul>
                                </li>
                                <li><a href="blog.html">Blog<span class="arrow"><i class="icon-angle-right"></i></span></a>
                                    <ul class="nav-level-3">
                                        <li><a href="blog.html">Right sidebar</a></li>
                                        <li><a href="blog-left-sidebar.html">Left sidebar</a></li>
                                        <li><a href="blog-without-sidebar.html">No sidebar</a></li>
                                        <li><a href="blog-sticky-sidebar.html">Sticky sidebar</a></li>
                                        <li><a href="blog-grid.html">Grid</a></li>
                                        <li><a href="blog-post.html">Blog post</a></li>
                                    </ul>
                                </li>
                                <li><a href="gallery.html">Gallery</a></li>
                                <li><a href="faq.html">Faq</a></li>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                                <li><a href="404.html">404 Page</a></li>
                                <li><a href="typography.html">Typography</a></li>
                                <li><a href="coming-soon.html" target="_blank">Coming soon</a></li>
                            </ul>
                        </li>
                        <li><a href="category.html">New Arrivals<span class="arrow"><i class="icon-angle-right"></i></span></a>
                            <ul class="nav-level-2">
                                <li><a href="category.html">Shoes<span class="arrow"><i class="icon-angle-right"></i></span></a>
                                    <ul class="nav-level-3">
                                        <li><a href="category.html">Heels</a></li>
                                        <li><a href="category.html">Boots</a></li>
                                        <li><a href="category.html">Flats</a></li>
                                        <li><a href="category.html">Sneakers &amp; Athletic</a></li>
                                        <li><a href="category.html">Clogs &amp; Mules</a></li>
                                    </ul>
                                </li>
                                <li><a href="category.html">Tops<span class="arrow"><i class="icon-angle-right"></i></span></a>
                                    <ul class="nav-level-3">
                                        <li><a href="category.html">Dresses</a></li>
                                        <li><a href="category.html">Shirts &amp; Tops</a></li>
                                        <li><a href="category.html">Coats &amp; Outerwear</a></li>
                                        <li><a href="category.html">Sweaters</a></li>
                                    </ul>
                                </li>
                                <li><a href="category.html">Shoes<span class="arrow"><i class="icon-angle-right"></i></span></a>
                                    <ul class="nav-level-3">
                                        <li><a href="category.html">Heels</a></li>
                                        <li><a href="category.html">Boots</a></li>
                                        <li><a href="category.html">Flats</a></li>
                                        <li><a href="category.html">Sneakers &amp; Athletic</a></li>
                                        <li><a href="category.html">Clogs &amp; Mules</a></li>
                                    </ul>
                                </li>
                                <li><a href="category.html">Bottoms<span class="arrow"><i class="icon-angle-right"></i></span></a>
                                    <ul class="nav-level-3">
                                        <li><a href="category.html">Jeans</a></li>
                                        <li><a href="category.html">Pants</a></li>
                                        <li><a href="category.html">slippers</a></li>
                                        <li><a href="category.html">suits</a></li>
                                        <li><a href="category.html">socks</a></li>
                                    </ul>
                                </li>
                                <li><a href="category.html">Accessories<span class="arrow"><i class="icon-angle-right"></i></span></a>
                                    <ul class="nav-level-3">
                                        <li><a href="category.html">Sunglasses</a></li>
                                        <li><a href="category.html">Hats</a></li>
                                        <li><a href="category.html">Watches</a></li>
                                        <li><a href="category.html">Jewelry</a></li>
                                        <li><a href="category.html">Belts</a></li>
                                    </ul>
                                </li>
                                <li><a href="category.html">Bags<span class="arrow"><i class="icon-angle-right"></i></span></a>
                                    <ul class="nav-level-3">
                                        <li><a href="category.html">Handbags</a></li>
                                        <li><a href="category.html">Backpacks</a></li>
                                        <li><a href="category.html">Luggage</a></li>
                                        <li><a href="category.html">wallets</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="https://bit.ly/3iLAAEp" target="_blank">Buy Theme<span class="menu-label menu-label--color3">Hurry Up!</span><span class="arrow"><i class="icon-angle-right"></i></span></a></li>
                    </ul>
                </div>
                <div class="mobilemenu-bottom">
                    <div class="mobilemenu-currency">
                        <div class="dropdn_currency">
                            <div class="dropdn dropdn_caret">
                                <a href="#" class="dropdn-link js-dropdn-link">US dollars<i class="icon-angle-down"></i></a>
                                <div class="dropdn-content">
                                    <ul>
                                        <li class="active"><a href="#"><span>US dollars</span></a></li>
                                        <li><a href="#"><span>Euro</span></a></li>
                                        <li><a href="#"><span>UK pounds</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobilemenu-language">
                        <div class="dropdn_language">
                            <div class="dropdn dropdn_language dropdn_language--noimg dropdn_caret">
                                <a href="#" class="dropdn-link js-dropdn-link"><span class="js-dropdn-select-current">English</span><i class="icon-angle-down"></i></a>
                                <div class="dropdn-content">
                                    <ul>
                                        <li class="active"><a href="#"><img src="images/flags/en.html" alt="">English</a></li>
                                        <li><a href="#"><img src="images/flags/sp.html" alt="">Spanish</a></li>
                                        <li><a href="#"><img src="images/flags/de.html" alt="">German</a></li>
                                        <li><a href="#"><img src="images/flags/fr.html" alt="">French</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dropdn-content account-drop" id="dropdnAccount">
        <div class="dropdn-content-block">
            <div class="dropdn-close"><span class="js-dropdn-close">Close</span></div>
            <ul>

                @if(\Illuminate\Support\Facades\Auth::guard('customer')->user() == null)
                    <li><a href="{{route('frontend.customer.login')}}"><span>Log In</span><i class="icon-login"></i></a></li>
                    <li><a href="{{route('frontend.customer.register')}}"><span>Register</span><i class="icon-user2"></i></a></li>
                @else
                    <h2>{{\Illuminate\Support\Facades\Auth::guard('customer')->user()->name}}</h2>

                    <li><a href="{{route('frontend.customer.dashboard')}}"><span>Dashboard</span><i class="icon-user2"></i></a></li>
                    <li><a href="{{route('frontend.customer.profile')}}"><span>Profile</span><i class="icon-profile"></i></a></li>
                    <li><a href="{{route('frontend.customer.logout')}}"><span>Logout</span><i class="icon-logout"></i></a></li>
                @endif
                <li><a href="checkout.html"><span>Checkout</span><i class="icon-card"></i></a></li>
            </ul>
            @if(\Illuminate\Support\Facades\Auth::guard('customer')->user() == null)
            <div class="dropdn-form-wrapper">
                <h5>Quick Login</h5>
                <form action="#">
                    <div class="form-group">
                        <input type="text" class="form-control form-control--sm is-invalid" placeholder="Enter your e-mail">
                        <div class="invalid-feedback">Can't be blank</div>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control--sm" placeholder="Enter your password">
                    </div>
                    <button type="submit" class="btn">Enter</button>
                </form>
            </div>
            @endif
        </div>
        <div class="drop-overlay js-dropdn-close"></div>
    </div>
    <div class="dropdn-content minicart-drop" id="dropdnMinicart">
        <div class="dropdn-content-block">
            <div class="dropdn-close"><span class="js-dropdn-close">Close</span></div>
            <div class="minicart-drop-content js-dropdn-content-scroll">
                <div class="minicart-prd row">
                    <div class="minicart-prd-image image-hover-scale-circle col">
                        <a href="product.html"><img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-01-1.webp" alt=""></a>
                    </div>
                    <div class="minicart-prd-info col">
                        <div class="minicart-prd-tag">FOXic</div>
                        <h2 class="minicart-prd-name"><a href="#">Leather Pegged Pants</a></h2>
                        <div class="minicart-prd-qty"><span class="minicart-prd-qty-label">Quantity:</span><span class="minicart-prd-qty-value">1</span></div>
                        <div class="minicart-prd-price prd-price">
                            <div class="price-old">$200.00</div>
                            <div class="price-new">$180.00</div>
                        </div>
                    </div>
                    <div class="minicart-prd-action">
                        <a href="#" class="js-product-remove" data-line-number="1"><i class="icon-recycle"></i></a>
                    </div>
                </div>
                <div class="minicart-prd row">
                    <div class="minicart-prd-image image-hover-scale-circle col">
                        <a href="product.html"><img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-16-1.webp" alt=""></a>
                    </div>
                    <div class="minicart-prd-info col">
                        <div class="minicart-prd-tag">FOXic</div>
                        <h2 class="minicart-prd-name"><a href="#">Cascade Casual Shirt</a></h2>
                        <div class="minicart-prd-qty"><span class="minicart-prd-qty-label">Quantity:</span><span class="minicart-prd-qty-value">1</span></div>
                        <div class="minicart-prd-price prd-price">
                            <div class="price-old">$200.00</div>
                            <div class="price-new">$180.00</div>
                        </div>
                    </div>
                    <div class="minicart-prd-action">
                        <a href="#" class="js-product-remove" data-line-number="2"><i class="icon-recycle"></i></a>
                    </div>
                </div>
                <div class="minicart-empty js-minicart-empty d-none">
                    <div class="minicart-empty-text">Your cart is empty</div>
                    <div class="minicart-empty-icon">
                        <i class="icon-shopping-bag"></i>
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 306 262" style="enable-background:new 0 0 306 262;" xml:space="preserve"><path class="st0" d="M78.1,59.5c0,0-37.3,22-26.7,85s59.7,237,142.7,283s193,56,313-84s21-206-69-240s-249.4-67-309-60C94.6,47.6,78.1,59.5,78.1,59.5z"/></svg>
                    </div>
                </div>
                <a href="#" class="minicart-drop-countdown mt-3">
                    <div class="countdown-box-full">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto"><i class="icon-gift icon--giftAnimate"></i></div>
                            <div class="col">
                                <div class="countdown-txt">WHEN BUYING TWO
                                    THINGS A THIRD AS A GIFT
                                </div>
                                <div class="countdown js-countdown" data-countdown="2021/07/01"></div>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="minicart-drop-info d-none d-md-block">
                    <div class="shop-feature-single row no-gutters align-items-center">
                        <div class="shop-feature-icon col-auto"><i class="icon-truck"></i></div>
                        <div class="shop-feature-text col"><b>SHIPPING!</b> Continue shopping to add more products and receive free shipping</div>
                    </div>
                </div>
            </div>
            <div class="minicart-drop-fixed js-hide-empty">
                <div class="loader-horizontal-sm js-loader-horizontal-sm" data-loader-horizontal=""><span></span></div>
                <div class="minicart-drop-total js-minicart-drop-total row no-gutters align-items-center">
                    <div class="minicart-drop-total-txt col-auto heading-font">Subtotal</div>
                    <div class="minicart-drop-total-price col" data-header-cart-total="">$340</div>
                </div>
                <div class="minicart-drop-actions">
                    <a href="{{route('frontend.cart.list')}}" class="btn btn--md btn--grey"><i class="icon-basket"></i><span>Cart Page</span></a>
                    @if(\Illuminate\Support\Facades\Auth::guard('customer')->user() != null)
                        <a href="{{route('frontend.cart.checkout')}}" class="btn btn--md"><i class="icon-checkout"></i><span>Check out</span></a>
                    @endif
                </div>
                <ul class="paymenti-link mb-2">
                    <li><i class="icon-amazon-logo"></i></li>
                    <li><i class="icon-visa-pay-logo"></i></li>
                    <li><i class="icon-skrill-logo"></i></li>
                    <li><i class="icon-klarna-logo"></i></li>
                    <li><i class="icon-paypal-logo"></i></li>
                    <li><i class="icon-apple-pay-logo"></i></li>
                </ul>
            </div>
        </div>
        <div class="drop-overlay js-dropdn-close"></div>
    </div>
</div>
