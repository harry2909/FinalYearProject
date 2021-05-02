<div class="max-w-xs rounded overflow-hidden shadow-lg my-4 m-7 flex flex-wrap bg-white">
    <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">{{$teacher->name}}</div>
        <p class="text-grey-darker text-base">
            Teacher ID: {{$teacher->teacherid}}
        </p>
        <p class="text-grey-darker text-base">
            Teacher Subject: {{$teacher->subject}}
        </p>
        <p class="text-grey-darker text-base">
            @if(Route::current()->getName()!='showSelectedTeacher')
                <button onclick="window.location='{{ url("teachers/".$teacher->id) }}'"
                        class="select-product bg-black hover:bg-blue-700 text-white font-bold py-1 px-2 m-3 float-right rounded">
                    Select
                </button>
            @endif
        </p>
    </div>
</div>

