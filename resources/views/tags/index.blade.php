@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Blogpostlar Teglar Bo'yicha</h2>
    <form action="{{ route('posts.filter') }}" method="GET" id="tags-filter-form">
        @foreach($tags as $tag)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="tag_{{ $tag->id }}" value="{{ $tag->id }}" name="tags[]">
                <label class="form-check-label" for="tag_{{ $tag->id }}">{{ $tag->name }}</label>
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary mt-3">Filtrlash</button>
    </form>
</div>

<script>
    // Assuming you have jQuery included
    $(document).ready(function() {
        $('#tags-filter-form input[type=checkbox]').change(function() {
            $('#tags-filter-form').submit();
        });
    });
</script>
@endsection
