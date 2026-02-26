@extends('layouts.app')

@section('title', 'About Us – Cisadane Raya Chemical')
@section('description', 'Learn about Cisadane Raya Chemical: our mission, vision, and commitment to sustainability.')

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
                “Nurturing Human Life Through the Gifts of the Palm Since 1975”
            </h2>
            <p class="commitment-hero-text">
                For centuries, the palm has quietly sustained human civilization by nourishing bodies, supporting homes, and enabling industries that shape modern life. Since 1975, PT Cisadane Raya Chemicals has carried this legacy forward, transforming palm-based resources into refined edible oils and oleochemical solutions that touch everyday living across cultures and continents.
            </p>
            <p class="commitment-hero-text">
                Rooted in Indonesia and connected to global markets, CRC combines decades of downstream expertise with disciplined processing and quality-driven operations. Our products serve food manufacturers, personal care brands, home care producers, and industrial partners, providing essential inputs that support safety, functionality, and reliability throughout the value chain.
            </p>
        </div>

        <div class="commitment-detail-list">
            <article class="commitment-detail-card">
                <h3 class="commitment-detail-title">Who We Are</h3>
                <p class="commitment-detail-text">
                    PT Cisadane Raya Chemicals (CRC), established in 1975, is a leading downstream producer of refined edible oils and oleochemical derivatives. With decades of operational experience, CRC supports Indonesia’s domestic industries and supplies international markets with consistent, reliable, and responsible products.
                </p>
            </article>

            <article class="commitment-detail-card">
                <h3 class="commitment-detail-title">What We Do</h3>
                <p class="commitment-detail-text">
                    CRC converts palm oil into high-quality refined edible oils and a broad range of oleochemical products used across food, personal care, home care, and industrial applications.
                </p>
            </article>

            <article class="commitment-detail-card">
                <h3 class="commitment-detail-title">Our Commitment</h3>
                <p class="commitment-detail-text">
                    CRC operates with a strong focus on responsible processing, regulatory compliance, and continuous improvement to meet evolving customer needs, sustainability requirements, and global supply chain expectations.
                </p>
            </article>
        </div>
    </div>
</section>
@endsection
