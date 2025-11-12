@props(['pageTitle' => 'Dashboard'])

<!-- Background Image -->
<div class="admin-background" style="background-image: url('/img/bg_admin.png');"></div>

<!-- Sidebar -->
<aside class="admin-sidebar" id="sidebar">
    <div class="sidebar-logo text-center py-4">
        <img src="/img/logo_semai.png" alt="SEMAI Logo" class="logo-img">
    </div>

    <!-- Navigation Menu -->
    <nav class="sidebar-nav montserrat">
        <ul class="nav flex-column">
            <!-- Dashboard -->
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <img src="/icons/dashboard.png" alt="Resep Icon" style="width:40px; height:40px;">
                    <span class="nav-text"><i>Dashboard</i></span>
                </a>
            </li>

            <!-- Dokumentasi -->
            <li class="nav-item">
                <a href="{{ route('admin.dokumentasi.index') }}"
                    class="nav-link {{ request()->routeIs('admin.dokumentasi.*') ? 'active' : '' }}">
                    <img src="/icons/dokumentasi.png" alt="Resep Icon" style="width:40px; height:40px;">
                    <span class="nav-text">Dokumentasi</span>
                </a>
            </li>

            <!-- Edukasi -->
            <li class="nav-item">
                <a href="{{ route('admin.edukasi.index') }}"
                    class="nav-link {{ request()->routeIs('admin.edukasi.*') ? 'active' : '' }}">
                    <img src="/icons/edukasi.png" alt="Resep Icon" style="width:40px; height:40px;">
                    <span class="nav-text">Edukasi</span>
                </a>
            </li>

            <!-- Resep -->
            <li class="nav-item">
                <a href="{{ route('admin.resep.index') }}"
                    class="nav-link {{ request()->routeIs('admin.resep.*') ? 'active' : '' }}">
                    <img src="/icons/resep.png" alt="Resep Icon" style="width:40px; height:40px;">
                    <span class="nav-text">Resep</span>
                </a>
            </li>

            <!-- Logout -->
            <li class="nav-item">
                <form action="{{ route('admin.logout') }}" method="POST" id="logoutForm">
                    @csrf
                    <a href="#" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                        <img src="/icons/logout.png" alt="Resep Icon" style="width:40px; height:40px;">
                        <span class="nav-text" style="color:#FF0000;">Logout</span>
                    </a>
                </form>
            </li>
        </ul>
    </nav>
</aside>

<!-- Main Content -->
<div class="admin-content montserrat" id="content">
    <!-- Top Bar -->
    <header class="admin-topbar">
        <div class="d-flex align-items-center">
            <!-- Toggle Sidebar Button -->
            <button class="btn btn-link text-dark me-3" id="sidebarToggle">
                <i class="bi bi-list" style="font-size: 1.5rem;"></i>
            </button>

            <!-- Page Title -->
            <h4 class="mb-0 montserrat-bold" style="font-style: italic;">{{ $pageTitle }}</h4>
        </div>
    </header>

    <!-- Content Area -->
    <main class="admin-main montserrat">
        {{ $slot }}
    </main>
</div>

<style>
    body {
        margin: 0;
        padding: 0;
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
    }

    /* Background Image */
    .admin-background {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        z-index: 0;
    }

    /* Sidebar */
    .admin-sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 250px;
        height: 100vh;
        background: linear-gradient(180deg, #3498DB 0%, #2874A6 100%);
        transition: width 0.3s ease;
        z-index: 1000;
        overflow-x: hidden;
    }

    .admin-sidebar.collapsed {
        width: 80px;
    }

    .sidebar-logo {
        padding: 1.5rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .logo-img {
        width: 70px;
        height: 70px;
        object-fit: contain;
        transition: all 0.3s ease;
    }

    .admin-sidebar.collapsed .logo-img {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center
    }

    /* Sidebar Navigation */
    .sidebar-nav {
        padding: 1rem 0;
        height: calc(100vh - 130px);
        display: flex;
        flex-direction: column;
    }

    .sidebar-nav .nav {
        height: 100%;
    }

    .sidebar-nav .nav-item {
        margin: 0.25rem 0;
    }

    .sidebar-nav .nav-link {
        color: white;
        padding: 1rem 1.5rem;
        display: flex;
        align-items: center;
        text-decoration: none;
        transition: all 0.3s ease;
        border-radius: 0;
        position: relative;
    }

    .sidebar-nav .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .sidebar-nav .nav-link.active {
        background-color: #FF821C;
    }

    .sidebar-nav .nav-link span {
        font-size: 1rem;
        min-width: 30px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .sidebar-nav .nav-link .nav-text {
        margin-left: 1rem;
        white-space: nowrap;
        opacity: 1;
        transition: opacity 0.3s ease;
    }

    .admin-sidebar.collapsed .nav-link .nav-text {
        opacity: 0;
        width: 0;
        margin-left: 0;
    }

    .admin-sidebar.collapsed .nav-link {
        justify-content: center;
        padding: 1rem;
    }

    /* Main Content */
    .admin-content {
        margin-left: 250px;
        transition: margin-left 0.3s ease;
        min-height: 100vh;
        position: relative;
        z-index: 1;
    }

    .admin-content.expanded {
        margin-left: 80px;
    }

    /* Top Bar */
    .admin-topbar {
        background: white;
        padding: 1rem 2rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: sticky;
        top: 0;
        z-index: 100;
    }

    .admin-topbar h4 {
        font-size: 1.5rem;
        color: #000;
    }

    /* Main Content Area */
    .admin-main {
        padding: 2rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .admin-sidebar {
            transform: translateX(-100%);
        }

        .admin-sidebar.show {
            transform: translateX(0);
        }

        .admin-content {
            margin-left: 0;
        }

        .admin-content.expanded {
            margin-left: 0;
        }
    }
</style>

<script>
    // Sidebar Toggle
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');
    const toggleBtn = document.getElementById('sidebarToggle');

    toggleBtn.addEventListener('click', function() {
        sidebar.classList.toggle('collapsed');
        content.classList.toggle('expanded');

        // Save state to localStorage
        const isCollapsed = sidebar.classList.contains('collapsed');
        localStorage.setItem('sidebarCollapsed', isCollapsed);
    });

    // Load sidebar state from localStorage
    window.addEventListener('DOMContentLoaded', function() {
        const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
        if (isCollapsed) {
            sidebar.classList.add('collapsed');
            content.classList.add('expanded');
        }
    });

    // Mobile sidebar toggle
    if (window.innerWidth <= 768) {
        toggleBtn.addEventListener('click', function() {
            sidebar.classList.toggle('show');
        });

        // Close sidebar when clicking outside
        document.addEventListener('click', function(event) {
            const isClickInside = sidebar.contains(event.target) || toggleBtn.contains(event.target);
            if (!isClickInside && sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
            }
        });
    }
</script>
