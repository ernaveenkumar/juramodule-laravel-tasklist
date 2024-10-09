@extends('layouts.app') @section('title', 'The list of all tasks')
@section('content')
<div>
    @if(count($tasks))
    <div>There are tasks!</div>
    <ul style="list-style: none">
        @foreach($tasks as $task)
        <li>
            <a
                href="{{ route('tasks.show', ['task' => $task->id]) }}"
                >{{ $task->title }}</a
            >
        </li>
        @endforeach
    </ul>

    @else
    <div>There are no tasks!</div>
    @endif
</div>
@endsection
