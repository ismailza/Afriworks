@extends('layout.layout')

@section('title', setting('site.title') . ' | ' . $service->name)
@section('meta_description', $service->excerpt)

@section('content')

    <!-- breadcrumb part start -->
    <x-breadcrumb title="{!! $service->name !!}">
        <li><a href="/">Accueil</a></li>
        <li><a href="{{ route('services.index') }}">Services</a></li>
    </x-breadcrumb>

    <!-- service details part start -->
    <section class="service-details-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="service-details-content">
                        <div class="service-details-image">
                            <img src="{{ asset('storage/'. $service->image) }}" alt="{{ $service->name }}" class="img-fluid w-100">
                        </div>
                        <h2 class="service-details-title">{{ $service->name }}</h2>
                        {!! $service->description !!}

                        @php($serviceProjects = $service->projects)
                        @if($serviceProjects->count() > 0)
                        <div class="service-inner-details">
                            <h3 class="service-inner-title">Les projets associés</h3>
                            <div class="row g-4">
                            @foreach($service->projects as $project)
                                <div class="col-md-6 col-lg-6">
                                    <div class="service-info-item text-center">
                                        <div class="icon">
                                            <a href="{{ route('projects.show', $project->slug) }}">
                                                <img src="{{ asset('assets/img/services/service-details-icon-4.svg') }}" alt="{{ $project->name }}">
                                            </a>
                                        </div>
                                        <h4 class="title"><a href="{{ route('projects.show', $project->slug) }}">{{ $project->name }}</a></h4>
                                        <p>{{ $project->excerpt }}</p>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-right-sidebar">
                        <div class="project-title-info">
                            <h3 class="service-sidebar-title">Demande de devis</h3>
                            <p class="sub-title">Obtenez un devis pour votre projet</p>
                            <p>
                                Remplissez le formulaire ci-dessous avec les détails de votre projet et vos informations.
                                Nous vous recontacterons dans les plus brefs délais pour discuter de vos besoins et vous
                                fournir un devis personnalisé.
                            </p>
                        </div>
                        <form action="{{ route('services.request') }}" method="POST" class="project-block needs-validation" novalidate>
                            @csrf
                            @method('POST')
                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                            <h6 class="title">Détails du Service</h6>
                            <p><strong>{{ $service->name }}</strong></p>
                            <div class="form-group">
                                <label for="description">Description du Service:</label>
                                <textarea id="description" name="description" class="form-control" rows="4" placeholder="Décrivez votre projet en détail" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="date">Date Souhaitée:</label>
                                <input type="date" min="{{ date('Y-m-d') }}" id="date" name="date" class="form-control" required>
                            </div>
                            <h6 class="title">Informations personnelles</h6>
                            <div class="form-group">
                                <label for="name">Nom:</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Votre nom" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Votre email" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Numéro de téléphone:</label>
                                <input type="tel" id="phone" name="phone" class="form-control" placeholder="Votre numéro de téléphone" required>
                            </div>

                            <button type="submit" class="request-service-btn uppercaser">
                                Envoyer la demande
                                <span class="icon">
                                    <i class="fas fa-paper-plane"></i>
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
