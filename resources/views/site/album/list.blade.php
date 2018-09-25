@extends('site.layouts.another.main')

@section('content')
    <div class="page-title">
        <span class="title">{{ config('app.locale') === 'en' ? 'photo' : 'фото' }}</span>
    </div>
    <section>
        <div class="container photo page">
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
            <div class="tab-page photo-content tab-active-content" page-tab='latest'>
                @foreach($latest_albums as $album)
                    <a href='{{ route('site.album', $album) }}' class="video-prev" style="background-image: url('/storage/uploads/images/albums/{{$album->id}}/{{$album->title_img}}')">
                        <div class="video-prev-content">
                            <span class="video-prev-first-txt">{{ config('app.locale') === 'en' ? $album->en_title : $album->ru_title }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="tab-page photo-content" page-tab='the best'>
                @foreach($best_albums as $album)
                    <a href='{{ route('site.album', $album) }}' class="video-prev" style="background-image: url('/storage/uploads/images/albums/{{$album->id}}/{{$album->title_img}}')">
                        <div class="video-prev-content">
                            <span class="video-prev-first-txt">{{ config('app.locale') === 'en' ? $album->en_title : $album->ru_title }}</span>

                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="container">
            <a href="#" class="page-txt cont-us">contact us</a>
        </div>
        </div>
    </section>
@endsection
