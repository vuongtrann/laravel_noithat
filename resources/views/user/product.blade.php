@extends('user.layouts.layoutMaster')
@section('styles')
@endsection
@section('contents')

    <section class="awe-section-1">
        <div class="container">
            <div class="home-slider owl-carousel" data-lg-items='1' data-md-items='1' data-sm-items='1' data-xs-items="1" data-margin='0' data-dot="false" data-nav="true" data-loop="true">
                <div class="item">
                    <a href="#" class="clearfix">
                        <picture>
                            <source media="(max-width: 480px)" srcset="asset/image/banner/1.jpg">
                            <img class="img-responsive center-block basic" src="asset/image/banner/1.jpg" alt="New Collection" style="width: 100%; max-height: 500px">
                        </picture>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="clearfix">
                        <picture>
                            <source media="(max-width: 480px)" srcset="asset/image/banner/2.jpg">
                            <img class="img-responsive center-block basic" src="asset/image/banner/2.jpg" alt="New Collection" style="width: 100%; max-height: 500px">
                        </picture>
                    </a>
                </div>
                <div class="item">
                    <a href="" class="clearfix">
                        <picture>
                            <source media="(max-width: 480px)" srcset="asset/image/banner/3.jpg">
                            <img class="img-responsive center-block basic" src="asset/image/banner/3.jpg" alt="" style="width: 100%; max-height: 500px">
                        </picture>
                    </a>
                </div>
            </div><!-- /.products -->
        </div>
    </section>




   




    <section class="awe-section-3">

        <section class="section-product-1 ajax-product">
            <div class="container">
                <div class="col-product-wrap">
                    <div class="heading-title">
                        <h2 class="heading-title__title"><span>Sản phẩm nổi bật </span></h2>
                    </div>
                    <div class="e-tabs2 not-dqtab ajax-tab-1" data-section="ajax-tab-1">
                        <div class="content">
                            <div>
                                <div class="module-title">
                                    <div class="tabs-title-ajax">

                                        <ul class="tabs tabs-title tab-mobile clearfix hidden-md hidden-lg">

                                            <li class="tab-link tab-title  hidden-md hidden-lg current tab-titlexs" data-tab="tab-1">

                                                <span><a href=""><b> Xem Thêm</b></a></span>

                                            </li>

                                        </ul>

                                        <ul class="tabs tabs-title ajax clearfix hidden-xs hidden-sm">

                                            <li class="tab-link has-content" data-tab="tab-1" data-url="/ban-ghe-go">
                                                <span><a href=""><b> Xem Thêm</b></a></span>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="tab-1 tab-content">

                                    <div class="module-content">

                                        <div class="owl_product_ owl-carousel" data-margin="10" data-lg-items="4" data-md-items="3" data-height="false" data-xs-items="2" data-xss-items="2" data-sm-items="3">

                                        <!-- Single Item -->
                                            
                                        
                                            @if(isset($product))
                                            
                                            @foreach($product as $pro1 )
                                            
                                            <div class="item">

                                                
                                                
                                                <div class="product-box">
                                                
                                                    <div class="product-thumbnail">


                                                        <!-- <div class="sale-flash">- 19% </div> -->


                                                        <a href="{{route('product',$pro1->id)}}" title="{{$pro1->ten_sanpham}}">


                                                            <img class="lazyload pri-img" src="../asset/products/{{$pro1->img_sanpham}}"  alt="{{$pro1->ten_sanpham}}" >
                                                            <img class="lazyload sub-img" src="../asset/products/{{$pro1->img_sanpham}}"  alt="{{$pro1->ten_sanpham}}">


                                                        </a>
                                                    </div>
                                                    <div class="product-info a-center">
                                                        <h3 class="product-name"><a href="{{route('product',$pro1->id)}}" title="{{$pro1->ten_sanpham}}">{{$pro1->ten_sanpham}}</a>
                                                        </h3>

                                                        <div class="price-box clearfix">
                                                            <div class="special-price">
                                                                <span class="price product-price">{{$pro1->gia_sanpham}}</span>
                                                            </div>

                                                        </div>


                                                    </div>
                                                    <div class="product-action clearfix hidden-md hidden-sm hidden-xs">
                                                        <form action="/cart/add" method="post" class="variants form-nut-grid" data-id="product-actions-11994808" enctype="multipart/form-data">
                                                            <div>

                                                                <input class="hidden" type="hidden" name="variantId" value="19206249">
                                                                <a href="{{route('product',$pro1->id)}}" class="btn-cart btn btn-gray  left-to" title="Xem thêm" type="button">
                                                                    Xem thêm</a>


                                                            </div>
                                                        </form>
                                                    </div>
                                                    
                                                </div>
   
                                            </div>
                                            @endforeach
                                            @endif
                                            
                                        </div>
                                            
                                        
                                            

                                    </div>

                                    <!-- /.products -->


                                </div>

                                <div class="tab-2 tab-content">

                                </div>

                                <div class="tab-3 tab-content">

                                </div>

                                <div class="tab-4 tab-content">

                                </div>

                                <div class="tab-5 tab-content">

                                </div>


                                <script>

                                </script>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </section>
    <section class="awe-section-4">

        <section class="section-product-2 ajax-product">
            <div class="container">
                <div class="col-product-wrap">
                    <div class="heading-title">
                        <h2 class="heading-title__title"><span>Bàn và salon </span> <span>gỗ</span></h2>
                    </div>
                    <div class="e-tabs2 not-dqtab ajax-tab-1" data-section="ajax-tab-1">
                        <div class="content">
                            <div>
                                <div class="module-title">
                                    <div class="tabs-title-ajax">

                                        <ul class="tabs tabs-title tab-mobile clearfix hidden-md hidden-lg">

                                            <li class="tab-link tab-title  hidden-md hidden-lg current tab-titlexs" data-tab="tab-1">

                                                <span><a href=""><b> Xem Thêm</b></a></span>

                                            </li>

                                        </ul>

                                        <ul class="tabs tabs-title ajax clearfix hidden-xs hidden-sm">

                                            <li class="tab-link has-content" data-tab="tab-1" data-url="/ban-ghe-go">
                                                <span><a href=""><b> Xem Thêm</b></a></span>
                                            </li>

                                        </ul>
                                    </div>  
                                </div>


                                <div class="tab-1 tab-content">

                                    <div class="module-content">




                                        <div class="owl_product_ owl-carousel" data-margin="10" data-lg-items="4" data-md-items="3" data-height="false" data-xs-items="2" data-xss-items="2" data-sm-items="3">

                                            @if(isset($ban_salon))
                                            
                                            @foreach($ban_salon as $pro2 )
                                            
                                            <div class="item">

                                                
                                                
                                                <div class="product-box">
                                                
                                                    <div class="product-thumbnail">


                                                        <!-- <div class="sale-flash">- 19% </div> -->


                                                        <a href="{{route('product',$pro2->id)}}" title="{{$pro2->ten_sanpham}}">


                                                            <img class="lazyload pri-img" src="../asset/products/{{$pro2->img_sanpham}}" alt="{{$pro2->ten_sanpham}}">
                                                            <img class="lazyload sub-img" src="../asset/products/{{$pro2->img_sanpham}}" alt="{{$pro2->ten_sanpham}}">


                                                        </a>
                                                    </div>
                                                    <div class="product-info a-center">
                                                        <h3 class="product-name"><a href="{{route('product',$pro2->id)}}" title="{{$pro2->ten_sanpham}}">{{$pro2->ten_sanpham}}</a>
                                                        </h3>




                                                        <div class="price-box clearfix">
                                                            <div class="special-price">
                                                                <span class="price product-price">{{$pro2->gia_sanpham}}</span>
                                                            </div>

                                                            

                                                        </div>


                                                    </div>
                                                    <div class="product-action clearfix hidden-md hidden-sm hidden-xs">
                                                        <form action="/cart/add" method="post" class="variants form-nut-grid" data-id="product-actions-11994808" enctype="multipart/form-data">
                                                            <div>

                                                                <input class="hidden" type="hidden" name="variantId" value="19206249">
                                                                <a href="{{route('product',$pro2->id)}}" class="btn-cart btn btn-gray  left-to" title="Xem thêm" type="button">
                                                                    Xem thêm</a>


                                                            </div>
                                                        </form>
                                                    </div>
                                                    
                                                </div>
   
                                            </div>
                                            @endforeach
                                            @endif


                                           


                                        </div>
                                    </div><!-- /.products -->


                                </div>

                                <div class="tab-2 tab-content">

                                </div>

                                <div class="tab-3 tab-content">

                                </div>

                                <div class="tab-4 tab-content">

                                </div>

                                <div class="tab-5 tab-content">

                                </div>


                                <script>

                                </script>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </section>




    <section class="awe-section-5">

        <section class="section-product-3 ajax-product">
            <div class="container">
                <div class="col-product-wrap">
                    <div class="heading-title">
                        <h2 class="heading-title__title"><span>Sản phẩm </span> <span>khác</span></h2>
                    </div>
                    <div class="e-tabs2 not-dqtab ajax-tab-2" data-section="ajax-tab-2">
                        <div class="content">
                            <div>
                                <div class="module-title">
                                    <div class="tabs-title-ajax">

                                        <ul class="tabs tabs-title tab-mobile clearfix hidden-md hidden-lg">

                                            <li class="tab-link tab-title  hidden-md hidden-lg current tab-titlexs" data-tab="tab-1">

                                                <span><a href=""><b> Xem Thêm</b></a></span>

                                            </li>

                                        </ul>

                                        <ul class="tabs tabs-title ajax clearfix hidden-xs hidden-sm">

                                            <li class="tab-link has-content" data-tab="tab-1" data-url="/ban-ghe-go">
                                                <span><a href=""><b> Xem Thêm</b></a></span>
                                            </li>

                                        </ul>
                                    </div>  
                                </div>


                                <div class="tab-1 tab-content">

                                    <div class="module-content">




                                        <div class="owl_product_ owl-carousel" data-margin="10" data-lg-items="4" data-md-items="3" data-height="false" data-xs-items="2" data-xss-items="2" data-sm-items="3">

                                        @if(isset($sanpham_khac))
                                            
                                            @foreach($sanpham_khac as $pro3 )
                                            
                                            <div class="item">

                                                
                                                
                                                <div class="product-box">
                                                
                                                    <div class="product-thumbnail">


                                                        <!-- <div class="sale-flash">- 19% </div> -->


                                                        <a href="{{route('product',$pro3->id)}}" title="{{$pro3->ten_sanpham}}">


                                                           
                                                            <img class="lazyload pri-img" src="../asset/products/{{$pro3->img_sanpham}}" alt="{{$pro3->ten_sanpham}}">
                                                            <img class="lazyload sub-img" src="../asset/products/{{$pro3->img_sanpham}}" alt="{{$pro3->ten_sanpham}}">


                                                        </a>
                                                    </div>
                                                    <div class="product-info a-center">
                                                        <h3 class="product-name"><a href="{{route('product',$pro3->id)}}" title="{{$pro3->ten_sanpham}}">{{$pro3->ten_sanpham}}</a>
                                                        </h3>




                                                        <div class="price-box clearfix">
                                                            <div class="special-price">
                                                                <span class="price product-price">{{$pro3->gia_sanpham}}</span>
                                                            </div>

                                                            

                                                        </div>


                                                    </div>
                                                    <div class="product-action clearfix hidden-md hidden-sm hidden-xs">
                                                        <form action="/cart/add" method="post" class="variants form-nut-grid" data-id="product-actions-11994808" enctype="multipart/form-data">
                                                            <div>

                                                                <input class="hidden" type="hidden" name="variantId" value="19206249">
                                                                <a href="{{route('product',$pro3->id)}}" class="btn-cart btn btn-gray  left-to" title="Xem thêm" type="button">
                                                                    Xem thêm</a>

                                                            </div>
                                                        </form>
                                                    </div>
                                                    
                                                </div>
   
                                            </div>
                                            @endforeach
                                            @endif

                                            


                                            

                                        </div>
                                    </div><!-- /.products -->


                                </div>

                                <div class="tab-2 tab-content">

                                </div>

                                <div class="tab-3 tab-content">

                                </div>

                                <div class="tab-4 tab-content">

                                </div>

                                <div class="tab-5 tab-content">

                                </div>


                                <script>

                                </script>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </section>

   
    <section class="awe-section-8">
        <div class="section-newsletter">
            <div class="container">



                <h2 class="section-newsletter__title"><span>Đăng ký nhận</span> <span>tư vấn miễn phí</span></h2>
                <p class="section-newsletter__text">Bạn là khách hàng, lớn hay nhỏ, muốn được hỗ trợ, tư vấn, xin vui
                    lòng gửi email cho chúng tôi để được hỗ trợ tốt nhất!</p>
                <form action="//dkt.us13.list-manage.com/subscribe/post?u=0bafe4be7e17843051883e746&amp;id=3bdd6e9e3b" method="post" id="mc-embedded-subscribe-form" class="section-newsletter__form" name="mc-embedded-subscribe-form" target="_blank">
                    <button class="btn btn-white subscribe" name="subscribe" id="subscribe">Đăng ký</button>
                    <input type="email" value="" placeholder="Email của bạn" name="EMAIL" id="mail" aria-label="general-newsletter_form-newsletter_email">
                </form>
            </div>
        </div>
    </section>

@endsection

@section('scripts')

@endsection