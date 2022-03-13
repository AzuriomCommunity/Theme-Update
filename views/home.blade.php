@extends('layouts.base')

@section('title', trans('messages.home'))

@push('scripts')
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js" defer></script>
    <script src="{{ theme_asset('js/fire.js') }}" defer></script>
@endpush

@section('app')
<div class="background-overlay mb-5" style="background: url('{{ setting('background') ? image_url(setting('background')) : 'https://via.placeholder.com/2000x500' }}') no-repeat center / cover">
    <div id="particles-js"></div>

    <div>
        <header>
            @include('elements.navbar')
        </header>

        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <img src="{{ site_logo() }}" alt="{{ site_name() }}" data-tilt data-tilt-scale="1.2" width="250">
                </div>
            </div>
            <div class="home-content pb-4">
                <h1>{{ site_name() }}</h1>
                <h6 class="mb-3">{{ theme_config('description_site') }}</h6>

                <div class="list-inline">
                    @foreach(social_links() as $link)
                        <a href="{{ $link->value }}" target="_blank" rel="noreferrer noopener" title="{{ $link->title }}">
                            <div class="list-inline-item">
                                <i class="{{ $link->icon }} fs-3 m-2"></i>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="information text-center mb-5">
        @if(theme_config('texte_section_1'))
            <h1 class="mb-4">{{ theme_config('texte_section_1') }}</h1>
        @endif
        <div class="row justify-content-center home-section-information mb-5">
            @if(theme_config('titre_1'))
                <div class="col-md-4">
                    <div class="element">
                        <i class="{{ theme_config('icon_1') }}"></i>
                        <h3>{{ theme_config('titre_1') }}</h3>
                        <p>{{ theme_config('texte_1') }}</p>
                    </div>
                </div>
            @endif
            @if(theme_config('titre_2'))
                <div class="col-md-4">
                    <div class="element">
                        <i class="{{ theme_config('icon_2') }}"></i>
                        <h3>{{ theme_config('titre_2') }}</h3>
                        <p>{{ theme_config('texte_2') }}</p>
                    </div>
                </div>
            @endif
            @if(theme_config('titre_3'))
                <div class="col-md-4">
                    <div class="element">
                        <i class="{{ theme_config('icon_3') }}"></i>
                        <h3>{{ theme_config('titre_3') }}</h3>
                        <p>{{ theme_config('texte_3') }}</p>
                    </div>
                </div>
            @endif
            @if($message)
                <div class="col-12 mt-4">
                    <div class="element">
                        {{ $message }}
                    </div>
                </div>
            @endif
        </div>
        <a href="{{ route('posts.index') }}" title="News"><i class="bi bi-plus-lg"></i></a>
    </div>

    @if(theme_config('youtube_link'))
        <div class="ratio ratio-16x9 mb-5">
            <iframe src="https://www.youtube.com/embed/{{ theme_config('youtube_link') }}" title="YouTube video" allowfullscreen></iframe>
        </div>
    @endif
</div>
@endsection
