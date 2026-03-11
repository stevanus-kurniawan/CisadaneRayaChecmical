@extends('layouts.app')

@section('title', 'Certification Sustainability Report – Cisadane Raya Chemicals')
@section('description', 'Overview of Cisadane Raya Chemicals certifications and sustainability reporting across global markets.')

@section('content')
<div class="sustainability-page">
{{-- Section 1: Banner --}}
<section class="section banner-section">
    <div class="container banner-container">
        <div class="about-banner">
            <div
                class="about-banner-background"
                style="background-image: url('{{ asset('assets/banners/sustainability-cert-report.jpeg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;"
            ></div>
        </div>
    </div>
</section>

{{-- Section 2: Certification Sustainability Report --}}
<section class="section sustainability-cert-report-section">
    <div class="container">
        {{-- Top: Certification hero box with logos --}}
        <div class="green-box sustainability-cert-hero">
            <h2 class="sustainability-cert-title">CERTIFICATION</h2>
            <p class="sustainability-cert-text">
                We maintains a comprehensive set of international certifications that demonstrate our commitment to quality, safety, ethical conduct, and responsible sourcing. These certifications support our customers’ requirements across food, feed, oleochemical, and sustainability-driven markets worldwide.
            </p>
            <div class="sustainability-cert-logos">
                <img src="{{ asset('assets/certifications/rspo.png') }}" alt="RSPO" />
                <img src="{{ asset('assets/certifications/iso9001.png') }}" alt="ISO 9001:2015" />
                <img src="{{ asset('assets/certifications/gmp-plus.png') }}" alt="GMP+ Feed Safety Assurance" />
                <img src="{{ asset('assets/certifications/halal-indonesia.png') }}" alt="Halal Certification" />
                <img src="{{ asset('assets/certifications/iscc.png') }}" alt="ISCC" />
                <img src="{{ asset('assets/certifications/fssc22000.png') }}" alt="FSSC 22000" />
                <img src="{{ asset('assets/certifications/smeta-sedex.png') }}" alt="SMETA Sedex" />
            </div>
        </div>

        {{-- Global Market Access Certifications --}}
        <div class="cert-report-block cert-report-block--green">
            <div class="cert-report-pill cert-report-pill--white">
                Global Market Access Certifications
            </div>
            <div class="cert-report-body cert-report-body--green">
                <p>
                    <strong>US FDA Food Facility Registration</strong><br>
                    Enables CRC to export food-grade materials to the United States in compliance with FDA regulatory requirements.
                </p>
                <p>
                    <strong>GACC – China Food Facility Registration</strong><br>
                    Allows CRC to supply food-related products to China in line with import controls and food safety provisions.
                </p>
            </div>
        </div>

        {{-- Quality, Food Safety & Process Integrity --}}
        <div class="cert-report-block cert-report-block--white">
            <div class="cert-report-pill cert-report-pill--green">
                Quality, Food Safety &amp; Process Integrity
            </div>
            <div class="cert-report-body cert-report-body--brand">
                <p>
                    <strong>RSPO SCCS – Supply Chain Certification System</strong><br>
                    Ensures certified palm-based materials handled by CRC follow RSPO sustainability and traceability requirements.
                </p>
                <p>
                    <strong>ISCC EU – International Sustainability &amp; Carbon Certification</strong><br>
                    Verifies CRC’s compliance with EU sustainability, traceability, and greenhouse gas requirements for regulated markets.
                </p>
                <p>
                    <strong>SEDEX SMETA – Ethical Trade Audit</strong><br>
                    Assesses labor rights, health and safety, environmental management, and business ethics, demonstrating CRC’s commitment to responsible and ethical operations.
                </p>
            </div>
        </div>

        {{-- Ethical, Sustainable & Responsible Supply Chain Certifications --}}
        <div class="cert-report-block cert-report-block--green-alt">
            <div class="cert-report-pill cert-report-pill--white">
                Ethical, Sustainable &amp; Responsible Supply Chain Certifications
            </div>
            <div class="cert-report-body cert-report-body--green">
                <p>
                    <strong>ISO 9001 – Quality Management System</strong><br>
                    Ensures consistent product quality and controlled processes through a globally recognized management system.
                </p>
                <p>
                    <strong>FSSC 22000 – Food Safety System Certification</strong><br>
                    Confirms that CRC operates a robust food safety system suitable for food and food-related applications.
                </p>
                <p>
                    <strong>HALAL Certification (Decree &amp; Certificate)</strong><br>
                    Guarantees that CRC’s products and processes meet Halal requirements, supporting access to Halal-sensitive markets.
                </p>
                <p>
                    <strong>GMP+ Feed Safety Assurance</strong><br>
                    Demonstrates compliance with international feed safety standards for materials used in feed and feed-related industries.
                </p>
            </div>
        </div>
    </div>
</section>
</div>
@endsection

