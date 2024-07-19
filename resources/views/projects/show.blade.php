@extends('layout.layout')

@section('title', setting('site.title') . ' | ' . GoogleTranslate::trans($project->name, app()->getLocale()))
@section('meta_description', GoogleTranslate::trans($project->excerpt, app()->getLocale()))

@section('content')

    <!-- breadcrumb part start -->
    <x-breadcrumb title="{!! $project->name !!}">
        <li><a href="/">{{ GoogleTranslate::trans('Accueil', app()->getLocale()) }}</a></li>
        <li><a href="{{ route('projects.index') }}">{{ GoogleTranslate::trans('Projets', app()->getLocale()) }}</a></li>
    </x-breadcrumb>

    <!-- project details part start -->
    <section class="project-details-area">
        <div class="container">
            <div class="project-details-thumb-image">
                <img src="{{ asset('storage/'. $project->image) }}" alt="{{ $project->name }}" class="img-fluid w-100">
                <div class="project-information">
                    <h3 class="project-title">{{ GoogleTranslate::trans('Project Information', app()->getLocale()) }}</h3>
                    <div class="main-content">
                        <div class="info-main">
                            <div class="info-item">
                                <h6 class="info-subtitle">{{ GoogleTranslate::trans('Service:', app()->getLocale()) }}</h6>
                                <p><a href="{{ route('services.show', $project->service->slug) }}">{{ GoogleTranslate::trans($project->service->name, app()->getLocale()) }}</a></p>
                            </div>
                            @if($project->client)
                            <div class="info-item">
                                <h6 class="info-subtitle">{{ GoogleTranslate::trans('Client:', app()->getLocale()) }}</h6>
                                <p>{{ $project->client }}</p>
                            </div>
                            @endif
                            @if($project->start_date)
                            <div class="info-item">
                                <h6 class="info-subtitle">{{ GoogleTranslate::trans('Start date:', app()->getLocale()) }}</h6>
                                <p>{{ $project->start_date }}</p>
                            </div>
                            @endif
                            @if($project->end_date)
                            <div class="info-item">
                                <h6 class="info-subtitle">{{ GoogleTranslate::trans('End date:', app()->getLocale()) }}</h6>
                                <p>{{ $project->end_date }}</p>
                            </div>
                            @endif
                        </div>
                        <div class="social-icon text-center">
                            <h6 class="social-title">S{{ GoogleTranslate::trans('hare:', app()->getLocale()) }}</h6>
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
                <h2 class="project-details-title">{{ GoogleTranslate::trans($project->name, app()->getLocale()) }}</h2>
                {!! GoogleTranslate::trans($project->description, app()->getLocale()) !!}
            </div>
        </div>
    </section>

@endsection
