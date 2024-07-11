@extends('layout.layout')

@section('title', setting('site.title') . ' | ' . $post->title)
@section('meta_description', $post->meta_description)
@section('meta_keywords', $post->meta_keywords)

@section('content')

    <!-- breadcrumb part start -->
    <x-breadcrumb title="{!! $post->title !!}">
        <li><a href="/">Home</a></li>
        <li><a href="{{ route('blogs.index') }}">Blogs</a></li>
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
                                <li><a href="#" tabindex="0"> By admin</a></li>
                                @if($post->category)
                                <li><a>{{ $post->category->name }}</a></li>
                                @endif
                            </ul>
                        </div>
                        <h3 class="blog-details-title">{{ $post->title }}</h3>
                        <blockquote>
                            <h6 class="short-description">
                                {{ $post->excerpt }}
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
                                <h4 class="title">Articles récents</h4>
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
                                            <a href="{{ route('blogs.show', $recentPost->slug) }}" title="{{ $recentPost->title }}">{{ $recentPost->title }}</a>
                                        </h6>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                        <div class="blog-widget">
                            <div class="title-block">
                                <h4 class="title">Projets récents</h4>
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
