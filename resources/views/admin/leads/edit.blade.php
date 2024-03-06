{{-- resources/views/admin/leads/edit.blade.php --}}

@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>{{ __('Редактирование Лида') }}</h2>
    <form action="{{ route('leads.update', $lead->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">{{ __('Имя') }}</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $lead->name }}" required>
        </div>

        <div class="form-group">
            <label for="phone">{{ __('Телефон') }}</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $lead->phone }}" required>
        </div>

        <div class="form-group">
            <label for="email">{{ __('Эл. адрес') }}</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $lead->email }}" required>
        </div>

        <div class="form-group">
            <label for="status">{{ __('Статус') }}</label>
            <select id="status" class="form-control" name="status">
                <option value="seen" {{ $lead->status == 'seen' ? 'selected' : '' }}>{{ __('Просмотрено') }}</option>
                <option value="new" {{ $lead->status == 'new' ? 'selected' : '' }}>{{ __('Не просмотрено') }}</option>
            </select>
        </div>

        <div class="form-group mb-0">
            <button type="submit" class="btn btn-primary">{{ __('Обновить') }}</button>
            <a href="{{ route('leads.index') }}" class="btn btn-secondary">{{ __('Отмена') }}</a>
        </div>
    </form>
</div>
@endsection
