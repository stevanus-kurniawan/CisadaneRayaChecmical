@extends('layouts.app')

@section('title', 'Sustainability – Cisadane Raya Chemical')
@section('description', 'Learn about Cisadane Raya Chemical sustainability commitments and certifications.')

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
                        alt="Sustainable Development Goals"
                    />
                </div>
                <div class="sustainability-hero-content">
                    <p class="sustainability-hero-text">
                        Since its establishment, PT Cisadane Raya Chemicals has believed that true progress is built together with the communities around us. As we carry out our operations, CRC grows alongside local communities, sharing responsibility, connection, and mutual care.
                    </p>
                </div>
            </div>
        </div>

        {{-- Section 3: Sustainability Downloads Grid --}}
        <div class="sustainability-download-grid" id="sustainability-downloads">
            <article class="sustainability-download-card">
                <p class="sustainability-download-text">
                    <strong>CRC’s sustainability</strong> approach is built on three pillars: Environmental Responsibility, Social Responsibility, and Governance &amp; Integrity.
                    These form the foundation of CRC’s Sustainability Policy Version 2, which strengthens our commitment to responsible downstream processing and sustainable supply chains.
                </p>
                <a href="#" class="sustainability-download-cta">
                    <span class="sustainability-download-icon">↓</span>
                    <span class="sustainability-download-label">Sustainability Policy</span>
                </a>
            </article>

            <article class="sustainability-download-card">
                <p class="sustainability-download-text">
                    <strong>CRC</strong> is committed to ensuring raw materials originate from reputable and transparent supply chains. As part of our responsible sourcing practices, CRC maintains a Deforestation-Free Supply Chain and works only with suppliers verified as not contributing to deforestation.
                </p>
                <a href="#" class="sustainability-download-cta">
                    <span class="sustainability-download-icon">↓</span>
                    <span class="sustainability-download-label">Our Sourcing Approach</span>
                </a>
            </article>

            <article class="sustainability-download-card">
                <p class="sustainability-download-text">
                    <strong>CRC’s Code of Conduct</strong> reflects our commitment to treating people with respect and conducting business with integrity, transparency, and care.
                </p>
                <a href="#" class="sustainability-download-cta">
                    <span class="sustainability-download-icon">↓</span>
                    <span class="sustainability-download-label">Code of Conduct</span>
                </a>
            </article>

            <article class="sustainability-download-card">
                <p class="sustainability-download-text">
                    Through our <strong>CSR efforts, CRC</strong> works to improve quality of life, empower communities, and ensure that our growth brings shared benefits to the people around us.
                </p>
                <a href="#" class="sustainability-download-cta">
                    <span class="sustainability-download-icon">↓</span>
                    <span class="sustainability-download-label">Corporate Social Responsibility</span>
                </a>
            </article>
        </div>
    </div>
</section>

@endsection
