@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-4">{{ __('Показать') . ' ' . config('app.crud_two_text') }}</h2>

            <div class="card">
                <div class="card-body">
                    @foreach (config('app.available_locales', ['ru', 'uz', 'en']) as $locale)
                        <!-- Name, Description, Meta Description, Keyword -->
                        <div class="form-group">
                            <h5>{{ __('Название') }} ({{ $locale }})</h5>
                            <p>{{ $crud_two->{'name_' . $locale} }}</p>
                        </div>
                        <div class="form-group">
                            <h5>{{ __('Описание') }} ({{ $locale }})</h5>
                            <p>{!! $crud_two->{'description_' . $locale} !!}</p>
                        </div>
                        <div class="form-group">
                            <h5>{{ __('Мета описание') }} ({{ $locale }})</h5>
                            <p>{{ $crud_two->{'meta_description_' . $locale} }}</p>
                        </div>
                        <div class="form-group">
                            <h5>{{ __('Keyword') }} ({{ $locale }})</h5>
                            <p>{{ $crud_two->{'keyword_' . $locale} }}</p>
                        </div>
                    @endforeach

                    <!-- Status -->
                    <div class="form-group">
                        <h5>{{ __('Статус') }}</h5>
                        <p>{{ $crud_two->status }}</p>
                    </div>

                    <!-- Tags -->
                    <div class="form-group">
                        <h5>{{ __('Теги') }}</h5>
                        <ul>
                            @foreach ($tags as $tag)
                                @if (in_array($tag->id, $crud_two->tag_ids ?? []))
                                    <li>{{ $tag->name }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <!-- Image -->
                    @if($crud_two->image_path)
                        <div class="form-group">
                            <h5>{{ __('Изображение') }}</h5>
                            <img src="{{ asset($crud_two->image_path) }}" alt="{{ $crud_two->name_ru }}" class="img-fluid">
                        </div>
                    @endif

                    <a href="{{ route(config('app.crud_two_admin') . '.index') }}" class="btn btn-secondary">{{ __('Назад к списку') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
