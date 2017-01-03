<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $menus->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $menus->name !!}</p>
</div>

<!-- Abc Field -->
<div class="form-group">
    {!! Form::label('abc', 'Abc:') !!}
    <p>{!! $menus->abc !!}</p>
</div>
<div class="form-group">
    {!! Form::label('create', 'Create:') !!}
    <p>{!! $menus->created_at !!}</p>
</div>
<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $menus->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $menus->updated_at !!}</p>
</div> 

