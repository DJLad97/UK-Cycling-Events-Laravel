{{--  LOGIN MODAL  --}}
<div id="login-modal" class="modal">
    <div class="col-xs-1 col-sm-3 col-md-4"></div>
    <form class="model-content animate col-xs-10 col-sm-6 col-md-4" method="post" action="{{route('login')}}" id="login-form">
        {{csrf_field() }}
        <span onclick="document.getElementById('login-modal').style.display='none'" class="close" title="Close Modal">&times;</span>
        <div id="error">
        </div>
        <div class="page-header">
            <h2>SIGN IN</h2>
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label">E-Mail Address</label>
            <input id="email" type="email" class="text-box" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="control-label">Password</label>

            <input id="password" type="password" class="text-box" name="password" placeholder="Password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <p><a href="sign-up.php">Don't have an account?</a></p>
        <div class="form-group">
            <input type="submit" name="submit" value="Sign In" class="modal-btn" />
        </div>
    </form>
    <div class="col-xs-1 col-sm-3 col-md-4"></div>
    </div>