@extends('layout.layout')

@section('title', setting('site.title') . ' | ' . GoogleTranslate::trans('About Us', app()->getLocale()))

@section('content')

    <!-- breadcrumb part start -->
    <x-breadcrumb title="{{ GoogleTranslate::trans('About Us', app()->getLocale()) }}">
        <li><a href="/">{{ GoogleTranslate::trans('Accueil', app()->getLocale()) }}</a></li>
        <li>{{ GoogleTranslate::trans('About Us', app()->getLocale()) }}</li>
    </x-breadcrumb>

    <!-- about us part start -->
    <section class="about-area-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-image-one">
                        <img src="{{ asset('storage/'. $about->image1) }}" alt="about-two-img-1" class="img-fluid w-100">
                    </div>
                    <div class="about-image-two">
                        <img src="{{ asset('storage/'. $about->image2) }}" alt="about-two-img-2" class="img-fluid w-100">
                        <div class="experiance-outside">
                            <div class="experiance-box">
                                <h2 class="year">{{ $about->badge_title }}</h2>
                                <h6 class="experiance">{{ GoogleTranslate::trans($about->badge_text, app()->getLocale()) }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title-one">
                            <span class="sub-title uppercase no-after">{{ GoogleTranslate::trans('About Us', app()->getLocale()) }}</span>
                            <h2 class="title">{{ GoogleTranslate::trans($about->title, app()->getLocale()) }}</h2>
                        </div>
                        <div class="about-details">
                            {!! GoogleTranslate::trans($about->description, app()->getLocale()) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- working process part start -->
    @include('partials.working-process')

    <!-- counter part start -->
    @include('partials.counter')

    <!-- active employes part start -->
    <section class="active-employes-area-one">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <div class="section-title-one text-center">
                        <span class="sub-title uppercase dark">{{ GoogleTranslate::trans('Équipe active', app()->getLocale()) }}</span>
                        <h2 class="title">{{ GoogleTranslate::trans('Votre partenaire de confiance', app()->getLocale())}} </h2>
                    </div>
                </div>
            </div>
            <div class="row active-employes-slider">
                @foreach($teamMembers as $member)
                <div class="col-lg-4">
                    <div class="active-employes-item-one">
                        <div class="image">
                            <div class="d-block w-100">
                                <img src="{{ asset('storage/'. $member->photo) }}" alt="{{ $member->name }}" class="img-fluid w-100">
                            </div>
                        </div>
                        <div class="text text-center">
                            <div class="social-icon">
                                <ul class="list-unstyled">
                                    @if($member->phone)
                                        <li><a href="tel:{{ $member->phone }}"><i class="fa fa-solid fa-phone"></i></a></li>
                                    @endif
                                    @if($member->email)
                                        <li><a href="mailto:{{ $member->email }}"><i class="fa fa-solid fa-envelope"></i></a></li>
                                    @endif
                                    @if($member->linkedin)
                                        <li><a href="{{ $member->linkedin }}"><i class="fab fa-linkedin-in"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                            <h4 class="employee-title">{{ $member->name }}</h4>
                            <p>{{ $member->position }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- about us testimonial start -->
    <section class="about-us-testimonial-area">
        <div class="testimonial-area-bg">
            <div class="container">
                <div class="shape shape-1">
                    <svg width="100" height="75" viewBox="0 0 98 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="shape-colour" opacity="0.5"
                              d="M28 40.9062H29V39.597L27.7369 39.9415L28 40.9062ZM84 40.9062H85V39.597L83.7369 39.9415L84 40.9062ZM21 0.999994C32.0415 0.999994 41 9.95853 41 21H43C43 8.85396 33.146 -1.00001 21 -1.00001V0.999994ZM41 21V42H43V21H41ZM41 42C41 56.9739 28.7653 69 14 69V71C29.8597 71 43 58.0886 43 42H41ZM14 69C10.6148 69 8 66.3852 8 63H6C6 67.4898 9.51022 71 14 71V69ZM8 63C8 59.8131 10.635 57 14 57V55C9.49005 55 6 58.7493 6 63H8ZM14 57C22.1983 57 29 50.4374 29 42H27C27 49.3125 21.1142 55 14 55V57ZM29 42V40.9062H27V42H29ZM27.7369 39.9415C25.3699 40.587 23.2794 41 21 41V43C23.5331 43 25.8176 42.538 28.2631 41.871L27.7369 39.9415ZM21 41C9.73979 41 1 32.2602 1 21H-1C-1 33.3648 8.63522 43 21 43V41ZM1 21C1 9.95171 9.74658 0.999994 21 0.999994V-1.00001C8.62842 -1.00001 -1 8.86078 -1 21H1ZM97 21V42H99V21H97ZM97 42C97 56.9739 84.7653 69 70 69V71C85.8597 71 99 58.0886 99 42H97ZM70 69C66.6148 69 64 66.3852 64 63H62C62 67.4898 65.5102 71 70 71V69ZM64 63C64 59.8131 66.635 57 70 57V55C65.4901 55 62 58.7493 62 63H64ZM70 57C78.1983 57 85 50.4374 85 42H83C83 49.3125 77.1142 55 70 55V57ZM85 42V40.9062H83V42H85ZM83.7369 39.9415C81.3699 40.587 79.2794 41 77 41V43C79.5331 43 81.8176 42.538 84.2631 41.871L83.7369 39.9415ZM77 41C65.7398 41 57 32.2602 57 21H55C55 33.3648 64.6352 43 77 43V41ZM57 21C57 9.95171 65.7466 0.999994 77 0.999994V-1.00001C64.6284 -1.00001 55 8.86078 55 21H57ZM77 0.999994C88.0415 0.999994 97 9.95853 97 21H99C99 8.85396 89.146 -1.00001 77 -1.00001V0.999994Z" />
                    </svg>
                </div>
                <div class="shape shape-2">
                    <svg width="100" height="75" viewBox="0 0 98 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="shape-colour" opacity="0.5"
                              d="M28 40.9062H29V39.597L27.7369 39.9415L28 40.9062ZM84 40.9062H85V39.597L83.7369 39.9415L84 40.9062ZM21 0.999994C32.0415 0.999994 41 9.95853 41 21H43C43 8.85396 33.146 -1.00001 21 -1.00001V0.999994ZM41 21V42H43V21H41ZM41 42C41 56.9739 28.7653 69 14 69V71C29.8597 71 43 58.0886 43 42H41ZM14 69C10.6148 69 8 66.3852 8 63H6C6 67.4898 9.51022 71 14 71V69ZM8 63C8 59.8131 10.635 57 14 57V55C9.49005 55 6 58.7493 6 63H8ZM14 57C22.1983 57 29 50.4374 29 42H27C27 49.3125 21.1142 55 14 55V57ZM29 42V40.9062H27V42H29ZM27.7369 39.9415C25.3699 40.587 23.2794 41 21 41V43C23.5331 43 25.8176 42.538 28.2631 41.871L27.7369 39.9415ZM21 41C9.73979 41 1 32.2602 1 21H-1C-1 33.3648 8.63522 43 21 43V41ZM1 21C1 9.95171 9.74658 0.999994 21 0.999994V-1.00001C8.62842 -1.00001 -1 8.86078 -1 21H1ZM97 21V42H99V21H97ZM97 42C97 56.9739 84.7653 69 70 69V71C85.8597 71 99 58.0886 99 42H97ZM70 69C66.6148 69 64 66.3852 64 63H62C62 67.4898 65.5102 71 70 71V69ZM64 63C64 59.8131 66.635 57 70 57V55C65.4901 55 62 58.7493 62 63H64ZM70 57C78.1983 57 85 50.4374 85 42H83C83 49.3125 77.1142 55 70 55V57ZM85 42V40.9062H83V42H85ZM83.7369 39.9415C81.3699 40.587 79.2794 41 77 41V43C79.5331 43 81.8176 42.538 84.2631 41.871L83.7369 39.9415ZM77 41C65.7398 41 57 32.2602 57 21H55C55 33.3648 64.6352 43 77 43V41ZM57 21C57 9.95171 65.7466 0.999994 77 0.999994V-1.00001C64.6284 -1.00001 55 8.86078 55 21H57ZM77 0.999994C88.0415 0.999994 97 9.95853 97 21H99C99 8.85396 89.146 -1.00001 77 -1.00001V0.999994Z" />
                    </svg>
                </div>
                <div class="about-testimonial-slider">
                    @foreach($testimonials as $testimonial)
                    <div class="slider-item">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="testimonial-image text-center">
                                    <img src="{{ asset('storage/'. $testimonial->image) }}" alt="{{ $testimonial->name }}">
                                </div>
                                <div class="testimonial-info text-center">
                                    <h4 class="title">{{ $testimonial->name }}</h4>
                                    <div class="rating">
                                        @for($i = 0; $i < $testimonial->rating; $i++)
                                        <i class="fas fa-star"></i>
                                        @endfor
                                    </div>
                                    <p>{{ $testimonial->content }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
