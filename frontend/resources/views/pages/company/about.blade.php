@extends('layouts.app')

@section('title', __('messages.company.about.meta_title'))
@section('description', __('messages.company.about.meta_description'))

@section('content')
{{-- Section 1: Banner --}}
<section class="section banner-section">
    <div class="container banner-container">
        <div class="about-banner">
            <div
                class="about-banner-background"
                style="background-image: url('{{ asset('assets/banners/about.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;"
            ></div>
        </div>
    </div>
</section>

{{-- Section 2: Our Commitment – hero card mirrored from home page --}}
<section class="section commitment-section">
    <div class="container">
        <div class="commitment-hero-card">
            <h2 class="commitment-hero-title">
                {{ __('messages.company.about.hero_title') }}
            </h2>
            <p class="commitment-hero-text">
                {{ __('messages.company.about.hero_paragraph1') }}
            </p>
            <p class="commitment-hero-text">
                {{ __('messages.company.about.hero_paragraph2') }}
            </p>
        </div>

        <div class="commitment-detail-list">
            <article class="commitment-detail-card">
                <h3 class="commitment-detail-title">{{ __('messages.company.about.who_we_are') }}</h3>
                <p class="commitment-detail-text">
                    {{ __('messages.company.about.who_we_are_text') }}
                </p>
            </article>

            <article class="commitment-detail-card">
                <h3 class="commitment-detail-title">{{ __('messages.company.about.what_we_do') }}</h3>
                <p class="commitment-detail-text">
                    {{ __('messages.company.about.what_we_do_text') }}
                </p>
            </article>

            <article class="commitment-detail-card">
                <h3 class="commitment-detail-title">{{ __('messages.company.about.our_commitment') }}</h3>
                <p class="commitment-detail-text">
                    {{ __('messages.company.about.our_commitment_text') }}
                </p>
            </article>
        </div>
    </div>
</section>
@endsection
