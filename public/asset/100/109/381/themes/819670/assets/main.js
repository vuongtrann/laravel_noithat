$(document).ready(function ($) {
	"use strict";
	awe_backtotop();
	awe_owl();
	awe_category();
	awe_menumobile();
	awe_tab();
	awe_lazyloadImage();
});




/********************************************************
	# LazyLoad
	********************************************************/
function awe_lazyloadImage() {
	var ll = new LazyLoad({
		elements_selector: ".lazyload",
		load_delay: 100,
		threshold: 0
	});
} window.awe_lazyloadImage=awe_lazyloadImage;

/********************************************************
# SHOW NOITICE
********************************************************/
function awe_showNoitice(selector) {
	$(selector).animate({right: '0'}, 500);
	setTimeout(function() {
		$(selector).animate({right: '-300px'}, 500);
	}, 3500);
}  window.awe_showNoitice=awe_showNoitice;

/********************************************************
# SHOW LOADING
********************************************************/
function awe_showLoading(selector) {
	var loading = $('.loader').html();
	$(selector).addClass("loading").append(loading); 
}  window.awe_showLoading=awe_showLoading;

/********************************************************
# HIDE LOADING
********************************************************/
function awe_hideLoading(selector) {
	$(selector).removeClass("loading"); 
	$(selector + ' .loading-icon').remove();
}  window.awe_hideLoading=awe_hideLoading;

/********************************************************
# SHOW POPUP
********************************************************/
function awe_showPopup(selector) {
	$(selector).addClass('active');
}  window.awe_showPopup=awe_showPopup;

/********************************************************
# HIDE POPUP
********************************************************/
function awe_hidePopup(selector) {
	$(selector).removeClass('active');
}  window.awe_hidePopup=awe_hidePopup;

/********************************************************
# CONVERT VIETNAMESE
********************************************************/
function awe_convertVietnamese(str) { 
	str= str.toLowerCase();
	str= str.replace(/Ă |Ă¡|áº¡|áº£|Ă£|Ă¢|áº§|áº¥|áº­|áº©|áº«|Äƒ|áº±|áº¯|áº·|áº³|áºµ/g,"a"); 
	str= str.replace(/Ă¨|Ă©|áº¹|áº»|áº½|Ăª|á»|áº¿|á»‡|á»ƒ|á»…/g,"e"); 
	str= str.replace(/Ă¬|Ă­|á»‹|á»‰|Ä©/g,"i"); 
	str= str.replace(/Ă²|Ă³|á»|á»|Ăµ|Ă´|á»“|á»‘|á»™|á»•|á»—|Æ¡|á»|á»›|á»£|á»Ÿ|á»¡/g,"o"); 
	str= str.replace(/Ă¹|Ăº|á»¥|á»§|Å©|Æ°|á»«|á»©|á»±|á»­|á»¯/g,"u"); 
	str= str.replace(/á»³|Ă½|á»µ|á»·|á»¹/g,"y"); 
	str= str.replace(/Ä‘/g,"d"); 
	str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-");
	str= str.replace(/-+-/g,"-");
	str= str.replace(/^\-+|\-+$/g,""); 
	return str; 
} window.awe_convertVietnamese=awe_convertVietnamese;


/********************************************************
# SIDEBAR CATEOGRY
********************************************************/
function awe_category(){
	$('.nav-category .fa-angle-down').click(function(e){
		$(this).parent().toggleClass('active');
	});
} window.awe_category=awe_category;

/********************************************************
# MENU MOBILE
********************************************************/
function awe_menumobile(){
	$('.menu-bar').click(function(e){
		e.preventDefault();
		$('#nav').toggleClass('open');
	});


	$('#nav .fa').click(function(e){		
		e.preventDefault();
		$(this).parent().parent().toggleClass('open');
	});
} window.awe_menumobile=awe_menumobile;

$('.menu-bar').click(function(){
	$('.nav').slideToggle("fast");
});

$('.nav-mobile .open-close2').click(function(){
	$(this).closest('li').find('>ul').slideToggle("fast");
});


