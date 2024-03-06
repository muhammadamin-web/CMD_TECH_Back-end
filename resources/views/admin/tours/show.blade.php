@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>{{ __('Детали услуга') }}</h2>
    <div class="card">
        <div class="card-body">
            @foreach (config('app.available_locales', ['ru', 'uz', 'en']) as $locale)
            <!-- Name -->
            <div class="form-group">
                <h5>{{ __('Название') }} ({{ $locale }})</h5>
                <p>{{ $tour->{'name_' . $locale} }}</p>
            </div>

            <!-- Description -->
            <div class="form-group">
                <h5>{{ __('Описание') }} ({{ $locale }})</h5>
                <p>{!! $tour->{'description_' . $locale} !!}</p>
            </div>

            <!-- Tags -->
            <div class="form-group">
                <h5>{{ __('Теги') }} ({{ $locale }})</h5>
                <p>{{ $tour->{'tags_' . $locale} }}</p>
            </div>
            @endforeach
            <div class="form-group">
                        <label for="price">Цена:</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ $tour->price }}" disabled>
                    </div>

                    <div class="form-group">
                        <label>Изображения:</label>
                        <div class="gallery d-flex flex-wrap">
                            @foreach(json_decode($tour->images) as $image)
                                <div class="m-2">
                                    <img src="{{ asset($image) }}" width="100" class="img-thumbnail">
                                </div>
                            @endforeach
                        </div>
                    </div>
        </div>
    </div>
    <a href="{{ route('tours.index') }}" class="btn btn-primary mt-3">{{ __('Вернуться к услуги') }}</a>
</div>
@endsection