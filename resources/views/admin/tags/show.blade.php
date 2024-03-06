@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $tag->name }}</div>
                <div class="card-body">
                    <!-- Name -->
                    <div class="form-group">
                        <label>{{ __('Название') }}</label>
                        <p>{{ $tag->name }}</p>
                    </div>

                    <a href="{{ route('tags.index') }}" class="btn btn-secondary">{{ __('Назад') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