/********************************************************
# ACCORDION
********************************************************/
function awe_accordion(){
	$('.accordion .nav-link').click(function(e){
		e.preventDefault;
		$(this).parent().toggleClass('active');
	})
} window.awe_accordion=awe_accordion;

/********************************************************
# OWL CAROUSEL
********************************************************/
function awe_owl() { 
	$('.owl-carousel:not(.not-dqowl)').each( function(){
		var xs_item = $(this).attr('data-xs-items');
		var md_item = $(this).attr('data-md-items');
		var lg_item = $(this).attr('data-lg-items');
		var sm_item = $(this).attr('data-sm-items');	
		var margin=$(this).attr('data-margin');
		var dot=$(this).attr('data-dot');
		var nav=$(this).attr('data-nav');
		var height=$(this).attr('data-height');
		var play=$(this).attr('data-play');
		var loop=$(this).attr('data-loop');
		if (typeof margin !== typeof undefined && margin !== false) {    
		} else{
			margin = 30;
		}
		if (typeof xs_item !== typeof undefined && xs_item !== false) {    
		} else{
			xs_item = 1;
		}
		if (typeof sm_item !== typeof undefined && sm_item !== false) {    

		} else{
			sm_item = 3;
		}	
		if (typeof md_item !== typeof undefined && md_item !== false) {    
		} else{
			md_item = 3;
		}
		if (typeof lg_item !== typeof undefined && lg_item !== false) {    
		} else{
			lg_item = 3;
		}
		if (typeof dot !== typeof undefined && dot !== true) {   
			dot= true;
		} else{
			dot = false;
		}
		$(this).owlCarousel({
			loop:loop,
			margin:Number(margin),
			responsiveClass:true,
			dots:dot,
			nav:nav,
			autoplay:play,
			autoplayTimeout:3000,
			autoplayHoverPause:true,
			autoHeight:false,
			navText: ["",""],
			responsive:{
				0:{
					items:Number(xs_item)				
				},
				600:{
					items:Number(sm_item)				
				},
				1000:{
					items:Number(md_item)				
				},
				1200:{
					items:Number(lg_item)				
				}
			}
		})
	})
} window.awe_owl=awe_owl;

/********************************************************
# BACKTOTOP
********************************************************/
function awe_backtotop() { 
	if ($('.back-to-top').length) {
		var scrollTrigger = 100, // px
			backToTop = function () {
				var scrollTop = $(window).scrollTop();
				if (scrollTop > scrollTrigger) {
					$('.back-to-top').addClass('show');
				} else {
					$('.back-to-top').removeClass('show');
				}
			};
		backToTop();
		$(window).on('scroll', function () {
			backToTop();
		});
		$('.back-to-top').on('click', function (e) {
			e.preventDefault();
			$('html,body').animate({
				scrollTop: 0
			}, 700);
		});
	}
} window.awe_backtotop=awe_backtotop;

/********************************************************
# TAB
********************************************************/
function awe_tab() {
	$(".e-tabs").each( function(){
		$(this).find('.tabs-title li:first-child').addClass('current');
		$(this).find('.tab-content').first().addClass('current');

		$(this).find('.tabs-title li').click(function(){
			var tab_id = $(this).attr('data-tab');
			var url = $(this).attr('data-url');
			$(this).closest('.e-tabs').find('.tab-viewall').attr('href',url);
			$(this).closest('.e-tabs').find('.tabs-title li').removeClass('current');
			$(this).closest('.e-tabs').find('.tab-content').removeClass('current');
			$(this).addClass('current');
			$(this).closest('.e-tabs').find("#"+tab_id).addClass('current');
		});    
	});
} window.awe_tab=awe_tab;

/********************************************************
# DROPDOWN
********************************************************/
$('.dropdown-toggle').click(function() {
	$(this).parent().toggleClass('open'); 	
}); 
$('.btn-close').click(function() {
	$(this).parents('.dropdown').toggleClass('open');
}); 
$('body').click(function(event) {
	if (!$(event.target).closest('.dropdown').length) {
		$('.dropdown').removeClass('open');
	};
});

