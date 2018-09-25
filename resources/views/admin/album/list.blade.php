@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Фотогалерея
            <small>Редактирование фотогалереи</small>
        </h1>
    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Список альбомов</h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width:50px;">
                                <div class="input-group-btn">
                                    <a class="btn btn-success" href="{{ route('admin.album.create') }}">Добавить</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover sorted_table">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Заголовок</td>
                                <td>Описание</td>
                                <td>Главная картинка</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($albums as $album)
                                <tr data-id="{{ $album->id }}">
                                    <td>{{ $album->id }}</td>
                                    <td><span>{{ $album->ru_title }}</span><br><span>{{ $album->en_title }}</span></td>
                                    <td>
                                        <span>{{ strlen($album->ru_description) > 10 ? mb_substr($album->ru_description, 0, 10) . '...' : $album->ru_description }}</span>
                                        <br>
                                        <span>{{ strlen($album->en_description) > 10 ? mb_substr($album->en_description, 0, 10) . '...' : $album->en_description }}</span>
                                    </td>
                                    <td>
                                        <img src="{{ "/storage/uploads/images/albums/$album->id/$album->title_img" }}" alt="Ошибка" width="64">
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.album.edit', $album) }}"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('admin.album.delete', $album) }}"><i class="fa fa-trash-o"></i></a>
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
