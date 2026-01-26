<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Creates all required pages with case-insensitive, trimmed slug handling.
     */
    public function run(): void
    {
        // Helper function to normalize slug (case-insensitive, trimmed)
        $normalizeSlug = function ($slug) {
            return trim(strtolower($slug));
        };

        $pages = [
            [
                'slug' => $normalizeSlug('home'),
                'title' => 'Home',
                'meta_title' => 'Cisadane Raya Chemical – Sustainable Solutions',
                'meta_description' => 'Cisadane Raya Chemical is a modern, sustainable organization committed to excellence and environmental responsibility.',
                'status' => 'published',
                'banner' => [
                    'title' => 'Welcome to Cisadane Raya Chemical',
                    'subtitle' => 'Sustainable Solutions for a Better Future',
                    'image' => 'assets/HEADER CISADANE RAYA CHEMICAL.png'
                ]
            ],
            [
                'slug' => $normalizeSlug('company-about-us'),
                'title' => 'About Us',
                'meta_title' => 'About Us – Cisadane Raya Chemical',
                'meta_description' => 'Learn about Cisadane Raya Chemical, our mission, values, and commitment to sustainability.',
                'status' => 'published',
                'banner' => [
                    'title' => 'About Us',
                    'subtitle' => 'Our Story and Mission',
                    'image' => 'assets/HEADER CISADANE RAYA CHEMICAL.png'
                ]
            ],
            [
                'slug' => $normalizeSlug('company-location'),
                'title' => 'Location',
                'meta_title' => 'Location – Cisadane Raya Chemical',
                'meta_description' => 'Find our office locations and contact information.',
                'status' => 'published',
                'banner' => [
                    'title' => 'Our Location',
                    'subtitle' => 'Visit Us',
                    'image' => 'assets/HEADER CISADANE RAYA CHEMICAL.png'
                ]
            ],
            [
                'slug' => $normalizeSlug('company-sustainability'),
                'title' => 'Sustainability',
                'meta_title' => 'Sustainability – Cisadane Raya Chemical',
                'meta_description' => 'Our commitment to sustainable practices and environmental responsibility.',
                'status' => 'published',
                'banner' => [
                    'title' => 'Sustainability',
                    'subtitle' => 'Our Environmental Commitment',
                    'image' => 'assets/HEADER CISADANE RAYA CHEMICAL.png'
                ]
            ],
            [
                'slug' => $normalizeSlug('company-commercial-partner'),
                'title' => 'Commercial Partner',
                'meta_title' => 'Commercial Partner – Cisadane Raya Chemical',
                'meta_description' => 'Partner with Cisadane Raya Chemical for sustainable business solutions.',
                'status' => 'published',
                'banner' => [
                    'title' => 'Commercial Partner',
                    'subtitle' => 'Partner With Us',
                    'image' => 'assets/HEADER CISADANE RAYA CHEMICAL.png'
                ]
            ],
            [
                'slug' => $normalizeSlug('product-feedstocks'),
                'title' => 'Feedstocks',
                'meta_title' => 'Feedstocks – Cisadane Raya Chemical Products',
                'meta_description' => 'Explore our range of sustainable feedstock products.',
                'status' => 'published',
                'banner' => [
                    'title' => 'Feedstocks',
                    'subtitle' => 'Sustainable Feedstock Solutions',
                    'image' => 'assets/HEADER CISADANE RAYA CHEMICAL.png'
                ]
            ],
            [
                'slug' => $normalizeSlug('product-methyl-ester'),
                'title' => 'Methyl Ester',
                'meta_title' => 'Methyl Ester – Cisadane Raya Chemical Products',
                'meta_description' => 'High-quality methyl ester products for various applications.',
                'status' => 'published',
                'banner' => [
                    'title' => 'Methyl Ester',
                    'subtitle' => 'Premium Quality Products',
                    'image' => 'assets/HEADER CISADANE RAYA CHEMICAL.png'
                ]
            ],
            [
                'slug' => $normalizeSlug('product-other'),
                'title' => 'Other Products',
                'meta_title' => 'Other Products – Cisadane Raya Chemical',
                'meta_description' => 'Discover our other sustainable product offerings.',
                'status' => 'published',
                'banner' => [
                    'title' => 'Other Products',
                    'subtitle' => 'Additional Solutions',
                    'image' => 'assets/HEADER CISADANE RAYA CHEMICAL.png'
                ]
            ],
            [
                'slug' => $normalizeSlug('contact-us-fulfill-form'),
                'title' => 'Fulfill Form',
                'meta_title' => 'Contact Form – Cisadane Raya Chemical',
                'meta_description' => 'Get in touch with Cisadane Raya Chemical. Fill out our contact form.',
                'status' => 'published',
                'banner' => [
                    'title' => 'Contact Us',
                    'subtitle' => 'Fill Out Our Form',
                    'image' => 'assets/HEADER CISADANE RAYA CHEMICAL.png'
                ]
            ],
            [
                'slug' => $normalizeSlug('contact-us-contacts'),
                'title' => 'Contacts',
                'meta_title' => 'Contacts – Cisadane Raya Chemical',
                'meta_description' => 'Contact information for Cisadane Raya Chemical offices and departments.',
                'status' => 'published',
                'banner' => [
                    'title' => 'Contacts',
                    'subtitle' => 'Get in Touch',
                    'image' => 'assets/HEADER CISADANE RAYA CHEMICAL.png'
                ]
            ],
        ];

        foreach ($pages as $pageData) {
            Page::updateOrCreate(
                ['slug' => $pageData['slug']],
                $pageData
            );
        }
    }
}