$(document).ready(function(){
	var categories_box = $(".categories-box");
	var test = categories_box.find('.lv1 > li').length;
	console.log(test);
	if (test > 10) {
		categories_box.find('.lv1 > li:gt(9)').hide();
		categories_box.find('.lv1 > li:last')
			.after(`<li class='xemthem'><a href="javascript:void(0);" title="Xem thĂªm"><i class="fa fa-angle-double-right"></i>Xem thĂªm</a></li>`);
	}

	$('.xemthem').click(function(){
		categories_box.find('.lv1 > li:gt(0)').fadeIn();
		$(this).hide();
	});
});


// Create tab
$(".not-dqtab").each( function(e){
	var $this1 = $(this);
	var datasection = $this1.closest('.not-dqtab').attr('data-section');
	var view = $this1.closest('.not-dqtab').attr('data-view');
	$this1.find('.tabs-title li:first-child').addClass('current');
	$this1.find('.tab-content').first().addClass('current');
	$this1.find('.tabs-title.ajax li').click(function(){
		var $this2 = $(this),
			tab_id = $this2.attr('data-tab'),
			url = $this2.attr('data-url');
		var etabs = $this2.closest('.e-tabs2');
		etabs.find('.tab-viewall').attr('href',url);
		etabs.find('.tabs-title li').removeClass('current');
		etabs.find('.tab-content').removeClass('current');
		$this2.addClass('current');
		etabs.find("."+tab_id).addClass('current');
		//Náº¿u Ä‘Ă£ load rá»“i thĂ¬ khĂ´ng load ná»¯a
		if(!$this2.hasClass('has-content')){
			$this2.addClass('has-content');		
			getContentTab(url,"."+ datasection+" ."+tab_id,view);
		}
	});
});

//Xá»­ lĂ½ mobile

