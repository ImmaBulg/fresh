@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{ isset($creator_slider) ? "Слайдер - $creator_slider->id" : "Создание нового слайдера" }}
        </h1>
    </section>
    <section class="content container-fluid">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ isset($creator_slider) ? $creator_slider->id : 'Новый слайдер' }}</h3>
                </div>
                <form action="{{ isset($creator_slider) ? route('admin.creator.slider.update') : route('admin.creator.slider.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        @if (isset($creator_slider))
                            <input type="text" hidden value="{{ $creator_slider->id }}" name="id" id="id">
                        @endif
                            <input type="text" hidden value="{{ isset($creator_slider) ? $creator_slider->creator_id : $creator }}" name="creator_id" id="creator_id">
                        <div class="form-group">
                            <label for="">Список изображений</label>
                            <br>
                            @if(isset($creator_slider))
                                @foreach($creator_slider->getImages() as $image)
                                    <div>
                                        <img src="{{ "/storage/uploads/images/creators/sliders/$creator_slider->id/$image" }}" alt="Ошибка" width="128" style="padding-bottom: 10px">
                                        <span class="deleteImage" style="cursor:pointer;" data-img="{{$image}}" data-album="{{$creator_slider->id}}"><i class="fa fa-trash-o"></i></span>
                                    </div>
                                @endforeach
                            @endif
                            <input type="file" multiple name="imgs[]" class="form-control-file">
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{{ url()->previous() }}" class="btn btn-default">Назад</a>
                        <button type="submit" class="btn btn-info pull-right">{{ isset($creator_slider) ? 'Обновить' : 'Добавить' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
