@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Главное меню сайта
            <small>Редактирование главного меню сайта</small>
        </h1>
    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Список пунктов меню</h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width:50px;">
                                <div class="input-group-btn">
                                    <a class="btn btn-success" href="{{ route('admin.menu.create') }}">Добавить</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Название</td>
                                    <td>Slug</td>
                                    <td>Родительская категория</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($menus as $menu_item)
                                    <tr>
                                        <td>{{ $menu_item->id }}</td>
                                        <td>{{ $menu_item->title }}</td>
                                        <td>{{ $menu_item->slug }}</td>
                                        <td>{{ $menu_item->parent_id }}</td>
                                        <td>
                                            <a href="{{ route('admin.menu.edit', $menu_item) }}"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('admin.menu.delete', $menu_item) }}"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Ничего не найдено</td>
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
