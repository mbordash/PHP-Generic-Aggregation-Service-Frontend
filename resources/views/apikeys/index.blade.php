@extends('app')
 
@section('content')


            <h2>Apps</h2>

            @if ( !$apikeys->count() )
                You have no Apps.
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>App Name</th>
                            <th>API Token</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach( $apikeys as $apikey )
                    <tr>
                        {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' => array('apikeys.destroy', $apikey->slug))) !!}
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

            @if ( $apikeys->count() < 5 )

                <p>
                    {!! link_to_route('apikeys.create', 'Create App', null, array('class' => 'btn btn-success')) !!}
                </p>
            @else

                <p>You've reached the max apps allowed (5) for free users.</p>

            @endif
	
@endsection	