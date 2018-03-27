@extends('template.default_template')

@section('titre')
    Register
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col offset-2">
                <div class="card border-dark">
                    <div class="card-header text-white bg-dark">Register</div>

                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-md-6 offset-3 input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-transparent border-dark">Name</div>
                                    </div>
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}" required autofocus placeholder="Name">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-md-6 offset-3 input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-transparent border-dark">E-Mail</div>
                                    </div>
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required placeholder="E-Mail Address">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-md-6 offset-3 input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-transparent border-dark">Password</div>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" required
                                           placeholder="Password">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6 offset-3 input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-transparent border-dark">Confirm</div>
                                    </div>
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required placeholder="Confirm Password">

                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-white bg-dark">
                            <button type="submit" class="btn btn-success">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
