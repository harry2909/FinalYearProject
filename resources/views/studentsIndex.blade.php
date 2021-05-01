<title>Students</title>
@extends('mainView')
@section('allStudents')
    @forelse($students as $student)
        @include('template', ['student'=>$student])
    @empty
        <p class="text-white text-2xl">There are no students to show!</p>
    @endforelse
@endsection

