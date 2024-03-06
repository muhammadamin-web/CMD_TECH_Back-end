@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ config('app.crud_one_name') }}</div>

                <div class="card-body">
                    @foreach (config('app.available_locales', ['ru', 'en', 'en']) as $locale)
                    <!-- Name -->
                    <div class="form-group">
                        <h5>{{ __('Название') }} ({{ $locale }})</h5>
                        <p>{{ $crud_one->{'name_' . $locale} }}</p>
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <h5>{{ __('Описание') }} ({{ $locale }})</h5>
                        <p>{!! $crud_one->{'description_' . $locale} !!}</p>
                    </div>

                    <!-- Tags -->

                    @endforeach
                    {{-- ... --}}

                    <!-- Site URL -->
                    <div class="form-group">
                        <h5>{{ __('Сайт URL') }}</h5>
                        <p><a href="{{ $crud_one->site_url }}" target="_blank">{{ $crud_one->site_url }}</a></p>
                    </div>

                    <!-- Site Name -->
                    <div class="form-group">
                        <h5>{{ __('Сайт Имя') }}</h5>
                        <p>{{ $crud_one->site_name }}</p>
                    </div>

                    <!-- Status -->
                    <div class="form-group">
                        <h5>{{ __('Статус') }}</h5>
                        <p>{{ $crud_one->status == 'published' ? __('Опубликовано') : __('Черновик') }}</p>
                    </div>

                    <div class="form-group">
                    <h5>{{ __('Services') }}</h5>

                        <ul>
                            @foreach ($crud_one->tour_ids as $tour_id)
                            {{-- Sizning Tour model'ingizda ma'lumotlarni qanday olishingizga bog'liq --}}
                            @php
                            $tour = \App\Models\Tour::find($tour_id);
                            @endphp
                            @if($tour)
                            <li>{{ $tour->name_uz }}</li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                    <!-- <div class="form-group">

                    <label for="tour_ids">Services</label>
                    <select name="tour_ids[]" id="multiple" class="js-states form-control" multiple>
                        @foreach ($tours as $tour)
                        <option value="{{ $tour->id }}">
                            {{ $tour->name_uz }}
                        </option>
                        @endforeach

                    </select>
                </div> -->

                    <!-- Image -->
                    @if($crud_one->image_path)
                    <div class="form-group">
                        <h5>{{ __('Изображение') }}</h5>
                        <div>
                            <img src="{{ asset($crud_one->image_path) }}" alt="{{ $crud_one->name_ru }}" class="img-fluid">
                        </div>
                    </div>
                    @endif

                    <a href="{{ route(config('app.crud_one_admin') . '.index') }}" class="btn btn-secondary">{{ __('Назад к списку') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection