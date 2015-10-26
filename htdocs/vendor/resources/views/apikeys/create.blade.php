@extends('app')

@section('content')


            <h2>Create App & Generate Token</h2>

            {!! Form::model(new App\Apikey, ['route' => ['apikeys.store']]) !!}

            @include('apikeys/partials/_form', ['submit_text' => 'Create App & Token'])

            {!! Form::close() !!}

            <p>
                {!! link_to_route('apikeys.index', 'Back to API Tokens', null , array('class' => 'btn btn-info')) !!}
            </p>

@endsection

