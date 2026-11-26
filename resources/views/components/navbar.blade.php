
<nav class="navbar">

    <a href="{{ url('/') }}" class="brand">
        Training Institute
    </a>

    <div>

        @guest
            <!-- Links for logged-out users -->

            <a href="{{ route('register') }}">
                Register
            </a>

            <a href="{{ route('login') }}">
                Login
            </a>

        @endguest


        @auth
            <!-- Links for logged-in users -->

            <a href="{{ route('students.index') }}"
               class="{{ request()->routeIs('students.*') ? 'active' : '' }}">
                Students
            </a>

            <a href="{{ route('courses.index') }}"
               class="{{ request()->routeIs('courses.*') ? 'active' : '' }}">
                Courses
            </a>

            <!-- Logout button -->

            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit">Log Out</button>
            </form>

        @endauth

    </div>

</nav>
