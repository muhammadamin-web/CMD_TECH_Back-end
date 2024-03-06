@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>{{ __('Детали комментарий клиента') }}</h2>
    <div class="card">
        <div class="card-body">
        @foreach (config('app.available_locales', ['ru', 'uz', 'en']) as $locale)
                        <!-- Name -->
                        <div class="form-group">
                            <h5>{{ __('Название') }} ({{ $locale }})</h5>
                            <p>{{ $client_comment->{'name_' . $locale} }}</p>
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <h5>{{ __('Описание') }} ({{ $locale }})</h5>
                            <p>{!! $client_comment->{'comment_' . $locale} !!}</p>
                        </div>

                        <!-- Tags -->
                      
                    @endforeach
            @if($client_comment->image_path)
                <img src="{{ asset($client_comment->image_path) }}" alt="{{ $client_comment->image_name }}" class="img-fluid">
            @endif
        </div>
    </div>
    <a href="{{ route('client_comments.index') }}" class="btn btn-primary mt-3">{{ __('Вернуться к комментарий клиента') }}</a>
</div>
@endsection
