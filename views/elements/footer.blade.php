<div class="text-bg-primary py-5">
    <div class="container d-flex align-items-center justify-content-center">
        @if($server && $server->isOnline())
            <i class="bi bi-globe fs-2 me-2"></i>
            <h6 class="mb-0">
                {{ trans_choice('messages.server.online', $server->getOnlinePlayers()) }}
            </h6>
            <h6 class="mb-0">&nbsp;|&nbsp;</h6>
            @if($server->joinUrl())
                <a href="{{ $server->joinUrl() }}" target="_blank" rel="noreferrer noopener" class="color-inherit">
                    <i class="bi bi-arrow-right"></i> {{ trans('messages.server.join') }}
                </a>
            @else
                <span title="{{ trans('messages.actions.copy') }}"
                      data-copied="{{ trans('messages.clipboard.copied') }}"
                      data-copy-error="{{ trans('messages.clipboard.error') }}">
                    {{ $server->fullAddress() }}
                </span>
            @endif

        @else
            <h6><i class="bi bi-globe fs-2 me-2"></i>{{ trans('messages.server.offline') }}</h6>
        @endif
    </div>
</div>

<div class="bg-body-tertiary text-body-secondary py-5">
    <div class="container">
        <div class="row gy-4">
            <div class="col-md-6">
                <h3 class="h4 text-body">
                    {{ trans('theme::update.footer.about') }}
                </h3>

                <p>{!! theme_config('footer_description') !!}</p>
            </div>
            <div class="col-md-3 links">
                <h3 class="h4 text-body">
                    {{ trans('theme::update.footer.links') }}
                </h3>

                <p>{!! theme_config('footer_article') !!}</p>

                <ul class="list-unstyled mb-0">
                    @foreach(theme_config('footer_links') ?? [] as $link)
                        <li>
                            <a href="{{ $link['value'] }}" class="link-body-emphasis"><i class="bi bi-arrow-right"></i> {{ $link['name'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3 social">
                <h3 class="h4 text-body">
                    {{ trans('theme::update.footer.social') }}
                </h3>

                <div class="list-inline">
                    @foreach(social_links() as $link)
                        <a href="{{ $link->value }}" class="list-inline-item link-body-emphasis mb-2" target="_blank" rel="noreferrer noopener" data-bs-toggle="tooltip" title="{{ $link->title }}">
                            <i class="{{ $link->icon }} fs-2"></i>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-black py-4">
    <div class="container">
        <div class="row gy-3 footer-bottom">
            <div class="col-md-6">
                <p class="mb-0">{{ setting('copyright') }}</p>
            </div>
            <div class="col-md-6 text-end">
                <p class="mb-0">@lang('messages.copyright')</p>
            </div>
        </div>
    </div>
</div>
