<!-- Navbar with Header -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @if (Session::has('user'))
            <li>
                <p>Welcome, {{ Session::get('user'); }}</p>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ route('items.index') }}">Items</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('company.index') }}">Company</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('employee.index') }}">Employee</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login.logout') }}">Logout</a>
            </li>
        </ul>
    </div>
</nav>