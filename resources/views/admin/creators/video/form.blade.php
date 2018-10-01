@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{ isset($creator_video) ? "Видео - $creator_video->id" : "Создание нового видео" }}
        </h1>
    </section>
    <section class="content container-fluid">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ isset($creator_video) ? $creator_video->id : 'Новое видео' }}</h3>
                </div>
                <form action="{{ isset($creator_video) ? route('admin.creator.video.update') : route('admin.creator.video.store') }}" method="post">
                    @csrf
                    <div class="box-body">
                        @if (isset($creator_video))
                            <input type="text" hidden value="{{ $creator_video->id }}" name="id" id="id">
                        @endif
                        <input type="text" hidden value="{{ isset($creator_video) ? $creator_video->creator_id : $creator }}" name="creator_id" id="creator_id">

                        <div class="form-group">
                            <label for="">ID на Vimeo</label>
                            <input type="text" id="viemo_id" name="vimeo_id" placeholder="ID на Vimeo" class="form-control" value="{{ isset($creator_video) ? $creator_video->vimeo_id : old('vimeo_id') }}">
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{{ url()->previous() }}" class="btn btn-default">Назад</a>
                        <button type="submit" class="btn btn-info pull-right">{{ isset($creator_video) ? 'Обновить' : 'Добавить' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
