@extends('layouts.app')

@section('title', 'Business / Products / Services – Cisadane Raya Chemicals')
@section('description', 'Explore Cisadane Raya Chemicals business portfolio, products, and services.')

@section('content')
<section class="section">
    <div class="container">
        <div class="section-header">
            <div class="section-kicker">Our business</div>
            <h1 class="section-title">Products &amp; Services</h1>
            <p class="section-description">
                This section will showcase Cisadane Raya Chemicals's business lines, products, and services.
                Content will be fully manageable through the CMS.
            </p>
        </div>

        <div class="grid-3">
            <article class="card">
                <div class="card-header">
                    <div class="card-icon">📦</div>
                    <h3 class="card-title">Product Line 1</h3>
                </div>
                <p class="card-body">
                    Description of product or service area. This content will be editable via CMS.
                </p>
            </article>

            <article class="card">
                <div class="card-header">
                    <div class="card-icon">🔧</div>
                    <h3 class="card-title">Service Area</h3>
                </div>
                <p class="card-body">
                    Description of service offerings. This content will be editable via CMS.
                </p>
            </article>

            <article class="card">
                <div class="card-header">
                    <div class="card-icon">🌿</div>
                    <h3 class="card-title">Sustainable Solutions</h3>
                </div>
                <p class="card-body">
                    Overview of sustainability-focused products and services. This content will be editable via CMS.
                </p>
            </article>
        </div>
    </div>
</section>
@endsection

