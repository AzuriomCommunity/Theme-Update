<nav class="navbar navbar-expand-md navbar-dark">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div id="navbar" class="collapse navbar-collapse">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav me-auto navbar-left">
            @foreach($navbar as $element)
                @if($loop->index < ($loop->count))
                    @if(!$element->isDropdown())
                        <li class="nav-item @if($element->isCurrent()) active @endif">
                            <a class="nav-link" href="{{ $element->getLink() }}" @if($element->new_tab) target="_blank" rel="noopener" @endif>{{ $element->name }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ $element->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($element->elements as $childElement)
                                    <a class="dropdown-item @if($childElement->isCurrent()) text-primary @endif" href="{{ $childElement->getLink() }}" @if($element->new_tab) target="_blank" rel="noopener" @endif>{{ $childElement->name }}</a>
                                @endforeach
                            </div>
                        </li>
                    @endif
                @endif
            @endforeach
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto navbar-right">
            @auth
                @include('elements.notifications')

                <li class="nav-item dropdown">
                    <a id="userDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('profile.index') }}">
                            {{ trans('messages.nav.profile') }}
                        </a>

                        @if(Auth::user()->hasAdminAccess())
                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                {{ trans('messages.nav.admin') }}
                            </a>
                        @endif

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ trans('auth.logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        {{ trans('auth.login') }}
                    </a>
                </li>

                @if(Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            {{ trans('auth.register') }}
                        </a>
                    </li>
                @endif
            @endauth

            @if($server)
                <li class="nav-item">
                    @if($server->joinUrl())
                        <a href="{{ $server->joinUrl() }}" class="nav-link">
                            {{ trans('messages.server.join') }}
                        </a>
                    @else
                        <a href="#" title="{{ trans('messages.actions.copy') }}" class="nav-link"
                                data-copied="{{ trans('messages.clipboard.copied') }}" data-copy-error="{{ trans('messages.clipboard.error') }}">
                            {{ $server->fullAddress() }}
                        </a>
                    @endif
                </li>
            @endif
        </ul>
    </div>
</nav>
