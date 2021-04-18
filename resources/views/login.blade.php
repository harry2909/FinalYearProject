<h1>Sign In</h1>

{{Form::open (array('route' => array('loginRequest'), 'method' => 'POST'))}}

<p> {{ Form::text('email', Request::old('email'), array('class' => 'form-control border w-full py-1 px-1.5', 'placeholder' => 'Email Address')) }} </p>

<p> {{ Form::password('password', Request::old('password'), array('class' => 'form-control border w-full py-1 px-1.5', 'placeholder' => 'Password')) }} </p>

<p> {{Form::submit ('Submit')}} </p>

{{Form::close ()}}
