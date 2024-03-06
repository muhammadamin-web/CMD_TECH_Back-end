@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>{{ __('Изменить комментарий клиента') }}</h2>
    <form action="{{ route('client_comments.update', $client_comment->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @foreach (config('app.available_locales', ['ru', 'uz', 'en']) as $locale)
        <!-- Name -->
        <div class="form-group">
            <label for="name_{{ $locale }}">{{ __('Название') }} ({{ $locale }})</label>
            <input id="name_{{ $locale }}" type="text" class="form-control @error('name_' . $locale) is-invalid @enderror" name="name_{{ $locale }}" value="{{ old('name_' . $locale, $client_comment->{'name_' . $locale}) }}" required autocomplete="name_{{ $locale }}" autofocus>
            @error('name_' . $locale)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <!-- Description -->
        <div class="form-group">
            <label for="comment_{{ $locale }}">{{ __('Описание') }} ({{ $locale }})</label>
            <textarea id="descriptions_{{ $locale }}" class="form-control @error('comment_' . $locale) is-invalid @enderror" name="comment_{{ $locale }}">{{ old('comment_' . $locale, $client_comment->{'comment_' . $locale}) }}</textarea>
            @error('comment_' . $locale)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>



        <!-- Tags -->
       
        @endforeach
        <div class="form-group">
            <label for="image_path">{{ __('Изображение') }}</label>
            @if($client_comment->image_path)
            <img src="{{ asset($client_comment->image_path) }}" alt="{{ $client_comment->name }}" width="100" class="mb-2">
            @endif
            <input id="image_path" type="file" class="form-control-file @error('image_path') is-invalid @enderror" name="image_path" accept="image/*">
            @error('image_path')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>
        <div class="form-group mb-0">
            <button type="submit" class="btn btn-primary">
                {{ __('Обновлять') }}
            </button>
            <a href="{{ route('client_comments.index') }}" class="btn btn-secondary">
                {{ __('Отмена') }}
            </a>
        </div>
    </form>
</div>
@endsection