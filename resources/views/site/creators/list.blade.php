@extends('site.layouts.another.main')

@section('content')
    <div class="page-title">
        <span class="title">{{ trans('index.the_creators') }}</span>
    </div>
    <section>
        <div class="creators page">
            <div class="slider-creators swiper-container">
                <div class="slide-block-scroll swiper-wrapper" data-swiper-parallax-duration="6000">
                    @foreach ($creators as $creator)
                        <a href="{{ route('site.creator', $creator) }}" class="slide-creators swiper-slide">
                            <div class="slide-prev slide-img-creators">
                                <div class="video-top-creatotrs">
                                    <iframe class="video-creators" src="https://player.vimeo.com/video/{{ $creator->vimeo_id }}?title=0&byline=0&portrait=0&transparent=0" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""  allow='autoplay;'></iframe>
                                </div>
                            </div>
                            <div class="slide-creators-content">
                                <span class="slide-creators-name">{{ $creator->{config('app.locale') . '_title'} }}</span>
                                <span class="slide-creators-text">{{ config('app.locale') === 'en' ? $creator->en_description : $creator->ru_description }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="swiper-scrollbar scrollbar-creators"></div>
            <div class="mobile-creators">
                <div class="tab-page video-content tab-active-content" page-tab='latest'>
                    @foreach ($creators as $creator)
                        <a href='{{ route('site.creator', $creator) }}' class="video-prev" style="background-image: url('img/video-img/video-img1.png')">
                            <div class="video-prev-content">
                                <span class="video-prev-first-txt">{{ $creator->{config('app.locale') . '_title'} }}</span>

                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
