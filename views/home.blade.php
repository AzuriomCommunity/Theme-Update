@extends('layouts.base')

@section('title', trans('messages.home'))

@push('scripts')
    <script src="{{ theme_asset('js/particles.min.js') }}" defer></script>
    <script src="{{ theme_asset('js/fire.js') }}" defer></script>
@endpush

@section('app')
    <div class="home-background mb-5" style="background: url('{{ setting('background') ? image_url(setting('background')) : 'https://via.placeholder.com/2000x500' }}') no-repeat center / cover">
        <div id="particles-js"></div>

        <div>
            <header class="container-fluid">
                @include('elements.navbar')
            </header>

            <div class="container d-flex flex-column justify-content-center align-items-center">
                <img src="{{ site_logo() }}" alt="{{ site_name() }}" class="mt-5" data-tilt data-tilt-scale="1.2" width="250">
                <div class="position-relative text-center text-light z-2 pt-2 pb-5">
                    <h1 class="display-1 fw-semibold">{{ site_name() }}</h1>
                    <p>{{ theme_config('description_site') }}</p>

                    <div class="list-inline home-links">
                        @foreach(social_links() as $link)
                            <div class="list-inline-item mx-3">
                                <a href="{{ $link->value }}" target="_blank" rel="noreferrer noopener" title="{{ $link->title }}" class="home-link link-body-emphasis">
                                    <i class="{{ $link->icon }} fs-3 m-2"></i>
                                </a>
                            </div>
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
            <div class="row gy-3 justify-content-center home-section-information mb-5">
                @if(theme_config('titre_1'))
                    <div class="col-md-4">
                        <div class="element">
                            <i class="{{ theme_config('icon_1') }} text-primary"></i>
                            <h3>{{ theme_config('titre_1') }}</h3>
                            <p>{{ theme_config('texte_1') }}</p>
                        </div>
                    </div>
                @endif
                @if(theme_config('titre_2'))
                    <div class="col-md-4">
                        <div class="element">
                            <i class="{{ theme_config('icon_2') }} text-primary"></i>
                            <h3>{{ theme_config('titre_2') }}</h3>
                            <p>{{ theme_config('texte_2') }}</p>
                        </div>
                    </div>
                @endif
                @if(theme_config('titre_3'))
                    <div class="col-md-4">
                        <div class="element">
                            <i class="{{ theme_config('icon_3') }} text-primary"></i>
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

            @if(! $servers->isEmpty())
                <h2 class="mb-4 text-center">
                    {{ trans('messages.servers') }}
                </h2>

                <div class="row gy-3 justify-content-center home-section-information mb-5">
                    @foreach($servers as $server)
                        <div class="col-md-4">
                            <div class="element">
                                <h3 class="mb-3">{{ $server->name }}</h3>

                                @if($server->isOnline())
                                    <div class="progress mb-1">
                                        <div class="progress-bar" role="progressbar" style="width: {{ $server->getPlayersPercents() }}%">
                                        </div>
                                    </div>

                                    <p class="mb-1">
                                        {{ trans_choice('messages.server.total', $server->getOnlinePlayers(), [
                                            'max' => $server->getMaxPlayers(),
                                        ]) }}
                                    </p>
                                @else
                                    <p>
                                <span class="badge bg-danger text-white">
                                    {{ trans('messages.server.offline') }}
                                </span>
                                    </p>
                                @endif

                                @if($server->joinUrl())
                                    <a href="{{ $server->joinUrl() }}" class="btn btn-primary">
                                        {{ trans('messages.server.join') }}
                                    </a>
                                @else
                                    <p>{{ $server->fullAddress() }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <a href="{{ route('posts.index') }}" class="btn btn-primary btn-lg">
                <i class="bi bi-newspaper"></i> {{ trans('messages.news') }}
            </a>
        </div>

        @if(theme_config('youtube_link'))
            <div class="ratio ratio-16x9 mb-5">
                <iframe src="https://www.youtube.com/embed/{{ theme_config('youtube_link') }}&autoplay=1"
                        srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/{{ theme_config('youtube_link') }}?autoplay=1><img src=https://img.youtube.com/vi/{{ theme_config('youtube_link') }}/hqdefault.jpg><span>▶</span></a>"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                ></iframe>
            </div>
        @endif
    </div>
@endsection
