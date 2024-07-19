@extends('layout.layout')

@section('title', setting('site.title') . ' | ' . GoogleTranslate::trans('Blogs', app()->getLocale()))

@section('content')

    <!-- breadcrumb part start -->
    <x-breadcrumb title="Blogs">
        <li><a href="/">{{ GoogleTranslate::trans('Accueil', app()->getLocale()) }}</a></li>
        <li>{{ GoogleTranslate::trans('Blogs', app()->getLocale()) }}</li>
    </x-breadcrumb>

    <!-- blog classic part start -->
    <section class="blog-classic-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-classic-main">
                    @forelse($posts as $post)
                        <div class="blog-classic-item" data-title="{{ GoogleTranslate::trans($post->title, app()->getLocale()) }}" data-category="{{ GoogleTranslate::trans($post->category->name, app()->getLocale()) }}" data-excerpt="{{ GoogleTranslate::trans($post->excerpt, app()->getLocale()) }}">
                            <div class="blog-image">
                                <a href="{{ route('blogs.show', $post->slug) }}" title="{{ $post->title }}" class="d-block w-100">
                                    <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->title }}" class="img-fluid w-100">
                                </a>
                            </div>
                            <div class="blog-info">
                                <h3 class="title">
                                    <a href="{{ route('blogs.show', $post->slug) }}" title="{{ $post->title }}">{{ GoogleTranslate::trans($post->title, app()->getLocale()) }}</a>
                                </h3>
                                <div class="blog-meta">
                                    <ul class="list-unstyled">
                                        <li><a href="{{ route('about') }}" tabindex="0"> By admin</a></li>
                                        <li><a href="{{ route('blogs.category', $post->category->slug) }}" tabindex="0"> {{ GoogleTranslate::trans($post->category->name, app()->getLocale()) }}</a></li>
                                    </ul>
                                </div>
                                <p>{{ GoogleTranslate::trans($post->excerpt, app()->getLocale()) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="learn-more">
                                        <a href="{{ route('blogs.show', $post->slug) }}" class="common-btn uppercase">En savoir plus <i class="fas fa-plus"></i></a>
                                    </div>
                                    <div class="share-now">
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('blogs.show', $post->slug)) }}&title={{ urlencode($post->title) }}&source={{ urlencode(setting('site.title')) }}" target="_blank" rel="noopener noreferrer" class="share-icon"><i class="fas fa-share-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-warning">{{ GoogleTranslate::trans('No blog posts found.', app()->getLocale()) }}</div>
                    @endforelse
                    </div>

                    <div class="th-pagination d-flex justify-content-center align-items-center mt-2">
                        <ul>
                        @if ($posts->onFirstPage())
                            <li class="disabled"><span>&laquo;</span></li>
                        @else
                            <li><a href="{{ $posts->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                        @endif
                        @for ($i = 1; $i <= $posts->lastPage(); $i++)
                            @if ($i == $posts->currentPage())
                                <li class="active"><span>{{ $i }}</span></li>
                            @else
                                <li><a href="{{ $posts->url($i) }}">{{ $i }}</a></li>
                            @endif
                        @endfor
                        @if ($posts->hasMorePages())
                            <li><a href="{{ $posts->nextPageUrl() }}" rel="next">&raquo;</a></li>
                        @else
                            <li class="disabled"><span>&raquo;</span></li>
                        @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-right-sidebar">
                        <div class="sidebar-search">
                            <div class="input-group position-relative">
                                <input type="text" id="searchField" placeholder="Keyword...">
                            </div>
                        </div>
                        <div class="blog-widget">
                            <div class="title-block">
                                <h4 class="title">{{ GoogleTranslate::trans('Categories', app()->getLocale()) }}</h4>
                            </div>
                            <ul class="list-body list-unstyled">
                            @foreach($categories as $category)
                                <li><a href="{{ route('blogs.category', $category->slug) }}">{{ GoogleTranslate::trans($category->name, app()->getLocale()) }}</a></li>
                            @endforeach
                            </ul>
                        </div>
                        <div class="blog-widget">
                            <div class="title-block">
                                <h4 class="title">{{ GoogleTranslate::trans('Projets récents', app()->getLocale()) }}</h4>
                            </div>
                            <div class="popular-post-main">
                            @foreach($recentProjects as $project)
                                <div class="popular-post-item d-flex">
                                    <div class="image">
                                        <a href="{{ route('projects.show', $project->slug) }}" class="d-block w-100" title="{{ $project->title }}">
                                            <img src="{{ asset('storage/'. $project->image) }}" alt="pp-blog-1" class="img-fluid w-100">
                                        </a>
                                    </div>
                                    <div class="text">
                                        <p><i class="fas fa-calendar-alt"></i> {{ $project->created_at->format('d F Y') }}</p>
                                        <h6 class="blog-title">
                                            <a href="{{ route('projects.show', $project->slug) }}" class="d-block w-100" title="{{ $project->title }}">{{ GoogleTranslate::trans($project->name, app()->getLocale()) }}</a>
                                        </h6>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const searchField = document.querySelector('.sidebar-search #searchField');
                const blogCards = document.querySelectorAll('.blog-classic-item');

                searchField.addEventListener('input', function () {
                    const query = searchField.value.toLowerCase();

                    blogCards.forEach(function (card) {
                        const postTitle = card.getAttribute('data-title').toLowerCase();
                        const postCategory = card.getAttribute('data-category').toLowerCase();
                        const postExcerpt = card.getAttribute('data-excerpt').toLowerCase();
                        if (postTitle.includes(query) || postCategory.includes(query) || postExcerpt.includes(query)) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        </script>
    @endpush

@endsection
