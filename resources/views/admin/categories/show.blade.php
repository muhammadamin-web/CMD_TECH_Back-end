@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Категория') }}</div>

                <div class="card-body">
                @foreach (config('app.available_locales', ['ru', 'uz', 'en']) as $locale)
                        <!-- Name -->
                        <div class="form-group">
                            <h5>{{ __('Название') }} ({{ $locale }})</h5>
                            <p>{{ $category->{'name_' . $locale} }}</p>
                        </div>

                        <!-- Description -->

                    @endforeach

                    <!-- Image Display -->
                    @if($category->image_path)
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                        <div class="col-md-6">
                            <img src="{{ asset($category->image_path) }}" alt="{{ $category->name_ru }}" class="img-fluid">
                        </div>
                    </div>
                    @endif

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                                {{ __('Back to list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
