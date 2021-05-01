<div class="max-w-xs rounded overflow-hidden shadow-lg my-4 m-7 flex flex-wrap bg-white">
    <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">{{$student->name}}</div>
        <p class="text-grey-darker text-base">
            {{$student->studentid}}
        </p>
        <p class="text-grey-darker text-base">
            {{$student->address}}
        </p>
        <p class="text-grey-darker text-base">
            {{$student->telephone}}
        </p>
        <p class="text-grey-darker text-base">
            {{$student->year}}
        </p>
        <p class="text-grey-darker text-base">
            {{$student->subjectid}}
        </p>
    </div>
</div>

<?php
