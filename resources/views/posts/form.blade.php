<div class="form-group">
  {!! Form::label('title', 'Title of the post') !!}
  {!! Form::text('title', null, [
    'class' => 'input is-medium'
    ]) !!}
</div>
<br>
<div class="form-group">
  {!! Form::label('body', 'Write the post body') !!}
  {!! Form::textarea('body', null, [
    'class' => '',
    'rows' => '30',
    'data-provide' => 'markdown',
    'data-iconlibrary' => 'fa'
    ]) !!}
</div>
<br>
{!! Form::submit($publish, ['class' => 'button is-primary is-medium', 'name' => 'publish']) !!}
{!! Form::submit($draft, ['class' => 'button is-medium', 'name' => 'draft']) !!}



<br>
