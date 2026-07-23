<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    @vite([
        'resources/css/admin.css',
        'resources/js/app.js'
    ])

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

    <!-- Sidebar -->
    <aside class="sidebar">

        <div class="sidebar-header">
            <h3>PT. NYUSU SEK</h3>
            <p>Admin Panel</p>
        </div>

        <nav class="sidebar-menu">

            <a href="{{ route('dashboard') }}"
               class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('services.index') }}"
               class="{{ request()->routeIs('services.*') ? 'active' : '' }}">
                <i class="bi bi-briefcase"></i>
                <span>Services</span>
            </a>

            <a href="{{ route('galleries.index') }}"
               class="{{ request()->routeIs('galleries.*') ? 'active' : '' }}">
                <i class="bi bi-images"></i>
                <span>Gallery</span>
            </a>

            <a href="{{ route('teams.index') }}"
               class="{{ request()->routeIs('teams.*') ? 'active' : '' }}">
                <i class="bi bi-people"></i>
                <span>Team</span>
            </a>

            <a href="{{ route('profile.edit') }}"
               class="{{ request()->routeIs('profile.*') ? 'active' : '' }}">
                <i class="bi bi-person-circle"></i>
                <span>Profile</span>
            </a>

            <form method="POST"
                  action="{{ route('logout') }}"
                  style="margin:0; padding:0; width:100%;">

                @csrf

                <button type="submit" class="logout-btn">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </button>

            </form>

        </nav>

    </aside>

    <!-- Main Content -->
    <main class="main-content">

        <header class="topbar">

            <h4>@yield('title', 'Dashboard')</h4>

            <div class="admin-name">
                <i class="bi bi-person-circle"></i>
                {{ Auth::user()->name }}
            </div>

        </header>

        <section class="page-content">
            @yield('content')
        </section>

        <footer class="footer">
            © 2026 PT. NYUSUSEK. All Rights Reserved.
        </footer>

    </main>

</body>
</html>