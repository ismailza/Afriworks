@extends('layout.layout')

@section('title', setting('site.title') . ' | ' . $project->name)
@section('meta_description', $project->excerpt)

@section('content')

    <!-- breadcrumb part start -->
    <x-breadcrumb title="{!! $project->name !!}">
        <li><a href="/">Accueil</a></li>
        <li><a href="{{ route('projects.index') }}">Projets</a></li>
    </x-breadcrumb>

    <!-- project details part start -->
    <section class="project-details-area">
        <div class="container">
            <div class="project-details-thumb-image">
                <img src="{{ asset('storage/'. $project->image) }}" alt="{{ $project->name }}" class="img-fluid w-100">
                <div class="project-information">
                    <h3 class="project-title">Project Information</h3>
                    <div class="main-content">
                        <div class="info-main">
                            <div class="info-item">
                                <h6 class="info-subtitle">Service:</h6>
                                <p><a href="{{ route('services.show', $project->service->slug) }}">{{ $project->service->name }}</a></p>
                            </div>
                            @if($project->client)
                            <div class="info-item">
                                <h6 class="info-subtitle">Client:</h6>
                                <p>{{ $project->client }}</p>
                            </div>
                            @endif
                            @if($project->start_date)
                            <div class="info-item">
                                <h6 class="info-subtitle">Start date:</h6>
                                <p>{{ $project->start_date }}</p>
                            </div>
                            @endif
                            @if($project->end_date)
                            <div class="info-item">
                                <h6 class="info-subtitle">End date:</h6>
                                <p>{{ $project->end_date }}</p>
                            </div>
                            @endif
                        </div>
                        <div class="social-icon text-center">
                            <h6 class="social-title">Share:</h6>
                            <ul class="list-unstyled">
                                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('projects.show', $project->slug)) }}&title={{ urlencode($project->name) }}&source={{ urlencode(setting('site.title')) }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="https://facebook.com/sharer/sharer.php?u={{ urlencode(route('projects.show', $project->slug)) }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://twitter.com/intent/tweet?url={{ urlencode(route('projects.show', $project->slug)) }}&text={{ urlencode($project->name) }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="project-details-information">
                <h2 class="project-details-title">{{ $project->name }}</h2>
                {!! $project->description !!}
            </div>
        </div>
    </section>

@endsection
