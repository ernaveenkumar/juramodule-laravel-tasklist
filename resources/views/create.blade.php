@extends('layouts.app') @section('title', 'Add Task') @section('styles')
<!-- <style>
    .error-message {
        color: red;
        font-size: 0, 8rem;
    }
    .success {
        color: green;
        font-size: 0, 8rem;
    }
</style> -->
@endsection @section('content')
{{ $errors }}
<form method="POST" action="{{ route('tasks.store') }}">
    @csrf
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ old("title") }}"
        @class(['border-red-500' => $errors->has('title')]) /> @error('title')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <br />
    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10"
        @class(['border-red-500' => $errors->has('description')])
        >{{
            old("description")
        }}</textarea>
        @error('description')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>
    <br />
    <div>
        <label for="long_description">Long Description</label>
        <textarea
            name="long_description"
            cols="30"
            rows="10"
            id="long_description"
            @class(['border-red-500' => $errors->has('long_description')])
            >{{ old("long_description") }}</textarea
        >
        @error('long_description')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>
    <br />
    <!-- <div>
        <label for="completed"></label>
        <input
            type="number"
            name="completed"
            id="completed"
            value="{{ old('completed') }}"
        />
        @error('completed')
        <p class="error-message">{{ $message }}</p>
        @enderror
    </div> -->
    <div class="flex gap-2">
        <input type="submit" name="submit" value="submit" class="btn" />
        <a class= "btn" href="{{ route('tasks.index') }}">Cancel</a>

    </div>
</form>
@endsection
