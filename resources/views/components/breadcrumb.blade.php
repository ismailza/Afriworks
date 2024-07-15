<section class="breadcrumb-area" data-background="{{$background ?? asset('assets/img/bg/bread-crumb-bg.png')}}">
    <div class="container">
        <div class="breadcrumb-content">
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <div class="breadcrumb-title">
                        <h2 class="title text-white">{{ $title }}</h2>
                    </div>
                </div>
                <div class="col-md-6 align-self-center">
                    <ul class="list-unstyled bread-crumb text-md-end">
                        {{ $slot }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
