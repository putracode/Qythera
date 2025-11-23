<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Qythera</title>
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="/tabler/dist/libs/jsvectormap/dist/jsvectormap.css?1760775604" rel="stylesheet" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="/tabler/dist/css/tabler.css?1760775604" rel="stylesheet" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PLUGINS STYLES -->
    <link href="/tabler/dist/css/tabler-flags.css?1760775604" rel="stylesheet" />
    <link href="/tabler/dist/css/tabler-socials.css?1760775604" rel="stylesheet" />
    <link href="/tabler/dist/css/tabler-payments.css?1760775604" rel="stylesheet" />
    <link href="/tabler/dist/css/tabler-vendors.css?1760775604" rel="stylesheet" />
    <link href="/tabler/dist/css/tabler-marketing.css?1760775604" rel="stylesheet" />
    <link href="/tabler/dist/css/tabler-themes.css?1760775604" rel="stylesheet" />
    <!-- END PLUGINS STYLES -->
    <!-- BEGIN DEMO STYLES -->
    <link href="/tabler/preview/css/demo.css?1760775604" rel="stylesheet" />
    <!-- END DEMO STYLES -->
    <!-- BEGIN CUSTOM FONT -->
    <style>
        @import url("https://rsms.me/inter/inter.css");
    </style>
    <!-- END CUSTOM FONT -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
    @yield('style')
</head>

<body>
    <!-- BEGIN GLOBAL THEME SCRIPT -->
    <script src="/tabler/dist/js/tabler-theme.min.js?1760775604"></script>
    <!-- END GLOBAL THEME SCRIPT -->
    <div class="page">
        <!--  BEGIN SIDEBAR  -->
        <aside class="navbar navbar-vertical navbar-expand-lg" style="overflow-y: hidden">
            <div class="container-fluid">
                <!-- BEGIN NAVBAR TOGGLER -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
                    aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle sidebar navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- END NAVBAR TOGGLER -->

                <!-- BEGIN NAVBAR LOGO -->
                <div class="navbar-brand navbar-brand-autodark" style="!margin-bottom: 0px">
                    <h1>Qythera</h1>
                </div>
                <!-- END NAVBAR LOGO -->

                <div class="navbar-nav flex-row d-lg-none">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 p-0 px-2" data-bs-toggle="dropdown"
                            aria-label="Open user menu">
                            <span class="avatar avatar-sm"
                                style="background-image: url(/avatar.jpeg)">
                            </span>
                            <div class="d-none d-xl-block ps-2">
                                <div>{{ Auth::user()->nama }}</div>
                            </div>
                        </a>
                        <!-- BEGIN USER MENU -->
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </div>
                        <!-- END USER MENU -->
                    </div>
                </div>


                <div class="collapse navbar-collapse" id="sidebar-menu">
                    <!-- BEGIN NAVBAR MENU -->
                    <ul class="navbar-nav pt-lg-3">
                        <li class="nav-item {{ Request::is('back/dashboard*') ? 'active' : '' }}">
                            <a class="nav-link" href="/back/dashboard">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"
                                        focusable="false" class="icon icon-1">
                                        <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                    </svg></span>
                                <span class="nav-link-title"> Dashboard </span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('back/pasien*') ? 'active' : '' }}">
                            <a class="nav-link" href="/back/pasien">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"
                                        focusable="false" class="icon icon-2">
                                        <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                    </svg></span>
                                <span class="nav-link-title"> Pasien </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dokter">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                    </svg></span>
                                <span class="nav-link-title"> Dokter </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dokter">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-pills">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M8 8m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" />
                                        <path d="M17 17m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                        <path d="M4.5 4.5l7 7" />
                                        <path d="M19.5 14.5l-5 5" />
                                    </svg></span>
                                <span class="nav-link-title">Obat</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dokter">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-report-medical">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                        <path
                                            d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                        <path d="M10 14l4 0" />
                                        <path d="M12 12l0 4" />
                                    </svg></span>
                                <span class="nav-link-title">Rekam Medis</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                                data-bs-auto-close="false" role="button" aria-haspopup="true"
                                aria-expanded="false">
                                <span
                                    class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/package -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"
                                        focusable="false" class="icon icon-1">
                                        <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                                        <path d="M12 12l8 -4.5" />
                                        <path d="M12 12l0 9" />
                                        <path d="M12 12l-8 -4.5" />
                                        <path d="M16 5.25l-8 4.5" />
                                    </svg></span>
                                <span class="nav-link-title"> Interface </span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="dropdown-menu-columns">
                                    <div class="dropdown-menu-column">
                                        <a class="dropdown-item" href="./alerts.html"> Alerts </a>
                                        <div class="dropend">
                                            <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication"
                                                data-bs-toggle="dropdown" data-bs-auto-close="false" role="button"
                                                aria-haspopup="true" aria-expanded="false">
                                                Authentication
                                            </a>
                                            <div class="dropdown-menu">
                                                <a href="./sign-in.html" class="dropdown-item"> Sign in </a>
                                                <a href="./sign-in-link.html" class="dropdown-item"> Sign in link
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- END NAVBAR MENU -->
                </div>
            </div>
        </aside>
        <!--  END SIDEBAR  -->

        <!-- BEGIN NAVBAR  -->
        <header class="navbar navbar-expand-md d-none d-lg-flex d-print-none">
            <div class="container-xl">
                <!-- BEGIN NAVBAR TOGGLER -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false"
                    aria-label="Toggle primary navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- END NAVBAR TOGGLER -->
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 p-0 px-2" data-bs-toggle="dropdown"
                            aria-label="Open user menu">
                            <span class="avatar avatar-sm"
                                style="background-image: url(/avatar.jpeg)">
                            </span>
                            <div class="d-none d-xl-block ps-2">
                                <div>{{ Auth::user()->nama }}</div>
                            </div>
                        </a>

                        <!-- BEGIN USER MENU -->
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </div>
                        <!-- END USER MENU -->

                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <!-- BEGIN NAVBAR MENU -->
                    <nav aria-label="Primary">
                        <!-- BEGIN NAVBAR MENU -->
                        <ul class="navbar-nav">

                        </ul>
                        <!-- END NAVBAR MENU -->
                    </nav>
                    <!-- END NAVBAR MENU -->
                </div>
            </div>
        </header>
        <!-- END NAVBAR  -->

        <div class="page-wrapper">
            <!-- BEGIN PAGE BODY -->
            <main id="content" class="page-body">
                <div class="container-xl">
                    <div class="row row-deck row-cards">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- BEGIN PAGE LIBRARIES -->
    <script src="/tabler/dist/libs/apexcharts/dist/apexcharts.min.js?1760775604" defer></script>
    <script src="/tabler/dist/libs/jsvectormap/dist/jsvectormap.min.js?1760775604" defer></script>
    <script src="/tabler/dist/libs/jsvectormap/dist/maps/world.js?1760775604" defer></script>
    <script src="/tabler/dist/libs/jsvectormap/dist/maps/world-merc.js?1760775604" defer></script>
    <!-- END PAGE LIBRARIES -->
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="/tabler/dist/js/tabler.min.js?1760775604" defer></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!-- BEGIN DEMO SCRIPTS -->
    <script src="/tabler/preview/js/demo.min.js?1760775604" defer></script>
    <!-- END DEMO SCRIPTS -->

    @yield('script')
</body>

</html>
