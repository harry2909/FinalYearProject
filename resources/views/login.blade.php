<h1>Sign In</h1>

{{Form::open (array ('url' => 'api/login'))}}

<p> {{Form::text ('username', ‘‘, array ('placeholder'=>'Username','maxlength'=>30))}} </p>

<p> {{Form::password ('password', array('placeholder'=>'Password','maxlength'=>30)) }} </p>

<p> {{Form::submit ('Submit')}} </p>

{{Form::close ()}}
