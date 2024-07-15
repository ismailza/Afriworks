@extends('layout.layout')

@section('title', setting('site.title') . ' | Services')

@section('content')

    <!-- breadcrumb part start -->
    <x-breadcrumb title="Services">
        <li><a href="/">Accueil</a></li>
        <li>Services</li>
    </x-breadcrumb>

    <!-- services part start -->
    <section class="all-services-area">
        <div class="container">
            <div class="row">
            @forelse($services as $service)
                <div class="col-lg-4 col-md-6 mx-md-auto mx-lg-0">
                    <div class="services-item-two wow fadeInUp" data-wow-delay=".2s">
                        <div class="image">
                            <a href="{{ route('services.show', $service->slug) }}" class="d-block w-100" title="{{ $service->name }}">
                                <img src="{{ asset('storage/'. $service->image) }}" alt="{{ $service->name }}" class="img-fluid w-100">
                            </a>
                            <div class="icon">
                                <img src="{{ asset('assets/img/icons/service-icon-1.svg') }}" alt="service-icon-1">
                            </div>
                        </div>
                        <div class="text">
                            <h4 class="title">
                                <a href="{{ route('services.show', $service->slug) }}" title="{{ $service->name }}">{{ $service->name }}</a>
                            </h4>
                            <p>{{ $service->excerpt }}</p>
                            <a href="{{ route('services.show', $service->slug) }}" class="read-more uppercase" title="{{ $service->name }}">En Savoir Plus <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-12">
                    <div class="alert alert-warning">Aucun service disponible pour le moment</div>
                </div>
            @endforelse
            </div>
        </div>
    </section>

@endsection
