@extends('site.layouts.another.main')

@section('content')
    <div class="page-title">
        <span class="title">{{ config('app.locale') === 'en' ? 'video' : 'видео' }}</span>
    </div>
    <section>
        <div class="container video page">
            <div class="page-menu">
                <div class="tab-block tab-active" tab-menu='latest'>
                    <span class="page-menu-link">{{ trans('video.latest') }}</span>
                </div>
                <div class="tab-block" tab-menu='the best'>
                    <span class="page-menu-link">{{ trans('video.the_best') }}</span>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-page video-content tab-active-content" page-tab='latest'>
                @forelse($last_videos as $video)
                    <a href='{{ route('site.video', $video->id) }}' class="video-prev" style="background-image: url('{{ $video->img }}')">
                        <div class="video-prev-content">
                            <span class="video-prev-first-txt">{{ config('app.locale') === 'en' ? $video->en_title : $video->ru_title }}</span>
                        </div>
                    </a>
                @empty

                @endforelse
            </div>
            <div class="tab-page video-content" page-tab='the best'>
                @forelse($best_videos as $video)
                    <a href='{{ route('site.video', $video->id) }}' class="video-prev" style="background-image: url('{{ $video->img }}')">
                        <div class="video-prev-content">
                            <span class="video-prev-first-txt">{{ config('app.locale') === 'en' ? $video->en_title : $video->ru_title }}</span>
                        </div>
                    </a>
                @empty

                @endforelse
            </div>
        </div>
        <div class="container">
            <a href="#" class="page-txt cont-us">{{ trans('video.contact_us') }}</a>
        </div>
        </div>
    </section>
@endsection
