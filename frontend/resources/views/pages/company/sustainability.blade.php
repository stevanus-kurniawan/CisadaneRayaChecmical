@extends('layouts.app')

@section('title', __('messages.company.sustainability.meta_title'))
@section('description', __('messages.company.sustainability.meta_description'))

@section('content')
<div class="sustainability-page">
{{-- Section 1: Banner --}}
<section class="section banner-section">
    <div class="container banner-container">
        <div class="about-banner">
            <div
                class="about-banner-background"
                style="background-image: url('{{ asset('assets/banners/sustainability-policy.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;"
            ></div>
        </div>
    </div>
</section>

{{-- Section 2: Community & Responsibility (hero card with image + text) --}}
<section class="section sustainability-intro-section" id="sustainability-policy">
    <div class="container">
        <div class="green-box sustainability-hero">
            <div class="sustainability-hero-grid">
                <div class="sustainability-hero-media">
                    <img
                        src="{{ asset('assets/images/sdg-goals.png') }}"
                        alt="{{ __('messages.company.sustainability.sdg_alt') }}"
                    />
                </div>
                <div class="sustainability-hero-content">
                    <p class="sustainability-hero-text">
                        {{ __('messages.company.sustainability.hero_text') }}
                    </p>
                </div>
            </div>
        </div>

        {{-- Section 3: Sustainability Downloads Grid --}}
        <div class="sustainability-download-grid" id="sustainability-downloads">
            <article class="sustainability-download-card">
                <p class="sustainability-download-text">
                    {!! __('messages.company.sustainability.card1_text') !!}
                </p>
                <a href="{{ asset('documents/sustainability-policy.pdf') }}" class="sustainability-download-cta" download>
                    <span class="sustainability-download-icon">↓</span>
                    <span class="sustainability-download-label">{{ __('messages.company.sustainability.card1_label') }}</span>
                </a>
            </article>

            <article class="sustainability-download-card">
                <p class="sustainability-download-text">
                    {!! __('messages.company.sustainability.card2_text') !!}
                </p>
                <a href="{{ asset('documents/our-sourcing-approach.pdf') }}" class="sustainability-download-cta" download>
                    <span class="sustainability-download-icon">↓</span>
                    <span class="sustainability-download-label">{{ __('messages.company.sustainability.card2_label') }}</span>
                </a>
            </article>

            <article class="sustainability-download-card">
                <p class="sustainability-download-text">
                    {!! __('messages.company.sustainability.card3_text') !!}
                </p>
                <a href="{{ asset('documents/code-of-conduct.pdf') }}" class="sustainability-download-cta" download>
                    <span class="sustainability-download-icon">↓</span>
                    <span class="sustainability-download-label">{{ __('messages.company.sustainability.card3_label') }}</span>
                </a>
            </article>

            <article class="sustainability-download-card">
                <p class="sustainability-download-text">
                    {!! __('messages.company.sustainability.card4_text') !!}
                </p>
                <a href="{{ asset('documents/corporate-social-responsibility.pdf') }}" class="sustainability-download-cta" download>
                    <span class="sustainability-download-icon">↓</span>
                    <span class="sustainability-download-label">{{ __('messages.company.sustainability.card4_label') }}</span>
                </a>
            </article>
        </div>
    </div>
</section>

@endsection
