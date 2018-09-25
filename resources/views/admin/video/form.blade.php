@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{ isset($video) ? "Слайд - $video->ru_title" : "Создание нового видео" }}
        </h1>
    </section>
    <section class="content container-fluid">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ isset($video) ? $video->ru_title : 'Новое видео' }}</h3>
                </div>
                <form action="{{ isset($video) ? route('admin.video.update') : route('admin.video.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        @if (isset($video))
                            <input type="text" hidden value="{{ $video->id }}" name="id" id="id">
                        @endif
                        <div class="form-group">
                            <label for="">Заголовок на русском</label>
                            <input type="text" class="form-control" id="ru_title" name="ru_title" placeholder="Заголовок на русском" value="{{ isset($video) ? $video->ru_title : old('ru_title') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Заголовок на английском</label>
                            <input type="text" class="form-control" id="en_title" name="en_title" placeholder="Заголовок на английском" value="{{ isset($video) ? $video->en_title : old('en_title') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Ссылка на видео</label>
                            <input type="text" class="form-control" id="url" name="url" placeholder="Ссылка на видео" value="{{ isset($video) ? $video->url : old('url') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Лучшее</label>
                            <input type="checkbox" class="" id="best" name="best" placeholder="Лучшее" {{ isset($video) ? ($video->best ? 'checked' : '') : '' }}>
                        </div>
                        <div class="form-group">
                            <label for="">Строка под заголовком на русском</label>
                            <input type="text" class="form-control" id="ru_subtitle" name="ru_subtitle" placeholder="Строка под заголовком на русском" value="{{ isset($video) ? $video->ru_title : old('ru_title') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Строка под заголовком на английском</label>
                            <input type="text" class="form-control" id="en_subtitle" name="en_subtitle" placeholder="Строка под заголовком на английском" value="{{ isset($video) ? $video->en_title : old('en_title') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Описание на русском</label>
                            <textarea class="form-control" name="ru_description" id="ru_description" cols="30" rows="10">{{ isset($video) ? $video->ru_description : old('ru_description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Описание на английском</label>
                            <textarea class="form-control" name="en_description" id="en_description" cols="30" rows="10">{{ isset($video) ? $video->en_description : old('en_description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Директор на русском</label>
                            <input type="text" class="form-control" id="ru_direction" name="ru_direction" placeholder="Директор на русском" value="{{ isset($video) ? $video->ru_direction : old('ru_direction') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Директорна английском</label>
                            <input type="text" class="form-control" id="en_direction" name="en_direction" placeholder="Директор на английском" value="{{ isset($video) ? $video->en_direction : old('en_direction') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Оператор-постановщик на русском</label>
                            <input type="text" class="form-control" id="ru_subtitle" name="ru_dop" placeholder="Оператор-постановщик  на русском" value="{{ isset($video) ? $video->ru_dop : old('ru_dop') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Оператор-постановщик на английском</label>
                            <input type="text" class="form-control" id="en_subtitle" name="en_dop" placeholder="Оператор-постановщик  на английском" value="{{ isset($video) ? $video->en_dop : old('en_dop') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Исполнительный продюсер на русском</label>
                            <input type="text" class="form-control" id="ru_executive" name="ru_executive" placeholder="Исполнительный продюсер на русском" value="{{ isset($video) ? $video->ru_executive : old('ru_executive') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Исполнительный продюсер на английском</label>
                            <input type="text" class="form-control" id="en_executive" name="en_executive" placeholder="Исполнительный продюсер на английском" value="{{ isset($video) ? $video->en_executive : old('en_executive') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Продюсер на русском</label>
                            <input type="text" class="form-control" id="ru_producer" name="ru_producer" placeholder="Продюсер на русском" value="{{ isset($video) ? $video->ru_producer : old('ru_producer') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Продюсер на английском</label>
                            <input type="text" class="form-control" id="en_producer" name="en_producer" placeholder="Продюсер на английском" value="{{ isset($video) ? $video->en_producer : old('en_producer') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Агенство на русском</label>
                            <input type="text" class="form-control" id="ru_agency" name="ru_agency" placeholder="Агенство на русском" value="{{ isset($video) ? $video->ru_agency : old('ru_agency') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Агенство на английском</label>
                            <input type="text" class="form-control" id="en_agency" name="en_agency" placeholder="Агенство на английском" value="{{ isset($video) ? $video->en_agency : old('en_agency') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Клиент на русском</label>
                            <input type="text" class="form-control" id="ru_client" name="ru_client" placeholder="Клиент на русском" value="{{ isset($video) ? $video->ru_client : old('ru_client') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Клиент на английском</label>
                            <input type="text" class="form-control" id="en_client" name="en_client" placeholder="Клиент на русском" value="{{ isset($video) ? $video->en_client : old('en_client') }}">
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{{ route('admin.video.list') }}" class="btn btn-default">Назад</a>
                        <button type="submit" class="btn btn-info pull-right">{{ isset($video) ? 'Обновить' : 'Добавить' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
