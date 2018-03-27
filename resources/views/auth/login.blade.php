@extends('template.default_template')

@section('titre')
    Login
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6 offset-3">
            <div class="card border-dark">
                <div class="card-header bg-dark text-white">Login</div>

                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="card-body">


                        <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-sm-4 offset-1 col-form-label">E-Mail Address</label>

                            <div class="toleft col-sm-6">
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}" placeholder="E-Mail Address" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-sm-4 offset-1 col-form-label">Password</label>

                            <div class="toleft col-sm-7">
                                <input id="password" type="password" class="form-control" name="password"
                                       placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="toleft col-sm-7 offset-5">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="remember"
                                           name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="remember">Remember Me</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-dark text-white">
                        <div class="offset-5">
                            <button type="submit" class="btn btn-success">
                                Login
                            </button>
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </div>
            </div>

            </form>
        </div>
    </div>
    </div>
@endsection
