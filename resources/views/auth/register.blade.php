@extends('layouts.app')

@section('content')
<div class="container">

  <div class="column is-8 is-offset-2">

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
      {{ csrf_field() }}

      <label for="name" class="label">Name</label>
      <input id="name" type="text" class="input is-medium{{ $errors->has('name') ? ' is-danger' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
      @if ($errors->has('name'))
        <span class="help is-danger">{{ $errors->first('name') }}</span>
      @endif

      <label for="email" class="label">E-Mail Address</label>
      <input id="email" type="email" class="input is-medium{{ $errors->has('email') ? ' is-danger' : '' }}" name="email" value="{{ old('email') }}" required>
      @if ($errors->has('email'))
        <span class="help is-danger">{{ $errors->first('email') }}</span>
      @endif

      <label for="password" class="label">Password</label>
      <input id="password" type="password" class="input is-medium{{ $errors->has('password') ? ' is-danger' : '' }}" name="password" required>
      @if ($errors->has('password'))
        <span class="help is-danger">{{ $errors->first('password') }}</span>
      @endif

      <label for="password-confirm" class="label">Confirm Password</label>
      <input id="password-confirm" type="password" class="input is-medium" name="password_confirmation" required>

      <br>
      <br>
      <button type="submit" class="button is-primary">
          Register
      </button>

    </form>

  </div>

</div>
@endsection
