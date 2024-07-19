@extends('layout.layout')

@section('title', setting('site.title') . ' | ' . GoogleTranslate::trans('Contactez-Nous', app()->getLocale()))

@section('content')

    <!-- breadcrumb part start -->
    <x-breadcrumb title="{{ GoogleTranslate::trans('Contactez-Nous', app()->getLocale()) }}">
        <li><a href="/">{{ GoogleTranslate::trans('Accueil', app()->getLocale()) }}</a></li>
        <li>{{ GoogleTranslate::trans('Contactez-Nous', app()->getLocale()) }}</li>
    </x-breadcrumb>

    <!-- contact form start -->
    <section class="contact-form-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title-one">
                        <span class="sub-title uppercase">{{ GoogleTranslate::trans('Contactez-Nous', app()->getLocale()) }} </span>
                        <h2 class="title">{{ GoogleTranslate::trans('Feel free to messege', app()->getLocale()) }}</h2>
                    </div>
                    <div class="short-description">
                        <p>{{ GoogleTranslate::trans('Construire avec passion, précision et fierté', app()->getLocale()) }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-form">
                        @include('partials.contact-form')
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-information">
                        <div class="contact-info-item">
                            <ul class="list-unstyled">
                                <li class="icon">
                                    <i class="fas fa-phone-alt"></i>
                                </li>
                                <li class="info">
                                    <h4 class="title">{{ GoogleTranslate::trans('Téléphone', app()->getLocale()) }}</h4>
                                    <p><a href="tel:{{ setting('contact.phone') }}">{{ setting('contact.phone') }}</a></p>
                                </li>
                            </ul>
                        </div>
                        <div class="contact-info-item">
                            <ul class="list-unstyled">
                                <li class="icon">
                                    <i class="fas fa-envelope"></i>
                                </li>
                                <li class="info">
                                    <h4 class="title">{{ GoogleTranslate::trans('Email', app()->getLocale()) }}</h4>
                                    <p><a href="mailto:{{ setting('contact.email') }}">{{ setting('contact.email') }}</a></p>
                                </li>
                            </ul>
                        </div>
                        <div class="contact-info-item">
                            <ul class="list-unstyled">
                                <li class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </li>
                                <li class="info">
                                    <h4 class="title">{{ GoogleTranslate::trans('Adresse', app()->getLocale()) }}</h4>
                                    <p><a href="{{ setting('contact.location') }}">{{ setting('contact.address') }}</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- contact map start -->
    <div class="contact-map-area">
        <div class="contact-map">
            {!! setting('contact.map') !!}
        </div>
    </div>

@endsection
