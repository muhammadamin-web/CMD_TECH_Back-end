@extends('admin.layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Услуги') }}
                    <a href="{{ route('tours.create') }}" class="btn btn-sm btn-primary float-right">{{ __('Создать услуга') }}</a>

                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('Имя') }}</th>
                                <th>{{ __('Изображение') }}</th>
                                <th>{{ __('Статус') }}</th>
                                <th>{{ __('Действия') }}</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tours as $tour)
                            <tr>
                                <td>{{ $tour->name_uz }}</td>
                                <td style="width:30%;">
                                    @foreach(json_decode($tour->images) as $image)
                                    <img src="{{ asset($image) }}" alt="{{ $tour->name_ru }}" class="img-fluid" width="50" style="margin: 3px;">
                                    @endforeach
                                </td>
                                <td style="color: white; ">
                                    <p class="btn btn-sm btn-primary " style="border:none; padding: 5px 10px ; opacity:0.9; background-color: {{ $tour->status == 'published' ? 'green' : 'blue' }};"> {{ $tour->status == 'published' ? __('Опубликовано') : __('Черновик') }}</p>
                                </td>
                                <td>
                                    <a href="{{ route('tours.edit', $tour->id) }}" class="btn btn-sm btn-primary">{{ __('Редактировать') }}</a>
                                    <a href="{{ route('tours.show', $tour->id) }}" class="btn btn-sm btn-primary">Показывать</a>
                                    <form method="POST" action="{{ route('tours.destroy', $tour->id) }}" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">{{ __('Удалить') }}</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection