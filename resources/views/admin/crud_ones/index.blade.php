@extends('admin.layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ config('app.crud_one_name') }}
                    <a href="{{ route(config('app.crud_one_admin') . '.create') }}" class="btn btn-sm btn-primary float-right">Создать{{ config('app.crud_one_text') }}</a>

                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('Название УЗ') }}</th>
                                <th>{{ __('Изображение') }}</th>
                                <th>{{ __('Статус') }}</th>
                                <th>{{ __('Действия') }}</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($crud_ones as $crud_one)
                            <tr>
                                <td>{{ $crud_one->name_uz }}</td>
                                <td>
                                    @if($crud_one->image_path)
                                    <img src="{{ asset($crud_one->image_path) }}" alt="{{ $crud_one->name_uz }}" width="50">
                                    @endif
                                </td>
                                <td style="color: white; ">
                                    <p class="btn btn-sm btn-primary " style="border:none; padding: 5px 10px ; opacity:0.9; background-color: {{ $crud_one->status == 'published' ? 'green' : 'blue' }};"> {{ $crud_one->status == 'published' ? __('Опубликовано') : __('Черновик') }}</p>
                                </td>
                                <td>
                                    <a href="{{ route(config('app.crud_one_admin') . '.edit', $crud_one->id) }}" class="btn btn-sm btn-primary">{{ __('Редактировать') }}</a>
                                    <a href="{{ route(config('app.crud_one_admin') . '.show', $crud_one->id) }}" class="btn btn-sm btn-primary">Показывать</a>
                                    <form method="POST" action="{{ route(config('app.crud_one_admin') . '.destroy', $crud_one->id) }}" style="display:inline;">
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