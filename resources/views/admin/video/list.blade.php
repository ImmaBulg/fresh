@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Видео
            <small>Редактирование видео</small>
        </h1>
    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Список видео</h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width:50px;">
                                <div class="input-group-btn">
                                    <a class="btn btn-success" href="{{ route('admin.video.create') }}">Добавить</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover sorted_table video_table">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Заголовок</td>
                                <td>Описание</td>
                                <td>Видео</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($videos as $video)
                                <tr data-id="{{ $video->id }}">
                                    <td>{{ $video->id }}</td>
                                    <td><span>{{ $video->ru_title }}</span></td>
                                    <td>
                                        <span>{{ strlen($video->ru_description) > 10 ? mb_substr($video->ru_description, 0, 20) . '...' : $video->ru_description }}</span>
                                    </td>
                                    <td>
                                       {{ $video->url }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.video.edit', $video) }}"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('admin.video.delete', $video) }}"><i class="fa fa-trash-o"></i></a>
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
