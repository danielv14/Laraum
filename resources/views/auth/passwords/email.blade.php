@extends('layouts.app')

<!-- Main Content -->
@section('content')
<div class="container">
  <div class="column is-8 is-offset-2">
    @if (session('status'))
        <div class="notification is-success">
          <button class="delete"></button>
          {{ session('status') }}
        </div>
    @endif

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
        {{ csrf_field() }}

        <label for="email" class="label">E-Mail Address</label>
        <input id="email" type="email" class="input is-medium{{ $errors->has('email') ? ' is-danger' : '' }}" name="email" value="{{ old('email') }}" required>
        @if ($errors->has('email'))
          <span class="help is-danger">{{ $errors->first('email') }}</span>
        @endif

        <br>
        <br>
        <button type="submit" class="button is-primary">
            Send Password Reset Link
        </button>
    </form>
  </div>

</div>
@endsection
