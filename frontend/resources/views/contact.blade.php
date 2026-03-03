@extends('layouts.app')

@php
$banner = [
    'title' => 'Contact Us',
    'subtitle' => 'Get in Touch',
    'image' => 'assets/HEADER CISADANE RAYA CHEMICAL.png'
];
@endphp

@section('title', 'Contact Us – Cisadane Raya Chemical')
@section('description', 'Get in touch with Cisadane Raya Chemical for corporate, partnership, or sustainability inquiries.')

@section('content')
<section class="section">
    <div class="container contact-grid">
        <div>
            <div class="section-kicker">Contact us</div>
            <h1 class="section-title">We'd love to hear from you.</h1>
            <p class="section-description">
                Use this form to reach Cisadane Raya Chemical for corporate,
                partnership, or sustainability-related inquiries. Your message
                will be routed to the right team, logged, and handled with care.
            </p>

            <div class="card" style="margin-top: 1.5rem">
                <div class="card-header">
                    <div class="card-icon">📍</div>
                    <h3 class="card-title">PT Cisadane Raya Chemicals</h3>
                </div>
                <ul class="card-list">
                    <li><strong>Address:</strong> Jl. Imam Bonjol No. 88, RT 001/RW 004 Bojong Jaya, Kecamatan Karawaci, Kota Tangerang, Banten 15115 – Indonesia</li>
                    <li><strong>Phone:</strong> (021) 5520522</li>
                    <li><strong>Email:</strong> info@crc.com</li>
                </ul>
            </div>

            <div class="contact-location">
                <a
                    href="https://maps.app.goo.gl/wpcBfd42WCuKwapNA"
                    target="_blank"
                    rel="noopener"
                    class="contact-map-link"
                    aria-label="Open PT Cisadane Raya Chemicals location in Google Maps"
                >
                    <div class="contact-map-frame">
                        <iframe
                            src="https://www.google.com/maps?q=PT+Cisadane+Raya+Chemicals,+Jl.+Imam+Bonjol+No.+88,+Karawaci&output=embed"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            aria-hidden="true"
                        ></iframe>
                        <div class="contact-map-overlay">
                            <span>Open in Google&nbsp;Maps</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div>
            <form class="contact-card" data-contact-form action="{{ route('contact.submit') }}" method="POST">
                @csrf
                <div class="field-row">
                    <div class="field">
                        <label for="name">
                            Name
                            <span>*</span>
                        </label>
                        <input id="name" name="name" type="text" required value="{{ old('name') }}" />
                        @error('name')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="field">
                        <label for="company">
                            Company
                        </label>
                        <input id="company" name="company" type="text" value="{{ old('company') }}" />
                        @error('company')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="field-row">
                    <div class="field">
                        <label for="email">
                            Email
                            <span>*</span>
                        </label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            inputmode="email"
                            required
                            value="{{ old('email') }}"
                        />
                        @error('email')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="field">
                        <label for="phone">
                            Phone
                            <span style="color: #6b7280; margin-left: 0">(optional)</span>
                        </label>
                        <input
                            id="phone"
                            name="phone"
                            type="tel"
                            inputmode="tel"
                            value="{{ old('phone') }}"
                        />
                        @error('phone')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="subject">
                        Subject
                        <span>*</span>
                    </label>
                    <input id="subject" name="subject" type="text" required value="{{ old('subject') }}" />
                    @error('subject')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="field">
                    <label for="message">
                        Message
                        <span>*</span>
                    </label>
                    <textarea id="message" name="message" required>{{ old('message') }}</textarea>
                    @error('message')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-footer">
                    <div class="captcha">
                        Protected by basic anti-spam &mdash; please avoid sending
                        automated submissions.
                    </div>
                    <button class="btn-primary" type="submit">
                        Send inquiry
                    </button>
                </div>

                <p class="form-note">
                    By submitting this form you agree that Cisadane Raya Chemical may
                    store and process the information provided for the purpose of
                    responding to your inquiry.
                </p>

                @if(session('success'))
                    <div class="alert alert-success" data-contact-alert>
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-error" data-contact-alert>
                        {{ session('error') }}
                    </div>
                @endif
            </form>
        </div>
    </div>
</section>
@endsection

