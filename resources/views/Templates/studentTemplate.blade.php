<div class="max-w-xs rounded overflow-hidden shadow-lg my-4 m-7 flex flex-wrap bg-white">
    <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">{{$student->name}}</div>
        <p class="text-grey-darker text-base">
            Student ID: {{$student->studentid}}
        </p>
        <p class="text-grey-darker text-base">
            Student Address: {{$student->address}}
        </p>
        <p class="text-grey-darker text-base">
            Student Telephone: {{$student->telephone}}
        </p>
        <p class="text-grey-darker text-base">
            Student Year Group: {{$student->year}}
        </p>
        @foreach($subjects as $name)
            @if($student->subject_id == $name->id)
                <p class="text-grey-darker text-base">
                    Student Subject: {{$name->name}}
                </p>
            @endif
        @endforeach
        <p class="text-grey-darker text-base">
            @if(Route::current()->getName()!='showSelectedStudent')
                <button onclick="window.location='{{ url("students/".$student->id) }}'"
                        class="select-product bg-black hover:bg-blue-700 text-white font-bold py-1 px-2 m-3 float-right rounded">
                    Select
                </button>
            @endif
        </p>
    </div>
</div>

<?php
