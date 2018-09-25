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
                <a href='/video-item.html' class="video-prev" style="background-image: url('img/video-img/video-img1.png')">
                    <div class="video-prev-content">
                        <span class="video-prev-first-txt">nazvanie rolika</span>

                    </div>
                </a>
                <a href='/video-item.html' class="video-prev" style="background-image: url('img/video-img/video-img2.png')">
                    <div class="video-prev-content">
                        <span class="video-prev-first-txt">nazvanie rolika</span>

                    </div>
                </a>
                <a href='/video-item.html' class="video-prev" style="background-image: url('img/video-img/video-img3.png')">
                    <div class="video-prev-content">
                        <span class="video-prev-first-txt">nazvanie rolika</span>

                    </div>
                </a>
                <a href='/video-item.html' class="video-prev" style="background-image: url('img/video-img/video-img4.png')">
                    <div class="video-prev-content">
                        <span class="video-prev-first-txt">nazvanie rolika</span>

                    </div>
                </a>
                <a href='/video-item.html' class="video-prev" style="background-image: url('img/video-img/video-img5.png')">
                    <div class="video-prev-content">
                        <span class="video-prev-first-txt">nazvanie rolika</span>

                    </div>
                </a>
                <a href='/video-item.html' class="video-prev" style="background-image: url('img/video-img/video-img6.png')">
                    <div class="video-prev-content">
                        <span class="video-prev-first-txt">nazvanie rolika</span>

                    </div>
                </a>
                <a href='/video-item.html' class="video-prev" style="background-image: url('img/video-img/video-img7.png')">
                    <div class="video-prev-content">
                        <span class="video-prev-first-txt">nazvanie rolika</span>

                    </div>
                </a>
                <a href='/video-item.html' class="video-prev" style="background-image: url('img/video-img/video-img8.png')">
                    <div class="video-prev-content">
                        <span class="video-prev-first-txt">nazvanie rolika</span>

                    </div>
                </a>
                <a href='/video-item.html' class="video-prev" style="background-image: url('img/video-img/video-img9.png')">
                    <div class="video-prev-content">
                        <span class="video-prev-first-txt">nazvanie rolika</span>

                    </div>
                </a>
            </div>
            <div class="tab-page video-content" page-tab='the best'>
                <a href='/video-item.html' class="video-prev" style="background-image: url('img/video-img/video-img1.png')">
                    <div class="video-prev-content">
                        <span class="video-prev-first-txt">nazvanie rolika</span>

                    </div>
                </a>
                <a href='/video-item.html' class="video-prev" style="background-image: url('img/video-img/video-img2.png')">
                    <div class="video-prev-content">
                        <span class="video-prev-first-txt">nazvanie rolika</span>

                    </div>
                </a>
                <a href='/video-item.html' class="video-prev" style="background-image: url('img/video-img/video-img3.png')">
                    <div class="video-prev-content">
                        <span class="video-prev-first-txt">nazvanie rolika</span>

                    </div>
                </a>
            </div>
                @forelse($videos as $video)
                    <a href='#' class="video-prev" style="background-image: url('img/video-img/video-img1.png')">
                        <div class="video-prev-content">
                            <span class="video-prev-first-txt">{{ config('app.locale') === 'en' ? $video->en_title : $video->ru_title }}</span>
                        </div>
                    </a>
                @empty

                @endforelse
        </div>
        <div class="container">
            <a href="#" class="page-txt cont-us">{{ trans('video.contact_us') }}</a>
        </div>
        </div>
    </section>
@endsection
