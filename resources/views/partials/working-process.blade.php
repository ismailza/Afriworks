<section class="working-process-area-one">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title-one">
                    <span class="sub-title uppercase no-after dark">notre processus du travail</span>
                    <h2 class="title">Innovation en construction à votre service</h2>
                </div>
                <div class="working-process-info">
                    <p>Chez Afriworks, nous nous engageons à fournir des solutions de construction innovantes et de haute qualité pour répondre à vos besoins spécifiques.</p>
                    <div class="about-list ms-4 mt-4">
                        @foreach($workingProcessSteps as $workingProcessStep)
                            <div class="about-list-items d-flex">
                                <div class="icon me-2">
                                    <i class="fas fa-angle-double-right"></i>
                                </div>
                                <div class="text">
                                    <h4 class="title">{{ $workingProcessStep->title }}</h4>
                                    <p>{{ $workingProcessStep->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a href="{{ route('services.index') }}" class="common-btn uppercase">Découvrir nos services <i class="fas fa-arrow-right"></i></a>
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
                                <h4>{{ $workingProcessStep->title }}</h4>
                            </div>
                        </div>
                        <div class="number">
                            <h3>{{ $workingProcessStep->step_number }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
