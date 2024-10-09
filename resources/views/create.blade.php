@extends('layouts.app') @section('title', 'Add Task') @section('styles')
<style>
    .error-message {
        color: red;
        font-size: 0, 8rem;
    }
    .success {
        color: green;
        font-size: 0, 8rem;
    }
</style>
@endsection @section('content')
{{ $errors }}
<form method="POST" action="{{ route('tasks.store') }}">
    @csrf
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" />
    </div>
    @error('title')
    <p class="error-message">{{ $message }}</p>
    @enderror
    <br />
    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10">{{
            old("description")
        }}</textarea>
        @error('description')
        <p class="error-message">{{ $message }}</p>
        @enderror
    </div>
    <br />
    <div>
        <label for="long_description">Lond Description</label>
        <textarea
            name="long_description"
            cols="30"
            rows="10"
            id="long_description"
            >{{ old("long_description") }}</textarea
        >
        @error('long_description')
        <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <br />
    <input type="submit" name="submit" value="submit" />
</form>
@endsection
