@extends('layouts.app')

@section('title', 'Cisadane Raya Chemical – Overview')
@section('description', 'Cisadane Raya Chemical is a leading sustainable organization committed to excellence and environmental responsibility.')

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
            <h2 class="green-box-title">Nurturing Human Life Through the Gifts of the Palm Since 1975</h2>
            <p class="green-box-text">
                Providing the essential elements that cradle human living, born from nature, refined with care, and carried forward through a chain of hands committed to responsibility and compassion.
            </p>
            <a href="{{ route('company.about') }}">
                <button class="btn-primary green-box-button" type="button">
                    LEARN MORE ABOUT US
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
            {{-- Left: white box – single image with all certification logos (upload to assets/certifications/) --}}
            <div class="cert-panel cert-panel-icons">
                <div class="cert-logos-single">
                    <img src="{{ asset('assets/images/logo_certificate_crc.png') }}" alt="Certifications: RSPO, ISO 9001, GMP+, Halal Indonesia, ISCC, FSSC 22000, SMETA Sedex" class="cert-logos-img" onerror="this.style.display='none'; this.nextElementSibling?.classList.add('show');" />
                    <div class="cert-logos-fallback" aria-hidden="true">Certifications</div>
                </div>
            </div>
            <div class="cert-panel-divider" aria-hidden="true"></div>
            {{-- Right: RSPO certificate document --}}
            <div class="cert-panel cert-panel-image">
                <div class="cert-image-slot">
                    <img src="{{ asset('assets/images/Sertifikat-RSPO.jpeg') }}" alt="RSPO Certificate – PT. Cisadane Raya Chemical" class="cert-certificate-img" onerror="this.style.display='none'; this.nextElementSibling?.classList.add('show');" />
                    <div class="cert-image-fallback" aria-hidden="true">RSPO Certificate</div>
                </div>
            </div>
        </div>
        <p class="home-certifications-tagline">
            Turning nature's versatility into palm-based food products and advanced oleochemicals
        </p>
    </div>
</section>
@endsection
