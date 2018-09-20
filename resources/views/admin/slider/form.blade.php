@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{ isset($slide) ? "Слайд - $slide->ru_title" : "Создание нового слайда" }}
        </h1>
    </section>
    <section class="content container-fluid">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ isset($slide) ? $slide->ru_title : 'Новый слайд' }}</h3>
                </div>
                <form action="{{ isset($slide) ? route('admin.slider.update') : route('admin.slider.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        @if (isset($slide))
                            <input type="text" hidden value="{{ $slide->id }}" name="id" id="id">
                        @endif
                        <div class="form-group">
                            <label for="">Заголовок на русском</label>
                            <input type="text" class="form-control" id="ru_title" name="ru_title" placeholder="Заголовок на русском" value="{{ isset($slide) ? $slide->ru_title : old('ru_title') }}">
                        </div>
                            <div class="form-group">
                                <label for="">Заголовок на английском</label>
                                <input type="text" class="form-control" id="en_title" name="en_title" placeholder="Заголовок на английском" value="{{ isset($slide) ? $slide->en_title : old('en_title') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Описание на русском</label>
                                <input type="text" class="form-control" id="ru_description" name="ru_description" placeholder="Описание на русском" value="{{ isset($slide) ? $slide->ru_description : old('ru_description') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Описание на английском</label>
                                <input type="text" class="form-control" id="en_description" name="en_description" placeholder="Название" value="{{ isset($slide) ? $slide->en_description : old('en_description') }}">
                            </div>

                            <div class="form-group">
                                <label for="">Картинка десктопная</label>
                                <br>
                                @if(isset($slide))
                                    <img src="{{ "/storage/uploads/images/$slide->desc_img" }}" alt="Ошибка" width="128" style="padding-bottom: 10px">
                                @endif
                                <input type="file" name="desc_img" class="form-control-file">
                            </div>
                            <div class="form-group">
                                <label for="">Картинка мобильная</label>
                                <br>
                                @if(isset($slide))
                                    <img src="{{ "/storage/uploads/images/$slide->mob_img" }}" alt="Ошибка" width="128" style="padding-bottom: 10px">
                                @endif
                                <input type="file" name="mob_img" class="form-control-file">
                            </div>
                    </div>
                    <div class="box-footer">
                        <a href="{{ route('admin.slider.list') }}" class="btn btn-default">Назад</a>
                        <button type="submit" class="btn btn-info pull-right">{{ isset($slide) ? 'Обновить' : 'Добавить' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
