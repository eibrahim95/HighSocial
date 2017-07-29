        <div class="panel panel-default">
            <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') and Session::has('login_try') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address {!! Route::getCurrentRoute()->getName() !!}</label>

                            <div class="col-md-6">
                                @if (Session::has('login_try'))
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                @elseif (Session::has('register_try'))
                                    <input id="email" type="email" class="form-control" name="email" value="" required>
                                @else
                                    <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                                @endif

                                @if ($errors->has('email') and Session::has('login_try')) 
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') and Session::has('login_try') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password') and Session::has('login_try'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                                <div class="col-md-2 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Password ?
                                    </a>
                                </div>
                            
                        </div>
                    </form>
                </div>
            </div>