{{-- resources/views/admin/leads/show.blade.php --}}

@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>{{ __('Просмотр Лида') }}</h2>
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <h5>{{ __('Имя') }}</h5>
                <p>{{ $lead->name }}</p>
            </div>

            <div class="form-group">
                <h5>{{ __('Телефон') }}</h5>
                <p>{{ $lead->phone }}</p>
            </div>

            <div class="form-group">
                <h5>{{ __('Эл. адрес') }}</h5>
                <p>{{ $lead->email }}</p>
            </div>

            <div class="form-group">
                <h5>{{ __('Статус') }}</h5>
                <p>{{ $lead->status == 'seen' ? __('Просмотрено') : __('Не просмотрено') }}</p>
            </div>

            <div class="form-group">
                <h5>{{ __('Описание') }}</h5>
                <p>{{ $lead->description }}</p>
            </div>

            <a href="{{ route('leads.index') }}" class="btn btn-secondary">{{ __('Назад') }}</a>
        </div>
    </div>
</div>
@endsection
