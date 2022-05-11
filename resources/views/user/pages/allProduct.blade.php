@extends('user.layouts.layoutMaster')
@section('styles')
@endsection
@section('contents')

<section class="bread-crumb">
		<span class="crumb-border"></span>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 a-left">
					<ul class="breadcrumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
						<li class="home">
							<a itemprop="url" href="/" title="Trang chủ"><span itemprop="title">Trang chủ</span></a>
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</li>


						<li><strong><span itemprop="title"> Tất cả sản phẩm</span></strong></li>


					</ul>
				</div>
			</div>
		</div>
</section>

<div class="container">
    <div class="row">
        <section class="main_container collection col-lg-9 col-md-9 col-md-push-3 col-lg-push-3">
            <h1 class="hidden title-head margin-top-0">Tất cả sản phẩm</h1>
            <div class="category-products products">

                <div class="sortPagiBar">
                    <div class="row">
                        <div class="col-xs-5 col-sm-6">
                            <!-- <div class="hidden-xs">
                                <a href="javascript:;" data-view="grid">
                                    <span class="btn button-view-mode view-mode-grid active ">
                                        <i class="fa fa-th" aria-hidden="true"></i>
                                    </span>
                                </a>
                                <a href="javascript:;" data-view="list" onclick="switchView('list')">
                                    <span class="btn button-view-mode view-mode-list ">
                                        <i class="fa fa-th-list" aria-hidden="true"></i>
                                    </span>
                                </a>
                            </div> -->
                        </div>
                        <div class="col-xs-7 col-sm-6 text-xs-left text-sm-right">
                            <div id="sort-by">
                                <label class="left hidden-xs">Sắp xếp: </label>
                                <ul>
                                    <li><span class="val">Thứ tự</span>
                                        <ul class="ul_2">
                                            <li><a href="javascript:;" onclick="sortby('default')">Mặc định</a></li>
                                            <li><a href="javascript:;" onclick="sortby('alpha-asc')">A &rarr; Z</a>
                                            </li>
                                            <li><a href="javascript:;" onclick="sortby('alpha-desc')">Z &rarr; A</a>
                                            </li>
                                            <li><a href="javascript:;" onclick="sortby('price-asc')">Giá tăng
                                                    dần</a></li>
                                            <li><a href="javascript:;" onclick="sortby('price-desc')">Giá giảm
                                                    dần</a></li>
                                            <li><a href="javascript:;" onclick="sortby('created-desc')">Hàng mới
                                                    nhất</a></li>
                                            <li><a href="javascript:;" onclick="sortby('created-asc')">Hàng cũ
                                                    nhất</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="products-view products-view-grid">
                    <div class="row">

                        @if(isset($allProduct))

                        @foreach($allProduct as $pro1 )
                        <div class="col-xs-6 col-sm-4 col-lg-4">


                            <div class="product-box">

                                <div class="product-thumbnail">


                                    <!-- <div class="sale-flash">- 19% </div> -->


                                    <a href="{{route('product',$pro1->id)}}" title="{{$pro1->ten_sanpham}}">


                                        <img class="lazyload pri-img" src="../asset/products/{{$pro1->img_sanpham}}" alt="{{$pro1->ten_sanpham}}">
                                        <img class="lazyload sub-img" src="../asset/products/{{$pro1->img_sanpham}}" alt="{{$pro1->ten_sanpham}}">


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
                    <div class="text-xs-right">

                        {{ $allProduct->links('user.pages.pagination.customPagination') }}

                    </div>

                </section>

            </div>
        </section>

        <aside class="dqdt-sidebar sidebar left left-content col-lg-3 col-md-3 col-lg-pull-9 col-md-pull-9">

            <aside class="aside-item collection-category">
                <div class="aside-title">
                    <h2 class="title-head margin-top-0"><span>Danh mục</span></h2>
                </div>
                <div class="categories-box">
                    <ul class="lv1">


                        @foreach($cates as $cate_submenu)
                        <li class="nav-item nav-items ">
                            <a href="/phong-khach" class="nav-link">
                                <i class="fa fa-caret-right  hidden-md hidden-sm hidden-xs" aria-hidden="true"></i>
                                {{$cate_submenu->ten_loaisanpham}}

                            </a>
                            <span class="open-close hidden-lg 1">
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </span>
                            <ul class="lv2">
                                @foreach($catesCT as $catect_submenu)
                                @if($catect_submenu->loaisanpham_id == $cate_submenu->id)
                                <li class="">
                                    <a class="nav-link" href="/ban-ghe-go">
                                        {{$catect_submenu->ten_chitiet_loaisanpham}}
                                    </a>

                                </li>


                                @endif
                                @endforeach
                            </ul>
                        </li>
                        @endforeach


                    </ul>
                </div>
            </aside>




            <script src="//bizweb.dktcdn.net/100/109/381/themes/819670/assets/search_filter.js?1640493552354" type="text/javascript"></script>
            <div class="aside-filter">
                <div class="filter-container">
                    <div class="filter-container__selected-filter" style="display: none;">
                        <div class="filter-container__selected-filter-header clearfix">
                            <span class="filter-container__selected-filter-header-title"><i class="fa fa-arrow-left hidden-sm-up"></i> Bạn chọn</span>
                            <a href="javascript:void(0)" onclick="clearAllFiltered()" class="filter-container__clear-all">Bỏ hết <i class="fa fa-angle-right"></i></a>
                        </div>
                        <div class="filter-container__selected-filter-list">
                            <ul></ul>
                        </div>
                    </div>
                </div>


                <!-- <aside class="aside-item filter-price">
                    <div class="module-title">
                        <h2 class="title-head margin-top-0"><span>Giá sản phẩm</span></h2>
                    </div>
                    <div class="aside-content filter-group">
                        <ul>





                            <li class="filter-item filter-item--check-box filter-item--green">
                                <span>
                                    <label for="filter-duoi-100-000d">
                                        <input type="checkbox" id="filter-duoi-100-000d" onchange="toggleFilter(this);" data-group="Khoảng giá" data-field="price_min" data-text="Dưới 100.000đ" value="(<100000)" data-operator="OR">
                                        <i class="fa"></i>
                                        Giá dưới 100.000đ
                                    </label>
                                </span>
                            </li>






                            <li class="filter-item filter-item--check-box filter-item--green">
                                <span>
                                    <label for="filter-100-000d-200-000d">
                                        <input type="checkbox" id="filter-100-000d-200-000d" onchange="toggleFilter(this)" data-group="Khoảng giá" data-field="price_min" data-text="100.000đ - 200.000đ" value="(>=100000 AND <200000)" data-operator="OR">
                                        <i class="fa"></i>
                                        100.000đ - 200.000đ
                                    </label>
                                </span>
                            </li>






                            <li class="filter-item filter-item--check-box filter-item--green">
                                <span>
                                    <label for="filter-200-000d-300-000d">
                                        <input type="checkbox" id="filter-200-000d-300-000d" onchange="toggleFilter(this)" data-group="Khoảng giá" data-field="price_min" data-text="200.000đ - 300.000đ" value="(>=200000 AND <300000)" data-operator="OR">
                                        <i class="fa"></i>
                                        200.000đ - 300.000đ
                                    </label>
                                </span>
                            </li>






                            <li class="filter-item filter-item--check-box filter-item--green">
                                <span>
                                    <label for="filter-300-000d-500-000d">
                                        <input type="checkbox" id="filter-300-000d-500-000d" onchange="toggleFilter(this)" data-group="Khoảng giá" data-field="price_min" data-text="300.000đ - 500.000đ" value="(>=300000 AND <500000)" data-operator="OR">
                                        <i class="fa"></i>
                                        300.000đ - 500.000đ
                                    </label>
                                </span>
                            </li>






                            <li class="filter-item filter-item--check-box filter-item--green">
                                <span>
                                    <label for="filter-500-000d-1-000-000d">
                                        <input type="checkbox" id="filter-500-000d-1-000-000d" onchange="toggleFilter(this)" data-group="Khoảng giá" data-field="price_min" data-text="500.000đ - 1.000.000đ" value="(>500000 AND <1000000)" data-operator="OR">
                                        <i class="fa"></i>
                                        500.000đ - 1.000.000đ
                                    </label>
                                </span>
                            </li>
                            <li class="filter-item filter-item--check-box filter-item--green">
                                <span>
                                    <label for="filter-tren1-000-000d">
                                        <input type="checkbox" id="filter-tren1-000-000d" onchange="toggleFilter(this)" data-group="Khoảng giá" data-field="price_min" data-text="Trên 1.000.000đ" value="(>1000000)" data-operator="OR">
                                        <i class="fa"></i>
                                        Giá trên 1.000.000đ
                                    </label>
                                </span>
                            </li>



                        </ul>
                    </div>
                </aside>


                <aside class="aside-item filter-vendor">
                    <div class="module-title">
                        <h2 class="title-head margin-top-0"><span>Thương hiệu</span></h2>
                    </div>
                    <div class="aside-content filter-group aside_vendor">
                        <ul>




                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-bat-trang">
                                        <input type="checkbox" id="filter-bat-trang" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Bát tràng" value="(Bát tràng)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">Bát tràng</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-canifa">
                                        <input type="checkbox" id="filter-canifa" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Canifa" value="(Canifa)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">Canifa</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-canova">
                                        <input type="checkbox" id="filter-canova" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Canova" value="(Canova)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">Canova</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-canzy">
                                        <input type="checkbox" id="filter-canzy" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Canzy" value="(Canzy)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">Canzy</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-chinaa">
                                        <input type="checkbox" id="filter-chinaa" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Chinaa" value="(Chinaa)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">Chinaa</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-codien">
                                        <input type="checkbox" id="filter-codien" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Codien" value="(Codien)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">Codien</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-everon">
                                        <input type="checkbox" id="filter-everon" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="EVERON" value="(EVERON)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">EVERON</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-fami">
                                        <input type="checkbox" id="filter-fami" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Fami" value="(Fami)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">Fami</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-famil">
                                        <input type="checkbox" id="filter-famil" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Famil" value="(Famil)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">Famil</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-family">
                                        <input type="checkbox" id="filter-family" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Family" value="(Family)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">Family</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-giovani">
                                        <input type="checkbox" id="filter-giovani" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Giovani" value="(Giovani)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">Giovani</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-gsv">
                                        <input type="checkbox" id="filter-gsv" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Gsv" value="(Gsv)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">Gsv</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-hatatu">
                                        <input type="checkbox" id="filter-hatatu" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Hatatu" value="(Hatatu)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">Hatatu</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-hoang-giang">
                                        <input type="checkbox" id="filter-hoang-giang" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Hoàng giang" value="(Hoàng giang)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">Hoàng giang</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-hugo">
                                        <input type="checkbox" id="filter-hugo" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Hugo" value="(Hugo)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">Hugo</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-ihome">
                                        <input type="checkbox" id="filter-ihome" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="ihome" value="(ihome)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">ihome</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-inax">
                                        <input type="checkbox" id="filter-inax" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="INAX" value="(INAX)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">INAX</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-kimana">
                                        <input type="checkbox" id="filter-kimana" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Kimana" value="(Kimana)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">Kimana</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-lily">
                                        <input type="checkbox" id="filter-lily" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="LiLy" value="(LiLy)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">LiLy</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-lm-hc">
                                        <input type="checkbox" id="filter-lm-hc" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="LM-HC" value="(LM-HC)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">LM-HC</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-mingji">
                                        <input type="checkbox" id="filter-mingji" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Mingji" value="(Mingji)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">Mingji</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-mleh">
                                        <input type="checkbox" id="filter-mleh" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="MLEH" value="(MLEH)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">MLEH</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-panasonic">
                                        <input type="checkbox" id="filter-panasonic" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Panasonic" value="(Panasonic)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">Panasonic</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-sanyo">
                                        <input type="checkbox" id="filter-sanyo" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Sanyo" value="(Sanyo)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">Sanyo</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-sh-d2">
                                        <input type="checkbox" id="filter-sh-d2" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="SH-D2" value="(SH-D2)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">SH-D2</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-sofa-ac">
                                        <input type="checkbox" id="filter-sofa-ac" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Sofa ac" value="(Sofa ac)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">Sofa ac</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-sofani">
                                        <input type="checkbox" id="filter-sofani" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="sofani" value="(sofani)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">sofani</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-soffa">
                                        <input type="checkbox" id="filter-soffa" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="soffa" value="(soffa)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">soffa</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-soinga">
                                        <input type="checkbox" id="filter-soinga" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Soinga" value="(Soinga)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">Soinga</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-sooff">
                                        <input type="checkbox" id="filter-sooff" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="sooff" value="(sooff)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">sooff</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-teeld">
                                        <input type="checkbox" id="filter-teeld" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Teeld" value="(Teeld)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">Teeld</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-toto">
                                        <input type="checkbox" id="filter-toto" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="ToTo" value="(ToTo)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">ToTo</span>
                                    </label>
                                </span>
                            </li>



                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <span>
                                    <label class="label_relative" for="filter-victory">
                                        <input type="checkbox" id="filter-victory" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Victory" value="(Victory)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">Victory</span>
                                    </label>
                                </span>
                            </li>


                        </ul>
                    </div>
                </aside> -->









            </div>





            <!-- <aside class="aside-item">

					<div class="aside-content">
						<a href="#">
							<img src="//bizweb.dktcdn.net/100/109/381/themes/819670/assets/aside_banner.png?1640493552354"
								alt="banner" class="banner-img" />
						</a>
					</div>
				</aside> -->

        </aside>


        <div id="open-filters" class="open-filters hidden-lg hidden-md">
            <i class="fa fa-filter"></i>
            <span></span>
        </div>
        <div class="cate-overlay3"></div>
    </div>
</div>

@endsection

@section('scripts')

@endsection