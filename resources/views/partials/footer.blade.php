<footer class="footer-area-one">
    <div class="footer-area-one-bg">
        <div class="container">
            <div class="footer-top-one">
                <div class="row">
                    <div class="col-sm-6 col-lg-4">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="/" title="{{ setting('site.title') }}">
                                    <img src="{{ asset('storage/'. setting('site.logo-white')) }}" alt="logo">
                                </a>
                            </div>
                            <div class="footer-content">
                                <p>{{ GoogleTranslate::trans(setting('site.description'), app()->getLocale()) }}</p>
                                <div class="social">
                                    <ul class="list-unstyled">
                                        @if(setting('social-links.facebook_url'))<li><a href="{{ setting('social-links.facebook_url') }}"><i class="fab fa-facebook-f"></i></a></li>@endif
                                        @if(setting('social-links.linkedin_url'))<li><a href="{{ setting('social-links.linkedin_url') }}"><i class="fab fa-linkedin-in"></i></a></li>@endif
                                        @if(setting('social-links.linkedin_url'))<li><a href="{{ setting('social-links.instagram_url') }}"><i class="fab fa-instagram"></i></a></li>@endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="footer-widget ms-5">
                            <h4 class="footer-title uppercase">{{ GoogleTranslate::trans('Liens rapides', app()->getLocale()) }}</h4>
                            <div class="footer-link">
                                <ul>
                                    <li><a href="{{ route('about') }}" title="À propos de nous"><i class="fas fa-angle-right"></i> {{ GoogleTranslate::trans('À propos de nous', app()->getLocale()) }}</a></li>
                                    <li><a href="{{ route('services.index') }}" title="Services"><i class="fas fa-angle-right"></i> {{ GoogleTranslate::trans('Services', app()->getLocale()) }}</a></li>
                                    <li><a href="{{ route('projects.index') }}" title="Projets"><i class="fas fa-angle-right"></i> {{ GoogleTranslate::trans('Projets', app()->getLocale()) }}</a></li>
                                    <li><a href="{{ route('blogs.index') }}" title="Blogs"><i class="fas fa-angle-right"></i> {{ GoogleTranslate::trans('Blogs', app()->getLocale()) }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="footer-widget">
                            <h4 class="footer-title uppercase">{{ GoogleTranslate::trans('Contactez-nous', app()->getLocale()) }}</h4>
                            <div class="footer-address">
                                <ul>
                                    <li class="d-flex">
                                        <div class="icon">
                                            <i class="fas fa-paper-plane"></i>
                                        </div>
                                        <div class="content">
                                            <a href="{{ setting('contact.location') }}" title="Localisation">{{ setting('contact.address') }}</a>
                                        </div>
                                    </li>
                                    <li class="d-flex">
                                        <div class="icon">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="content">
                                            <a href="mailto:{{ setting('contact.email') }}" title="Email">{{ setting('contact.email') }}</a>
                                        </div>
                                    </li>
                                    <li class="d-flex">
                                        <div class="icon">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <div class="content">
                                            <a href="tel:{{ setting('contact.phone') }}" title="Phone">{{ setting('contact.phone') }}</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="copyright">
                            <p>© {{ setting('site.title') . ' ' . date('Y') }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="links text-lg-end">
                            <ul>
                                <li><a href="{{ route('contact') }}" title="Contactez-nous">{{ GoogleTranslate::trans('Contactez-nous', app()->getLocale()) }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
