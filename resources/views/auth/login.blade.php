@extends('layouts.app')

@section('content')
<div class="container">
  <div class="column is-8 is-offset-2">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}

        <label for="email" class="label">E-Mail Address</label>
        <input id="email" type="email" class="input is-medium{{ $errors->has('email') ? ' is-danger' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
        @if ($errors->has('email'))
          <span class="help is-danger">{{ $errors->first('email') }}</span>
        @endif

        <label for="password" class="label">Password</label>
        <input id="password" type="password" class="input is-medium{{ $errors->has('password') ? ' is-danger' : '' }}" name="password" required>
        @if ($errors->has('password'))
          <span class="help is-danger">{{ $errors->first('password') }}</span>
        @endif

        <br>
        <br>

        <p class="control">
          <label class="checkbox">
            <input type="checkbox" name="remember">
            Remember me
          </label>
        </p>

        <button type="submit" class="button is-primary">
            Login
        </button>

        <a class="button" href="{{ url('/password/reset') }}">
            Forgot Your Password?
        </a>
    </form>
  </div>

</div>
@endsection