$('.not-dqtab .next').click(function(e){

	var count = 0
	$(this).parents('.content').find('.tab-content').each(function(e){
		count +=1;
	})

	var str = $(this).parent().find('.tab-titlexs').attr('data-tab'),
		res = str.replace("tab-", ""),
		datasection = $(this).closest('.not-dqtab').attr('data-section');
	res = Number(res);
	if(res < count){
		var current = res + 1;
	}else{
		var current = 1;
	}
	action(current,datasection);
})
$('.not-dqtab .prev').click(function(e){
	var count = 0
	$(this).parents('.content').find('.tab-content').each(function(e){
		count +=1;
	})

	var str = $(this).parent().find('.tab-titlexs').attr('data-tab'),
		res = str.replace("tab-", ""),
		datasection = $(this).closest('.not-dqtab').attr('data-section'),
		res = Number(res);	
	if(res > 1){
		var current = res - 1;
	}else{
		var current = count;
	}
	action(current,datasection);
})
// Action mobile
function action(current,datasection,view){
	$('.'+datasection+' .tab-titlexs').attr('data-tab','tab-'+current);
	var text = '',
		url = '',
		tab_id='';
	$('.'+datasection+' ul.tabs.tabs-title.hidden-xs li').each(function(e){

		if($(this).attr('data-tab') == 'tab-'+current){
			var $this3 = $(this);
			title = $this3.find('span').text();
			url = $this3.attr('data-url');
			tab_id = $this3.attr('data-tab');	
			//Náº¿u Ä‘Ă£ load rá»“i thĂ¬ khĂ´ng load ná»¯a
			if(!$this3.hasClass('has-content')){
				$this3.addClass('has-content');	

				getContentTab(url,"."+ datasection+" ."+tab_id,view);				
			}
		}
	})
	$("."+ datasection+" .tab-titlexs span").text(title);
	$("."+ datasection+" .tab-content").removeClass('current');
	$("."+ datasection+" .tab-"+current).addClass('current');
}
// Get content cho tab
function getContentTab(url,selector,view){
	if(view == 'grid_4'){
		url = url+"?view=ajaxload4";
	}else{
		url = url+"?view=ajaxload";
	}

	var dataLgg = $(selector).parent().find('.tab-1 .owl-carousel').attr('data-lgg-items');
	var loadding = '<div class="a-center"><svg height=30px style="enable-background:new 0 0 50 50"version=1.1 viewBox="0 0 24 30"width=24px x=0px xml:space=preserve xmlns=http://www.w3.org/2000/svg xmlns:xlink=http://www.w3.org/1999/xlink y=0px><rect fill=#333 height=10 opacity=0.2 width=4 x=0 y=10><animate attributeName=opacity attributeType=XML begin=0s dur=0.6s repeatCount=indefinite values="0.2; 1; .2"/><animate attributeName=height attributeType=XML begin=0s dur=0.6s repeatCount=indefinite values="10; 20; 10"/><animate attributeName=y attributeType=XML begin=0s dur=0.6s repeatCount=indefinite values="10; 5; 10"/></rect><rect fill=#333 height=10 opacity=0.2 width=4 x=8 y=10><animate attributeName=opacity attributeType=XML begin=0.15s dur=0.6s repeatCount=indefinite values="0.2; 1; .2"/><animate attributeName=height attributeType=XML begin=0.15s dur=0.6s repeatCount=indefinite values="10; 20; 10"/><animate attributeName=y attributeType=XML begin=0.15s dur=0.6s repeatCount=indefinite values="10; 5; 10"/></rect><rect fill=#333 height=10 opacity=0.2 width=4 x=16 y=10><animate attributeName=opacity attributeType=XML begin=0.3s dur=0.6s repeatCount=indefinite values="0.2; 1; .2"/><animate attributeName=height attributeType=XML begin=0.3s dur=0.6s repeatCount=indefinite values="10; 20; 10"/><animate attributeName=y attributeType=XML begin=0.3s dur=0.6s repeatCount=indefinite values="10; 5; 10"/></rect></svg></div>';

	$.ajax({
		type: 'GET',
		url: url,
		beforeSend: function() {
			$(selector).html(loadding);
		},
		success: function(data) {
			var content = $(data);

			$(selector).html(content.html());
			ajaxCarousel(selector,dataLgg);			
			//Fix app
			if(window.BPR)
				return window.BPR.initDomEls(), window.BPR.loadBadges();
		},
		dataType: "html"
	});
}
// Ajax carousel
function ajaxCarousel(selector,dataLgg){
	$(selector+' .owl-carousel.ajax-carousel').each( function(){
		var xss_item = $(this).attr('data-xss-items');
		var xs_item = $(this).attr('data-xs-items');
		var sm_item = $(this).attr('data-sm-items');
		var md_item = $(this).attr('data-md-items');
		var lg_item = $(this).attr('data-lg-items');
		if(dataLgg !== typeof undefined){
		}
		var lgg_item = dataLgg;
		var margin=$(this).attr('data-margin');
		var dot=$(this).attr('data-dot');
		var nav=$(this).attr('data-nav');
		if (typeof margin !== typeof undefined && margin !== false) {
		} else{
			margin = 30;
		}
		if (typeof xss_item !== typeof undefined && xss_item !== false) {
		} else{
			xss_item = 1;
		}
		if (typeof xs_item !== typeof undefined && xs_item !== false) {
		} else{
			xs_item = 1;
		}
		if (typeof sm_item !== typeof undefined && sm_item !== false) {

		} else{
			sm_item = 3;
		}
		if (typeof md_item !== typeof undefined && md_item !== false) {
		} else{
			md_item = 3;
		}
		if (typeof lg_item !== typeof undefined && lg_item !== false) {
		} else{
			lg_item = 4;
		}
		if (typeof lgg_item !== typeof undefined && lgg_item !== false) {

		} else{
			lgg_item = lg_item;			
		}

		if (typeof dot !== typeof undefined && dot !== true) {
			dot = dot;
		} else{
			dot = false;
		}
		if (typeof nav !== typeof undefined && nav !== true) {
			nav = nav;
		} else{
			nav = false;
		}
		$(this).owlCarousel({
			loop:false,
			margin:Number(margin),
			responsiveClass:true,
			dots:dot,
			nav:nav,
			navText: ["<i class='fa fa-angle-left' aria-hidden='true'></i>","<i class='fa fa-angle-right' aria-hidden='true'></i>"],
			responsive:{
				0:{
					items:Number(xss_item),
				},
				543:{
					items:Number(xs_item)
				},
				768:{
					items:Number(sm_item)
				},
				992:{
					items:Number(md_item)
				},
				1200:{
					items:Number(lg_item)
				},
				1500:{
					items:Number(lgg_item)
				}
			}
		})
	})
}

