{{-- resources/views/admin/leads/index.blade.php --}}

@extends('admin.layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Список Лидов') }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('Имя') }}</th>
                                <th>{{ __('Телефон') }}</th>
                                <th>{{ __('Эл. адрес') }}</th>
                                <th>{{ __('Статус') }}</th>
                                <th>{{ __('Действия') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leads as $lead)
                            <tr>
                                <td>{{ $lead->name }}</td>
                                <td>{{ $lead->phone }}</td>
                                <td>{{ $lead->email }}</td>
                                <td style="color: {{ $lead->status == 'seen' ? 'green' : 'red' }};">
            {{ $lead->status == 'seen' ? __('Просмотрено') : __('Не просмотрено') }}
        </td>                                <td>
                                    <a href="{{ route('leads.show', $lead->id) }}" class="btn btn-sm btn-primary">{{ __('Показать') }}</a>
                                    <a href="{{ route('leads.edit', $lead->id) }}" class="btn btn-sm btn-primary">{{ __('Редактировать') }}</a>
                                    <form method="POST" action="{{ route('leads.destroy', $lead->id) }}" style="display:inline;">
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
