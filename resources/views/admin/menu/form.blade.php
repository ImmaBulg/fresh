@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{ isset($menu_item) ? "Пункт меню - $menu_item->name" : "Создание нового пункта меню" }}
        </h1>
    </section>
    <section class="content container-fluid">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ isset($menu_item) ? $menu_item->name : 'Новый пункт меню' }}</h3>
                </div>
                <form action="{{ isset($menu_item) ? route('admin.menu.update') : route('admin.menu.store') }}" method="post">
                    @csrf
                    <div class="box-body">
                        @if (isset($menu_item))
                            <input type="text" hidden value="{{ $menu_item->id }}" name="id" id="id">
                        @endif
                        <div class="form-group">
                            <label for="">Название</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Название" value="{{ isset($menu_item) ? $menu_item->title : old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{ isset($menu_item) ? $menu_item->slug : old('slug') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Родительский пункт</label>
                            <select name="parent_id" id="parent_id" class="form-control">
                                <option selected value="">Не выбрано</option>
                                @foreach($menus as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{{ route('admin.menu.list') }}" class="btn btn-default">Назад</a>
                        <button type="submit" class="btn btn-info pull-right">{{ isset($menu_item) ? 'Обновить' : 'Добавить' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
