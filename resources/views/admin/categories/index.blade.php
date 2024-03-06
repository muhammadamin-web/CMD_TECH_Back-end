@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Категории') }}
                    <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary float-right">{{ __('Создать категорию') }}</a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>{{ __('Имя') }}</th>
                                <th>{{ __('Изображение') }}</th>
                                <th>{{ __('Действия') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->name_ru }}</td>
                                <td>
                                    @if($category->image_path)
                                    <img src="{{ asset($category->image_path) }}" alt="{{ $category->name_ru }}" width="50">
                                    @endif
                                </td>
                                <td>
                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-primary">Показывать</a>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary">{{ __('Редактировать') }}</a>
                                    <form method="POST" action="{{ route('categories.destroy', $category->id) }}" style="display:inline;">
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
