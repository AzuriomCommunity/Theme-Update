@extends('admin.layouts.admin')

@section('footer_description', 'Theme config')

@include('admin.elements.color-picker')

@push('footer-scripts')
    <script>
        function addLinkListener(el) {
            el.addEventListener('click', function () {
                const element = el.parentNode.parentNode.parentNode;

                element.parentNode.removeChild(element);
            });
        }

        document.querySelectorAll('.link-remove').forEach(function (el) {
            addLinkListener(el);
        });

        document.getElementById('addLinkButton').addEventListener('click', function () {
            let input = '<div class="row g-3"><div class="mb-3 col-md-6">';
            input += '<input type="text" class="form-control" name="footer_links[{index}][name]" placeholder="{{ trans('messages.fields.name') }}"></div>';
            input += '<div class="mb-3 col-md-6"><div class="input-group">';
            input += '<input type="url" class="form-control" name="footer_links[{index}][value]" placeholder="{{ trans('messages.fields.link') }}">';
            input += '<button class="btn btn-outline-danger link-remove" type="button">';
            input += '<i class="bi bi-x-lg"></i></button></div></div></div>';

            const newElement = document.createElement('div');
            newElement.innerHTML = input;

            addLinkListener(newElement.querySelector('.link-remove'));

            document.getElementById('links').appendChild(newElement);
        });

        document.getElementById('configForm').addEventListener('submit', function () {
            let i = 0;

            document.getElementById('links').querySelectorAll('.row').forEach(function (el) {
                el.querySelectorAll('input').forEach(function (input) {
                    input.name = input.name.replace('{index}', i.toString());
                });

                i++;
            });
        });
    </script>
@endpush

@section('content')
    <form action="{{ route('admin.themes.config', $theme) }}" method="POST" id="configForm">
        @csrf

        <div class="card shadow mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">{{ trans('theme::update.config.settings') }}</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label" for="colorInput">{{ trans('messages.fields.color') }}</label>
                    <input type="color" class="form-control form-control-color color-picker @error('color') is-invalid @enderror" id="colorInput" name="color" value="{{ old('color', theme_config('color', '#c0392b')) }}" required>

                    @error('color')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        </div>


        <div class="card shadow mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">{{ trans('theme::update.config.home') }}</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label" for="descriptionSite">{{ trans('theme::update.config.description_site') }}</label>
                    <input type="text" class="form-control @error('description_site') is-invalid @enderror" id="descriptionSite" name="description_site" value="{{ old('description_site', theme_config('description_site')) }}">

                    @error('description_site')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="texteSection1">{{ trans('theme::update.config.texte_section_1') }}</label>
                    <input type="text" class="form-control @error('texte_section_1') is-invalid @enderror" id="texteSection1" name="texte_section_1" value="{{ old('texte_section_1', theme_config('texte_section_1')) }}">

                    @error('texte_section_1')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label" for="icon1">{{ trans('theme::update.config.icon_1') }}</label>
                            <input type="text" class="form-control @error('icon_1') is-invalid @enderror" id="icon1" name="icon_1" value="{{ old('icon_1', theme_config('icon_1')) }}">

                            @error('icon_1')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="titre1">{{ trans('theme::update.config.titre_1') }}</label>
                            <input type="text" class="form-control @error('titre_1') is-invalid @enderror" id="titre1" name="titre_1" value="{{ old('titre_1', theme_config('titre_1')) }}">

                            @error('titre_1')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="texte1">{{ trans('theme::update.config.texte_1') }}</label>
                            <input type="text" class="form-control @error('texte_1') is-invalid @enderror" id="texte1" name="texte_1" value="{{ old('texte_1', theme_config('texte_1')) }}">

                            @error('texte_1')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label" for="icon2">{{ trans('theme::update.config.icon_2') }}</label>
                            <input type="text" class="form-control @error('icon_2') is-invalid @enderror" id="icon2" name="icon_2" value="{{ old('icon_2', theme_config('icon_2')) }}">

                            @error('icon_2')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="titre2">{{ trans('theme::update.config.titre_2') }}</label>
                            <input type="text" class="form-control @error('titre_2') is-invalid @enderror" id="titre2" name="titre_2" value="{{ old('titre_2', theme_config('titre_2')) }}">

                            @error('titre_2')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="texte2">{{ trans('theme::update.config.texte_2') }}</label>
                            <input type="text" class="form-control @error('texte_2') is-invalid @enderror" id="texte2" name="texte_2" value="{{ old('texte_2', theme_config('texte_2')) }}">

                            @error('texte_2')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label" for="icon3">{{ trans('theme::update.config.icon_3') }}</label>
                            <input type="text" class="form-control @error('icon_3') is-invalid @enderror" id="icon3" name="icon_3" value="{{ old('icon_3', theme_config('icon_3')) }}">

                            @error('icon_3')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="titre3">{{ trans('theme::update.config.titre_3') }}</label>
                            <input type="text" class="form-control @error('titre_3') is-invalid @enderror" id="titre3" name="titre_3" value="{{ old('titre_3', theme_config('titre_3')) }}">

                            @error('titre_3')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="texte3">{{ trans('theme::update.config.texte_3') }}</label>
                            <input type="text" class="form-control @error('texte_3') is-invalid @enderror" id="texte3" name="texte_3" value="{{ old('texte_3', theme_config('texte_3')) }}">

                            @error('texte_3')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <small class="form-text mb-3">@lang('messages.icons')</small>

                    <div class="mb-3">
                        <label class="form-label" for="youtubelink">{{ trans('theme::update.config.youtube_link') }}</label>
                        <input type="text" class="form-control @error('youtube_link') is-invalid @enderror" id="youtubelink" name="youtube_link" value="{{ old('youtube_link', theme_config('youtube_link')) }}">

                        @error('youtube_link')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">{{ trans('theme::update.config.footer') }}</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label" for="footerDescriptionInput">{{ trans('theme::update.config.footer_description') }}</label>
                    <textarea class="form-control @error('footer_description') is-invalid @enderror" id="footerDescriptionInput" name="footer_description" rows="3">{{ old('footer_description', theme_config('footer_description')) }}</textarea>

                    @error('footer_description')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="footerArticleInput">{{ trans('theme::update.config.footer_article') }}</label>
                    <textarea class="form-control @error('footer_article') is-invalid @enderror" id="footerArticleInput" name="footer_article" rows="2">{{ old('footer_article', theme_config('footer_article')) }}</textarea>

                    @error('footer_article')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <label class="form-label">{{ trans('theme::update.config.footer_links') }}</label>

                <div id="links">
                    @foreach(theme_config('footer_links') ?? [] as $link)
                        <div class="row g-3">
                            <div class="mb-3 col-md-6">
                                <input type="text" class="form-control" name="footer_links[{index}][name]" placeholder="{{ trans('messages.fields.name') }}" value="{{ $link['name'] }}">
                            </div>

                            <div class="mb-3 col-md-6">
                                <div class="input-group">
                                    <input type="url" class="form-control" name="footer_links[{index}][value]" placeholder="{{ trans('messages.fields.link') }}" value="{{ $link['value'] }}">
                                    <button class="btn btn-outline-danger link-remove" type="button">
                                        <i class="bi bi-x-lg"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mb-2">
                    <button type="button" id="addLinkButton" class="btn btn-sm btn-success">
                        <i class="bi bi-plus-lg"></i> {{ trans('messages.actions.add') }}
                    </button>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </div>
        </div>
    </form>
@endsection
