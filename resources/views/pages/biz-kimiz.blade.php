@extends('layouts.master')
@section('title', 'Biz Kimiz')
@section('description', "")
@section('keywords', "")
@section('scripts')
<script src="{{ asset('/assets/js/superfish.min.js') }}"></script>
<script src="{{ asset('/assets/js/script.js') }}"></script>
<script src="{{asset('/assets/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('/assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('/assets/js/jquery.countTo.js')}}"></script>
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('/assets/css/plugins/jquery.countdown.css') }}">
@endsection
@section('main')
<div class="page-header text-center" style="background-image: url('/images/general/pages/disidigi-bizkimiz-01-fin-low.jpg'); padding:49px;">
    <div class="container">
        <h1 class="page-title"><span style="">Biz Kimiz</span></h1>
    </div>
</div>
<nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tr">Anasayfa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Biz Kimiz</li>
        </ol>
    </div>
</nav>
<div class="page-content pb-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="about-text text-center mt-3">
                    <h2 class="title text-center mb-2">Biz kimiz</h2>
                    <p>
                        Günümüz dünyasında bir çevrimiçi mağaza, Kapali Çarşı'daki bir mağazadan çok daha fazlasını satabilir, ancak mağazanın internet ve sosyal medyada sürekli olarak reklam verebilmesi şartıyla.
                    </p>
                    <p>
                        Reklamcılıkta 30 yılı aşkın deneyime sahip uzmanlardan oluşan bir ekibiz.
                    </p>
                    <p>
                        Reklam kampanyaları tasarlayıp uygulayarak işinizi ve satışlarınızı geliştirmenize yardımcı oluyoruz.
                    </p>
                    <p>
                        Reklamın çok harcamanın değil, harcamanın doğru olduğuna inanıyoruz.
                    </p>
                    <img src="/images/general/biz-kimiz/Baner_02-Top_BizimKimiz.jpg" alt="signature" class="mx-auto mb-5">
                    <img src="/images/general/biz-kimiz/Baner_03-Top_BizimKimiz.jpg" alt="image" class="mx-auto mb-6">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-sm text-center">
                    <span class="icon-box-icon">
                        <img src="/images/general/disdigi-favicon_Black-low.png" alt="" width="64" />
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Kayıp Halka</h3>
                        <p>İşletmenizden aldığınız para sizi tatmin etmiyorsa, Kayıp halkanız reklam uzmanıdır.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-sm text-center">
                    <span class="icon-box-icon">
                        <img src="/images/general/disdigi-favicon_Black-low.png" alt="" width="64" />
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Profesyonel Destek</h3>
                        <p>Deneyimli ve uzman destek ekibimiz, istediğiniz sonuca ulaşmak için ihtiyacınız olan reklamın her adımında size yardımcı olacaktır. </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-sm text-center">
                    <span class="icon-box-icon">
                        <img src="/images/general/disdigi-favicon_Black-low.png" alt="" width="64"/>
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">İşletme geliştirme</h3>
                        <p>Reklam kampanyalarının doğru tasarlanması ve uygulanması işinizi geliştirecek ve çok daha fazla para kazanacaksınız.</p> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-2"></div>
    <div class="bg-image pt-7 pb-5 pt-md-12 pb-md-9" style="background-image: url(/images/general/biz-kimiz/Baner_04-Top_BizimKimiz.jpg)">
        <div class="container">
            <div class="row" >
                <div class="col-6 col-md-3">
                    <div class="count-container text-center">
                        <div class="count-wrapper text-white">
                            <span class="count" data-from="0" data-to="7" data-speed="3000" data-refresh-interval="50">7</span>k+
                        </div>
                        <h3 class="count-title text-white">mutlu müşteri</h3>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="count-container text-center">
                        <div class="count-wrapper text-white">
                            <span class="count" data-from="0" data-to="30" data-speed="3000" data-refresh-interval="50">30</span>+
                        </div>
                        <h3 class="count-title text-white">reklamda geçen yıllar</h3>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="count-container text-center">
                        <div class="count-wrapper text-white">
                            <span class="count" data-from="0" data-to="82" data-speed="3000" data-refresh-interval="50">82</span>%
                        </div>
                        <h3 class="count-title text-white ">müşteriyi iade et</h3>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="count-container text-center">
                        <div class="count-wrapper text-white">
                            <span class="count" data-from="0" data-to="12" data-speed="3000" data-refresh-interval="50">12</span>
                        </div>
                        <h3 class="count-title  text-white">uzmanlarımız</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-light-2 pt-6 pb-7 mb-6">
        <div class="container">
            <h2 class="title text-center mb-4">Uzmanlığımız Ve Deneyimimiz </h2>
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="member member-2 text-center">
                        <figure class="member-media">
                            <img src="/images/general/biz-kimiz/1.1Service.jpg" alt="member photo">
                        </figure>
                        <div class="member-content">
                            <h3 class="member-title">Reklam ve satış danışmanlığı<span></span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="member member-2 text-center">
                        <figure class="member-media">
                            <img src="/images/general/biz-kimiz/2.1Service.jpg" alt="member photo">
                        </figure>
                        <div class="member-content">
                            <h3 class="member-title">Marka tasarımı ve yönetimi<span></span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="member member-2 text-center">
                        <figure class="member-media">
                            <img src="/images/general/biz-kimiz/3.1Service.jpg" alt="member photo">
                        </figure>
                        <div class="member-content">
                            <h3 class="member-title">Reklam kampanyası tasarımı<span></span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="member member-2 text-center">
                        <figure class="member-media">
                            <img src="/images/general/biz-kimiz/4.1Service.jpg" alt="member photo">
                        </figure>
                        <div class="member-content">
                            <h3 class="member-title">Reklam planlamas<span></span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="member member-2 text-center">
                        <figure class="member-media">
                            <img src="/images/general/biz-kimiz/5.1Service.jpg" alt="member photo">
                        </figure>
                        <div class="member-content">
                            <h3 class="member-title">Reklam yönetimi<span></span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="member member-2 text-center">
                        <figure class="member-media">
                            <img src="/images/general/biz-kimiz/6.1Service.jpg" alt="member photo">
                        </figure>
                        <div class="member-content">
                            <h3 class="member-title">Reklam fikirleri<span></span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="member member-2 text-center">
                        <figure class="member-media">
                            <img src="/images/general/biz-kimiz/7.1Service.jpg" alt="member photo">
                        </figure>
                        <div class="member-content">
                            <h3 class="member-title">Reklam içeriği üretmek<span></span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="member member-2 text-center">
                        <figure class="member-media">
                            <img src="/images/general/biz-kimiz/8.1Service.jpg" alt="member photo">
                        </figure>
                        <div class="member-content">
                            <h3 class="member-title">Reklam grafikleri üretmek<span></span></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="member member-2 text-center">
                        <figure class="member-media">
                            <img src="/images/general/biz-kimiz/9.1Service.jpg" alt="member photo">
                        </figure>
                        <div class="member-content">
                            <h3 class="member-title">Reklam filmleri üretmek<span></span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="member member-2 text-center">
                        <figure class="member-media">
                            <img src="/images/general/biz-kimiz/10.1Service.jpg" alt="member photo">
                        </figure>
                        <div class="member-content">
                            <h3 class="member-title">Reklam yayınlamak<span></span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="member member-2 text-center">
                        <figure class="member-media">
                            <img src="/images/general/biz-kimiz/11.1Service.jpg" alt="member photo">
                        </figure>
                        <div class="member-content">
                            <h3 class="member-title">Sosyal medya tasarımı<span></span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="member member-2 text-center">
                        <figure class="member-media">
                            <img src="/images/general/biz-kimiz/12.1Service.jpg" alt="member photo">
                        </figure>
                        <div class="member-content">
                            <h3 class="member-title">Sosyal medya yönetimi<span></span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="member member-2 text-center">
                        <figure class="member-media">
                            <img src="/images/general/biz-kimiz/13.1Service.jpg" alt="member photo">
                        </figure>
                        <div class="member-content">
                            <h3 class="member-title">Web sitesi tasarımı ve SEO<span></span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="member member-2 text-center">
                        <figure class="member-media">
                            <img src="/images/general/biz-kimiz/14.1Service.jpg" alt="member photo">
                        </figure>
                        <div class="member-content">
                            <h3 class="member-title">Web sitesi desteği<span></span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="member member-2 text-center">
                        <figure class="member-media">
                            <img src="/images/general/biz-kimiz/15.1Service.jpg" alt="member photo">
                        </figure>
                        <div class="member-content">
                            <h3 class="member-title">Dijital pazarlama<span></span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="member member-2 text-center">
                        <figure class="member-media">
                            <img src="/images/general/biz-kimiz/16.1Service.jpg" alt="member photo">
                        </figure>
                        <div class="member-content">
                            <h3 class="member-title">Reklam analitiği<span></span></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <p>
                    Uzman ekibimizi her projenin ihtiyaçlarına göre oluşturuyoruz.
                </p>
                <br>
                <a href="/tr/nereden-başlamalı" class="btn btn-sm btn-minwidth-lg btn-outline-primary-2">
                    <span>Nereden Başlamalı</span>
                    <i class="icon-long-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="brands-text text-center mx-auto mb-6">
                    <h2 class="title">Daha fazla satmak için büyük markalar ne yapıyor?</h2>
                    <p>En büyük markalar sadece reklamlarını sürekli geliştirip değiştirmekle kalmaz, aynı zamanda ihtiyaç duymaları halinde marka stratejilerini de değiştirirler.
                    </p>
                    <p>
                        Belki de reklamcılık ve markalaşma konusunda değişiklik ve gelişmelere ihtiyacınız var.
                        Bunu düşün ve yap.
                    </p>
                </div>
                <div class="brands-display">
                    <div class="row justify-content-center">
                        <div class="col-6 col-sm-4 col-md-3">
                            <a href="#" class="brand">
                                <img src="/images/general/biz-kimiz/Service_Logo_01_Apple-1.jpg" alt="Brand Name">
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <a href="#" class="brand">
                                <img src="/images/general/biz-kimiz/Service_Logo_01_Apple-2.jpg" alt="Brand Name">
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <a href="#" class="brand">
                                <img src="/images/general/biz-kimiz/Service_Logo_01_Apple-4.jpg" alt="Brand Name">
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <a href="#" class="brand">
                                <img src="/images/general/biz-kimiz/Service_Logo_01_Apple-5.jpg" alt="Brand Name">
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <a href="#" class="brand">
                                <img src="/images/general/biz-kimiz/Service_Logo_01_Benz-1.jpg" alt="Brand Name">
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <a href="#" class="brand">
                                <img src="/images/general/biz-kimiz/Service_Logo_01_Benz-2.jpg" alt="Brand Name">
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <a href="#" class="brand">
                                <img src="/images/general/biz-kimiz/Service_Logo_01_Benz-4.jpg" alt="Brand Name">
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <a href="#" class="brand">
                                <img src="/images/general/biz-kimiz/Service_Logo_01_Benz-5.jpg" alt="Brand Name">
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <a href="#" class="brand">
                                <img src="/images/general/biz-kimiz/Service_Logo_01_McDonald-1.jpg" alt="Brand Name">
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <a href="#" class="brand">
                                <img src="/images/general/biz-kimiz/Service_Logo_01_McDonald-2.jpg" alt="Brand Name">
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <a href="#" class="brand">
                                <img src="/images/general/biz-kimiz/Service_Logo_01_McDonald-4.jpg" alt="Brand Name">
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <a href="#" class="brand">
                                <img src="/images/general/biz-kimiz/Service_Logo_01_McDonald-5.jpg" alt="Brand Name">
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <a href="#" class="brand">
                                <img src="/images/general/biz-kimiz/Service_Logo_01_Pepsi-1.jpg" alt="Brand Name">
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <a href="#" class="brand">
                                <img src="/images/general/biz-kimiz/Service_Logo_01_Pepsi-2.jpg" alt="Brand Name">
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <a href="#" class="brand">
                                <img src="/images/general/biz-kimiz/Service_Logo_01_Pepsi-4.jpg" alt="Brand Name">
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <a href="#" class="brand">
                                <img src="/images/general/biz-kimiz/Service_Logo_01_Pepsi-5.jpg" alt="Brand Name">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection