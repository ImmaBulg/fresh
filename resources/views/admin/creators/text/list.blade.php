<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Список текстов</h3>
        <div class="box-tools">
            <div class="input-group input-group-sm" style="width:50px;">
                <div class="input-group-btn">
                    <a class="btn btn-success" href="{{ route('admin.creator.text.create', $creator) }}">Добавить</a>
                </div>
            </div>
        </div>
    </div>
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Текст</th>
                <th>Код для шаблона</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse($texts as $text)
                <tr>
                    <td>{{ $text->id }}</td>
                    <td>{{ strlen($text->ru_text) > 10 ? mb_substr($text->ru_text, 0, 10) . '...' : $text->ru_text }}</td>
                    <td>{{ $text->code }}</td>
                    <td>
                        <a href="{{ route('admin.creator.text.edit', $text) }}"><i class="fa fa-pencil"></i></a>
                        <a href="{{ route('admin.creator.text.delete', $text) }}"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Ничего не найдено</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
