@extends('app')

@section('content')
    <h2>Edit API Key</h2>

    {!! Form::model($apikey, ['method' => 'PATCH', 'route' => ['apikeys.update', $apikey->slug]]) !!}

    @include('apikeys/partials/_form', ['submit_text' => 'Edit API Key'])

    {!! Form::close() !!}
@endsection