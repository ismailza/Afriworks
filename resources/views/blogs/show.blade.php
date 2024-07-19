@extends('layout.layout')

@section('title', setting('site.title') . ' | ' . GoogleTranslate::trans($post->title, app()->getLocale()))
@section('meta_description', GoogleTranslate::trans($post->meta_description, app()->getLocale()))
@section('meta_keywords', $post->meta_keywords)

@section('content')

    <!-- breadcrumb part start -->
    <x-breadcrumb title="{!! GoogleTranslate::trans($post->title, app()->getLocale()) !!}">
        <li><a href="/">{{ GoogleTranslate::trans('Accueil', app()->getLocale()) }}</a></li>
        <li><a href="{{ route('blogs.index') }}">{{ GoogleTranslate::trans('Blogs', app()->getLocale()) }}</a></li>
    </x-breadcrumb>

    <!-- blog details part start -->
    <section class="blog-details-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-information">
                        <div class="blog-details-image">
                            <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->title }}" class="img-fluid w-100">
                        </div>
                        <div class="blog-meta">
                            <ul class="list-unstyled">
                                <li><a href="{{ route('about') }}" tabindex="0"> By admin</a></li>
                                @if($post->category)
                                <li><a href="{{ route('blogs.category', $post->category->slug) }}">{{ GoogleTranslate::trans($post->category->name, app()->getLocale()) }}</a></li>
                                @endif
                            </ul>
                        </div>
                        <h3 class="blog-details-title">{{ GoogleTranslate::trans($post->title, app()->getLocale()) }}</h3>
                        <blockquote>
                            <h6 class="short-description">
                                {{ GoogleTranslate::trans($post->excerpt, app()->getLocale()) }}
                            </h6>
                            <div class="quote-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                        </blockquote>
                        <div class="blog-details-inner-content">
                            {!! $post->body !!}

                            <div class="post-tags d-flex align-items-center">
                                <h4 class="tags-title">Tags:</h4>
                                <ul class="list-unstyled">
                                @foreach($postTags as $tag)
                                    <li><a>{{ $tag }}</a></li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-right-sidebar">
                        <div class="blog-widget">
                            <div class="title-block">
                                <h4 class="title">{{ GoogleTranslate::trans('Articles récents', app()->getLocale()) }}</h4>
                            </div>
                            <div class="popular-post-main">
                            @foreach($recentPosts as $recentPost)
                                <div class="popular-post-item d-flex">
                                    <div class="image">
                                        <a href="{{ route('blogs.show', $recentPost->slug) }}" class="d-block w-100" title="{{ $recentPost->title }}">
                                            <img src="{{ Voyager::image($recentPost->image) }}" alt="{{ $recentPost->title }}" class="img-fluid w-100">
                                        </a>
                                    </div>
                                    <div class="text">
                                        <p><i class="fas fa-calendar-alt"></i> {{ $recentPost->created_at->format('F d, Y') }}</p>
                                        <h6 class="blog-title">
                                            <a href="{{ route('blogs.show', $recentPost->slug) }}" title="{{ $recentPost->title }}">{{ GoogleTranslate::trans($recentPost->title, app()->getLocale()) }}</a>
                                        </h6>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                        <div class="blog-widget">
                            <div class="title-block">
                                <h4 class="title">{{ GoogleTranslate::trans('Projets récents', app()->getLocale()) }}</h4>
                            </div>
                            <div class="project-main">
                                <div class="row g-4">
                                @foreach($recentProjects as $project)
                                    <div class="col-6 col-sm-4">
                                        <div class="project-item">
                                            <a href="{{ route('projects.show', $project->slug) }}" class="d-block w-100" title="{{ $project->title }}">
                                                <img src="{{ Voyager::image($project->image) }}" alt="{{ $project->title }}" class="img-fluid w-100">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
