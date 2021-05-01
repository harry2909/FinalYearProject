<title>Student View</title>
@extends('mainView')
<div class="max-w-full rounded overflow-hidden flex flex-wrap text-black-500 justify-center">
    <h1 class="font-bold text-3xl mb-2">View Student</h1>
</div>
@section('viewStudent')
@include('template', ['student'=>$student])
@endsection


