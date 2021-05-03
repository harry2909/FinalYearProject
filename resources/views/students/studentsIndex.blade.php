<title>Students</title>
@extends('students.mainView')
@include('students.navBar')
@section('title')
    <div class="max-w-full rounded overflow-hidden flex flex-wrap text-black-500 justify-center">
        <h1 class="font-bold text-3xl mb-2">Students Index</h1>
    </div>
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
@section('allStudents')
    @forelse($students as $student)
        @include('Templates.studentTemplate', ['student'=>$student])
    @empty
        <h1 class="font-bold text-xl mb-2">There are no students to show!</h1>
    @endforelse
@endsection
@section('paginator')
    <div class="position: bottom text-white">
        {{$students -> links ()}}
    </div>
@endsection
@section('studentAdd')
    <div class="bg-white shadow overflow-hidden sm:rounded-lg m-3">
        {{ Form::model ($students, array('route' => array('storeStudents'), 'method'=>'POST')) }}
        <div class="px-41 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Add Student
            </h3>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Student ID:
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ Form::text('studentID', Request::old('studentID'), array('class' => 'form-control border w-full py-1 px-1.5', 'placeholder' => 'Student ID')) }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Student Name:
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ Form::text('studentName', Request::old('studentName'), array('class' => 'form-control border w-full py-1 px-1.5', 'placeholder' => 'Student Name')) }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Student Address:
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ Form::text('studentAddress', Request::old('studentAddress'), array('class' => 'form-control border w-full py-1 px-1.5', 'placeholder' => 'Student Address')) }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Student Telephone:
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ Form::number('studentTelephone', Request::old('studentTelephone'), array('class' => 'form-control border w-full py-1 px-1.5', 'step' => '0.01', 'placeholder' => 'Student Telephone')) }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Student Year Group:
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ Form::number('studentYear', Request::old('studentYear'), array('class' => 'form-control border w-full py-1 px-1.5', 'step' => '0.01', 'placeholder' => 'Student Year Group')) }}
                    </dd>
                </div>
                @if(\App\Models\Subject::all()->count()==0)
                @else
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Subject ID:
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ Form::number('subjectID', Request::old('subjectID'), array('class' => 'form-control border w-full py-1 px-1.5', 'step' => '0.01', 'placeholder' => 'Subject ID')) }}
                        </dd>
                    </div>
                @endif
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-1 sm:gap-2 sm:px-2">
                    <dt></dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-1">
                        {{ Form::submit('Add Student', array('class' => 'bg-black hover:bg-blue-700 text-white font-bold py-1 px-1.5 float-right rounded')) }}
                    </dd>
                </div>
            </dl>
        </div>
        {{ Form::close() }}
    </div>
@endsection

