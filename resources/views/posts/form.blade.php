<div class="form-group">
  {!! Form::label('title', 'Title of the post') !!}
  {!! Form::text('title', null, [
    'class' => 'form-control'
    ]) !!}
</div>

<div class="form-group">
  {!! Form::label('body', 'Write the post body') !!}
  {!! Form::textarea('body', null, [
    'class' => 'form-control',
    'rows' => '15'
    ]) !!}
</div>

<div class="form-group">
  {!! Form::submit($submit, ['class' => 'btn btn-primary']) !!}
</div>


<br>