/********************************************************
# MEGA SHOP
********************************************************/
function awe_flowersVietnamese(str) { 
	str= str.toLowerCase();
	str= str.replace(/Ă |Ă¡|áº¡|áº£|Ă£|Ă¢|áº§|áº¥|áº­|áº©|áº«|Äƒ|áº±|áº¯|áº·|áº³|áºµ/g,"a"); 
	str= str.replace(/Ă¨|Ă©|áº¹|áº»|áº½|Ăª|á»|áº¿|á»‡|á»ƒ|á»…/g,"e"); 
	str= str.replace(/Ă¬|Ă­|á»‹|á»‰|Ä©/g,"i"); 
	str= str.replace(/Ă²|Ă³|á»|á»|Ăµ|Ă´|á»“|á»‘|á»™|á»•|á»—|Æ¡|á»|á»›|á»£|á»Ÿ|á»¡/g,"o"); 
	str= str.replace(/Ă¹|Ăº|á»¥|á»§|Å©|Æ°|á»«|á»©|á»±|á»­|á»¯/g,"u"); 
	str= str.replace(/á»³|Ă½|á»µ|á»·|á»¹/g,"y"); 
	str= str.replace(/Ä‘/g,"d"); 
	str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-");
	str= str.replace(/-+-/g,"-");
	str= str.replace(/^\-+|\-+$/g,""); 
	return str; 
} window.awe_flowersVietnamese=awe_flowersVietnamese;


/*Open filter*/
$('.open-filters').click(function(e){
	e.stopPropagation();
	$(this).toggleClass('openf');
	$('.dqdt-sidebar').toggleClass('openf');
	$('.cate-overlay3').toggleClass('open');
});

$('.cate-overlay3, .filter-item').click(function(e){
	$('.cate-overlay3.open').removeClass('open');
	$('.dqdt-sidebar.openf').toggleClass('openf');
	$('#open-filters.openf').toggleClass('openf');
});


$(document).on('click','.qtyplus',function(e){
	e.preventDefault();   
	fieldName = $(this).attr('data-field'); 
	var currentVal = parseInt($('input[data-field='+fieldName+']').val());
	if (!isNaN(currentVal)) { 
		$('input[data-field='+fieldName+']').val(currentVal + 1);
	} else {
		$('input[data-field='+fieldName+']').val(0);
	}
});

$(document).on('click','.qtyminus',function(e){
	e.preventDefault(); 
	fieldName = $(this).attr('data-field');
	var currentVal = parseInt($('input[data-field='+fieldName+']').val());
	if (!isNaN(currentVal) && currentVal > 1) {          
		$('input[data-field='+fieldName+']').val(currentVal - 1);
	} else {
		$('input[data-field='+fieldName+']').val(1);
	}
});


$('.categories-box .open-close').click(function(){
	$(this).closest('li').find('>ul').slideToggle("fast");
});

$(document).on('click','.overlay, .close-popup, .btn-continue, .fancybox-close', function() {   
	hidePopup('.awe-popup'); 	
	setTimeout(function(){
		$('.loading').removeClass('loaded-content');
	},500);
	return false;
})

