<div class="form-group">
  {!! Form::label('name', 'Nombre') !!}
  {!! Form::text('name', null, ['class'=>'form-control']) !!}
<div class="form-group">
  {!! Form::label('module', 'Modulo') !!}
  {!! Form::select('module', getModulesArray(), 0, ['class'=>'form-control']) !!}
</div>