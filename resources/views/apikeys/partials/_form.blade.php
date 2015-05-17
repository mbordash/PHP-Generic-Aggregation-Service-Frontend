<div class="form-group">
    {!! Form::label('app_name', 'Application Name:') !!}
    {!! Form::text('app_name') !!}
</div>
<div class="form-group">
    {!! Form::label('slug', 'Short Name (no spaces):') !!}
    {!! Form::text('slug') !!}
</div>
<div class="form-group">
    {!! Form::label('app_desc', 'Application Description:') !!}
    {!! Form::textarea('app_desc') !!}
</div>
<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>
