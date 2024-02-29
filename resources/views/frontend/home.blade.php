@extends('frontend.layouts.frontend')
@section('main-content')
    <div class="page-content">
        <div class="holder global_width">
            <div class="container">
                <h2 class="text-center">Hot Product <a href="{{route('frontend.hot_product')}}"> <small>View All</small></a></h2>
                <div class="prd-grid prd-promo-carousel data-to-show-4 js-prd-promo-carousel">
                    @foreach($data['hot_sale_tag']->getEightHotProducts as $hotproduct)

                        <div class="prd-promo prd-promo--lg prd-has-loader">
                            <div class="prd-inside">
                                <div class="prd-img-area">
                                    <a href="{{route('frontend.product',$hotproduct->slug)}}" class="image-hover-scale">
                                        @if($hotproduct->countProductImages() > 0)
                                            <img src="{{asset('images/products/' .$hotproduct->getThumbImage()->name )}}" alt="Stripped Gym Leggings" class="js-prd-img">
                                        @else
                                            <img src="https://www.messagetech.com/wp-content/themes/ml_mti/images/no-image.jpg" alt="Stripped Gym Leggings" class="js-prd-img">
                                        @endif
                                        <div class="prd-big-circle-labels">
                                            <div class="label-new bg-danger"><span>Hot Product</span></div>
                                        </div>
                                    </a>
                                </div>
                                <div class="prd-info text-center">
                                    <h2 class="prd-title"><a href="{{route('frontend.product',$hotproduct->slug)}}">{{$hotproduct->name}}</a></h2>
                                    <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><span></span></div>
                                    <div class="prd-hover">
                                        <div class="prd-price">
                                            Rs. <div class="price-new text-danger"><del>{{$hotproduct->price}}</del></div>
                                            &nbsp;&nbsp;&nbsp;
                                            Rs. <div class="price-new text-success">{{$hotproduct->price-$hotproduct->discount}}</div>
                                        </div>
                                        <div class="prd-action">
                                            <button class="btn js-prd-addtocart" data-product='{"name": "Stripped Gym Leggings", "path":"images/products//product-03.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="holder">
            <div class="container">
                <div class="row vert-margin justify-content-md-center">
                    <div class="col-md-9">
                        <div class="title-with-arrows">
                            <h2>{{__('message.client_say')}}</h2>
                            <div class="carousel-arrows"></div>
                        </div>
                        <div class="testimonials-carousel-wrap">
                            <div class="circle_decor_wrap">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"viewBox="0 0 150 150" style="enable-background:new 0 0 150 150; width: 100%; transform: translate(-81%, -69%) rotate(-50deg); opacity: .5" xml:space="preserve" class="circle_decor circle_decor--tl"><defs><filter x="0" y="0" width="100%" height="100%" id="dropshadow_1_r001" filterUnits="userSpaceOnUse"><feGaussianBlur in="SourceAlpha" stdDeviation="2"/><feOffset dx="-3" dy="0" result="offsetblur"/><feMerge><feMergeNode/><feMergeNode in="SourceGraphic"/><feMergeNode in="SourceGraphic"/></feMerge></filter><filter x="0" y="0" width="100%" height="100%" id="dropshadow_2_r001" filterUnits="userSpaceOnUse"><feGaussianBlur in="SourceAlpha" stdDeviation="2"/><feOffset dx="3" dy="0" result="offsetblur"/><feMerge><feMergeNode/><feMergeNode in="SourceGraphic"/><feMergeNode in="SourceGraphic"/></feMerge></filter><clipPath id="circle_decor_mask_r001"><circle r="73.5" cx="75" cy="75"/></clipPath></defs><path fill="#55C1AE" d="M74.933,148.5c-9.9,0-19.533-1.95-28.583-5.783c-8.75-3.699-16.6-9-23.333-15.734c-6.75-6.731-12.034-14.582-15.733-23.332C3.45,94.6,1.5,84.967,1.5,75.066c0-9.9,1.95-19.533,5.783-28.583c3.7-8.75,9-16.6,15.733-23.333S37.6,11.116,46.35,7.417c9.05-3.833,18.684-5.783,28.583-5.783c9.901,0,19.534,1.95,28.584,5.783c8.75,3.7,16.6,9,23.332,15.733c6.733,6.733,12.032,14.583,15.733,23.333c3.832,9.067,5.783,18.684,5.783,28.583c0,9.9-1.951,19.534-5.783,28.584c-3.701,8.75-9,16.6-15.733,23.332c-6.732,6.733-14.582,12.033-23.332,15.733C94.467,146.55,84.834,148.5,74.933,148.5z M75,13.783C41.25,13.783,13.783,41.25,13.783,75S41.25,136.217,75,136.217S136.217,108.75,136.217,75S108.75,13.783,75,13.783z"/><circle r="5.8" cx="75" cy="7.8" fill-opacity="0.25" style="filter:url(#dropshadow_1_r001)" clip-path="url(#circle_decor_mask_r001)"/><circle r="5.8" cx="74" cy="142.5" fill-opacity="0.25" style="filter:url(#dropshadow_2_r001)" clip-path="url(#circle_decor_mask_r001)"/><path fill="#55C1AE" d="M81.101,7.712c0,3.346-2.761,6.059-6.164,6.059l0,0c-3.404,0-6.164-2.713-6.164-6.059l0,0c0-3.345,2.76-6.058,6.164-6.058l0,0C78.34,1.654,81.101,4.367,81.101,7.712L81.101,7.712z"/><path fill="#55C1AE" d="M81.177,142.363c0,3.346-2.761,6.06-6.164,6.06l0,0c-3.404,0-6.164-2.714-6.164-6.06l0,0c0-3.345,2.76-6.058,6.164-6.058l0,0C78.416,136.306,81.177,139.019,81.177,142.363L81.177,142.363z"/></svg>
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"viewBox="0 0 150 150" style="enable-background:new 0 0 150 150; width: 100%; transform: translate(81%, 69%) rotate(-50deg); opacity: .5" xml:space="preserve" class="circle_decor circle_decor--br"><defs><filter x="0" y="0" width="100%" height="100%" id="dropshadow_1_r002" filterUnits="userSpaceOnUse"><feGaussianBlur in="SourceAlpha" stdDeviation="2"/><feOffset dx="-3" dy="0" result="offsetblur"/><feMerge><feMergeNode/><feMergeNode in="SourceGraphic"/><feMergeNode in="SourceGraphic"/></feMerge></filter><filter x="0" y="0" width="100%" height="100%" id="dropshadow_2_r002" filterUnits="userSpaceOnUse"><feGaussianBlur in="SourceAlpha" stdDeviation="2"/><feOffset dx="3" dy="0" result="offsetblur"/><feMerge><feMergeNode/><feMergeNode in="SourceGraphic"/><feMergeNode in="SourceGraphic"/></feMerge></filter><clipPath id="circle_decor_mask_r002"><circle r="73.5" cx="75" cy="75"/></clipPath></defs><path fill="#55C1AE" d="M74.933,148.5c-9.9,0-19.533-1.95-28.583-5.783c-8.75-3.699-16.6-9-23.333-15.734c-6.75-6.731-12.034-14.582-15.733-23.332C3.45,94.6,1.5,84.967,1.5,75.066c0-9.9,1.95-19.533,5.783-28.583c3.7-8.75,9-16.6,15.733-23.333S37.6,11.116,46.35,7.417c9.05-3.833,18.684-5.783,28.583-5.783c9.901,0,19.534,1.95,28.584,5.783c8.75,3.7,16.6,9,23.332,15.733c6.733,6.733,12.032,14.583,15.733,23.333c3.832,9.067,5.783,18.684,5.783,28.583c0,9.9-1.951,19.534-5.783,28.584c-3.701,8.75-9,16.6-15.733,23.332c-6.732,6.733-14.582,12.033-23.332,15.733C94.467,146.55,84.834,148.5,74.933,148.5z M75,13.783C41.25,13.783,13.783,41.25,13.783,75S41.25,136.217,75,136.217S136.217,108.75,136.217,75S108.75,13.783,75,13.783z"/><circle r="5.8" cx="75" cy="7.8" fill-opacity="0.25" style="filter:url(#dropshadow_1_r002)" clip-path="url(#circle_decor_mask_r002)"/><circle r="5.8" cx="74" cy="142.5" fill-opacity="0.25" style="filter:url(#dropshadow_2_r002)" clip-path="url(#circle_decor_mask_r002)"/><path fill="#55C1AE" d="M81.101,7.712c0,3.346-2.761,6.059-6.164,6.059l0,0c-3.404,0-6.164-2.713-6.164-6.059l0,0c0-3.345,2.76-6.058,6.164-6.058l0,0C78.34,1.654,81.101,4.367,81.101,7.712L81.101,7.712z"/><path fill="#55C1AE" d="M81.177,142.363c0,3.346-2.761,6.06-6.164,6.06l0,0c-3.404,0-6.164-2.714-6.164-6.06l0,0c0-3.345,2.76-6.058,6.164-6.058l0,0C78.416,136.306,81.177,139.019,81.177,142.363L81.177,142.363z"/></svg>
                            </div>
                            <div class="testimonials-carousel js-testimonials-carousel" data-slick='{"slidesToShow": 1, "responsive": [{"breakpoint": 992,"settings": {"slidesToShow": 1 }},{"breakpoint": 480,"settings": {"slidesToShow": 1 }}]}'>
                                <div class="testimonials-item">
                                    <div class="row vert-margin">
                                        <div class="col-sm-5 testimonials-item-photo text-center">
                                            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/review-author.webp" alt="" class="rounded-circle lazyload fade-up">
                                        </div>
                                        <div class="col-sm-13 testimonials-item-text">
                                            <h3 class="testimonials-item-name">Clifton C. Garrison</h3>
                                            <p>Very nice theme, with lots of useful customisation options built in. Customer support has been excellent, as any small issues, minor bugs or even small requests.</p>
                                        </div>
                                    </div>
                                    <div class="testimonials-item-quote">
                                        <i class="icon-quotes"></i>
                                    </div>
                                </div>
                                <div class="testimonials-item">
                                    <div class="row vert-margin">
                                        <div class="col-sm-5 testimonials-item-photo text-center">
                                            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/review-author-02.webp" alt="" class="rounded-circle lazyload fade-up">
                                        </div>
                                        <div class="col-sm-13 testimonials-item-text">
                                            <h3 class="testimonials-item-name">Susan E. Davis</h3>
                                            <p>They have always fulfilled my requests without any hesitation, responded to my emails and helped me develop my online store in the right way.</p>
                                        </div>
                                    </div>
                                    <div class="testimonials-item-quote">
                                        <i class="icon-quotes"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="title-with-arrows">
                            <h2>FROM OUR BLOG</h2>
                            <div class="carousel-arrows"></div>
                        </div>
                        <div class="post-prws post-prws-carousel js-post-prws-carousel" data-slick='{"slidesToShow": 1, "responsive": [{"breakpoint": 1024,"settings": {"slidesToShow": 1}},{"breakpoint": 768,"settings": {"slidesToShow": 1}},{"breakpoint": 480,"settings": {"slidesToShow": 1}}]}'>
                            <div class="post-prw">
                                <div class="row vert-margin-middle">
                                    <div class="post-prw-img col-sm-9">
                                        <a href="blog-post.html" class="d-block image-container" style="padding-bottom: 88.92%">
                                            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/blog/blog-07.webp" class="lazyload fade-up" alt="Blog Title">
                                        </a>
                                    </div>
                                    <div class="post-prw-text col-sm-9">
                                        <h4 class="post-prw-title"><a href="#">Premium Template</a></h4>
                                        <div class="post-prw-links">
                                            <div class="post-prw-date"><i class="icon-calendar1"></i><span>November 17, 2020</span></div>
                                        </div>
                                        <div class="post-prw-teaser">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account</div>
                                        <div class="post-prw-btn">
                                            <a href="#" class="btn btn--md">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div><div class="post-prw">
                                <div class="row vert-margin-middle">
                                    <div class="post-prw-img col-sm-9">
                                        <a href="blog-post.html" class="d-block image-container" style="padding-bottom: 88.92%">
                                            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/blog/blog-08.webp" class="lazyload fade-up" alt="Blog Title">
                                        </a>
                                    </div>
                                    <div class="post-prw-text col-sm-9">
                                        <h4 class="post-prw-title"><a href="#">20+ Awesome Skins</a></h4>
                                        <div class="post-prw-links">
                                            <div class="post-prw-date"><i class="icon-calendar1"></i><span>December 19, 2020</span></div>
                                        </div>
                                        <div class="post-prw-teaser">You will be surprised at the flexibility and comfort in the process of customizing the theme. We give a tooth that FOXic theme on your store will</div>
                                        <div class="post-prw-btn">
                                            <a href="#" class="btn btn--md">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="holder global_width">
            <div class="container">
                <div class="row vert-margin">
                    <div class="col-md-6">
                        <a href="category.html" class="bnr image-hover-scale bnr--bottom bnr-left" data-fontratio="5.695">
                            <div class="bnr-img"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-srcset="images/banners/banner-index-05.webp" class="lazyload fade-up" alt=""></div>
                            <div class="bnr-caption" style="padding: 8%;">
                                <div class="bnr-text3" style="color:#ffffff; font-size:0.5em; font-weight:800; line-height:1.2em">SPORT IS<br>MORE THAN LIFE</div>
                                <div class="bnr-btn mt-lg"><span class="btn">BUY NOW</span></div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-9 col-md-6">
                        <div class="title-with-arrows">
                            <h2>NEW ARRIVALS</h2>
                            <div class="carousel-arrows"></div>
                        </div>
                        <div class="prd-carousel-vert js-prd-carousel-vert">
                            <div class="prd prd-hor ">
                                <div class="prd-inside">
                                    <div class="prd-img-area">
                                        <a href="product.html" class="prd-img image-hover-scale image-container">
                                            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/products/product-08.webp" alt="Fitness Jumpsuit Blue/Black" class="js-prd-img lazyload">
                                            <div class="foxic-loader"></div>
                                            <div class="prd-big-circle-labels">
                                                <div class="label-new"><span>New</span></div>
                                            </div>
                                        </a>
                                        <div class="prd-circle-labels">
                                            <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                            <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                                        </div>
                                    </div>
                                    <div class="prd-info">
                                        <div class="prd-info-wrap">
                                            <div class="prd-info-top">
                                                <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                            </div>
                                            <h2 class="prd-title"><a href="product.html">Fitness Jumpsuit Blue/Black</a></h2>
                                            <div class="prd-description">
                                                Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                                            </div>
                                        </div>
                                        <div class="prd-hovers">
                                            <div class="prd-circle-labels">
                                                <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                                <div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                            </div>
                                            <div class="prd-price">
                                                <div class="price-new">$ 249</div>
                                            </div>
                                            <div class="prd-action">
                                                <div class="prd-action-left">
                                                    <form action="#">
                                                        <button class="btn js-prd-addtocart" data-product='{"name": "Fitness Jumpsuit Blue/Black", "path":"images/products/product-08.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                                                    </form>
                                                </div>
                                                <div class="prd-action-right">
                                                    <div class="prd-action-right-inside">
                                                        <div class="prd-tag"><a href="#">FOXic</a></div>
                                                        <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><div class="prd prd-hor ">
                                <div class="prd-inside">
                                    <div class="prd-img-area">
                                        <a href="product.html" class="prd-img image-hover-scale image-container">
                                            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/products/product-07.webp" alt="Fitness Jumpsuit Black/Yellow" class="js-prd-img lazyload">
                                            <div class="foxic-loader"></div>
                                            <div class="prd-big-circle-labels">
                                                <div class="label-new"><span>New</span></div>
                                                <div class="label-sale"><span>-10% <span class="sale-text">Sale</span></span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="prd-circle-labels">
                                            <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                            <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                                        </div>
                                    </div>
                                    <div class="prd-info">
                                        <div class="prd-info-wrap">
                                            <div class="prd-info-top">
                                                <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                            </div>
                                            <h2 class="prd-title"><a href="product.html">Fitness Jumpsuit Black/Yellow</a></h2>
                                            <div class="prd-description">
                                                Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                                            </div>
                                        </div>
                                        <div class="prd-hovers">
                                            <div class="prd-circle-labels">
                                                <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                                <div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                            </div>
                                            <div class="prd-price">
                                                <div class="price-old">$ 159</div>
                                                <div class="price-new">$ 129</div>
                                            </div>
                                            <div class="prd-action">
                                                <div class="prd-action-left">
                                                    <form action="#">
                                                        <button class="btn js-prd-addtocart" data-product='{"name": "Fitness Jumpsuit Black/Yellow", "path":"images/products/product-07.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                                                    </form>
                                                </div>
                                                <div class="prd-action-right">
                                                    <div class="prd-action-right-inside">
                                                        <div class="prd-tag"><a href="#">FOXic</a></div>
                                                        <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><div class="prd prd-hor ">
                                <div class="prd-inside">
                                    <div class="prd-img-area">
                                        <a href="product.html" class="prd-img image-hover-scale image-container">
                                            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/products/product-06.webp" alt="Fitness Jumpsuit Camouflage" class="js-prd-img lazyload">
                                            <div class="foxic-loader"></div>
                                            <div class="prd-big-circle-labels">
                                                <div class="label-new"><span>New</span></div>
                                            </div>
                                        </a>
                                        <div class="prd-circle-labels">
                                            <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                            <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                                        </div>
                                    </div>
                                    <div class="prd-info">
                                        <div class="prd-info-wrap">
                                            <div class="prd-info-top">
                                                <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                            </div>
                                            <h2 class="prd-title"><a href="product.html">Fitness Jumpsuit Camouflage</a></h2>
                                            <div class="prd-description">
                                                Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                                            </div>
                                        </div>
                                        <div class="prd-hovers">
                                            <div class="prd-circle-labels">
                                                <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                                <div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                            </div>
                                            <div class="prd-price">
                                                <div class="price-new">$ 199</div>
                                            </div>
                                            <div class="prd-action">
                                                <div class="prd-action-left">
                                                    <form action="#">
                                                        <button class="btn js-prd-addtocart" data-product='{"name": "Fitness Jumpsuit Camouflage", "path":"images/products/product-06.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                                                    </form>
                                                </div>
                                                <div class="prd-action-right">
                                                    <div class="prd-action-right-inside">
                                                        <div class="prd-tag"><a href="#">FOXic</a></div>
                                                        <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><div class="prd prd-hor ">
                                <div class="prd-inside">
                                    <div class="prd-img-area">
                                        <a href="product.html" class="prd-img image-hover-scale image-container">
                                            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/products/product-05.webp" alt="Fitness Jumpsuit Khaki/Black" class="js-prd-img lazyload">
                                            <div class="foxic-loader"></div>
                                            <div class="prd-big-circle-labels">
                                                <div class="label-new"><span>New</span></div>
                                            </div>
                                        </a>
                                        <div class="prd-circle-labels">
                                            <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                            <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                                        </div>
                                    </div>
                                    <div class="prd-info">
                                        <div class="prd-info-wrap">
                                            <div class="prd-info-top">
                                                <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                            </div>
                                            <h2 class="prd-title"><a href="product.html">Fitness Jumpsuit Khaki/Black</a></h2>
                                            <div class="prd-description">
                                                Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                                            </div>
                                        </div>
                                        <div class="prd-hovers">
                                            <div class="prd-circle-labels">
                                                <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                                <div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                            </div>
                                            <div class="prd-price">
                                                <div class="price-new">$ 189</div>
                                            </div>
                                            <div class="prd-action">
                                                <div class="prd-action-left">
                                                    <form action="#">
                                                        <button class="btn js-prd-addtocart" data-product='{"name": "Fitness Jumpsuit Khaki/Black", "path":"images/products/product-05.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                                                    </form>
                                                </div>
                                                <div class="prd-action-right">
                                                    <div class="prd-action-right-inside">
                                                        <div class="prd-tag"><a href="#">FOXic</a></div>
                                                        <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9 col-md-6">
                        <div class="title-with-arrows">
                            <h2>HOTTEST PRODUCTS</h2>
                            <div class="carousel-arrows"></div>
                        </div>
                        <div class="prd-carousel-vert js-prd-carousel-vert">
                            <div class="prd prd-hor ">
                                <div class="prd-inside">
                                    <div class="prd-img-area">
                                        <a href="product.html" class="prd-img image-hover-scale image-container">
                                            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/products/product-09.webp" alt="T-shirt Black" class="js-prd-img lazyload">
                                            <div class="foxic-loader"></div>
                                            <div class="prd-big-circle-labels">
                                                <div class="label-sale"><span>-10% <span class="sale-text">Sale</span></span>
                                                    <div class="countdown-circle">
                                                        <div class="countdown js-countdown" data-countdown="2021/07/01"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="prd-circle-labels">
                                            <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                            <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                                        </div>
                                    </div>
                                    <div class="prd-info">
                                        <div class="prd-info-wrap">
                                            <div class="prd-info-top">
                                                <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                            </div>
                                            <h2 class="prd-title"><a href="product.html">T-shirt Black</a></h2>
                                            <div class="prd-description">
                                                Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                                            </div>
                                        </div>
                                        <div class="prd-hovers">
                                            <div class="prd-circle-labels">
                                                <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                                <div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                            </div>
                                            <div class="prd-price">
                                                <div class="price-old">$ 219</div>
                                                <div class="price-new">$ 189</div>
                                            </div>
                                            <div class="prd-action">
                                                <div class="prd-action-left">
                                                    <form action="#">
                                                        <button class="btn js-prd-addtocart" data-product='{"name": "T-shirt Black", "path":"images/products/product-09.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                                                    </form>
                                                </div>
                                                <div class="prd-action-right">
                                                    <div class="prd-action-right-inside">
                                                        <div class="prd-tag"><a href="#">FOXic</a></div>
                                                        <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><div class="prd prd-hor ">
                                <div class="prd-inside">
                                    <div class="prd-img-area">
                                        <a href="product.html" class="prd-img image-hover-scale image-container">
                                            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/products/product-10.webp" alt="Sport Shirt Black" class="js-prd-img lazyload">
                                            <div class="foxic-loader"></div>
                                            <div class="prd-big-circle-labels">
                                            </div>
                                        </a>
                                        <div class="prd-circle-labels">
                                            <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                            <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                                        </div>
                                    </div>
                                    <div class="prd-info">
                                        <div class="prd-info-wrap">
                                            <div class="prd-info-top">
                                                <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                            </div>
                                            <h2 class="prd-title"><a href="product.html">Sport Shirt Black</a></h2>
                                            <div class="prd-description">
                                                Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                                            </div>
                                        </div>
                                        <div class="prd-hovers">
                                            <div class="prd-circle-labels">
                                                <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                                <div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                            </div>
                                            <div class="prd-price">
                                                <div class="price-new">$ 180</div>
                                            </div>
                                            <div class="prd-action">
                                                <div class="prd-action-left">
                                                    <form action="#">
                                                        <button class="btn js-prd-addtocart" data-product='{"name": "Sport Shirt Black", "path":"images/products/product-10.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                                                    </form>
                                                </div>
                                                <div class="prd-action-right">
                                                    <div class="prd-action-right-inside">
                                                        <div class="prd-tag"><a href="#">FOXic</a></div>
                                                        <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><div class="prd prd-hor ">
                                <div class="prd-inside">
                                    <div class="prd-img-area">
                                        <a href="product.html" class="prd-img image-hover-scale image-container">
                                            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/products/product-11.webp" alt="T-shirt White" class="js-prd-img lazyload">
                                            <div class="foxic-loader"></div>
                                            <div class="prd-big-circle-labels">
                                            </div>
                                        </a>
                                        <div class="prd-circle-labels">
                                            <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                            <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                                        </div>
                                    </div>
                                    <div class="prd-info">
                                        <div class="prd-info-wrap">
                                            <div class="prd-info-top">
                                                <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                            </div>
                                            <h2 class="prd-title"><a href="product.html">T-shirt White</a></h2>
                                            <div class="prd-description">
                                                Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                                            </div>
                                        </div>
                                        <div class="prd-hovers">
                                            <div class="prd-circle-labels">
                                                <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                                <div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                            </div>
                                            <div class="prd-price">
                                                <div class="price-new">$ 99</div>
                                            </div>
                                            <div class="prd-action">
                                                <div class="prd-action-left">
                                                    <form action="#">
                                                        <button class="btn js-prd-addtocart" data-product='{"name": "T-shirt White", "path":"images/products/product-11.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                                                    </form>
                                                </div>
                                                <div class="prd-action-right">
                                                    <div class="prd-action-right-inside">
                                                        <div class="prd-tag"><a href="#">FOXic</a></div>
                                                        <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><div class="prd prd-hor ">
                                <div class="prd-inside">
                                    <div class="prd-img-area">
                                        <a href="product.html" class="prd-img image-hover-scale image-container">
                                            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/products/product-12.webp" alt="Full Zipper Hoodies" class="js-prd-img lazyload">
                                            <div class="foxic-loader"></div>
                                            <div class="prd-big-circle-labels">
                                            </div>
                                        </a>
                                        <div class="prd-circle-labels">
                                            <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                            <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                                        </div>
                                    </div>
                                    <div class="prd-info">
                                        <div class="prd-info-wrap">
                                            <div class="prd-info-top">
                                                <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                            </div>
                                            <h2 class="prd-title"><a href="product.html">Full Zipper Hoodies</a></h2>
                                            <div class="prd-description">
                                                Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                                            </div>
                                        </div>
                                        <div class="prd-hovers">
                                            <div class="prd-circle-labels">
                                                <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                                <div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                            </div>
                                            <div class="prd-price">
                                                <div class="price-new">$ 299</div>
                                            </div>
                                            <div class="prd-action">
                                                <div class="prd-action-left">
                                                    <form action="#">
                                                        <button class="btn js-prd-addtocart" data-product='{"name": "Full Zipper Hoodies", "path":"images/products/product-12.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                                                    </form>
                                                </div>
                                                <div class="prd-action-right">
                                                    <div class="prd-action-right-inside">
                                                        <div class="prd-tag"><a href="#">FOXic</a></div>
                                                        <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="holder holder-subscribe-full lazyload">
            <div class="circle_decor_wrap">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"viewBox="0 0 150 150" style="enable-background:new 0 0 150 150; " xml:space="preserve" class="circle_decor circle_decor--tl"><defs><filter x="0" y="0" width="100%" height="100%" id="dropshadow_1_003" filterUnits="userSpaceOnUse"><feGaussianBlur in="SourceAlpha" stdDeviation="2"/><feOffset dx="-3" dy="0" result="offsetblur"/><feMerge><feMergeNode/><feMergeNode in="SourceGraphic"/><feMergeNode in="SourceGraphic"/></feMerge></filter><filter x="0" y="0" width="100%" height="100%" id="dropshadow_2_003" filterUnits="userSpaceOnUse"><feGaussianBlur in="SourceAlpha" stdDeviation="2"/><feOffset dx="3" dy="0" result="offsetblur"/><feMerge><feMergeNode/><feMergeNode in="SourceGraphic"/><feMergeNode in="SourceGraphic"/></feMerge></filter><clipPath id="circle_decor_mask_003"><circle r="73.5" cx="75" cy="75"/></clipPath></defs><path fill="#55C1AE" d="M74.933,148.5c-9.9,0-19.533-1.95-28.583-5.783c-8.75-3.699-16.6-9-23.333-15.734c-6.75-6.731-12.034-14.582-15.733-23.332C3.45,94.6,1.5,84.967,1.5,75.066c0-9.9,1.95-19.533,5.783-28.583c3.7-8.75,9-16.6,15.733-23.333S37.6,11.116,46.35,7.417c9.05-3.833,18.684-5.783,28.583-5.783c9.901,0,19.534,1.95,28.584,5.783c8.75,3.7,16.6,9,23.332,15.733c6.733,6.733,12.032,14.583,15.733,23.333c3.832,9.067,5.783,18.684,5.783,28.583c0,9.9-1.951,19.534-5.783,28.584c-3.701,8.75-9,16.6-15.733,23.332c-6.732,6.733-14.582,12.033-23.332,15.733C94.467,146.55,84.834,148.5,74.933,148.5z M75,13.783C41.25,13.783,13.783,41.25,13.783,75S41.25,136.217,75,136.217S136.217,108.75,136.217,75S108.75,13.783,75,13.783z"/><circle r="5.8" cx="75" cy="7.8" fill-opacity="0.25" style="filter:url(#dropshadow_1_003)" clip-path="url(#circle_decor_mask_003)"/><circle r="5.8" cx="74" cy="142.5" fill-opacity="0.25" style="filter:url(#dropshadow_2_003)" clip-path="url(#circle_decor_mask_003)"/><path fill="#55C1AE" d="M81.101,7.712c0,3.346-2.761,6.059-6.164,6.059l0,0c-3.404,0-6.164-2.713-6.164-6.059l0,0c0-3.345,2.76-6.058,6.164-6.058l0,0C78.34,1.654,81.101,4.367,81.101,7.712L81.101,7.712z"/><path fill="#55C1AE" d="M81.177,142.363c0,3.346-2.761,6.06-6.164,6.06l0,0c-3.404,0-6.164-2.714-6.164-6.06l0,0c0-3.345,2.76-6.058,6.164-6.058l0,0C78.416,136.306,81.177,139.019,81.177,142.363L81.177,142.363z"/></svg>
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"viewBox="0 0 150 150" style="enable-background:new 0 0 150 150; " xml:space="preserve" class="circle_decor circle_decor--br"><defs><filter x="0" y="0" width="100%" height="100%" id="dropshadow_1_004" filterUnits="userSpaceOnUse"><feGaussianBlur in="SourceAlpha" stdDeviation="2"/><feOffset dx="-3" dy="0" result="offsetblur"/><feMerge><feMergeNode/><feMergeNode in="SourceGraphic"/><feMergeNode in="SourceGraphic"/></feMerge></filter><filter x="0" y="0" width="100%" height="100%" id="dropshadow_2_004" filterUnits="userSpaceOnUse"><feGaussianBlur in="SourceAlpha" stdDeviation="2"/><feOffset dx="3" dy="0" result="offsetblur"/><feMerge><feMergeNode/><feMergeNode in="SourceGraphic"/><feMergeNode in="SourceGraphic"/></feMerge></filter><clipPath id="circle_decor_mask_004"><circle r="73.5" cx="75" cy="75"/></clipPath></defs><path fill="#55C1AE" d="M74.933,148.5c-9.9,0-19.533-1.95-28.583-5.783c-8.75-3.699-16.6-9-23.333-15.734c-6.75-6.731-12.034-14.582-15.733-23.332C3.45,94.6,1.5,84.967,1.5,75.066c0-9.9,1.95-19.533,5.783-28.583c3.7-8.75,9-16.6,15.733-23.333S37.6,11.116,46.35,7.417c9.05-3.833,18.684-5.783,28.583-5.783c9.901,0,19.534,1.95,28.584,5.783c8.75,3.7,16.6,9,23.332,15.733c6.733,6.733,12.032,14.583,15.733,23.333c3.832,9.067,5.783,18.684,5.783,28.583c0,9.9-1.951,19.534-5.783,28.584c-3.701,8.75-9,16.6-15.733,23.332c-6.732,6.733-14.582,12.033-23.332,15.733C94.467,146.55,84.834,148.5,74.933,148.5z M75,13.783C41.25,13.783,13.783,41.25,13.783,75S41.25,136.217,75,136.217S136.217,108.75,136.217,75S108.75,13.783,75,13.783z"/><circle r="5.8" cx="75" cy="7.8" fill-opacity="0.25" style="filter:url(#dropshadow_1_004)" clip-path="url(#circle_decor_mask_004)"/><circle r="5.8" cx="74" cy="142.5" fill-opacity="0.25" style="filter:url(#dropshadow_2_004)" clip-path="url(#circle_decor_mask_004)"/><path fill="#55C1AE" d="M81.101,7.712c0,3.346-2.761,6.059-6.164,6.059l0,0c-3.404,0-6.164-2.713-6.164-6.059l0,0c0-3.345,2.76-6.058,6.164-6.058l0,0C78.34,1.654,81.101,4.367,81.101,7.712L81.101,7.712z"/><path fill="#55C1AE" d="M81.177,142.363c0,3.346-2.761,6.06-6.164,6.06l0,0c-3.404,0-6.164-2.714-6.164-6.06l0,0c0-3.345,2.76-6.058,6.164-6.058l0,0C78.416,136.306,81.177,139.019,81.177,142.363L81.177,142.363z"/></svg>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-auto">
                        <div class="subscribe-form-title-lg">Newsletter</div>
                        <div class="subscribe-form-title-sm">Subscribe to our weekly newsletter.</div>
                    </div>
                    <div class="col">
                        <div class="subscribe-form">
                            <form action="#">
                                <div class="form-inline">
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" placeholder="Type your e-mail...">
                                        <svg preserveAspectRatio="none"><rect x="2" y="2" rx="6" height="100%" width="100%"></rect></svg>
                                        <span class="bottom"></span>
                                    </div>
                                    <button type="submit" class="btn btn--lg">subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="holder">
            <div class="container">
                <div class="title-with-arrows">
                    <h2>INSTAGRAM</h2>
                    <div class="carousel-arrows"></div>
                </div>
                <div class="instagram-carousel">
                    <div id="instafeed" class="instagram-feed-full js-instagram-feed" data-tag='bigstepsfoxicDemo' data-token='IGQVJVck9GeUNxWm9rWmY3c0E1VFNta2lSZAkMwTm8zNTI2RDhTZAG0wbUhNeGhJaGprT2FzUGFWbUtYa2J0SndsVHpxRDI2dktpS2hUdGEzaHhLVnJRNGJNMEdtUHhDbDY2cmdnSGlSRzRwcHhkaWd1UQZDZD' data-limit='24'></div>
                </div>
            </div>
        </div>
    </div>
@endsection
