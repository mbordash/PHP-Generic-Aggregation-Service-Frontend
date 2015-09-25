@extends('app')

@section('content')


            <h2>Edit App Information</h2>

            @if ( !$apikey->slug )
                This is not a valid URL.
            @else

                {!! Form::model($apikey, ['method' => 'PATCH', 'route' => ['apikeys.update', $apikey->slug]]) !!}

                <div class="form-group">
                    {!! Form::label('app_name', 'Application Name:') !!}
                    {!! Form::text('app_name') !!}
                </div>
                <div class="form-group">
                    {!! Form::label('slug', 'Short Name') !!}
                    {!! Form::text('slug', null, ['disabled']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('app_desc', 'Application Description:') !!}
                    {!! Form::textarea('app_desc') !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Save App', ['class'=>'btn primary']) !!}
                </div>

                {!! Form::close() !!}

            @endif

            <p>
                {!! link_to_route('apikeys.index', 'Back to Apps', null , array('class' => 'btn btn-info')) !!}
            </p>



@endsection