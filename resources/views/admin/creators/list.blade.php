@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Создатели
            <small>Редактирование страницы the creators</small>
        </h1>
    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Список содателей</h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width:50px;">
                                <div class="input-group-btn">
                                    <a class="btn btn-success" href="{{ route('admin.creator.create') }}">Добавить</a>
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
                            @forelse($creators as $creator)
                                <tr data-id="{{ $creator->id }}">
                                    <td>{{ $creator->id }}</td>
                                    <td><span>{{ $creator->ru_title }}</span><br><span>{{ $creator->en_title }}</span></td>
                                    <td>
                                        <span>{{ strlen($creator->ru_description) > 10 ? mb_substr($creator->ru_description, 0, 10) . '...' : $creator->ru_description }}</span>
                                        <br>
                                        <span>{{ strlen($creator->en_description) > 10 ? mb_substr($creator->en_description, 0, 10) . '...' : $creator->en_description }}</span>
                                    </td>
                                    <td>
                                        {{ $creator->vimeo_id }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.creator.edit', $creator) }}"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('admin.creator.delete', $creator) }}"><i class="fa fa-trash-o"></i></a>
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
