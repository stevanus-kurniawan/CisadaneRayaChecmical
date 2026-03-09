@extends('layouts.app')

@section('title', __('messages.products.meta_title'))
@section('description', __('messages.products.meta_description'))

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
        <div class="green-box products-portfolio-hero">
            <h2 class="green-box-title">{{ __('messages.products.portfolio_title') }}</h2>
        </div>

        <div class="products-portfolio-grid">
            <article class="products-portfolio-card">
                <div class="products-portfolio-image">
                    <x-app-image 
                        src="{{ asset('assets/images/feedstocks-palm-oil.png') }}" 
                        alt="{{ __('messages.products.palm_oil') }}"
                        fill
                        sizes="(max-width: 768px) 100vw, 33vw"
                    />
                </div>
                <h3 class="products-portfolio-title">{{ __('messages.products.palm_oil') }}</h3>
                <ul class="products-portfolio-list">
                    @foreach(__('messages.products.palm_oil_items') as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </article>

            <article class="products-portfolio-card">
                <div class="products-portfolio-image">
                    <x-app-image 
                        src="{{ asset('assets/images/methyl-ester.png') }}" 
                        alt="{{ __('messages.products.glycerin') }}"
                        fill
                        sizes="(max-width: 768px) 100vw, 33vw"
                    />
                </div>
                <h3 class="products-portfolio-title">{{ __('messages.products.glycerin') }}</h3>
                <ul class="products-portfolio-list">
                    @foreach(__('messages.products.glycerin_items') as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </article>

            <article class="products-portfolio-card">
                <div class="products-portfolio-image">
                    <x-app-image 
                        src="{{ asset('assets/images/others.png') }}" 
                        alt="{{ __('messages.products.fatty_acid') }}"
                        fill
                        sizes="(max-width: 768px) 100vw, 33vw"
                    />
                </div>
                <h3 class="products-portfolio-title">{{ __('messages.products.fatty_acid') }}</h3>
                <ul class="products-portfolio-list">
                    @foreach(__('messages.products.fatty_acid_items') as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </article>
        </div>
    </div>
</section>
@endsection
