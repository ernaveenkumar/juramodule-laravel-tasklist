@extends('layouts.app') @section('title', $task->title) @section('content')
<h1>{{ $task->title }}</h1>
<p>{{ $task->description }}</p>
@endsection
