@extends('app')
 
@section('content')


            <h2>App Details</h2>

            @if ( !$apikey->slug )
                This is not a valid URL.
            @else

                <h2>{{ $apikey->app_name }}</h2>

                <dl class="dl-horizontal">
                    <dt>API Token</dt>
                    <dd>{{ $apikey->api_key }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Description</dt>
                    <dd>{{ $apikey->app_desc }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Daily Request Limit</dt>
                    <dd>{{ $apikey->request_limit_day }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Total Requests</dt>
                    <dd>{{ $apikey->request_count }} ({{ $apikey->requests_per_day }} avg/day)</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Created On</dt>
                    <dd>{{ $apikey->created_at }}</dd>
                </dl>
            @endif

            <p>
                {!! link_to_route('apikeys.edit', 'Edit', array($apikey->slug), array('class' => 'btn btn-info btn-xs')) !!}
                {!! Form::submit('Delete', array('class' => 'btn btn-danger btn-xs')) !!}
            </p>

            <p>
                {!! link_to_route('apikeys.index', 'Back to API Keys', null , array('class' => 'btn btn-info')) !!}
            </p>


@endsection