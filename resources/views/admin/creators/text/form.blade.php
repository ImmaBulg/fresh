@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{ isset($creator_text) ? "Текст - $creator_text->id" : "Создание нового текста" }}
        </h1>
    </section>
    <section class="content container-fluid">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ isset($creator_text) ? $creator_text->id : 'Новый текст' }}</h3>
                </div>
                <form action="{{ isset($creator_text) ? route('admin.creator.text.update') : route('admin.creator.text.store') }}" method="post">
                    @csrf
                    <div class="box-body">
                        @if (isset($creator_text))
                            <input type="text" hidden value="{{ $creator_text->id }}" name="id" id="id">
                        @endif
                        <input type="text" hidden value="{{ isset($creator_text) ? $creator_text->creator_id : $creator }}" name="creator_id" id="creator_id">

                        <div class="form-group">
                            <label for="">Описание на русском</label>
                            <textarea class="form-control" name="ru_text" id="ru_text" cols="30" rows="10">{{ isset($creator_text) ? $creator_text->ru_text : old('ru_text') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Описание на английском</label>
                            <textarea class="form-control" name="en_text" id="en_text" cols="30" rows="10">{{ isset($creator_text) ? $creator_text->en_text : old('en_text') }}</textarea>

                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{{ url()->previous() }}" class="btn btn-default">Назад</a>
                        <button type="submit" class="btn btn-info pull-right">{{ isset($creator_text) ? 'Обновить' : 'Добавить' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
