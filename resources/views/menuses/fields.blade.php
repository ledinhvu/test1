<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Abc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('abc', 'Abc:') !!}
    {!! Form::text('abc', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('create', 'Create:') !!}
    {!! Form::text('create', null, ['class' => 'form-control']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('menuses.index') !!}" class="btn btn-default">Cancel</a>
</div>
