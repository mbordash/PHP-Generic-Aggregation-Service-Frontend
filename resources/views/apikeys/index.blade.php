@extends('app')
 
@section('content')
	<h2>Api Keys</h2>
	
	@if ( !$apikeys->count() )
		You have no App Keys.
	@else
		<ul>
		@foreach( $apikeys as $apikey )
			<li>
						
				{!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('apikeys.destroy', $apikey->slug))) !!}
				    <a href="{{ route('apikeys.show', $apikey->slug) }}">{{ $apikey->app_name }}</a>
				    (
				        {!! link_to_route('apikeys.edit', 'Edit', array($apikey->slug), array('class' => 'btn btn-info')) !!},
				        {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
				    )
				{!! Form::close() !!}
				
			</li>
		@endforeach
		</ul>
	@endif
	
	<p>
		{!! link_to_route('apikeys.create', 'Create API Key', $apikey->slug, array('class' => 'btn btn-success')) !!}
	</p>
	
@endsection	