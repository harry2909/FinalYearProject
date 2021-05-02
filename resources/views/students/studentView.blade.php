<title>Student View</title>
@extends('students.mainView')
<div class="max-w-full rounded overflow-hidden flex flex-wrap text-black-500 justify-center">
    <h1 class="font-bold text-3xl mb-2">View Student</h1>
</div>
@section('viewStudent')
    @if(Route::current()->getName()=='showSelectedStudent')
        <div class="bg-white shadow overflow-hidden sm:rounded-lg m-3">
            {{ Form::model ($student, array('route' => array('updateSelectedStudent', $student->id), 'method'=>'PATCH')) }}
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Edit Information
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    {{strtoupper($student->name)}}
                </p>

            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Student ID:
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ Form::text('studentID', Request::old('studentID', $student->studentid), array('class' => 'form-control border w-full py-1 px-1.5', 'placeholder' => 'Student ID')) }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Student Name:
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ Form::text('studentName', Request::old('studentName', $student->name), array('class' => 'form-control border w-full py-1 px-1.5', 'placeholder' => 'Student Name')) }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Student Address:
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ Form::text('studentAddress', Request::old('studentAddress', $student->address), array('class' => 'form-control border w-full py-1 px-1.5', 'placeholder' => 'Student Address')) }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Student Telephone:
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ Form::number('studentTelephone', Request::old('studentTelephone', $student->telephone), array('class' => 'form-control border w-full py-1 px-1.5', 'step' => '0.01', 'placeholder' => 'Student Telephone')) }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Student Year Group:
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ Form::number('studentYear', Request::old('studentYear', $student->year), array('class' => 'form-control border w-full py-1 px-1.5', 'step' => '0.01', 'placeholder' => 'Student Year Group')) }}
                        </dd>
                    </div>
                    <div class="flex float-left p-2">
                        @if(Route::current()->getName()=='showSelectedStudent')
                            {{ Form::submit('EDIT', array('class' => 'bg-black hover:bg-blue-700 text-white font-bold py-1 px-2 m-3 float-right rounded')) }}
                            {{ Form::close() }}
                        @endif
                    </div>
                    @if(Route::current()->getName()=='showSelectedStudent')
                        {{ Form::open(array('url' => 'students/' . $student->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        <div class="flex float-right p-2">
                            {{ Form::submit('DELETE', array('class' => 'bg-black hover:bg-blue-700 text-white font-bold py-1 px-2 m-3 float-right rounded')) }}
                            {{ Form::close() }}
                        </div>
                    @endif
                    <div class="flex float-left p-2">
                        <a href="{{route('showStudents')}}"
                           class="bg-black hover:bg-blue-700 text-white font-bold py-1 px-2 m-3 float-right rounded">Home</a>
                    </div>
                </dl>
            </div>
        </div>
    @endif
@endsection


