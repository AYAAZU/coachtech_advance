


    <div class="">
        @auth
        <a href="/" class="">HOME</a>
        @else
        <a href="{{ route('login') }}" class="">Log in</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="">Register</a>
        @endif
        @endauth
    </div>
    


    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">LOG OUT</button>
    </form>
