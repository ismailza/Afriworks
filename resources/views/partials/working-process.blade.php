<section class="working-process-area-one">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title-one">
                    <span class="sub-title uppercase no-after dark">{{ GoogleTranslate::trans('notre processus du travail', app()->getLocale()) }}</span>
                    <h2 class="title">{{ GoogleTranslate::trans('Innovation en construction à votre service', app()->getLocale()) }}</h2>
                </div>
                <div class="working-process-info">
                    <p>{{ GoogleTranslate::trans('Chez Afriworks, nous nous engageons à fournir des solutions de construction innovantes et de
                        haute qualité pour répondre à vos besoins spécifiques.', app()->getLocale()) }}</p>
                    <div class="about-list ms-4 mt-4">
                        @foreach($workingProcessSteps as $workingProcessStep)
                            <div class="about-list-items d-flex">
                                <div class="icon me-2">
                                    <i class="fas fa-angle-double-right"></i>
                                </div>
                                <div class="text">
                                    <h4 class="title">{{ GoogleTranslate::trans($workingProcessStep->title, app()->getLocale()) }}</h4>
                                    <p>{{ GoogleTranslate::trans($workingProcessStep->description, app()->getLocale()) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a href="{{ route('services.index') }}" class="common-btn uppercase">{{ GoogleTranslate::trans('Découvrir nos services', app()->getLocale()) }} <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-5 ms-auto">
                @foreach($workingProcessSteps as $workingProcessStep)
                    <div class="working-process-item d-flex justify-content-between align-items-center">
                        <div class="info d-flex align-items-center">
                            <div class="image">
                                <img src="{{ asset('storage/'. $workingProcessStep->icon) }}" alt="{{ $workingProcessStep->title }}">
                            </div>
                            <div class="title">
                                <h4>{{ GoogleTranslate::trans($workingProcessStep->title, app()->getLocale()) }}</h4>
                            </div>
                        </div>
                        <div class="number">
                            <h3>{{ GoogleTranslate::trans($workingProcessStep->step_number, app()->getLocale()) }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
