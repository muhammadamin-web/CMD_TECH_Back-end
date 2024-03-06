@extends('admin.layouts.app')

@section('content')
<div class="container py-5">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-4">{{ __('Создать тег') }}</h2>
            <form method="POST" action="{{ route('tags.store') }}">
                @csrf

                <!-- Name -->
                <div class="form-group">
                    <label for="name">{{ __('Название') }}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                           name="name" value="{{ old('name') }}" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <!-- Submit and Cancel Buttons -->
                <div class="form-group  mb-0">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Создать') }}
                    </button>
                    <a href="{{ route('tags.index') }}" class="btn btn-secondary">
                        {{ __('Отмена') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
