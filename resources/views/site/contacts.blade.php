@extends('site.layouts.another.main')

@section('content')
    <div class="page-title">
        <span class="title">{{ config('app.locale') === 'en' ? 'contact' : 'контакты' }}</span>
    </div>
    <section>
        <div class="container contact page">
            <div class="contact-adress">
                {!! config('app.locale') === 'en' ? $page->en_contacts : $page->ru_contacts !!}
            </div>
            <div id="map">
            </div>
            <div class="contact-info">
                <div class="contact-info-block">
                    {!! config('app.locale') === 'en' ? $page->en_executive : $page->ru_executive !!}
                </div>
                <div class="contact-info-block">
                    {!! config('app.locale') === 'en' ? $page->en_executive_two : $page->ru_executive_two !!}
                </div>
                <div class="contact-info-block">
                    {!! config('app.locale') === 'en' ? $page->en_producer : $page->ru_producer !!}
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    {!!  $page->map !!}
@endsection
