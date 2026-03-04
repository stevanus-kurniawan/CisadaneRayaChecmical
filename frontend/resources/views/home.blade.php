@extends('layouts.app')

@section('title', __('messages.home.meta_title'))
@section('description', __('messages.home.meta_description'))

@php
    // Six certificates – replace paths below with your image files in public/assets/images/certificates/
    $certificates = [
        ['src' => 'assets/images/certificates/iso-9001.png', 'alt' => __('messages.home.cert_iso9001')],
        ['src' => 'assets/images/certificates/gmp-plus-fsa.png', 'alt' => __('messages.home.cert_gmp_fsa')],
        ['src' => 'assets/images/certificates/eu-iscc.png', 'alt' => __('messages.home.cert_eu_iscc')],
        ['src' => 'assets/images/certificates/fssc.png', 'alt' => __('messages.home.cert_fssc')],
        ['src' => 'assets/images/certificates/halal.png', 'alt' => __('messages.home.cert_halal')],
        ['src' => 'assets/images/certificates/rspo.png', 'alt' => __('messages.home.cert_rspo')],
    ];
@endphp

@section('content')
{{-- Section 1: Banner --}}
<section class="home-banner">
    <div
        class="home-banner-background"
        style="background-image: url('{{ asset('assets/banners/home.jpeg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;"
    ></div>
</section>

{{-- Section 2: Green Box (Nurturing Human Life...) --}}
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

{{-- Section 3: Certifications – logos row, then certificate carousel --}}
<section class="home-certifications-section" aria-labelledby="home-cert-heading">
    <div class="home-certifications-bg" aria-hidden="true"></div>
    <div class="container home-certifications-content">
        <h2 id="home-cert-heading" class="visually-hidden">{{ __('messages.home.certifications_fallback') }}</h2>
        {{-- Certification logos row --}}
        <div class="home-cert-logos-row">
            <div class="cert-logos-single">
                <img src="{{ asset('assets/images/logo_certificate_crc.png') }}" alt="{{ __('messages.home.certifications_alt') }}" class="cert-logos-img" onerror="this.style.display='none'; this.nextElementSibling?.classList.add('show');" />
                <div class="cert-logos-fallback" aria-hidden="true">{{ __('messages.home.certifications_fallback') }}</div>
            </div>
        </div>

        {{-- Certificates carousel: one certificate at a time, left/right arrows --}}
        <div class="home-certificates-carousel-wrap">
            <div class="home-certificates-carousel" id="home-certificates-carousel" data-certificates-carousel aria-label="{{ __('messages.home.certifications_fallback') }}">
                <button type="button" class="home-cert-carousel-arrow home-cert-carousel-prev" data-carousel-prev aria-label="{{ __('messages.home.carousel_prev') }}">
                    <span aria-hidden="true">&#9664;</span>
                </button>
                <div class="home-cert-carousel-inner">
                    <div class="home-cert-carousel-track" data-carousel-track>
                        @foreach ($certificates as $cert)
                            <div class="home-cert-carousel-slide" data-carousel-slide>
                                <div class="home-certificate-slot">
                                    <img src="{{ asset($cert['src']) }}" alt="{{ $cert['alt'] }}" class="cert-certificate-img" loading="lazy" onerror="this.style.display='none'; this.nextElementSibling?.classList.add('show');" />
                                    <div class="cert-image-fallback" aria-hidden="true">{{ __('messages.home.certifications_fallback') }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="button" class="home-cert-carousel-arrow home-cert-carousel-next" data-carousel-next aria-label="{{ __('messages.home.carousel_next') }}">
                    <span aria-hidden="true">&#9654;</span>
                </button>
            </div>
            <div class="home-cert-carousel-dots" data-carousel-dots aria-hidden="true">
                @foreach ($certificates as $index => $cert)
                    <button type="button" class="home-cert-carousel-dot {{ $index === 0 ? 'is-active' : '' }}" data-carousel-dot data-index="{{ $index }}" aria-label="{{ __('messages.home.certifications_fallback') }} {{ $index + 1 }}"></button>
                @endforeach
            </div>
        </div>

        {{-- Tagline at bottom of section, above footer --}}
        <p class="home-certifications-tagline">
            {{ __('messages.home.cert_tagline') }}
        </p>
    </div>
</section>
@endsection

@push('scripts')
<script>
(function () {
  const carousel = document.querySelector('[data-certificates-carousel]');
  const track = document.querySelector('[data-carousel-track]');
  const slides = document.querySelectorAll('[data-carousel-slide]');
  const prevBtn = document.querySelector('[data-carousel-prev]');
  const nextBtn = document.querySelector('[data-carousel-next]');
  const dots = document.querySelectorAll('[data-carousel-dot]');

  if (!carousel || !track || !slides.length) return;

  let currentIndex = 0;
  const total = slides.length;

  function goTo(index) {
    currentIndex = ((index % total) + total) % total;
    const offset = -currentIndex * 100;
    track.style.transform = 'translateX(' + offset + '%)';
    if (prevBtn) prevBtn.disabled = false;
    if (nextBtn) nextBtn.disabled = false;
    dots.forEach(function (dot, i) {
      dot.classList.toggle('is-active', i === currentIndex);
    });
  }

  if (prevBtn) prevBtn.addEventListener('click', function () { goTo(currentIndex - 1); });
  if (nextBtn) nextBtn.addEventListener('click', function () { goTo(currentIndex + 1); });
  dots.forEach(function (dot) {
    var idx = parseInt(dot.getAttribute('data-index'), 10);
    if (!isNaN(idx)) dot.addEventListener('click', function () { goTo(idx); });
  });

  goTo(0);
})();
</script>
@endpush
