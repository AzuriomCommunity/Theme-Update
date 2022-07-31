<div class="sub-navbar bg-primary py-2" style="z-index: 40">
    <div class="container footer-join">
        @if($server && $server->isOnline())
            <i class="bi bi-globe fs-2 me-2"></i>
            <h6>{{ trans_choice('messages.server.online', $server->getOnlinePlayers()) }}</h6>
            <h6>&nbsp;|&nbsp;</h6>
            @if($server->joinUrl())
                <a href="{{ $server->joinUrl() }}" class="btn btn-primary">
                    {{ trans('messages.server.join') }}
                </a>
            @else
                <span title="{{ trans('messages.actions.copy') }}" class="copy-address"
                      data-copied="{{ trans('messages.clipboard.copied') }}" data-copy-error="{{ trans('messages.clipboard.error') }}">
                    {{ $server->fullAddress() }}
                </span>
            @endif

        @else
            <h6><i class="bi bi-globe fs-2 me-2"></i>{{ trans('messages.server.offline') }}</h6>
        @endif
    </div>
</div>

<div class="footer-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>{{ trans('theme::update.footer.about') }}</h3>

                <p>{!! theme_config('footer_description') !!}</p>
            </div>
            <div class="col-md-3 links">
                <h3>{{ trans('theme::update.footer.links') }}</h3>

                <p>{!! theme_config('footer_article') !!}</p>

                <ul class="list-unstyled">
                    @foreach(theme_config('footer_links') ?? [] as $link)
                        <li>
                            <a href="{{ $link['value'] }}"><i class="bi bi-arrow-right"></i> {{ $link['name'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3 social">
                <h3>{{ trans('theme::update.footer.social') }}</h3>

                <div class="list-inline">
                    @foreach(social_links() as $link)
                        <a href="{{ $link->value }}" class="list-inline-item mb-2" target="_blank" rel="noreferrer noopener" data-bs-toggle="tooltip" title="{{ $link->title }}">
                            <i class="{{ $link->icon }} fs-2"></i>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="copyright">
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
