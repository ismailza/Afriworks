<div id="header-fixed-height"></div>
<header class="header-area-one" id="sticky-header">
    <nav class="navbar navbar-expand-lg d-none d-lg-block">
        <div class="container-fluid">
            <a class="navbar-brand me-0" href="/" title="{{ setting('site.title') }}">
                <img src="{{ asset('storage/'. setting('site.logo')) }}" alt="{{ setting('site.title') }}">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}" title="À propos">{{ GoogleTranslate::trans('À propos', app()->getLocale()) }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('services.index') }}" title="Services">{{ GoogleTranslate::trans('Services', app()->getLocale()) }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('projects.index') }}" title="Projects">{{ GoogleTranslate::trans('Projets', app()->getLocale()) }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blogs.index') }}" title="Blogs">{{ GoogleTranslate::trans('Blogs', app()->getLocale()) }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}" title="Contact">{{ GoogleTranslate::trans('Contact', app()->getLocale()) }}</a>
                    </li>
                </ul>
                <div class="header-right-info d-flex align-items-center">
                    <div class="social">
                        <ul class="list-unstyled">
                            <!-- language switcher -->
                            <li>
                                <form action="{{ route('language.change') }}" method="post" class="d-flex align-items-center">
                                    @csrf
                                    <i class="fas fa-globe"></i>&nbsp;
                                    <select name="language" id="language-switcher" class="form-select form-select-sm" aria-label="Language switcher">
                                        <option value="fr" @if(app()->getLocale() === 'fr') selected disabled @endif>Français</option>
                                        <option value="en" @if(app()->getLocale() === 'en') selected disabled @endif>English</option>
                                    </select>
                                </form>
                            </li>
                            @if(setting('social-links.facebook_url'))<li><a href="{{ setting('social-links.facebook_url') }}"><i class="fab fa-facebook-f"></i></a></li>@endif
                            @if(setting('social-links.linkedin_url'))<li><a href="{{ setting('social-links.linkedin_url') }}"><i class="fab fa-linkedin-in"></i></a></li>@endif
                            @if(setting('social-links.linkedin_url'))<li><a href="{{ setting('social-links.instagram_url') }}"><i class="fab fa-instagram"></i></a></li>@endif
                        </ul>
                    </div>
                    <div class="help-number d-flex align-items-center">
                        <div class="icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="info">
                            <p>{{ GoogleTranslate::trans('Besoin d\'aide?', app()->getLocale()) }}</p>
                            <h6>
                                <a href="tel:{{ setting('contact.phone') }}">
                                    {{ setting('contact.phone') }}
                                </a>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- mobile navbar part start -->
    <div class="mobile-menu-area d-block d-lg-none">
        <div class="mobile-topbar">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="logo">
                        <a class="navbar-brand me-0" href="/" title="{{ setting('site.title') }}">
                            <img src="{{ asset('storage/'. setting('site.logo')) }}" alt="logo">
                        </a>
                    </div>
                    <div class="bars">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-menu-overlay"></div>
        <div class="mobile-menu-main">
            <div class="logo">
                <a href="/" title="{{ setting('site.title') }}"><img src="{{ asset('storage/'. setting('site.logo')) }}" alt="{{ setting('site.title') }}"></a>
            </div>
            <div class="close-mobile-menu"><i class="fas fa-times"></i></div>
            <div class="menu-body">
                <div class="menu-list">
                    <ul class="list-unstyled">
                        <li class="sub-mobile-menu">
                            <a class="nav-link" href="{{ route('about') }}" title="À propos">{{ GoogleTranslate::trans('À propos', app()->getLocale()) }}</a>
                        </li>
                        <li class="sub-mobile-menu">
                            <a class="nav-link" href="{{ route('services.index') }}" title="Services">{{ GoogleTranslate::trans('Services', app()->getLocale()) }}</a>
                        </li>
                        <li class="sub-mobile-menu">
                            <a class="nav-link" href="{{ route('projects.index') }}" title="Projects">{{ GoogleTranslate::trans('Projets', app()->getLocale()) }}</a>
                        </li>
                        <li class="sub-mobile-menu">
                            <a class="nav-link" href="{{ route('blogs.index') }}" title="Blogs">{{ GoogleTranslate::trans('Blogs', app()->getLocale()) }}</a>
                        </li>
                        <li class="sub-mobile-menu">
                            <a class="nav-link" href="{{ route('contact') }}" title="Contact">{{ GoogleTranslate::trans('Contact', app()->getLocale()) }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="social-icon">
                <ul class="list-unstyled">
                    @if(setting('social-links.facebook_url'))<li><a href="{{ setting('social-links.facebook_url') }}"><i class="fab fa-facebook-f"></i></a></li>@endif
                    @if(setting('social-links.linkedin_url'))<li><a href="{{ setting('social-links.linkedin_url') }}"><i class="fab fa-linkedin-in"></i></a></li>@endif
                    @if(setting('social-links.linkedin_url'))<li><a href="{{ setting('social-links.instagram_url') }}"><i class="fab fa-instagram"></i></a></li>@endif
                </ul>
            </div>
        </div>
    </div>
    <!-- mobile navbar part end -->
</header>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('language-switcher').addEventListener('change', function () {
                this.form.submit();
            });
        });
    </script>
@endpush
