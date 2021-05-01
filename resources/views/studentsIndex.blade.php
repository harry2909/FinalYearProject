<title>Students</title>
@extends('mainView')
<div class="max-w-full rounded overflow-hidden flex flex-wrap text-black-500 justify-center">
    <h1 class="font-bold text-3xl mb-2">Students Index</h1>
</div>
@section('allStudents')
    @forelse($students as $student)
        @include('template', ['student'=>$student])
    @empty
        <p class="text-white text-2xl">There are no students to show!</p>
    @endforelse
@endsection
@section('paginator')
    <div class="position: bottom text-white">
        {{$students -> links ()}}
    </div>
@endsection

