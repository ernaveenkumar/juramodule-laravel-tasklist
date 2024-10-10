@extends('layouts.app') @section('title', 'Edit Task') @section('styles')
@endsection @section('content')
<div>
    @isset($errors)
    {{ $errors }}
    @endisset

    <form method="POST" action="{{ route('tasks.update', ['task' => $task]) }}">
        @csrf @method('PUT')

        <input type="text" name="title" id="title" value="{{ $task->title }}"  @class(['border-red-500' => $errors->has('title')])/>
        @error('title')
        <p class="error">{{ $message }}</p>
        @enderror
        <br />
        <br />
        <textarea
            name="description"
            id="description"
            cols="30"
            rows="10"
            @class(['border-red-500' => $errors->has('description')])
            >{{ $task->description }}</textarea
        >
        @error('description')
        <p class="error">{{ $message }}</p>
        @enderror
        <br />
        <br />
        <textarea
            name="long_description"
            id="long_description"
            cols="30"
            rows="10"
            @class(['border-red-500' => $errors->has('long_description')])
            >{{ $task->long_description }}</textarea
        >
        @error('long_description')
        <p class="error">{{ $message }}</p>
        @enderror
        <br />
        <br />
        <!-- <div>
            <label for="completed"></label>
            <input
                type="number"
                name="completed"
                id="completed"
                value="{{ $task->completed }}"
            />
            @error('completed')
            <p class="error">{{ $message }}</p>
            @enderror
        </div> -->
        <br />

        <div class="flex gap-2">
            <input type="submit" value="submit" />
            <a
                href="{{ route('tasks.show',['task' => $task->id ]) }}"
                class="btn"
                >cancel</a
            >
        </div>
        <br />
        <br />
    </form>
</div>

@endsection
