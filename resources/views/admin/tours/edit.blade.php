@extends('admin.layouts.app')

@section('content')
<div class="container">
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
            <h2 class="mb-4">{{ __('Редактировать услуга') }}</h2>

            <form method="POST" action="{{ route('tours.update', $tour->id) }}" enctype="multipart/form-data" id="upload-form">
                @csrf
                @method('PUT')

                <!-- Name (Russian) -->
                @foreach (config('app.available_locales') as $locale)
                <!-- Name -->
                <div class="form-group">
                    <label for="name_{{ $locale }}">{{ __('Название') }} ({{ $locale }})</label>
                    <input id="name_{{ $locale }}" type="text" class="form-control @error('name_' . $locale) is-invalid @enderror" name="name_{{ $locale }}" value="{{ old('name_' . $locale, $tour->{'name_' . $locale}) }}" required autocomplete="name_{{ $locale }}">
                    @error('name_' . $locale)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Short Name -->
                <div class="form-group">
                    <label for="short_name_{{ $locale }}">{{ __('Короткое название') }} ({{ $locale }})</label>
                    <input type="text" class="form-control @error('short_name_' . $locale) is-invalid @enderror" name="short_name_{{ $locale }}" value="{{ old('short_name_' . $locale, $tour->{"short_name_$locale"}) }}" required>
                    @error('short_name_' . $locale)
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description_{{ $locale }}">{{ __('Описание') }} ({{ $locale }})</label>
                    <textarea id="description_{{ $locale }}" class="form-control @error('description_' . $locale) is-invalid @enderror" name="description_{{ $locale }}">{{ old('description_' . $locale, $tour->{'description_' . $locale}) }}</textarea>
                    @error('description_' . $locale)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Tags -->
                <div class="form-group">
                    <label for="tags_{{ $locale }}">{{ __('Теги') }} ({{ $locale }})</label>
                    <input id="tags_{{ $locale }}" type="text" class="form-control @error('tags_' . $locale) is-invalid @enderror" name="tags_{{ $locale }}" value="{{ old('tags_' . $locale, $tour->{'tags_' . $locale}) }}">
                    @error('tags_' . $locale)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Meta Description -->
                <div class="form-group">
                    <label for="meta_description_{{ $locale }}">{{ __('Мета описание') }} ({{ $locale }})</label>
                    <textarea id="meta_description_{{ $locale }}" class="form-control @error('meta_description_' . $locale) is-invalid @enderror" name="meta_description_{{ $locale }}">{{ old('meta_description_' . $locale, $tour->{'meta_description_' . $locale}) }}</textarea>
                    @error('meta_description_' . $locale)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                @endforeach
                <!-- Price -->
                <div class="form-group">
                    <label for="price">{{ __('Цена') }}</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $tour->price) }}" step="0.01">
                    @error('price')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="status">{{ __('Статус') }}</label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                        <option value="published" {{ old('status', $tour->status) == 'published' ? 'selected' : '' }}>{{ __('Опубликовано') }}</option>
                        <option value="draft" {{ old('status', $tour->status) == 'draft' ? 'selected' : '' }}>{{ __('Черновик') }}</option>
                    </select>
                    @error('status')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <!-- Images -->
                <div class="form-group">
                    <label for="images">Изображения (максимум 3):</label>
                    <div id="drop-area" class="drop-area">
                        <input type="file" name="images[]" id="fileElem" multiple accept="image/*" onchange="handleFiles(this.files)">
                        <label for="fileElem" id="file-label">Перетащите изображения сюда или нажмите, чтобы выбрать</label>
                        <div id="gallery">

                            @foreach(json_decode($tour->images) as $key => $image)
                            <div class="image-container" id="image-container-{{ $key }}">
                                <img src="{{ asset($image) }}" width="100">
                                <button type="button" onclick="deleteImage({{ $tour->id }}, {{ $key }})" class="btn btn-danger btn-sm">Удалить</button>
                                <button type="button" onclick="editImage({{ $tour->id }}, {{ $key }})" class="btn btn-warning btn-sm">Редактировать</button>
                            </div>
                            @endforeach

                        </div>

                    </div>
                </div>
                <script src="{{ asset('js/product_image_edit.js') }}" type="text/javascript"></script>

                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Обновлять') }}
                    </button>
                    <a href="{{ route('tours.index') }}" class="btn btn-secondary">
                        {{ __('Отмена') }}
                    </a>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection