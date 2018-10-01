@extends('site.layouts.another.main')

@section('content')
    <div class="page-title">
        <span class="title">{{ trans('index.the_creators') }}</span>
    </div>
    <section>
        <div class="container creators-new page">
            {!! $creator->renderPage() !!}
        </div>
    </section>
@endsection
