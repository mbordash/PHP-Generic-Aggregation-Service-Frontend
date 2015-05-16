@extends('app')

@section('content')


            <h2>Edit API Key</h2>

            @if ( !$apikey->slug )
                This is not a valid URL.
            @else

                {!! Form::model($apikey, ['method' => 'PATCH', 'route' => ['apikeys.update', $apikey->slug]]) !!}

                @include('apikeys/partials/_form', ['submit_text' => 'Save API Key'])

                {!! Form::close() !!}

            @endif

            <p>
                {!! link_to_route('apikeys.index', 'Back to API Keys', null , array('class' => 'btn btn-info')) !!}
            </p>



@endsection