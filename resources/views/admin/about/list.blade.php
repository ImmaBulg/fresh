@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            О нас
            <small>Редактирование вкладок на странице "О нас"</small>
        </h1>
    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Список вкладок</h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width:50px;">
                                <div class="input-group-btn">
                                    <a class="btn btn-success" href="{{ route('admin.about.create') }}">Добавить</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover sorted_table about_table">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Заголовок</td>
                                <td>Описание</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($tabs as $tab)
                                <tr data-id="{{ $tab->id }}">
                                    <td>{{ $tab->id }}</td>
                                    <td><span>{{ $tab->ru_title }}</span><br><span>{{ $tab->en_title }}</span></td>
                                    <td>
                                        <span>{{ strlen($tab->ru_description) > 10 ? mb_substr($tab->ru_description, 0, 10) . '...' : $tab->ru_description }}</span>
                                        <br>
                                        <span>{{ strlen($tab->en_description) > 10 ? mb_substr($tab->en_description, 0, 10) . '...' : $tab->en_description }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.about.edit', $tab) }}"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('admin.about.delete', $tab) }}"><i class="fa fa-trash-o"></i></a>
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
