<nav class="navbar navbar-expand-lg navbar-dark ">
    <div class="container-fluid">

        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
            <i class="bi bi-house px-2" style="font-size: 1.3rem; color: rgba(var(--primary),1); "></i>
            Admin Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>

        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @if(auth()->check())
                    <form action="{{ route('admin.logout') }}" method="POST" style="display: inline; ">
                        @csrf

                        <button type="submit" class="btn " style="background-color: rgba(var(--primary),1); color: white">
                            <i class="bi bi-box-arrow-right px-1""></i>Logout</button>
                    </form>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.login') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
