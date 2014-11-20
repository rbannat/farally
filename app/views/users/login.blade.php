{{ HTML::link('register', 'Register') }}
{{ Form::open(array('url'=>'/login', 'class'=>'')) }}
    <h2 class="">Please Login</h2>

    {{ Form::text('email', null, array('class'=>'', 'placeholder'=>'Email Address')) }}
    {{ Form::password('password', array('class'=>'', 'placeholder'=>'Password')) }}

    {{ Form::submit('Login', array('class'=>''))}}
{{ Form::close() }}