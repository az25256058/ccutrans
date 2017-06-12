@if (Route::has('login'))
    <div class="top-right links">
        @if (Auth::check())
            <a href="{{ url('/product-0') }}">Home</a>
        @else
            <a href="{{ url('/login/facebook') }}">Login</a>
        <!--<a href="{{ url('/register') }}">Register</a>-->
        @endif
    </div>
@endif
