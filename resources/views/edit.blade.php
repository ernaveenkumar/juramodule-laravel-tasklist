@extends('layouts.app'); @section('title', 'Edit Task') @section('styles')
<style>
    .error-message {
        color: red;
        font-size: 0.8rem;
    }
    .success-message {
        color: green;
        font-size: 0.8rem;
    }
</style>
@endsection @section('content')
<div>
    @isset($errors)
    {{ $errors }}
    @endisset
    <form
        action="{{ route('tasks.update',['task' => $task->id]) }}"
        method="POST"
    >
        @csrf @method('PUT')

        <input type="text" name="title" id="title" value="{{ $task->title }}" />
        @error('title')
        <p class="error-message">{{ $message }}</p>
        @enderror
        <br />
        <br />
        <textarea
            name="description"
            id="description"
            cols="30"
            rows="10"
            >{{ $task->description }}</textarea
        >
        @error('description')
        <p class="error-message">{{ $message }}</p>
        @enderror
        <br />
        <br />
        <textarea
            name="long_description"
            id="long_description"
            cols="30"
            rows="10"
            >{{ $task->long_description }}</textarea
        >
        @error('long_description')
        <p class="error-message">{{ $message }}</p>
        @enderror
        <br />
        <br />
        <input type="submit" value="submit" />
        <br />
        <br />
    </form>
</div>

@endsection
