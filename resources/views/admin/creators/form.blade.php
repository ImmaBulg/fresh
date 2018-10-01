@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{ isset($creator) ? 'Редактирование' : 'Создание нового ...' }}
        </h1>
    </section>
    <section class="content container-fluid">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ isset($creator) ? $creator->ru_title : 'Новый ...' }}</h3>
                </div>
                <form action="{{ isset($creator) ? route('admin.creator.update') : route('admin.creator.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        @if (isset($creator))
                            <input type="text" hidden value="{{ $creator->id }}" name="id" id="id">
                        @endif
                        <div class="form-group">
                            <label for="">Название на русском</label>
                            <input type="text" id="ru_title" name="ru_title" class="form-control" placeholder="Название на русском" value="{{ isset($creator) ? $creator->ru_title : old('ru_title') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Название на английском</label>
                            <input type="text" id="en_title" name="en_title" class="form-control" placeholder="Название на английском" value="{{ isset($creator) ? $creator->en_title : old('en_title') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Описание на русском</label>
                            <textarea name="ru_description" id="ru_description" cols="30" rows="10" placeholder="Описание на русском" class="form-control">{{ isset($creator) ? $creator->ru_description : old('ru_description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Описание на английском</label>
                            <textarea name="en_description" id="en_description" cols="30" rows="10" placeholder="Описание на английском" class="form-control">{{ isset($creator) ? $creator->en_description : old('en_description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">ID видео для списка</label>
                            <input type="text" class="form-control" id="vimeo_id" name="vimeo_id" value="{{ isset($creator) ? $creator->vimeo_id : old('vimeo_id') }}">
                        </div>
                        @if (isset($creator))
                            <div class="form-group">
                                <label for="">Шаблон</label>
                                <textarea name="template" id="template" cols="30" rows="10" class="form-control" placeholder="Шаблон">{{ $creator->template }}</textarea>
                            </div>
                        @endif
                    </div>
                    <div class="box-footer">
                        <a href="{{ route('admin.creator.list') }}" class="btn btn-default">Назад</a>
                        <button type="submit" class="btn btn-info pull-right">{{ isset($creator) ? 'Обновить' : 'Добавить' }}</button>
                    </div>
                </form>
            </div>
            @if (isset($creator))
                @include('admin.creators.text.list')
                @include('admin.creators.video.list')
                @include('admin.creators.slider.list')
            @endif
        </div>
    </section>
@endsection
