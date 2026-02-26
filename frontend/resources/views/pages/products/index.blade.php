@extends('layouts.app')

@section('title', 'Products – Cisadane Raya Chemical')
@section('description', 'Explore our range of sustainable products including feedstocks, methyl ester, and other solutions.')

@section('content')
{{-- Section 1: Banner --}}
<section class="section banner-section">
    <div class="container banner-container">
        <div class="about-banner">
            <div
                class="about-banner-background"
                style="background-image: url('{{ asset('assets/banners/products.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;"
            ></div>
        </div>
    </div>
</section>

{{-- Section 2: Portfolio Hero + Product Grid --}}
<section class="section">
    <div class="container">
        {{-- Hero card, same styling as green-box on home --}}
        <div class="green-box products-portfolio-hero">
            <h2 class="green-box-title">Our High-Quality Oleochemical Portfolio</h2>
        </div>

        {{-- Three-product portfolio grid --}}
        <div class="products-portfolio-grid">
            {{-- Palm Oil --}}
            <article class="products-portfolio-card">
                <div class="products-portfolio-image">
                    <x-app-image 
                        src="{{ asset('assets/images/feedstocks-palm-oil.png') }}" 
                        alt="Palm Oil"
                        fill
                        sizes="(max-width: 768px) 100vw, 33vw"
                    />
                </div>
                <h3 class="products-portfolio-title">Palm Oil</h3>
                <ul class="products-portfolio-list">
                    <li>RBD Palm Oil</li>
                    <li>RBD Palm Olein</li>
                    <li>RBD Palm Stearin</li>
                    <li>Crude Palm Oil - CPO</li>
                    <li>Crude Palm Kernel Oil - CPKO</li>
                    <li>Palm Fatty Acid Distillate - PFAD</li>
                    <li>RBD Palm Kernel Olein</li>
                </ul>
            </article>

            {{-- Glycerin --}}
            <article class="products-portfolio-card">
                <div class="products-portfolio-image">
                    <x-app-image 
                        src="{{ asset('assets/images/methyl-ester.png') }}" 
                        alt="Glycerin"
                        fill
                        sizes="(max-width: 768px) 100vw, 33vw"
                    />
                </div>
                <h3 class="products-portfolio-title">Glycerin</h3>
                <ul class="products-portfolio-list">
                    <li>Refined Glycerine 99.7% Min</li>
                    <li>Refined Glycerine 99.5% Min</li>
                    <li>Crude Glycerine 80% Min</li>
                </ul>
            </article>

            {{-- Fatty Acid --}}
            <article class="products-portfolio-card">
                <div class="products-portfolio-image">
                    <x-app-image 
                        src="{{ asset('assets/images/others.jpeg') }}" 
                        alt="Fatty Acid"
                        fill
                        sizes="(max-width: 768px) 100vw, 33vw"
                    />
                </div>
                <h3 class="products-portfolio-title">Fatty Acid</h3>
                <ul class="products-portfolio-list">
                    <li>Lauric Acid C12-99% Min</li>
                    <li>Myristic Acid C14-99% Min</li>
                    <li>Palmitic Acid C16-98% Min</li>
                    <li>Stearic Acid C18-38% Min</li>
                    <li>Strearic Acid C18-45% Min</li>
                    <li>Rubber grade Stearic Acid</li>
                    <li>Oleic Acid 75% Min</li>
                </ul>
            </article>
        </div>
    </div>
</section>
@endsection
