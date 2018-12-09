<form action="login" method="POST">
    {!! csrf_field() !!}
    <div>
        Email
        <input name="email" type="email" value="{{ old('email') }}">
        </input>
    </div>
    <div>
        Password
        <input id="password" name="password" type="password">
        </input>
    </div>
    <div>
        <input name="remember" type="checkbox">
            Remember Me
        </input>
    </div>
    <div>
        <button type="submit">
            Login
        </button>
    </div>
</form>