@extends('site.layouts.another.main')

@section('content')
    <div class="page-title">
        <span class="title">{{ config('app.locale') === 'en' ? $video->en_title : $video->ru_title }}</span>
    </div>
    <section>
        <div class="container video-item page">
            <span class="second-title">{{ config('app.locale') === 'en' ? $video->en_subtitle : $video->ru_subtitle }}</span>
            <div class="video-block">
                <div class="video-top">
                    <iframe class="video-about" src="https://player.vimeo.com/video/{{ $video->vimeo_id }}?title=0&byline=0&portrait=0&transparent=0" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" data-ready="true" allow='autoplay;'></iframe>
                </div>
                <div class="video-btn">
                    <img src="/img/play-btn.svg">
                </div>
            </div>
            <div class="video-txt-block">
                <span class="page-txt page-first-txt">{{ config('app.locale') === 'en' ? $video->en_description : $video->ru_description }}</span>
                @if (config('app.locale') === 'en')
                    @if ($video->en_direction)
                        <span class="page-txt page-second-txt">{{ trans('video.director') . ': ' . $video->en_direction }}</span>
                    @endif
                    @if ($video->en_dop)
                            <span class="page-txt page-second-txt">{{ trans('video.dop') . ': ' . $video->en_dop }}</span>
                    @endif
                    @if ($video->en_executive)
                            <span class="page-txt page-second-txt">{{ trans('video.executive') . ': ' . $video->en_executive }}</span>
                    @endif
                    @if ($video->en_producer)
                            <span class="page-txt page-second-txt">{{ trans('video.producer') . ': ' . $video->en_producer }}</span>
                    @endif
                    @if ($video->en_agency)
                            <span class="page-txt page-second-txt">{{ trans('video.agency') . ': ' . $video->en_agency }}</span>
                    @endif
                    @if ($video->en_client)
                            <span class="page-txt page-second-txt">{{ trans('video.client') . ': ' . $video->en_client }}</span>
                    @endif
                @else
                    @if ($video->ru_direction)
                        <span class="page-txt page-second-txt">{{ trans('video.director') . ': ' . $video->ru_direction }}</span>
                    @endif
                    @if ($video->ru_dop)
                        <span class="page-txt page-second-txt">{{ trans('video.dop') . ': ' . $video->ru_dop }}</span>
                    @endif
                    @if ($video->ru_executive)
                        <span class="page-txt page-second-txt">{{ trans('video.executive') . ': ' . $video->ru_executive }}</span>
                    @endif
                    @if ($video->ru_producer)
                        <span class="page-txt page-second-txt">{{ trans('video.producer') . ': ' . $video->ru_producer }}</span>
                    @endif
                    @if ($video->ru_agency)
                        <span class="page-txt page-second-txt">{{ trans('video.agency') . ': ' . $video->ru_agency }}</span>
                    @endif
                    @if ($video->ru_client)
                        <span class="page-txt page-second-txt">{{ trans('video.client') . ': ' . $video->ru_client }}</span>
                    @endif
                @endif

            </div>
            <!-- <a href="#" class="page-txt cont-us">back to work</a> -->
        </div>
    </section>
@endsection
