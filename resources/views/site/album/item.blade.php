@extends('site.layouts.another.main')

@section('content')
    <div class="page-title">
        <span class="title">{{ config('app.locale') === 'en' ? $album->en_title : $album->ru_title }}</span>
    </div>
    <section>

        <div class="container photo page">
            <span class="page-txt photo-second-title">{{ config('app.locale') === 'en' ? $album->en_subtitle : $album->ru_subtitle }}</span>
            <div id="slider-photo" class="slider-photo owl-carousel">
                @foreach ($albums as $index => $album)
                    <div class="slider-photo-block">
                        <div class="slide-img-view"></div>
                        <!-- <div class="slide-photo-number">
                     <span class="slider-photo-number-txt">
                              <span class="slide-num">1</span>
                              /
                              <span class="slide-col">5</span>
                            </span>
                  </div> -->
                        <div class="slider-preview-photo swiper-container s{{ $index + 1 }}" data-id="s{{ $index + 1 }}">
                            <div class="slide-block-scroll swiper-wrapper">
                                @foreach($album->getImages() as $image)
                                    <div class="slide-prev swiper-slide">
                                        <img src="/storage/uploads/images/albums/{{$album->id}}/{{$image}}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="swiper-scrollbar"></div>
                        <div class="photo-txt-block">
                            @if (config('app.locale') === 'en')
                                @if (isset($album->en_description))
                                    <span class="photo-txt-first page-txt">{{ $album->en_description }}</span>
                                @endif

                                @if (isset($album->en_description))
                                    <span class="photo-txt page-txt">{{ trans('photo.photographer') . ': ' . $album->en_photographer }}</span>
                                @endif
                                @if (isset($album->en_description))
                                    <span class="photo-txt page-txt">{{ trans('photo.executive') . ': ' . $album->en_executive }}</span>
                                @endif
                                @if (isset($album->en_description))
                                    <span class="photo-txt page-txt">{{ trans('photo.assistant') . ': ' . $album->en_assistant }}</span>
                                @endif
                                @if (isset($album->en_description))
                                    <span class="photo-txt page-txt">{{ trans('photo.client') . ': ' . $album->en_client }}</span>
                                @endif
                            @else
                                @if (isset($album->ru_description))
                                    <span class="photo-txt-first page-txt">{{ $album->ru_description }}</span>
                                @endif

                                @if (isset($album->ru_description))
                                    <span class="photo-txt page-txt">{{ trans('photo.photographer') . ': ' . $album->ru_photographer }}</span>
                                @endif
                                @if (isset($album->ru_description))
                                    <span class="photo-txt page-txt">{{ trans('photo.executive') . ': ' . $album->ru_executive }}</span>
                                @endif
                                @if (isset($album->ru_description))
                                    <span class="photo-txt page-txt">{{ trans('photo.assistant') . ': ' . $album->ru_assistant }}</span>
                                @endif
                                @if (isset($album->ru_description))
                                    <span class="photo-txt page-txt">{{ trans('photo.client') . ': ' . $album->ru_client }}</span>
                                @endif
                            @endif

                        </div>
                    </div>
                @endforeach

            </div>
            <!--    <a href="#" class="page-txt cont-us">back to work</a> </div>-->
        <div class="photo-content photo-gallery" page-tab='latest'>
            @foreach($albums as $album)
                <div class="video-prev" style="background-image: url('/storage/uploads/images/albums/{{$album->id}}/{{$album->title_img}}')">
                    <div class="video-prev-content">
                        <span class="video-prev-first-txt">{{ config('app.locale') === 'en' ? $album->en_title : $album->ru_title }}</span>
                    </div>
                </div>
            @endforeach
        </div>
        </div>

    </section>
@endsection

@php
    $url = explode('/', $_SERVER['REQUEST_URI']);
    $index = (int)end($url);
@endphp

@section('scripts')
    <script>
        window.album_index = {!! json_encode($index) !!} - 1;
        var albums = {!! $albums !!};
        var locale = '{!! config('app.locale') !!}';
        console.log(albums);

        $(document).ready(function() {
            console.log(album_index);
            sliderPhoto.trigger('to.owl.carousel', [album_index, 1]);
            sliderPhoto.on('changed.owl.carousel', function(event) {
                var current_album = albums[event.item.index];
                if (locale === 'en') {
                    $('.title').text(current_album['en_title']);
                    $('.photo-second-title').text(current_album['en_subtitle']);
                } else {
                    $('.title').text(current_album['ru_title']);
                    $('.photo-second-title').text(current_album['ru_subtitle']);
                }
                console.log(event.item.index);
            });
        });
    </script>
@endsection
