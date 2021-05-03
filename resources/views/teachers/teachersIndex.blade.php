<title>Teachers</title>
@extends('teachers.mainView')
@include('teachers.navBar')
@section('title')
    <div class="max-w-full rounded overflow-hidden flex flex-wrap text-black-500 justify-center">
        <h1 class="font-bold text-3xl mb-2">Teachers Index</h1>
    </div>
@endsection
@section('teacherDelete')
    <!-- Setting up session messages based on which controller method is used -->
    @if (session()->has('teacherDeletedMessage'))
        <div class=" bg-white shadow overflow-hidden sm:rounded-lg m-3">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Teacher deleted!
                </h3>
            </div>
        </div>
    @endif
@endsection
@section('teacherCreate')
    @if (session()->has('teacherCreateMessage'))
        <div class=" bg-white shadow overflow-hidden sm:rounded-lg m-3">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Teacher created!
                </h3>
            </div>
        </div>
    @endif
@endsection
@section('showEditErrors')
    @if(Html::ul($errors->all()))
        <div class=" bg-white shadow overflow-hidden sm:rounded-lg m-3">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Errors:
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    {{Html::ul($errors->all())}}
                </p>
            </div>
        </div>
    @endif
@endsection
@section('allTeachers')
    @forelse($teachers as $teacher)
        @include('Templates.teacherTemplate', ['teacher'=>$teacher])
    @empty
        <h1 class="font-bold text-xl mb-2">There are no teachers to show!</h1>
    @endforelse
@endsection
@section('paginator')
    <div class="position: bottom text-white">
        {{$teachers -> links ()}}
    </div>
@endsection
@section('teacherAdd')
    <div class="bg-white shadow overflow-hidden sm:rounded-lg m-3">
        {{ Form::model ($teachers, array('route' => array('storeTeachers'), 'method'=>'POST')) }}
        <div class="px-41 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Add teacher
            </h3>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Teacher ID:
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ Form::text('teacherID', Request::old('teacherID'), array('class' => 'form-control border w-full py-1 px-1.5', 'placeholder' => 'Teacher ID')) }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Teacher Name:
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ Form::text('teacherName', Request::old('teacherName'), array('class' => 'form-control border w-full py-1 px-1.5', 'placeholder' => 'Teacher Name')) }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Teacher Subject:
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ Form::text('teacherSubject', Request::old('teacherSubject'), array('class' => 'form-control border w-full py-1 px-1.5', 'placeholder' => 'Teacher Subject')) }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-1 sm:gap-2 sm:px-2">
                    <dt></dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-1">
                        {{ Form::submit('Add teacher', array('class' => 'bg-black hover:bg-blue-700 text-white font-bold py-1 px-1.5 float-right rounded')) }}
                    </dd>
                </div>
            </dl>
        </div>
        {{ Form::close() }}
    </div>
@endsection

