@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="my-4">{{ __('Список Комментарий клиента') }}</h2>
            <a href="{{ route('client_comments.create') }}" class="btn btn-primary mb-3">{{ __('Создать Комментарий клиента') }}</a>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>{{ __('Название RU') }}</th>
                            <th>{{ __('Название УЗ') }}</th>
                            <th>{{ __('Изображение') }}</th>
                            <th>{{ __('Действия') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($client_comments as $client_comment)
                        <tr>
                            <td>{{ $client_comment->name_ru }}</td>
                            <td>{{ $client_comment->name_uz }}</td>
                            <td>
                                <img src="{{ asset($client_comment->image_path) }}" alt="{{ $client_comment->image_name }}" class="img-thumbnail" width="100">
                            </td>
                            <td>
                                <a href="{{ route('client_comments.show', $client_comment) }}" class="btn btn-info btn-sm">{{ __('Показывать') }}</a>
                                <a href="{{ route('client_comments.edit', $client_comment) }}" class="btn btn-warning btn-sm">{{ __('Редактировать') }}</a>
                                <form action="{{ route('client_comments.destroy', $client_comment) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">{{ __('Удалить') }}</button>
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
@endsection
