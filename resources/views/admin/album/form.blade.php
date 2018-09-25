@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{ isset($album) ? "Альбома - $album->ru_title" : "Создание нового альбома" }}
        </h1>
    </section>
    <section class="content container-fluid">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ isset($album) ? $album->ru_title : 'Новый альбом' }}</h3>
                </div>
                <form action="{{ isset($album) ? route('admin.album.update') : route('admin.album.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        @if (isset($album))
                            <input type="text" hidden value="{{ $album->id }}" name="id" id="id">
                        @endif
                        <div class="form-group">
                            <label for="">Заголовок на русском</label>
                            <input type="text" class="form-control" id="ru_title" name="ru_title" placeholder="Заголовок на русском" value="{{ isset($album) ? $album->ru_title : old('ru_title') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Заголовок на английском</label>
                            <input type="text" class="form-control" id="en_title" name="en_title" placeholder="Заголовок на английском" value="{{ isset($album) ? $album->en_title : old('en_title') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Подзаголовок на русском</label>
                            <input type="text" class="form-control" id="ru_subtitle" name="ru_subtitle" placeholder="Подзаголовок на русском" value="{{ isset($album) ? $album->ru_subtitle : old('ru_subtitle') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Подзаголовок на английском</label>
                            <input type="text" class="form-control" id="en_subtitle" name="en_subtitle" placeholder="Подзаголовок на английском" value="{{ isset($album) ? $album->en_subtitle : old('en_subtitle') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Описание на русском</label>
                            <textarea class="form-control" name="ru_description" id="ru_description" cols="30" rows="10">{{ isset($album) ? $album->ru_description : old('ru_description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Описание на английском</label>
                            <textarea class="form-control" name="en_description" id="en_description" cols="30" rows="10">{{ isset($album) ? $album->en_description : old('en_description') }}</textarea>

                        </div>
                        <div class="form-group">
                            <label for="">Фотограф на русском</label>
                            <input type="text" class="form-control" id="ru_photographer" name="ru_photographer" placeholder="Фотограф на русском" value="{{ isset($album) ? $album->ru_photographer : old('ru_photographer') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Фотограф на английском</label>
                            <input type="text" class="form-control" id="en_photographer" name="en_photographer" placeholder="Фотограф на английском" value="{{ isset($album) ? $album->en_photographer : old('en_photographer') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Исполнительный продюсер на русском</label>
                            <input type="text" class="form-control" id="ru_executive" name="ru_executive" placeholder="Исполнительный продюсер на русском" value="{{ isset($album) ? $album->ru_executive : old('ru_executive') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Исполнительный продюсер на английском</label>
                            <input type="text" class="form-control" id="en_executive" name="en_executive" placeholder="Исполнительный продюсер на английском" value="{{ isset($album) ? $album->en_executive : old('en_executive') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Помощник на русском</label>
                            <input type="text" class="form-control" id="ru_assistant" name="ru_assistant" placeholder="Помощник на русском" value="{{ isset($album) ? $album->ru_assistant : old('ru_assistant') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Помощник на английском</label>
                            <input type="text" class="form-control" id="en_assistant" name="en_assistant" placeholder="Помощник на английском" value="{{ isset($album) ? $album->en_assistant : old('en_assistant') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Клиент на русском</label>
                            <input type="text" class="form-control" id="ru_client" name="ru_client" placeholder="Клиент на русском" value="{{ isset($album) ? $album->ru_client : old('ru_client') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Клиент на английском</label>
                            <input type="text" class="form-control" id="en_client" name="en_client" placeholder="Клиент на английском" value="{{ isset($album) ? $album->en_client : old('en_client') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Изображение для списка всех альбомов</label>
                            <br>
                            @if(isset($album))
                                <img src="{{ "/storage/uploads/images/albums/$album->id/$album->title_img" }}" alt="Ошибка" width="128" style="padding-bottom: 10px">
                            @endif
                            <input type="file" name="title_img" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="">Список изображений</label>
                            <br>
                            @if(isset($album))
                                @foreach($album->getImages() as $image)
                                    <div>
                                        <img src="{{ "/storage/uploads/images/albums/$album->id/$image" }}" alt="Ошибка" width="128" style="padding-bottom: 10px">
                                        <span class="deleteImage" style="cursor:pointer;" data-img="{{$image}}" data-album="{{$album->id}}"><i class="fa fa-trash-o"></i></span>
                                    </div>
                                @endforeach
                            @endif
                            <input type="file" multiple name="imgs[]" class="form-control-file">
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{{ route('admin.album.list') }}" class="btn btn-default">Назад</a>
                        <button type="submit" class="btn btn-info pull-right">{{ isset($album) ? 'Обновить' : 'Добавить' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
