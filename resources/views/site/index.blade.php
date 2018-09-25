@extends('site.layouts.index.main')

@section('content')
    <section class="index-content">
        <div id="slider-big" class="owl-carousel">
            @forelse($slides as $slide)
                <div class="slide-img" style="background-image: url('/storage/uploads/images/{{ $slide->desc_img }}');">
                    <div class="slide-big-content container">
                        <div class="slide-big-block">
                            <span class="slide-big-first-txt">{{ config('app.locale') === 'en' ? $slide->en_title : $slide->ru_title  }}</span>
                            <span class="slide-big-second-txt">{{ config('app.locale') === 'en' ? $slide->en_description : $slide->ru_description }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="slide-img" style="background-image: url('./img/slide-img/slide-index1.png');">
                    <div class="slide-big-content container">
                        <div class="slide-big-block">
                            <span class="slide-big-first-txt">siberian crown</span>
                            <span class="slide-big-second-txt">there is something to be proud of </span>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </section>
@endsection
