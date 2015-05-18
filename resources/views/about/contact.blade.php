@extends('app')

@section('content')


    <h1>Contact Upsert.io</h1>

    <p>Need help or have a question? Please let us know and we'll get back to you asap.</p>

    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    {!! Form::open(array('route' => 'contact_store', 'class' => 'form')) !!}

    <div class="form-group">
        {!! Form::label('Your Name') !!}
        {!! Form::text('name', null,
        array('required',
        'class'=>'form-control',
        'placeholder'=>'Your name')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Your E-mail Address') !!}
        {!! Form::text('email', null,
        array('required',
        'class'=>'form-control',
        'placeholder'=>'Your e-mail address')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Your Message') !!}
        {!! Form::textarea('message', null,
        array('required',
        'class'=>'form-control',
        'placeholder'=>'Your message')) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Contact Us!',
        array('class'=>'btn btn-primary')) !!}
    </div>
    {!! Form::close() !!}

@endsection
