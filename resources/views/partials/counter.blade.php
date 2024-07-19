<section class="counter-area-one">
    <div class="container">
        <div class="row g-4 g-lg-0">
            <div class="col-sm-6 col-lg-3">
                <div class="counter-one-item d-flex align-items-center">
                    <div class="icon">
                        <img src="{{ asset('assets/img/counter/counter-1.svg') }}" alt="feature-1">
                    </div>
                    <div class="info">
                        <h2 class="counter-number"><span class="odometer" data-count="{{ $counter['servicesCount'] }}"></span>+</h2>
                        <p>{{ GoogleTranslate::trans('Service', app()->getLocale()) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="counter-one-item d-flex align-items-center">
                    <div class="icon">
                        <img src="{{ asset('assets/img/counter/counter-2.svg') }}" alt="feature-2">
                    </div>
                    <div class="info">
                        <h2 class="counter-number"><span class="odometer" data-count="{{ $counter['projectsCount'] }}"></span>+</h2>
                        <p>{{ GoogleTranslate::trans('Projet', app()->getLocale()) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="counter-one-item d-flex align-items-center">
                    <div class="icon">
                        <img src="{{ asset('assets/img/counter/counter-3.svg') }}" alt="feature-3">
                    </div>
                    <div class="info">
                        <h2 class="counter-number"><span class="odometer" data-count="{{ $counter['testimonialsCount'] }}"></span>+</h2>
                        <p>{{ GoogleTranslate::trans('Témoignage', app()->getLocale())}}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="counter-one-item d-flex align-items-center">
                    <div class="icon">
                        <img src="{{ asset('assets/img/counter/counter-4.svg') }}" alt="feature-4">
                    </div>
                    <div class="info">
                        <h2 class="counter-number"><span class="odometer" data-count="{{ $counter['teamMembersCount'] }}"></span>+</h2>
                        <p>{{ GoogleTranslate::trans('Membre', app()->getLocale()) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
