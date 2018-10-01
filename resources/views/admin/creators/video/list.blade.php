<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Список видео</h3>
        <div class="box-tools">
            <div class="input-group input-group-sm" style="width:50px;">
                <div class="input-group-btn">
                    <a class="btn btn-success" href="{{ route('admin.creator.video.create', $creator) }}">Добавить</a>
                </div>
            </div>
        </div>
    </div>
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>ID на сайте vimeo</th>
                <th>Код для шаблона</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse($videos as $video)
                <tr>
                    <td>{{ $video->id }}</td>
                    <td>{{ $video->vimeo_id }}</td>
                    <td>{{ $video->code }}</td>
                    <td>
                        <a href="{{ route('admin.creator.video.edit', $video) }}"><i class="fa fa-pencil"></i></a>
                        <a href="{{ route('admin.creator.video.delete', $video) }}"><i class="fa fa-trash-o"></i></a>
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
