<title>Teacher View</title>
@extends('teachers.mainView')
<div class="max-w-full rounded overflow-hidden flex flex-wrap text-black-500 justify-center">
    <h1 class="font-bold text-3xl mb-2">View Teacher</h1>
</div>
@section('viewTeacher')
    @if(Route::current()->getName()=='showSelectedTeacher')
        <div class="bg-white shadow overflow-hidden sm:rounded-lg m-3">
            {{ Form::model ($teacher, array('route' => array('updateSelectedTeacher', $teacher->id), 'method'=>'PATCH')) }}
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Edit Information
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    {{strtoupper($teacher->name)}}
                </p>

            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Teacher ID:
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ Form::text('teacherID', Request::old('teacherID', $teacher->teacherid), array('class' => 'form-control border w-full py-1 px-1.5', 'placeholder' => 'Teacher ID')) }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Teacher Name:
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ Form::text('teacherName', Request::old('teacherName', $teacher->name), array('class' => 'form-control border w-full py-1 px-1.5', 'placeholder' => 'Teacher Name')) }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Teacher Subject:
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ Form::text('teacherSubject', Request::old('teacherSubject', $teacher->subject), array('class' => 'form-control border w-full py-1 px-1.5', 'placeholder' => 'Teacher Subject')) }}
                        </dd>
                    </div>
                    <div class="flex float-left p-2">
                        @if(Route::current()->getName()=='showSelectedTeacher')
                            {{ Form::submit('EDIT', array('class' => 'bg-black hover:bg-blue-700 text-white font-bold py-1 px-2 m-3 float-right rounded')) }}
                            {{ Form::close() }}
                        @endif
                    </div>
                    @if(Route::current()->getName()=='showSelectedTeacher')
                        {{ Form::open(array('url' => 'teachers/' . $teacher->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        <div class="flex float-right p-2">
                            {{ Form::submit('DELETE', array('class' => 'bg-black hover:bg-blue-700 text-white font-bold py-1 px-2 m-3 float-right rounded')) }}
                            {{ Form::close() }}
                        </div>
                    @endif
                    <div class="flex float-left p-2">
                        <a href="{{route('showTeachers')}}"
                           class="bg-black hover:bg-blue-700 text-white font-bold py-1 px-2 m-3 float-right rounded">Home</a>
                    </div>
                </dl>
            </div>
        </div>
    @endif
@endsection


