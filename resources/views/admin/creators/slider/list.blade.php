<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Список слайдеров</h3>
        <div class="box-tools">
            <div class="input-group input-group-sm" style="width:50px;">
                <div class="input-group-btn">
                    <a class="btn btn-success" href="{{ route('admin.creator.slider.create', $creator) }}">Добавить</a>
                </div>
            </div>
        </div>
    </div>
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Изображения</th>
                <th>Код для шаблона</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse($sliders as $slider)
                <tr>
                    <td>{{ $slider->id }}</td>
                    <td>
                        @foreach($slider->getImages() as $image)
                                <img src="{{ "/storage/uploads/images/creators/sliders/$slider->creator_id". "_" . "$slider->id/$image" }}" alt="Ошибка" width="128" style="padding-bottom: 10px">
                        @endforeach
                    </td>
                    <td>{{ $slider->code }}</td>
                    <td>
                        <a href="{{ route('admin.creator.slider.edit', $slider) }}"><i class="fa fa-pencil"></i></a>
                        <a href="{{ route('admin.creator.slider.delete', $slider) }}"><i class="fa fa-trash-o"></i></a>
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
