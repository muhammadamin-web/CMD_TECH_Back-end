@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-4">{{ __('Создать комментарий клиента') }}</h2>

            <form method="POST" action="{{ route('client_comments.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Name (Russian) -->
                @foreach (config('app.available_locales') as $locale)
                    <!-- Name -->
                    <div class="form-group">
                        <label for="name_{{ $locale }}">{{ __('Название') }} ({{ $locale }})</label>
                        <input id="name_{{ $locale }}" type="text" class="form-control @error('name_' . $locale) is-invalid @enderror" name="name_{{ $locale }}" value="{{ old('name_' . $locale) }}" required autocomplete="name_{{ $locale }}" autofocus>
                        @error('name_' . $locale)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="comment_{{ $locale }}">{{ __('Описание') }} ({{ $locale }})</label>
                        <textarea id="descriptions_{{ $locale }}" class="form-control @error('comment_' . $locale) is-invalid @enderror" name="comment_{{ $locale }}">{{ old('comment_' . $locale) }}</textarea>
                        @error('comment_' . $locale)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                   
                @endforeach

                <!-- Image Upload -->
                <div class="form-group">
                    <label for="image_path">{{ __('Изображение') }}</label>
                    <input id="image_path" type="file" class="form-control-file @error('image_path') is-invalid @enderror" name="image_path" accept="image/*">
                    @error('image_path')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Submit and Cancel Buttons -->
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Создать') }}
                    </button>
                    <a href="{{ route('client_comments.index') }}" class="btn btn-secondary">
                        {{ __('Отмена') }}
                    </a>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection