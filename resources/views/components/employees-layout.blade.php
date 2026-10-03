<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Employee Information System' }}</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f6fa;
        }


        /* =========================
           NAVIGATION DRAWER
        ========================== */

        .sidebar {
            position: fixed;
            left: -250px;
            top: 0;

            width: 250px;
            height: 100vh;

            background: #1f2937;
            color: white;

            padding: 20px 15px;

            transition: left 0.3s ease;

            z-index: 1000;
        }

        .sidebar.open {
            left: 0;
        }


        .logo {
            font-size: 21px;
            font-weight: bold;
            text-align: center;
            padding: 15px 0 30px;
        }


        .menu-title {
            font-size: 12px;
            color: #9ca3af;

            margin: 10px 10px;

            text-transform: uppercase;
        }


        .nav-link {
            display: block;

            color: #d1d5db;
            text-decoration: none;

            padding: 12px 15px;

            margin-bottom: 5px;

            border-radius: 8px;
        }


        .nav-link:hover {
            background: #374151;
            color: white;
        }


        .nav-link.active {
            background: #2563eb;
            color: white;
        }


        /* =========================
           CLOSE BUTTON
        ========================== */

        .close-nav {
            position: absolute;

            top: 15px;
            right: 15px;

            background: transparent;

            border: none;

            color: white;

            font-size: 22px;

            cursor: pointer;
        }


        /* =========================
           LOGOUT
        ========================== */

        .logout {
            position: absolute;

            bottom: 20px;

            left: 15px;
            right: 15px;
        }


        .logout button {
            width: 100%;

            padding: 12px;

            border: none;

            border-radius: 8px;

            background: #dc2626;

            color: white;

            cursor: pointer;

            font-size: 15px;
        }


        .logout button:hover {
            background: #b91c1c;
        }


        /* =========================
           MAIN CONTENT
        ========================== */

        .main {
            margin-left: 0;

            min-height: 100vh;

            transition: margin-left 0.3s ease;
        }


        /* =========================
           TOP BAR
        ========================== */

        .topbar {
            height: 70px;

            background: white;

            border-bottom: 1px solid #e5e7eb;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 30px;
        }


        .topbar-left {
            display: flex;

            align-items: center;

            gap: 15px;
        }


        /* =========================
           NAVIGATION BUTTON
        ========================== */

        .nav-button {
            background: #1f2937;

            color: white;

            border: none;

            width: 42px;
            height: 42px;

            border-radius: 7px;

            font-size: 22px;

            cursor: pointer;

            display: flex;

            align-items: center;

            justify-content: center;
        }


        .nav-button:hover {
            background: #374151;
        }


        .topbar h1 {
            font-size: 22px;

            color: #1f2937;
        }


        .user-info {
            color: #555;
        }


        /* =========================
           OVERLAY
        ========================== */

        .overlay {
            position: fixed;

            top: 0;
            left: 0;

            width: 100%;
            height: 100vh;

            background: rgba(0, 0, 0, 0.35);

            display: none;

            z-index: 999;
        }


        .overlay.show {
            display: block;
        }


        /* =========================
           PAGE CONTENT
        ========================== */

        .content {
            padding: 30px;
        }


        /* =========================
           EMPLOYEE DASHBOARD
        ========================== */

        .dashboard {
            max-width: 1400px;
            margin: 0 auto;
        }


        .dashboard-header {
            margin-bottom: 30px;
        }


        .dashboard-header h2 {
            font-size: 28px;
            color: #111827;
        }


        .dashboard-header p {
            margin-top: 6px;
            color: #6b7280;
        }


        /* =========================
           INFORMATION CARDS
        ========================== */

        .employee-cards {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 20px;

            margin-bottom: 25px;
        }


        .info-card {
            background: white;

            padding: 22px;

            border-radius: 10px;

            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.07);
        }


        .info-card h3 {
            font-size: 14px;

            color: #6b7280;

            margin-bottom: 10px;
        }


        .info-card p {
            font-size: 18px;

            font-weight: bold;

            color: #111827;
        }


        /* =========================
           PROFILE CARD
        ========================== */

        .profile-card {
            background: white;

            padding: 25px;

            border-radius: 10px;

            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.07);
        }


        .profile-card h2 {
            margin-bottom: 25px;

            color: #111827;
        }


        .profile-row {
            display: flex;

            justify-content: space-between;

            padding: 15px 0;

            border-bottom: 1px solid #e5e7eb;
        }


        .profile-row:last-child {
            border-bottom: none;
        }


        .profile-row strong {
            color: #374151;
        }


        .profile-row span {
            color: #6b7280;

            text-align: right;
        }


        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 900px) {

            .employee-cards {
                grid-template-columns: repeat(2, 1fr);
            }

        }


        @media (max-width: 700px) {

            .sidebar {
                width: 220px;

                left: -220px;
            }


            .sidebar.open {
                left: 0;
            }


            .employee-cards {
                grid-template-columns: 1fr;
            }


            .content {
                padding: 15px;
            }


            .topbar {
                padding: 0 15px;
            }


            .topbar h1 {
                font-size: 18px;
            }


            .user-info {
                display: none;
            }


            .profile-row {
                flex-direction: column;

                gap: 5px;
            }


            .profile-row span {
                text-align: left;
            }

        }


        .password-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            width: 100%;
            padding: 30px 20px;
        }

        .password-card {
            width: 100%;
            max-width: 550px;
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .password-header {
            margin-bottom: 25px;
        }

        .password-header h2 {
            margin: 0 0 8px;
            font-size: 24px;
        }

        .password-header p {
            margin: 0;
            color: #777;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d5d5d5;
            border-radius: 7px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .form-group input:focus {
            outline: none;
            border-color: #555;
        }

        .success-message {
            padding: 12px 16px;
            margin-bottom: 20px;
            background: #e8f5e9;
            color: #2e7d32;
            border: 1px solid #a5d6a7;
            border-radius: 7px;
        }

        .error-message {
            padding: 12px 16px;
            margin-bottom: 20px;
            background: #ffebee;
            color: #c62828;
            border: 1px solid #ef9a9a;
            border-radius: 7px;
        }

        .error-message ul {
            margin: 8px 0 0 20px;
            padding: 0;
        }

        .error-message li {
            margin-bottom: 4px;
        }

        .success-message {
            padding: 12px 16px;
            margin-bottom: 20px;
            background: #e8f5e9;
            color: #2e7d32;
            border: 1px solid #a5d6a7;
            border-radius: 7px;
        }

        .password-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
            margin-top: 25px;
        }

        .cancel-button {
            padding: 11px 18px;
            border-radius: 7px;
            text-decoration: none;
            color: #555;
            background: #eeeeee;
            font-size: 14px;
        }

        .change-password-button {
            display: inline-block;
            padding: 12px 20px;
            background: #222;
            color: white;
            text-decoration: none;
            border-radius: 7px;
            font-size: 14px;
        }

        .change-password-button:hover {
            opacity: 0.9;
        }
    </style>

</head>


<body>


    <!-- =========================
         OVERLAY
    ========================== -->

    <div class="overlay" id="overlay" onclick="toggleNav()">
    </div>


    <!-- =========================
         EMPLOYEE NAVIGATION
    ========================== -->

    <aside class="sidebar" id="sidebar">

        <!-- CLOSE BUTTON -->

        <button type="button" class="close-nav" onclick="toggleNav()">

            ×

        </button>


        <div class="logo">
            Employee Portal
        </div>


        <div class="menu-title">
            Main Menu
        </div>


        <!-- DASHBOARD -->

        <a href="{{ route('employee.index') }}" class="nav-link">

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ff4242" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-layout-dashboard"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M5 4h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" /><path d="M5 16h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" /><path d="M15 12h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" /><path d="M15 4h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" /></svg> Dashboard


        </a>


        <!-- MY INFORMATION -->

        <a href="{{ route('employee.view') }}" class="nav-link">

             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ff4242" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-users"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M5 7a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg> My Profile


        </a>


        <!-- CHANGE PASSWORD -->

        <a href="{{ route('employee.change-password') }}" class="nav-link">

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ff4242" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-key-round preview-icon"><path d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z"/><circle cx="16.5" cy="7.5" r=".5" fill="currentColor"/></svg> Change Password

        </a>


        <!-- LOGOUT -->

        <div class="logout">

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button type="submit">

                    🚪 Logout

                </button>

            </form>

        </div>

    </aside>


    <!-- =========================
         MAIN CONTENT
    ========================== -->

    <main class="main">


        <!-- TOP BAR -->

        <header class="topbar">

            <div class="topbar-left">


                <!-- NAV BUTTON -->

                <button type="button" class="nav-button" onclick="toggleNav()">

                    ☰

                </button>


                <h1>
                    Employee Portal
                </h1>

            </div>


            <!-- LOGGED-IN USER -->

            <div class="user-info">

                @auth

                    {{ Auth::user()->email }}

                @endauth

            </div>

        </header>


        <!-- PAGE CONTENT -->

        <section class="content">

            {{ $slot }}

        </section>


    </main>


    <!-- =========================
         JAVASCRIPT
    ========================== -->

    <script>

        function toggleNav() {

            const sidebar =
                document.getElementById('sidebar');

            const overlay =
                document.getElementById('overlay');


            sidebar.classList.toggle('open');

            overlay.classList.toggle('show');

        }

    </script>


</body>

</html>