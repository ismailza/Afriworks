@extends('layout.layout')

@section('title', setting('site.title'))

@section('content')

    <!-- banner part start -->
    <section class="banner-area-one" data-background="{{ asset('assets/img/bg/banner-bg.png') }}">
        <svg class="banner-shape" viewBox="0 0 1056 979" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="primary-colour" d="M1197.56 1040L103.744 1040L231.189 818.024L266.474 755.955L327.563 862.735L763.09 862.735L981.643 481.904L764.143 101.074L641.964 101.074L716.746 -29.3763L776.255 -133L1197.56 -133L1197.56 1040Z" />
            <path class="primary-colour" d="M206 869L649.304 89H773.856L995 479.513L777.415 869H206Z" />
            <path class="black-colour" d="M647.5 92H321L160.5 373.5L310.5 685.5L647.5 92Z" />
            <path class="black-colour" d="M165.887 383.537L133.762 327.254L132.183 324.624L131.656 323.572L195.905 211.006L334.41 -29.9063L338.096 -29.9063L582.454 -29.3802L716.746 -29.3802L641.964 101.07L626.165 101.07L347.576 101.07L328.09 101.07L165.887 383.537Z" />
            <path class="primary-colour" d="M66.8821 1040L-0.000391173 1040L127.445 818.023L193.801 818.023L66.8821 1040Z" />
            <path class="black-colour" d="M460.277 1040L103.746 1040L282.275 728.602L460.277 1040Z" />
        </svg>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner-info">
                        @if($banner->sub_title)<span class="sub-title uppercase wow fadeInLeft" data-wow-delay=".2s">{{ GoogleTranslate::trans($banner->sub_title, app()->getLocale()) }}</span>@endif
                        <h2 class="banner-title wow fadeInLeft" data-wow-delay=".4s">{{ GoogleTranslate::trans($banner->title, app()->getLocale()) }}</h2>
                        @if($banner->excerpt)<p class="wow fadeInLeft" data-wow-delay=".6s">{{ GoogleTranslate::trans($banner->excerpt, app()->getLocale()) }}</p>@endif
                        @if($banner->link)<a href="{{ $banner->link }}" title="{{ $banner->title }}" class="common-btn uppercase wow fadeInLeft" data-wow-delay=".8s">{{ GoogleTranslate::trans($banner->button_text ?? 'Voir plus', app()->getLocale()) }} <i class="fas fa-arrow-right"></i></a>@endif
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="banner-image">
                        <img src="{{ asset('storage/'. $banner->image) }}" alt="banner-image" class="img-fluid w-100">
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                                <h2 class="year">25</h2>
                                <h6 class="experiance">Years Of experience</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title-one">
                            <span class="sub-title uppercase no-after">{{ GoogleTranslate::trans('À Propos de Nous', app()->getLocale()) }}</span>
                            <h2 class="title">{{ GoogleTranslate::trans($about->title, app()->getLocale()) }}</h2>
                        </div>
                        <div class="about-details">
                            {!! GoogleTranslate::trans($about->description, app()->getLocale()) !!}
                            <a href="{{ route('about') }}" class="common-btn uppercase" title="À propos de nous">{{ GoogleTranslate::trans('En savoir plus', app()->getLocale()) }}} <i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- services part start -->
    <section class="service-area-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <div class="section-title-one text-center">
                        <span class="sub-title uppercase">
                            {{ GoogleTranslate::trans('Nos Services', app()->getLocale()) }}
                        </span>
                        <h2 class="title">
                            {{ GoogleTranslate::trans('Des Solutions Complètes pour Chaque Étape de Votre Projet', app()->getLocale()) }}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
            @forelse($services as $service)
                <div class="col-lg-4 col-md-6 mx-md-auto mx-lg-0">
                    <div class="services-item-two wow fadeInUp" data-wow-delay=".2s">
                        <div class="image">
                            <a href="{{ route('services.show', $service->slug) }}" class="d-block w-100">
                                <img src="{{ asset('storage/'. $service->image) }}" alt="{{ $service->name }}" class="img-fluid w-100">
                            </a>
                            <div class="icon">
                                <img src="{{ asset('assets/img/icons/service-icon-1.svg') }}" alt="service-icon-1">
                            </div>
                        </div>
                        <div class="text">
                            <h4 class="title">
                                <a href="{{ route('services.show', $service->slug) }}">{{ $service->name }}</a>
                            </h4>
                            <p>{{ GoogleTranslate::trans($service->excerpt, app()->getLocale()) }}</p>
                            <a href="{{ route('services.show', $service->slug) }}" class="read-more uppercase">{{ GoogleTranslate::trans('En Savoir Plus', app()->getLocale()) }} <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-12">
                    <div class="alert alert-warning">{{ GoogleTranslate::trans('Aucun service disponible pour le moment', app()->getLocale()) }}</div>
                </div>
            @endforelse
            </div>
        </div>
    </section>

    <!-- recent work part start -->
    <section class="recent-work-area-one">
        <div class="recent-work-one-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-md-8 col-lg-6">
                        <div class="section-title-one">
                            <span class="sub-title uppercase wow fadeInUp" data-wow-delay=".2s">
                                {{ GoogleTranslate::trans('Réalisations récentes', app()->getLocale()) }}
                            </span>
                            <h2 class="title text-white wow fadeInUp" data-wow-delay=".4s">
                                {{ GoogleTranslate::trans('Découvrez Nos Projets Réalisés', app()->getLocale()) }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row recent-work-slider-one">
                @forelse($projects as $project)
                    <div class="col-lg-4">
                        <div class="project-item-one position-relative">
                            <div class="image">
                                <a href="{{ route('projects.show', $project->slug) }}" class="d-block w-100" title="{{ $project->name }}">
                                    <img src="{{ asset('storage/'. $project->image) }}" alt="{{ $project->name }}" class="img-fluid w-100">
                                </a>
                            </div>
                            <div
                                class="info position-absolute bottom-0 start-0 w-100 d-flex justify-content-between align-items-center">
                                <div class="text">
                                    <h4 class="title">
                                        <a href="{{ route('projects.show', $project->slug) }}" title="{{ $project->name }}">{{ $project->name }}</a>
                                    </h4>
                                    <p>{{ GoogleTranslate::trans($project->excerpt, app()->getLocale()) }}</p>
                                </div>
                                <div class="plus">
                                    <a href="{{ route('projects.show', $project->slug) }}" title="{{ $project->name }}"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12">
                        <div class="alert alert-warning">{{ GoogleTranslate::trans('Aucun projet disponible pour le moment', app()->getLocale()) }}</div>
                    </div>
                @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- counter part start -->
    @include('partials.counter')

    <!-- active employee part start -->
    <section class="active-employee-area-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-title-one">
                        <span class="sub-title uppercase no-after">{{ GoogleTranslate::trans('Équipe active', app()->getLocale()) }}</span>
                        <h2 class="title">{{ GoogleTranslate::trans('Votre partenaire de confiance', app()->getLocale()) }} </h2>
                    </div>
                    <div class="employee-info">
                        <p>{{ GoogleTranslate::trans('Chez Afriworks, notre équipe d\'experts est dédiée à fournir des solutions de construction fiables et innovantes pour tous vos besoins.', app()->getLocale()) }}</p>
                        <a href="{{ route('about') }}" class="common-btn uppercase">{{ GoogleTranslate::trans('En savoir plus', app()->getLocale()) }} <i class="fas fa-arrow-right"></i></a>
                        <h1 class="team-member">{{ GoogleTranslate::trans('ÉQUIPE ACTIVE', app()->getLocale()) }}</h1>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row active-employes-slider-two">
                        @foreach($teamMembers as $member)
                        <div class="col-lg-4">
                            <div class="active-employes-item-two">
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
            </div>
        </div>
    </section>

    <!-- get updates part start -->
    <section class="get-updates-area-one">
        <div class="update-area-bg-one">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-xl-4">
                        <div class="get-updates-info">
                            <h2 class="text-white title">{{ GoogleTranslate::trans('Ne manquez aucune mise à jour importante', app()->getLocale()) }}</h2>
                            <p class="text-white">{{ GoogleTranslate::trans('Soyez toujours au courant des dernières nouvelles et des développements majeurs de notre projet.', app()->getLocale()) }}</p>
                        </div>
                    </div>
                    <div class="col-lg-5 col-xl-4 ms-auto align-self-center">
                        <div class="contact-info d-flex align-items-center">
                            <div class="icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="text">
                                <h4 class="title">{{ GoogleTranslate::trans('Contactez-nous', app()->getLocale()) }}</h4>
                                <h3 class="number"><a href="tel:{{ setting('contact.phone') }}">{{ setting('contact.phone') }}</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- testimonial part start -->
    <section class="testimonial-area-one">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="section-title-one text-center">
                        <span class="sub-title uppercase">{{ GoogleTranslate::trans('Témoignages des clients', app()->getLocale()) }}</span>
                        <h2 class="title">{{ GoogleTranslate::trans('Des constructions qui dépassent les attentes', app()->getLocale()) }}</h2>
                    </div>
                </div>
            </div>
            <div class="row testimonial-area-slider-one">
                @foreach($testimonials as $testimonial)
                <div class="col-lg-6">
                    <div class="testimonial-item-one">
                        <div class="quote-icon">
                            <img src="{{ asset('assets/img/icons/quote.png') }}" alt="quote">
                        </div>
                        <div class="testimonial-avatar d-flex align-items-center">
                            <div class="image">
                                <img src="{{ asset('storage/'. $testimonial->image) }}" alt="{{ $testimonial->name }}">
                            </div>
                            <div class="text">
                                <h4 class="title">{{ $testimonial->name }}</h4>
                                <p>{{ $testimonial->position }}</p>
                            </div>
                        </div>
                        <div class="testimonial-info">
                            <div class="rating">
                                @for($i = 0; $i < $testimonial->rating; $i++)
                                <i class="fas fa-star"></i>
                                @endfor
                            </div>
                            <p>{{ $testimonial->content }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- messages area start -->
    <section class="messages-area-one">
        <div class="messages-area-one-bg">
            <div class="container">
                <div class="messages-area-one-main">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="image pe-3">
                                <img src="{{ asset('assets/img/messages/messages-image.png') }}" alt="messages-image" class="img-fluid w-100">
                            </div>
                        </div>
                        <div class="col-lg-6 align-self-center">
                            <div class="text">
                                <div class="section-title-one">
                                    <span class="sub-title uppercase white">{{ GoogleTranslate::trans('Contactez-nous', app()->getLocale()) }}</span>
                                    <h2 class="title white">{{ GoogleTranslate::trans('Construire avec passion, précision et fierté', app()->getLocale()) }}</h2>
                                </div>
                                <div class="messages-box">
                                    @include('partials.contact-form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- news area start -->
    <section class="news-area-one">
        <div class="news-area-bg-one">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-title-one">
                            <span class="sub-title uppercase no-after">{{ GoogleTranslate::trans('Blog et Actualités', app()->getLocale()) }}</span>
                            <h2 class="title">{{ GoogleTranslate::trans('Solutions de construction adaptées à vos besoins', app()->getLocale()) }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row news-area-one-slider">
                @forelse($posts as $post)
                    <div class="col-lg-4">
                        <div class="news-item-one">
                            <div class="image">
                                <a href="{{ route('blogs.show', $post->slug) }}" title="{{ $post->seo_title }}" class="d-block w-100">
                                    <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->title }}" class="img-fluid w-100">
                                </a>
                            </div>
                            <div class="text">
                                <div class="news-meta">
                                    <ul>
                                        <li><a href="{{ route('blogs.show', $post->slug) }}" title="{{ $post->seo_title }}"><i class="fas fa-user"></i> By admin</a></li>
                                        <li><i class="fas fa-calendar-alt"></i>{{ $post->created_at->format('d M, Y') }}</li>
                                    </ul>
                                </div>
                                <h4 class="news-title">
                                    <a href="{{ route('blogs.show', $post->slug) }}" title="{{ $post->seo_title }}">
                                        {{ $post->title }}
                                    </a>
                                </h4>
                                <a href="{{ route('blogs.show', $post->slug) }}" title="{{ $post->seo_title }}" class="read-more uppercase">Read More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12">
                        <div class="alert alert-warning">{{ GoogleTranslate::trans('Aucun article disponible pour le moment', app()->getLocale()) }}</div>
                    </div>
                @endforelse
                </div>
            </div>
        </div>
    </section>

@endsection
