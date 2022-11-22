@extends('layouts.master')
@section('title', 'İletişim')
@section('description', "")
@section('keywords', "")
@section('scripts')
<script src="{{ asset('/assets/js/superfish.min.js') }}"></script>
<script src="{{ asset('/assets/js/script.js') }}"></script>
<script src="{{ asset('/assets/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{ asset('/assets/js/isotope.pkgd.min.js')}}"></script>
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('/assets/css/plugins/jquery.countdown.css') }}">
@endsection
@section('main')
<div class="page-header text-center" style="background-image: url('/images/general/pages/disidigi-bizkimiz-01-fin-low.jpg'); padding:49px;">
    <div class="container">
        <h1 class="page-title"><span style="">İletişim</span></h1>
    </div>
</div>
<nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tr">Anasayfa</a></li>
            <li class="breadcrumb-item active" aria-current="page">İletişim</li>
        </ol>
    </div>
</nav>
<div class="page-content pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-2 mb-lg-0">
                <h2 class="title mb-1">İletişim bilgileri</h2>
                <p class=""><b>Hizmetlerimiz çevrimiçi ve uzaktan</b></p>
                <p class="">Metaverse'e doğru ilerleyen bir dünyada artık yüz yüze görüşmelere ihtiyaç olmadığına inanıyoruz.</p>
                <p class="mb-3">Ama ihtiyacınız olursa ofisinizde size reklam ve satış tavsiyesi verebiliriz.</p>
                <div class="row">
                    <div class="col-sm-7">
                        <div class="contact-info">
                            <h3>Reklam ve satış danışmanlığı randevusu</h3>
                            <!-- <ul class="contact-list">-->
                            <ul>
                                <li>
                                    1. İşinizi disdigi'ye kaydedin
                                </li>
                                <li>
                                    2. Konuyu belirtin
                                </li>
                                <li>
                                    3. Zamanı belirle
                                </li>
                                <li>
                                    4. Ödeme
                                </li>
                                <li>
                                    5. Ofisinizde danışma
                                </li>
                            </ul>
                            <a href="/tr/toplanti-randevu" class="btn btn-outline-primary-2 btn-minwidth-sm" style="margin-bottom: 10px;">Toplantı Randevu</a>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="contact-info">
                            <h3>Danışma randevu saatleri</h3>
                            <ul class="contact-list">
                                <li>
                                    <i class="icon-clock-o"></i>
                                    <span class="text-dark">Pazartesi</span> <br>14:00-18:00
                                </li>
                                <li>
                                    <i class="icon-clock-o"></i>
                                    <span class="text-dark">Çarşamba</span> <br>9:00-13:00
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="title mb-1">Reklam ve satış hakkında herhangi bir sorunuz mu var?</h2>
                <p class="mb-2">Uzman ekibimizle iletişime geçmek için aşağıdaki formu kullanın.</p>
                <form action="/message-contactus" class="contact-form mb-3" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="cname" class="sr-only">İsim</label>
                            <input name="name" type="text" class="form-control" id="cname" placeholder="İsim *" required>
                            @if ($errors->has('name'))
                            <div class="alert alert-danger mb-3">
                                <span>{{ $errors->first('name') }}</span>
                            </div>
                            @endif
                        </div>
                        <input name="title" type="text" value="contact us" hidden="">
                        <input name="lang" type="text" value="tr" hidden="">
                        <div class="col-sm-6">
                            <label for="cemail" class="sr-only">E-posta</label>
                            <input name="email" type="email" class="form-control" id="cemail" placeholder="E-posta *" required>
                            @if ($errors->has('email'))
                            <div class="alert alert-danger mb-3">
                                <span>{{ $errors->first('email') }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="cphone" class="sr-only">Mobil</label>
                            <input name="mobile" type="tel" class="form-control" id="cphone" placeholder="Mobil">
                            @if ($errors->has('mobile'))
                            <div class="alert alert-danger mb-3">
                                <span>{{ $errors->first('mobile') }}</span>
                            </div>
                            @endif
                        </div>
                        <div class="col-sm-6">
                            <label for="csubject" class="sr-only">Ders</label>
                            <input name="subject" type="text" class="form-control" id="csubject" placeholder="Ders">
                            @if ($errors->has('subject'))
                            <div class="alert alert-danger mb-3">
                                <span>{{ $errors->first('subject') }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                    <label for="cmessage" class="sr-only">Mesaj</label>
                    <textarea name="body"  class="form-control" cols="30" rows="4" id="cmessage" required placeholder="Mesaj *"></textarea>
                    @if ($errors->has('body'))
                    <div class="alert alert-danger mb-3">
                        <span>{{ $errors->first('body') }}</span>
                    </div>
                    @endif
                    <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                        <span>Göndermek</span>
                        <i class="icon-long-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>
        <hr class="mt-4 mb-5">
    </div>
</div>
@endsection