function callbackW() {
	iWishCheck();				  
	iWishCheckInCollection();
	$(".iWishAdd").click(function () {			
		var iWishvId = iWish$(this).parents('form').find("[name='id']").val();
		if (typeof iWishvId === 'undefined') {
			iWishvId = iWish$(this).parents('form').find("[name='variantId']").val();
		};
		var iWishpId = iWish$(this).attr('data-product');
		if (Bizweb.template == 'collection' || Bizweb.template == 'index') {
			iWishvId = iWish$(this).attr('data-variant');
		}
		if (typeof iWishvId === 'undefined' || typeof iWishpId === 'undefined') {
			return false;
		}
		if (iwish_cid == 0) {
			iWishGotoStoreLogin();
		} else {
			var postObj = {
				actionx : 'add',
				cust: iwish_cid,
				pid: iWishpId,
				vid: iWishvId
			};
			iWish$.post(iWishLink, postObj, function (data) {
				if (iWishFindAndGetVal('#iwish_post_result', data) == undefined) return;
				var result = (iWishFindAndGetVal('#iwish_post_result', data).toString().toLowerCase() === 'true');
				var redirect = parseInt(iWishFindAndGetVal('#iwish_post_redirect', data), 10);
				if (result) {
					if (Bizweb.template == "product") {
						iWish$('.iWishAdd').addClass('iWishHidden'), iWish$('.iWishAdded').removeClass('iWishHidden');
						if (redirect == 2) {
							iWishSubmit(iWishLink, { cust: iwish_cid });
						}
					}
					else if (Bizweb.template == 'collection' || Bizweb.template == 'index') {
						iWish$.each(iWish$('.iWishAdd'), function () {
							var _item = $(this);
							if (_item.attr('data-variant') == iWishvId) {
								_item.addClass('iWishHidden'), _item.parent().find('.iWishAdded').removeClass('iWishHidden');
							}
						});
					}
				}
			}, 'html');
		}
		return false;
	});
	$(".iWishAdded").click(function () {
		var iWishvId = iWish$(this).parents('form').find("[name='id']").val();
		if (typeof iWishvId === 'undefined') {
			iWishvId = iWish$(this).parents('form').find("[name='variantId']").val();
		};
		var iWishpId = iWish$(this).attr('data-product');
		if (Bizweb.template == 'collection' || Bizweb.template == 'index') {
			iWishvId = iWish$(this).attr('data-variant');
		}
		if (typeof iWishvId === 'undefined' || typeof iWishpId === 'undefined') {
			return false;
		}
		if (iwish_cid == 0) {
			iWishGotoStoreLogin();
		} else {
			var postObj = {
				actionx: 'remove',
				cust: iwish_cid,
				pid: iWishpId,
				vid: iWishvId
			};
			iWish$.post(iWishLink, postObj, function (data) {
				if (iWishFindAndGetVal('#iwish_post_result', data) == undefined) return;
				var result = (iWishFindAndGetVal('#iwish_post_result', data).toString().toLowerCase() === 'true');
				var redirect = parseInt(iWishFindAndGetVal('#iwish_post_redirect', data), 10);
				if (result) {
					if (Bizweb.template == "product") {
						iWish$('.iWishAdd').removeClass('iWishHidden'), iWish$('.iWishAdded').addClass('iWishHidden');
					}
					else if (Bizweb.template == 'collection' || Bizweb.template == 'index') {
						iWish$.each(iWish$('.iWishAdd'), function () {
							var _item = $(this);
							if (_item.attr('data-variant') == iWishvId) {
								_item.removeClass('iWishHidden'), _item.parent().find('.iWishAdded').addClass('iWishHidden');
							}
						});
					}
				}
			}, 'html');
		}
		return false;
	});

}  window.callbackW=callbackW;

setTimeout(function(){ fontLoader(); }, 1000);
function fontLoader() {
	var headID = document.getElementsByTagName('head')[0];
	var link = document.createElement('link');
	link.type = 'text/css';
	link.rel = 'stylesheet';

	//link.href = 'http://fonts.googleapis.com/css?family=Oswald&effect=neon';
	headID.appendChild(link);
	link.href = 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap';

};