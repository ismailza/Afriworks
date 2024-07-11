@extends('layout.layout')

@section('title', setting('site.title') . ' | Projets')

@section('content')

    <!-- breadcrumb part start -->
    <x-breadcrumb title="Projects">
        <li><a href="/">Accueil</a></li>
        <li>Projets</li>
    </x-breadcrumb>

    <!-- projects part start -->
    <section class="blog-classic-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-classic-main">
                        @forelse($projects as $project)
                            <div class="blog-classic-item" data-title="{{ $project->name }}" data-service="{{ $project->service->name }}" data-excerpt="{{ $project->excerpt }}">
                                <div class="blog-image">
                                    <a href="{{ route('projects.show', $project->slug) }}" title="{{ $project->name }}" class="d-block w-100">
                                        <img src="{{ asset('storage/'. $project->image) }}" alt="{{ $project->name }}" class="img-fluid w-100">
                                    </a>
                                </div>
                                <div class="blog-info">
                                    <h3 class="title">
                                        <a href="{{ route('projects.show', $project->slug) }}" title="{{ $project->name }}">{{ $project->name }}</a>
                                    </h3>
                                    <div class="blog-meta">
                                        <ul class="list-unstyled">
                                            <li><a href="#" tabindex="0"> By admin</a></li>
                                            <li><a href="{{ route('services.show', $project->service->slug) }}" tabindex="0"> {{ $project->service->name }}</a></li>
                                        </ul>
                                    </div>
                                    <p>{{ $project->excerpt }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="learn-more">
                                            <a href="{{ route('projects.show', $project->slug) }}" class="common-btn uppercase">En savoir plus <i class="fas fa-plus"></i></a>
                                        </div>
                                        <div class="share-now">
                                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('projects.show', $project->slug)) }}&title={{ urlencode($project->name) }}&source={{ urlencode(setting('site.title')) }}" target="_blank" rel="noopener noreferrer" class="share-icon"><i class="fas fa-share-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>

                    <div class="th-pagination d-flex justify-content-center align-items-center mt-2">
                        <ul>
                            @if ($projects->onFirstPage())
                                <li class="disabled"><span>&laquo;</span></li>
                            @else
                                <li><a href="{{ $projects->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                            @endif
                            @for ($i = 1; $i <= $projects->lastPage(); $i++)
                                @if ($i == $projects->currentPage())
                                    <li class="active"><span>{{ $i }}</span></li>
                                @else
                                    <li><a href="{{ $projects->url($i) }}">{{ $i }}</a></li>
                                @endif
                            @endfor
                            @if ($projects->hasMorePages())
                                <li><a href="{{ $projects->nextPageUrl() }}" rel="next">&raquo;</a></li>
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
                                <h4 class="title">Services</h4>
                            </div>
                            <ul class="list-body list-unstyled">
                                @foreach($services as $service)
                                    <li><a href="{{ route('services.show', $service->slug) }}">{{ $service->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="blog-widget">
                            <div class="title-block">
                                <h4 class="title">Projets récents</h4>
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
                                                <a href="{{ route('projects.show', $project->slug) }}" class="d-block w-100" title="{{ $project->title }}">{{ $project->name }}</a>
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
                const projectCards = document.querySelectorAll('.blog-classic-item');

                searchField.addEventListener('input', function () {
                    const query = searchField.value.toLowerCase();

                    projectCards.forEach(function (card) {
                        const projectTitle = card.getAttribute('data-title').toLowerCase();
                        const projectService = card.getAttribute('data-service').toLowerCase();
                        const projectExcerpt = card.getAttribute('data-excerpt').toLowerCase();
                        if (projectTitle.includes(query) || projectService.includes(query) || projectExcerpt.includes(query)) {
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
