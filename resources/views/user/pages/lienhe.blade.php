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

                    <li><strong><span itemprop="title">Liên hệ</span></strong></li>

                </ul>
            </div>
        </div>
    </div>
</section>

<div class="container container-fix-hd contact">
    <div class="box-heading box-heading-line relative">
        <h1 class="title-head page_title margin-bottom-5">Liên hệ</h1>
    </div>

    <div class="row">
        <div class="col-sm-5">

            <h2 class="title-head"><span> Nội thất Tám Dũng </span></h2>
            <p>Nội thất Tám Dũng - Cửa hàng chuyên cung cấp nội thất chât lượng và uy tín</p>

            <div class="contact-box-info clearfix margin-bottom-30">
                <div>







                    <div class="item">
                        
                        <p><i class="fa fa-map-marker"></i> Ấp 8, xã Tân Lợi Thạnh, huyện Giồng Trôm, tỉnh Bến Tre</p>

                        <p><i class="fa fa-phone"></i> <a href="tel:0902560665">0902560665</a></p>


                        <p><i class="fa fa-envelope"></i> <a href="mailto:vuongquoctrann@gmail.com">vuongquoctrann@gmail.com
                            </a></p>

                    </div>
                    <div class="item">
                        <h4>
                            Nếu không muốn hiển thị ô này hãy để trống
                        </h4>
                        <p><i class="fa fa-map-marker"></i> </p>


                    </div>



                </div>

            </div>
            <div id="login">
                <h2 class="title-head"><span> Gửi tin nhắn cho chúng tôi</span></h2>
                <form accept-charset="utf-8" action="/contact" id="contact" method="post">
                    <input name="FormType" type="hidden" value="contact">
                    <input name="utf8" type="hidden" value="true"><input type="hidden" id="Token-96a9e87f872045ca8583d7d9a5281d8c" name="Token">
                    <script src="recaptcha/api.js?render=6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK"></script>
                    <script>
                        grecaptcha.ready(function() {
                            grecaptcha.execute("6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK", {
                                    action: "/contact"
                                })
                                .then(function(token) {
                                    document.getElementById("Token-96a9e87f872045ca8583d7d9a5281d8c").value = token
                                });
                        });
                    </script>


                    <p id="errorFills" style="margin-bottom:10px; color: red;"></p>
                    <div id="emtry_contact" class="form-signup form_contact clearfix">
                        <div class="row row-8Gutter">
                            <div class="col-md-12">
                                <fieldset class="form-group">
                                    <input type="text" placeholder="Họ tên*" name="contact[name]" id="name" class="form-control  form-control-lg" required="">
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <fieldset class="form-group">
                                    <input type="email" placeholder="Email*" name="contact[email]" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,63}$" data-validation="email" id="email" class="form-control form-control-lg" required="">
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <fieldset class="form-group">
                                    <input type="number" placeholder="Điện thoại*" name="contact[phone]" class="form-control form-control-lg" required="">
                                </fieldset>
                            </div>
                        </div>
                        <fieldset class="form-group">
                            <textarea name="contact[body]" placeholder="Nhập nội dung*" id="comment" class="form-control form-control-lg" rows="6" required=""></textarea>
                        </fieldset>
                        <div>

                            <button tyle="summit" class="btn btn-primary" style="padding:0 40px;text-transform: inherit;">Gửi liên hệ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="box-maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1159.898550309218!2d106.44706859712576!3d10.107894478170456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x59d49ed46c2bc6c0!2zQ-G7rWEgSMOgbmcgVHJhbmcgVHLDrSBO4buZaSBUaOG6pXQgVMOhbSBExaluZw!5e1!3m2!1svi!2s!4v1652064321774!5m2!1svi!2s" width="800" height="650" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

</div>

@endsection

@section('scripts')

@endsection