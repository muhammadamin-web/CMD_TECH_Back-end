@extends('admin.layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ config('app.crud_two_name') }}
                    <a href="{{ route(config('app.crud_two_admin') . '.create') }}" class="btn btn-sm btn-primary float-right">Создать{{ config('app.crud_two_text') }}</a>

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
                            @foreach($crud_twos as $crud_two)
                            <tr>
                                <td>{{ $crud_two->name_uz }}</td>
                                <td>
                                    @if($crud_two->image_path)
                                    <img src="{{ asset($crud_two->image_path) }}" alt="{{ $crud_two->name_uz }}" width="50">
                                    @endif
                                </td>
                                <td style="color: white; ">
                                    <p class="btn btn-sm btn-primary " style="border:none; padding: 5px 10px ; opacity:0.9; background-color: {{ $crud_two->status == 'published' ? 'green' : 'blue' }};"> {{ $crud_two->status == 'published' ? __('Опубликовано') : __('Черновик') }}</p>
                                </td>
                                <td>
                                    <a href="{{ route(config('app.crud_two_admin') . '.edit', $crud_two->id) }}" class="btn btn-sm btn-primary">{{ __('Редактировать') }}</a>
                                    <a href="{{ route(config('app.crud_two_admin') . '.show', $crud_two->id) }}" class="btn btn-sm btn-primary">Показывать</a>
                                    <form method="POST" action="{{ route(config('app.crud_two_admin') . '.destroy', $crud_two->id) }}" style="display:inline;">
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