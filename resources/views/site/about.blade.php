@extends('site.layouts.another.main')

@section('content')
    <div class="page-title">
        <span class="title">{{ config('app.locale') === 'en' ? 'about' : 'о нас' }}</span>
    </div>
    <section>
        <div class="container about page">
            <div class="page-menu">
                @foreach ($tabs as $index => $tab)
                    <div class="tab-block {{ $index === 0 ? 'tab-active' : '' }}" tab-menu='{{ $tab->en_title }}'>
                        <span class="page-menu-link">{{ config('app.locale') === 'en' ? $tab->en_title : $tab->ru_title }}</span>
                    </div>
                @endforeach
            </div>
            <div class="tab-content">
                @foreach ($tabs as $index => $tab)
                    <div class="tab-page about-tab {{ $index === 0 ? 'tab-active-content' : '' }}" page-tab='{{ $tab->en_title }}'>
                        <div class="page-txt-block">
                            <span class="page-txt">{{ config('app.locale') === 'en' ? $tab->en_description : $tab->ru_description }}</span>
                        </div>
                        <div class="video-block">
                            <div class="video-top">
                                <iframe class="video-about" src="https://player.vimeo.com/video/{{ $tab->vimeo_id }}?title=0&byline=0&portrait=0&transparent=0" webkitallowfullscreen mozallowfullscreen allowfullscreen ></iframe>
                            </div>
                            <div class="video-btn">
                                <img src="/img/play-btn.svg">
                            </div>
                        </div>
                    </div>
                @endforeach

                <a href="#" class="page-txt cont-us">{{ trans('video.contact_us') }}</a>
            </div>
        </div>
    </section>
@endsection
