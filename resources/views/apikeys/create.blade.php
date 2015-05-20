@extends('app')

@section('content')


            <h2>Create App & Generate Token</h2>

            <p>Our service was built for apps "in the wild". If you absolutely need to PUT/GET data via JavaScript and you embed your API token in your
            web page, people will be able to PUT/GET data using your API token in a way that you may not have intended. A better approach would be to create a
            server side script to proxy requests for your JavaScript methods. In this way, you will keep your API token private and secure.</p>

            {!! Form::model(new App\Apikey, ['route' => ['apikeys.store']]) !!}

            @include('apikeys/partials/_form', ['submit_text' => 'Create App & Token'])

            {!! Form::close() !!}

            <p>
                {!! link_to_route('apikeys.index', 'Back to API Tokens', null , array('class' => 'btn btn-info')) !!}
            </p>

@endsection

