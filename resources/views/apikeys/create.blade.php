@extends('app')

@section('content')
    <h2>Create API Key</h2>

    {!! Form::model(new App\Apikey, ['route' => ['apikeys.store']]) !!}

    @include('apikeys/partials/_form', ['submit_text' => 'Create API Key'])

    {!! Form::close() !!}

@endsection

