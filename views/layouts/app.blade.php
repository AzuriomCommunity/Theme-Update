@extends('layouts.base')

@section('app')
    <header class="container-fluid">
        @include('elements.navbar')
    </header>

    <main class="container content">
        @include('elements.session-alerts')

        @yield('content')
    </main>
@endsection
