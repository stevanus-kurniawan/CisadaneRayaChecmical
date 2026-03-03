@extends('layouts.app')

@section('title', __('messages.home.meta_title'))
@section('description', __('messages.home.meta_description'))

@section('content')
{{-- Section 1: Banner --}}
<section class="home-banner">
    <div
        class="home-banner-background"
        style="background-image: url('{{ asset('assets/banners/home.jpeg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;"
    ></div>
</section>

{{-- Section 2: Green Box --}}
<section class="section">
    <div class="container">
        <div class="green-box">
            <h2 class="green-box-title">{{ __('messages.home.hero_title') }}</h2>
            <p class="green-box-text">
                {{ __('messages.home.hero_text') }}
            </p>
            <a href="{{ route('company.about') }}">
                <button class="btn-primary green-box-button" type="button">
                    {{ __('messages.home.learn_more') }}
                </button>
            </a>
        </div>
    </div>
</section>

{{-- Section 3: Certifications & Image Panels (banner image as background) --}}
<section class="home-certifications-section">
    <div class="home-certifications-bg" aria-hidden="true"></div>
    <div class="container home-certifications-content">
        <div class="certifications-panels">
            <div class="cert-panel cert-panel-icons">
                <div class="cert-logos-single">
                    <img src="{{ asset('assets/images/logo_certificate_crc.png') }}" alt="{{ __('messages.home.certifications_alt') }}" class="cert-logos-img" onerror="this.style.display='none'; this.nextElementSibling?.classList.add('show');" />
                    <div class="cert-logos-fallback" aria-hidden="true">{{ __('messages.home.certifications_fallback') }}</div>
                </div>
            </div>
            <div class="cert-panel-divider" aria-hidden="true"></div>
            <div class="cert-panel cert-panel-image">
                <div class="cert-image-slot">
                    <img src="{{ asset('assets/images/Sertifikat-RSPO.jpeg') }}" alt="{{ __('messages.home.rspo_alt') }}" class="cert-certificate-img" onerror="this.style.display='none'; this.nextElementSibling?.classList.add('show');" />
                    <div class="cert-image-fallback" aria-hidden="true">{{ __('messages.home.rspo_fallback') }}</div>
                </div>
            </div>
        </div>
        <p class="home-certifications-tagline">
            {{ __('messages.home.cert_tagline') }}
        </p>
    </div>
</section>
@endsection
