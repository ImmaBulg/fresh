@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{ isset($tab) ? "Вкладка - $tab->ru_title" : "Создание новой вкладки" }}
        </h1>
    </section>
    <section class="content container-fluid">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ isset($tab) ? $tab->ru_title : 'Новая вкладка' }}</h3>
                </div>
                <form action="{{ isset($tab) ? route('admin.about.update') : route('admin.about.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        @if (isset($tab))
                            <input type="text" hidden value="{{ $tab->id }}" name="id" id="id">
                        @endif
                        <div class="form-group">
                            <label for="">Заголовок на русском</label>
                            <input type="text" class="form-control" id="ru_title" name="ru_title" placeholder="Заголовок на русском" value="{{ isset($tab) ? $tab->ru_title : old('ru_title') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Заголовок на английском</label>
                            <input type="text" class="form-control" id="en_title" name="en_title" placeholder="Заголовок на английском" value="{{ isset($tab) ? $tab->en_title : old('en_title') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Описание на русском</label>
                            <textarea class="form-control" name="ru_description" id="ru_description" cols="30" rows="10">{{ isset($tab) ? $tab->ru_description : old('ru_description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Описание на английском</label>
                            <textarea class="form-control" name="en_description" id="en_description" cols="30" rows="10">{{ isset($tab) ? $tab->en_description : old('en_description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">ID видео</label>
                            <input type="text" class="form-control" id="vimeo_id" name="vimeo_id" placeholder="ID видео" value="{{ isset($tab) ? $tab->vimeo_id : old('vimeo_id') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Отображать</label>
                            <input type="checkbox" name="active" id="active" {{ isset($tab) ? ($tab->active ? 'checked' : '') : '' }}>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{{ route('admin.about.list') }}" class="btn btn-default">Назад</a>
                        <button type="submit" class="btn btn-info pull-right">{{ isset($tab) ? 'Обновить' : 'Добавить' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
