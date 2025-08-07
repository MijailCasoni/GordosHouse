@if (session('status'))
        <div class="session-status">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
            @error('email')
                <span class="text-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
            @error('password')
                <span class="text-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group-checkbox">
            <label for="remember_me" class="form-checkbox-label">
                <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                <span class="form-checkbox-text">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="form-actions">
            @if (Route::has('password.request'))
                <a class="text-link" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button type="submit" class="btn btn-primary">
                {{ __('Log in') }}
            </button>
        </div>
    </form>