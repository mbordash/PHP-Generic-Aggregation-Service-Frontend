@extends('app')
 
@section('content')


            <h2>Api Keys</h2>

            @if ( !$apikeys->count() )
                You have no App Keys.
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>App Name</th>
                            <th>API Key</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach( $apikeys as $apikey )
                    <tr>
                        {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('apikeys.destroy', $apikey->slug))) !!}
                            <td><a href="{{ route('apikeys.show', $apikey->slug) }}">{{ $apikey->app_name }}</a></td>
                            <td>{{ $apikey->api_key }}</td>
                        <td>
                                {!! link_to_route('apikeys.edit', 'Edit', array($apikey->slug), array('class' => 'btn btn-info btn-xs')) !!}
                                {!! Form::submit('Delete', array('class' => 'btn btn-danger btn-xs')) !!}
                        </td>
                        {!! Form::close() !!}
                    </tr>
                @endforeach
                    </tbody>
                </table>
            @endif

            <p>
                {!! link_to_route('apikeys.create', 'Create API Key', null, array('class' => 'btn btn-success')) !!}
            </p>

	
@endsection	