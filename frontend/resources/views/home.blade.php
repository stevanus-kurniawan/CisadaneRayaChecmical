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
        {{-- White separator line (same width as logos rectangle, proportional gap above/below) --}}
        <div class="home-cert-separator" aria-hidden="true"></div>
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
                                <div class="home-certificate-slot home-certificate-slot-clickable" role="button" tabindex="0" data-cert-preview>
                                    <img src="{{ asset($cert['src']) }}" alt="{{ $cert['alt'] }}" class="cert-certificate-img" loading="lazy" onerror="this.style.display='none'; this.nextElementSibling?.classList.add('show');" data-cert-src="{{ asset($cert['src']) }}" data-cert-alt="{{ $cert['alt'] }}" />
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

@push('modals')
{{-- Certificate preview lightbox (rendered at body end so it appears above header) --}}
<div id="cert-preview-modal" class="cert-preview-modal" aria-hidden="true" role="dialog" aria-modal="true" aria-label="{{ __('messages.home.certifications_fallback') }}">
    <div class="cert-preview-backdrop" data-cert-preview-close></div>
    <div class="cert-preview-content">
        <button type="button" class="cert-preview-close" data-cert-preview-close aria-label="{{ __('messages.home.certificates_close') }}">&times;</button>
        <button type="button" class="cert-preview-arrow cert-preview-prev" data-cert-modal-prev aria-label="{{ __('messages.home.carousel_prev') }}">&#9664;</button>
        <img src="" alt="" class="cert-preview-img" />
        <button type="button" class="cert-preview-arrow cert-preview-next" data-cert-modal-next aria-label="{{ __('messages.home.carousel_next') }}">&#9654;</button>
    </div>
</div>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
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

  if (prevBtn) prevBtn.addEventListener('click', function () { goTo(currentIndex - 1); resetAuto(); });
  if (nextBtn) nextBtn.addEventListener('click', function () { goTo(currentIndex + 1); resetAuto(); });
  dots.forEach(function (dot) {
    var idx = parseInt(dot.getAttribute('data-index'), 10);
    if (!isNaN(idx)) dot.addEventListener('click', function () { goTo(idx); resetAuto(); });
  });

  var autoInterval = 3000;
  var autoTimer = null;
  function startAuto() {
    if (autoTimer) return;
    var modalEl = document.getElementById('cert-preview-modal');
    if (modalEl && modalEl.classList.contains('is-open')) return;
    autoTimer = setInterval(function () { goTo(currentIndex + 1); }, autoInterval);
  }
  function stopAuto() {
    if (autoTimer) { clearInterval(autoTimer); autoTimer = null; }
  }
  function resetAuto() {
    stopAuto();
    startAuto();
  }
  if (carousel) {
    carousel.addEventListener('mouseenter', stopAuto);
    carousel.addEventListener('mouseleave', startAuto);
  }

  var certificateList = [];
  slides.forEach(function (slide) {
    var img = slide.querySelector('.cert-certificate-img');
    if (img && img.src) certificateList.push({ src: img.src, alt: img.alt || '' });
  });

  var modal = document.getElementById('cert-preview-modal');
  var modalImg = modal ? modal.querySelector('.cert-preview-img') : null;
  var modalIndex = 0;
  function showModalAt(index) {
    modalIndex = ((index % total) + total) % total;
    if (!certificateList[modalIndex] || !modalImg) return;
    modalImg.src = certificateList[modalIndex].src;
    modalImg.alt = certificateList[modalIndex].alt;
    goTo(modalIndex);
  }
  var openPreview = function (index) {
    if (!modal || !modalImg || !certificateList.length) return;
    stopAuto();
    showModalAt(typeof index === 'number' ? index : currentIndex);
    modal.classList.add('is-open');
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
  };
  var closePreview = function () {
    if (!modal) return;
    modal.classList.remove('is-open');
    modal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
    startAuto();
  };
  carousel.querySelectorAll('[data-cert-preview]').forEach(function (el, idx) {
    el.addEventListener('click', function (e) {
      var img = el.querySelector('.cert-certificate-img');
      if (img && img.src) { e.preventDefault(); openPreview(idx); }
    });
    el.addEventListener('keydown', function (e) {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        var img = el.querySelector('.cert-certificate-img');
        if (img && img.src) openPreview(idx);
      }
    });
  });
  if (modal) {
    modal.querySelectorAll('[data-cert-preview-close]').forEach(function (btn) { btn.addEventListener('click', closePreview); });
    modal.addEventListener('click', function (e) { if (e.target === modal) closePreview(); });
    var modalPrevBtn = modal.querySelector('[data-cert-modal-prev]');
    var modalNextBtn = modal.querySelector('[data-cert-modal-next]');
    if (modalPrevBtn) modalPrevBtn.addEventListener('click', function (e) { e.stopPropagation(); showModalAt(modalIndex - 1); });
    if (modalNextBtn) modalNextBtn.addEventListener('click', function (e) { e.stopPropagation(); showModalAt(modalIndex + 1); });
    document.addEventListener('keydown', function (e) {
      if (!modal.classList.contains('is-open')) return;
      if (e.key === 'Escape') closePreview();
      else if (e.key === 'ArrowLeft') { e.preventDefault(); showModalAt(modalIndex - 1); }
      else if (e.key === 'ArrowRight') { e.preventDefault(); showModalAt(modalIndex + 1); }
    });
  }

  startAuto();
  goTo(0);
});
</script>
@endpush
