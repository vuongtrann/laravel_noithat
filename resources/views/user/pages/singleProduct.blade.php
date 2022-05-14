@extends('user.layouts.layoutMaster')
@section('styles')
@endsection
@section('contents')



<section class="bread-crumb">
		<span class="crumb-border"></span>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 a-left">
					<ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
						<li class="home">
							<a itemprop="url" href="/" title="Trang chủ"><span itemprop="title">Trang
									chủ</span></a>
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</li>


						<li>
							@foreach($catesCT as $subcat)
							<a itemprop="url" href="{{route('listProduct',$subcat->id)}}" title="Giường ngủ"><span itemprop="title">
								
								@if($subcat->id == $singleProductData->chitietloai_id)
								{{$subcat->ten_chitiet_loaisanpham}}
								@endif
								
							</span></a>
							@endforeach
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</li>

						<li><strong><span itemprop="title">{{$singleProductData->ten_sanpham}}</span></strong>
						<li>

						</li>
					</ul>
				</div>
			</div>
		</div>
</section>
<section class="product" itemscope="" itemtype="http://schema.org/Product">
		<meta itemprop="name" content="Tủ quần áo hiện đại">
		<meta itemprop="name" content="Tủ quần áo hiện đại">
		<meta itemprop="url" content="//megashop-1.mysapo.net/tu-quan-ao-hien-dai">
		<meta itemprop="image"
			content="http://bizweb.dktcdn.net/thumb/grande/100/109/381/products/8bga6dorkoto1zoom.jpg?v=1469632683513">

		<meta itemprop="sku" content="Đang cập nhật">


		<meta itemprop="brand" content="LiLy">


		<meta itemprop="model" content="">


		<meta itemprop="description" content=" Tủ áo Lily 
			18.900.000  
			Mã sản phẩm: 3*70963 
			Kích thước: D1090- R600- C1890 
			Vật liệu:  
			Gỗ sồi tự nhiên- Gỗ tràm sơn xám ">

		<div class="container">
			<div class="row">
				<div class="col-lg-12 details-product">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-lg-5 col-md-5">
							<div class="relative product-image-block ">
								<div class="large-image">
									<a href="../asset/products/{{$singleProductData->img_sanpham}}"
										class="large_image_url checkurl dp-flex"
										data-rel="prettyPhoto[product-gallery]">

										<img id="zoom_01" class="img-responsive"
											src="../asset/products/{{$singleProductData->img_sanpham}}"
											alt="{{$singleProductData->ten_sanpham}}">

									</a>
									
								</div>


							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 details-pro">
							<h3 class="title" itemprop="name"><b>{{$singleProductData->ten_sanpham}}</b></h3>
							
							<div itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
								<link itemprop="availability" href="http://schema.org/InStock">
								<div class="price-box">

									<span class="special-price"><span class="price product-price">{{$singleProductData->gia_sanpham}}</span>
									</span> <!-- Giá Khuyến mại -->
									

								</div>
								
							</div>
							<div class="inventory_quantity">



								<span>Còn hàng</span>



							</div>
							<div class="information">
								@foreach($catesCT as $cat)
								@if($cat->id == $singleProductData->chitietloai_id)
								<p><span>Dòng sản phẩm:</span> {{$cat->ten_chitiet_loaisanpham}}</p>
								@endif
								@endforeach
							</div>

							<div class="product-summary product_description margin-bottom-15">
								<h4><b>MÔ TẢ: </b></h4>
								<div class="rte description">
									{{$singleProductData->mota_sanpham}}
								</div>
							</div>

							<div class="form-product">
								<form enctype="multipart/form-data" id="add-to-cart-form" action="tel:0968580776"
									method="post" class="form-inline">
									

									
									<div class="form-group form-groupx">
										
										<button type="submit" class="btn btn-lg btn-gray btn-cart btn_buy add_to_cart"
											title="Mua hàng ngay">
											<span><a href="tel:0968580776">Đặt hàng ngay</a></span>
										</button>

									</div>


									<div class="detailcall">
										<div class="callphoneicon">
											<i class="fa fa-phone"></i>
										</div>
										<a href="tel:0902560665">
											đặt mua qua điện thoại (7h00 - 21h00)<br>
											<span>0902560665</span>
										</a>
									</div>
								</form>


							</div>

						</div>
					</div>
					<div class="row">

						<div class="col-xs-12 col-lg-9 col-md-9 margin-top-15 margin-bottom-10">
							<!-- Nav tabs -->
							<div class="product-tab e-tabs">
								<ul class="tabs tabs-title clearfix">

									<li class="tab-link" data-tab="tab-1">
										<h3><span>Thông tin sản phẩm</span></h3>
									</li>


									<li class="tab-link" data-tab="tab-2">
										<h3><span>Vận chuyển</span></h3>
									</li>


									<li class="tab-link" data-tab="tab-3">
										<h3><span>Đánh giá sản phẩm</span></h3>
									</li>

								</ul>

								<div id="tab-1" class="tab-content">
									<div class="rte">
										<p>{{$singleProductData->mota_sanpham}}</p>

										<p style="text-align: center;"><img
												src="../asset/products/{{$singleProductData->img_sanpham}}"></p>

										

										<p style="text-align: center;">&nbsp;</p>
									</div>
								</div>


								<div id="tab-2" class="tab-content">
									Liên hệ ngay để được miễn phí vận chuyển !
								</div>


								<div id="tab-3" class="tab-content">
									<div id="sapo-product-reviews" class="sapo-product-reviews" data-id="3450646">
										<div id="sapo-product-reviews-noitem" style="display: none;">
											<div class="content">
												<p data-content-text="language.suggest_noitem"></p>
												<div class="product-reviews-summary-actions">
													<button type="button" class="btn-new-review"
														onclick="BPR.newReview(this); return false;"
														data-content-str="language.newreview"></button>
												</div>
												<div id="noitem-bpr-form_" data-id="formId" class="noitem-bpr-form"
													style="display:none;">
													<div class="sapo-product-reviews-form"></div>
												</div>
											</div>
										</div>

										<div id="sapo-product-reviews-sub" style="display: none;">
											<div class="sapo-product-reviews-summary" style="display: none;">
												<div class="sapo-product-reviews-action">
													<meta itemprop="name" content="Tủ quần áo hiện đại">
													<div itemprop="aggregateRating" itemscope=""
														itemtype="http://schema.org/AggregateRating"
														class="bpr-summary">
														<meta content="5" itemprop="bestRating">
														<meta content="1" itemprop="worstRating">
														<div class="bpr-summary-average">
															<span itemprop="ratingValue">3</span>
															<span class="max-score">/5</span>
														</div>
														<div data-number="5" class="sapo-product-reviews-star"
															data-score="3"></div>
														<p>(<span itemprop="ratingCount">6</span> <span>đánh giá</span>)
														</p>
													</div>
													<button type="button" class="btn-new-review"
														onclick="BPR.newReview(this); return false;"
														data-content-str="language.newreview"></button>
												</div>
											</div>
											<span class="product-reviews-summary-actions">
											</span>
											<div class="sapo-product-reviews-form" id="bpr-form_3450646"
												style="display:none;">
											</div>
											<div id="bpr-list" class="sapo-product-reviews-list">
											</div>
											<div id="bpr-more-reviews">
											</div>
										</div>

									</div>

								</div>

							</div>
						</div>


						<div class="col-lg-3 col-md-3 hidden-xs hidden-sm margin-top-15 margin-bottom-10">
							<aside class="aside-item">
								<div class="aside-title">
									<h2 class="title-head margin-top-0"><span>Có thể bạn thích</span></h2>
								</div>
								<div class="aside-content">


									@if(isset($cotheBanThich))
									@foreach($cotheBanThich as $ctbt)
									<div class="mini-item">




										<div class="product-box">
											<div class="product-thumbnail">

												<!-- <div class="sale-flash">- 90% </div> -->

												<a href="{{route('product',$ctbt->id)}}" title="{{$ctbt->ten_sanpham}}">

													<img class="pri-img"
														src="../asset/products/{{$ctbt->img_sanpham}}"
														alt="">
													<img class="sub-img"
														src="../asset/products/{{$ctbt->img_sanpham}}"
														alt="">

												</a>
											</div>
											<div class="product-info a-left">
												
												<h3 class="product-name"><a href="{{route('product',$ctbt->id)}}"
														title="{{$ctbt->ten_sanpham}}">{{$ctbt->ten_sanpham}}</a></h3>


												<div class="price-box clearfix">
													
													<div class="special-price">
														<span class="price product-price">{{$ctbt->gia_sanpham}}</span>
													</div>

													

												</div>


											</div>
										</div>
									</div>

									@endforeach
									@endif
								

								</div>
							</aside>
						</div>


					</div>




					<div class="related-product">
						<div class="heading-title">
							<h2 class="heading-title__title"><a href="">SẢN PHẨM CÙNG LOẠI</a></h2>
						</div>
						<div class="products  owl-carousel owl-theme products-view-grid" data-lg-items="4"
							data-md-items="4" data-sm-items="3" data-xs-items="2" data-xss-items="2" data-margin="10">
							@if(isset($spCungLoai))
							@foreach($spCungLoai as $spCL)
							<div class="product-box">
                                                
												<div class="product-thumbnail">


													<!-- <div class="sale-flash">- 19% </div> -->


													<a href="{{route('product',$spCL->id)}}" title="{{$spCL->ten_sanpham}}">


													   
														<img class="lazyload pri-img" src="../asset/products/{{$spCL->img_sanpham}}" alt="{{$spCL->ten_sanpham}}">
														<img class="lazyload sub-img" src="../asset/products/{{$spCL->img_sanpham}}" alt="{{$spCL->ten_sanpham}}">


													</a>
												</div>
												<div class="product-info a-center">
													<h3 class="product-name"><a href="{{route('product',$spCL->id)}}" title="{{$spCL->ten_sanpham}}">{{$spCL->ten_sanpham}}</a>
													</h3>




													<div class="price-box clearfix">
														<div class="special-price">
															<span class="price product-price">{{$spCL->gia_sanpham}}</span>
														</div>

														

													</div>


												</div>
												<div class="product-action clearfix hidden-md hidden-sm hidden-xs">
													<form action="/cart/add" method="post" class="variants form-nut-grid" data-id="product-actions-11994808" enctype="multipart/form-data">
														<div>

															<input class="hidden" type="hidden" name="variantId" value="19206249">
															<a href="{{route('product',$spCL->id)}}" class="btn-cart btn btn-gray  left-to" title="Xem thêm" type="button">
																Xem thêm</a>

														</div>
													</form>
												</div>
												
											</div>
							@endforeach
							@endif


							


						</div>
					</div>


				</div>
			</div>
		</div>
</section>



@endsection

@section('scripts')

@endsection