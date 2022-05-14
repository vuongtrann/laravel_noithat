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

                        @if(isset($dataForListProduct))

                        @foreach($dataForListProduct as $pro1 )
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

                        {{ $dataForListProduct->links('user.pages.pagination.customPagination') }}

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
                            <a href="{{route('listProductInCate',$cate_submenu->id)}}" class="nav-link">
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
                                    <a class="nav-link" href="{{route('listProduct',$catect_submenu->id)}}">
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


               









            </div>





          

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