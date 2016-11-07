@extends('layouts.app')

@section('content')
<div class="container">
  <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
      {{ csrf_field() }}

      <input type="hidden" name="token" value="{{ $token }}">

      <label for="email" class="label">E-Mail Address</label>
      <input id="email" type="email" class="input is-medium{{ $errors->has('email') ? ' is-danger' : '' }}" name="email" value="{{ $email or old('email') }}" required autofocus>
      @if ($errors->has('email'))
        <span class="help is-danger">{{ $errors->first('email') }}</span>
      @endif

      <label for="password" class="label">Password</label>
      <input id="password" type="password" class="input is-medium{{ $errors->has('password') ? ' is-danger' : '' }}" name="password" required>
      @if ($errors->has('password'))
        <span class="help is-danger">{{ $errors->first('password') }}</span>
      @endif

      <label for="password-confirm" class="label">Confirm Password</label>
      <input id="password-confirm" type="password" class="input is-medium{{ $errors->has('password_confirmation') ? ' is-danger' : '' }}" name="password_confirmation" required>

      @if ($errors->has('password_confirmation'))
        <span class="help is-danger">{{ $errors->first('password_confirmation') }}</span>
      @endif

      <button type="submit" class="button">
          Reset Password
      </button>
  </form>
</div>
@endsection
