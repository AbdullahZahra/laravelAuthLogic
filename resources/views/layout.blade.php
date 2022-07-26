<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>

<body class="container">
    <!-- header -->
    <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="/" class="nav-link" aria-current="page">Home</a></li>
            @auth
                <li class="nav-item"><a href="/" class="nav-link">{{auth()->user()->name}}</a></li>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="btn btn-primary">Logout</button>
                </form>
            @else
                <li class="nav-item"><a href="/register" class="nav-link">Register</a></li>
                <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
            @endauth
        </ul>
    </header>

    @yield('content')


    <!-- success message -->
    @if (Session::has('success'))
        <div>
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif
</body>

</html>
