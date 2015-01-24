@extends('layouts.main')
@section('content')
<body>
    <section class="section main">
        <div class="section_container">
            
            {{ HTML::link('login', 'Back to Login', array('class' => 'button')) }}

            {{ Form::open(array('url'=>'users/add', 'class'=>'')) }}
            <h2 class="">Please Register</h2>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <ul class="list"> 
                <li>
                    {{ Form::text('username', null, array('class'=>'input input_text', 'placeholder'=>'Username')) }}
                </li>
                <li>
                    {{ Form::text('forename', null, array('class'=>'input input_text', 'placeholder'=>'First Name')) }}
                </li>
                <li>
                    {{ Form::text('lastname', null, array('class'=>'input input_text', 'placeholder'=>'Last Name')) }}
                </li>
                <li>
                    {{ Form::text('email', null, array('class'=>'input input_text', 'placeholder'=>'Email Address')) }}
                </li>
                <li>
                    {{ Form::password('password', array('class'=>'input input_text', 'placeholder'=>'Password')) }}
                </li>
                <li>
                    {{ Form::password('password_confirmation', array('class'=>'input input_text', 'placeholder'=>'Confirm Password')) }}
                </li>

                <li>
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                </li>
                <li>
                    {{ Form::submit('Register', array('class'=>'button'))}}
                </li>
            </ul>
            {{ Form::close() }}
        </div>
    </section>
    {{ HTML::script('0.1/js/jquery/jquery-2.1.3.min.js') }}
    {{ HTML::script('0.1/js/main.js')}}
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

</body>
@stop