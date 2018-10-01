@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Страница контакты
        </h1>
    </section>
    <section class="content container-fluid">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Редактирование страницы контактов</h3>
                </div>
                <form action="{{ route('admin.contacts.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Блок контакты на русском</label>
                                    <textarea name="ru_contacts" id="ru_contacts" cols="30" rows="10" class="form-control">{{ $page->ru_contacts }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Блок контакты на английском</label>
                                    <textarea name="en_contacts" id="en_contacts" cols="30" rows="10" class="form-control">{{ $page->en_contacts }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="from-group">
                            <label for="">Блок карты</label>
                            <textarea name="map" id="map" cols="30" rows="10" class="form-control">{{ $page->map }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Исполнительный продюсер на русском</label>
                                    <textarea name="ru_executive" id="ru_executive" cols="30" rows="10" class="form-control">{{ $page->ru_executive }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Исполнительный продюсер на английском</label>
                                    <textarea name="en_executive" id="en_executive" cols="30" rows="10" class="form-control">{{ $page->en_executive }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Исполнительный продюсер на русском</label>
                                    <textarea name="ru_executive_two" id="ru_executive_two" cols="30" rows="10" class="form-control">{{ $page->ru_executive_two }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Исполнительный продюсер на английском</label>
                                    <textarea name="en_executive_two" id="en_executive_two" cols="30" rows="10" class="form-control">{{ $page->en_executive_two }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Руководитель на русском</label>
                                    <textarea name="ru_producer" id="ru_producer" cols="30" rows="10" class="form-control">{{ $page->ru_producer }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Руководитель на английском</label>
                                    <textarea name="en_producer" id="en_producer" cols="30" rows="10" class="form-control">{{ $page->en_producer }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Обновить</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

{{--
@section('js')
    <script>
        CKEDITOR.replace( 'ru_contacts' );
        CKEDITOR.replace( 'en_contacts' );
        CKEDITOR.replace( 'map' );
        CKEDITOR.replace( 'ru_executive' );
        CKEDITOR.replace( 'en_executive' );
        CKEDITOR.replace( 'ru_executive_two' );
        CKEDITOR.replace( 'en_executive_two' );
        CKEDITOR.replace( 'ru_producer' );
        CKEDITOR.replace( 'en_producer' );
    </script>
@endsection
--}}
