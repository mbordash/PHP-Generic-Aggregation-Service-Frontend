@extends('app')

@section('content')

            <h1>Dashboard</h1>
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					Available Services:
                    <ul>
                        <li><a href="{{ url('/aggregation') }}">Aggregation</a></li>
                        <li><a href="{{ url('/apikeys') }}">Manage Apps</a></li>
                    </ul>
				</div>
			</div>
@endsection
