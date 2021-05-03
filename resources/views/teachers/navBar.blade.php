<title>Navbar</title>
@include('teachers.mainView')
@section('navBar')
    <div class="navbar w-5/6 text-xl w-full">
        <div class="navbar-inner bg-green-800 ">
            <ul class="nav flex justify-evenly p-3 ">
                <li><a href="{{route('showTeachers')}}" class="hover:underline">Home</a></li>
            </ul>
        </div>
    </div>
@endsection
