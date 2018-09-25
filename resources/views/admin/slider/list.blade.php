@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Слайдер на главной странице
            <small>Редактирование слайдера на главной странице</small>
        </h1>
    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Список слайдов</h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width:50px;">
                                <div class="input-group-btn">
                                    <a class="btn btn-success" href="{{ route('admin.slider.create') }}">Добавить</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover sorted_table slide_table">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Заголовок</td>
                                <td>Описание</td>
                                <td>Десктопная картинка</td>
                                <td>Мобильная картинка</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($slides as $slide)
                                <tr data-id="{{ $slide->id }}">
                                    <td>{{ $slide->id }}</td>
                                    <td><span>{{ $slide->ru_title }}</span><br><span>{{ $slide->en_title }}</span></td>
                                    <td>
                                        <span>{{ strlen($slide->ru_description) > 10 ? mb_substr($slide->ru_description, 0, 10) . '...' : $slide->ru_description }}</span>
                                        <br>
                                        <span>{{ strlen($slide->en_description) > 10 ? mb_substr($slide->en_description, 0, 10) . '...' : $slide->en_description }}</span>
                                    </td>
                                    <td>
                                        <img src="{{ "/storage/uploads/images/$slide->desc_img" }}" alt="Ошибка" width="64">
                                    </td>
                                    <td>
                                        <img src="{{ "/storage/uploads/images/$slide->mob_img" }}" alt="Ошибка" width="64">
                                    </td>
                                    <td>
                                    <td>
                                        <a href="{{ route('admin.slider.edit', $slide) }}"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('admin.slider.delete', $slide) }}"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Ничего не найдено</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
