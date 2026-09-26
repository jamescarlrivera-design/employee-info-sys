<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee Information System</title>

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
            /* HIDDEN BY DEFAULT */
            top: 0;

            width: 250px;
            height: 100vh;

            background: #1f2937;
            color: white;

            padding: 20px 15px;

            transition: left 0.3s ease;

            z-index: 1000;
        }

        /* SHOW SIDEBAR */

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
           CARDS
        ========================== */

        .cards {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 20px;

            margin-bottom: 30px;
        }


        .card {
            background: white;

            padding: 25px;

            border-radius: 10px;

            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }


        .card h3 {
            font-size: 14px;

            color: #6b7280;

            margin-bottom: 10px;
        }


        .card p {
            font-size: 28px;

            font-weight: bold;

            color: #1f2937;
        }


        /* =========================
           EMPLOYEE SECTION
        ========================== */

        .employee-section {
            background: white;

            padding: 25px;

            border-radius: 10px;

            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }


        .section-header {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 20px;
        }


        .section-header h2 {
            color: #1f2937;
        }


        .add-button {
            background: #2563eb;

            color: white;

            text-decoration: none;

            padding: 10px 15px;

            border-radius: 7px;
        }


        .add-button:hover {
            background: #1d4ed8;
        }


        /* =========================
           TABLE
        ========================== */

        table {
            width: 100%;

            border-collapse: collapse;
        }


        th {
            background: #f3f4f6;

            text-align: left;

            padding: 13px;

            color: #374151;
        }


        td {
            padding: 13px;

            border-bottom: 1px solid #e5e7eb;

            color: #4b5563;
        }


        tr:hover {
            background: #f9fafb;
        }


        /* =========================
           ACTION BUTTONS
        ========================== */

        .action-button {
            text-decoration: none;

            padding: 6px 10px;

            border-radius: 5px;

            font-size: 13px;
        }


        .view {
            background: #e0f2fe;

            color: #0369a1;
        }


        .edit {
            background: #fef3c7;

            color: #92400e;
        }


        /* =========================
           FORM
        ========================== */

        .form-group {
            margin-bottom: 20px;
        }


        .form-group label {
            display: block;

            margin-bottom: 7px;

            font-weight: bold;
        }


        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;

            padding: 12px;

            border: 1px solid #ccc;

            border-radius: 6px;

            font-size: 15px;
        }


        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;

            border-color: #2563eb;
        }


        /* =========================
           ERROR
        ========================== */

        .error {
            background: #fee2e2;

            color: #b91c1c;

            padding: 10px;

            border-radius: 6px;

            margin-bottom: 20px;
        }


        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 900px) {

            .cards {
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


            .cards {
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

        }

        .alert-success {
            display: flex;
            align-items: center;
            justify-content: space-between;

            background-color: #d1fae5;
            color: #065f46;

            border: 1px solid #10b981;
            padding: 12px 16px;
            border-radius: 8px;

            margin-bottom: 20px;
            font-weight: 500;
        }

        .alert-close {
            background: transparent;
            border: none;

            color: #065f46;
            font-size: 22px;
            font-weight: bold;

            cursor: pointer;
            padding: 0 4px;
            line-height: 1;
        }

        .alert-close:hover {
            color: #064e3b;
        }








        /* ==============================
   DASHBOARD
================================ */

.dashboard {
    padding: 30px;
    max-width: 1400px;
    margin: 0 auto;
}

.dashboard-header {
    margin-bottom: 30px;
}

.dashboard-header h1 {
    margin: 0;
    font-size: 28px;
    color: #111827;
}

.dashboard-header p {
    margin: 6px 0 0;
    color: #6b7280;
}


/* ==============================
   SUMMARY CARDS
================================ */

.cards {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-bottom: 25px;
}

.card {
    background: #ffffff;
    padding: 22px;
    border-radius: 12px;

    display: flex;
    align-items: center;
    gap: 18px;

    box-shadow: 0 3px 12px rgba(0, 0, 0, 0.07);
}

.card h3 {
    margin: 0 0 8px;
    font-size: 14px;
    color: #6b7280;
}

.card p {
    margin: 0;
    font-size: 30px;
    font-weight: bold;
    color: #111827;
}


/* ==============================
   CARD ICONS
================================ */

.card-icon {
    width: 52px;
    height: 52px;

    border-radius: 10px;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 22px;
    flex-shrink: 0;
}

.employees-icon {
    background: #dbeafe;
}

.department-icon {
    background: #ede9fe;
}

.position-icon {
    background: #fef3c7;
}

.active-icon {
    background: #d1fae5;
    color: #059669;
}


/* ==============================
   TWO COLUMN SECTION
================================ */

.dashboard-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 25px;
    margin-bottom: 25px;
}


/* ==============================
   DASHBOARD CARD
================================ */

.dashboard-card {
    background: #ffffff;
    padding: 25px;

    border-radius: 12px;

    box-shadow: 0 3px 12px rgba(0, 0, 0, 0.07);

    margin-bottom: 25px;
}

.dashboard-card h2 {
    margin: 0;
    font-size: 19px;
    color: #111827;
}


/* ==============================
   CARD HEADER
================================ */

.card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;

    margin-bottom: 25px;
}

.view-all {
    color: #2563eb;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
}

.view-all:hover {
    text-decoration: underline;
}


/* ==============================
   DEPARTMENT / STATUS BARS
================================ */

.stat-row {
    display: grid;
    grid-template-columns: 130px 1fr 40px;

    align-items: center;

    gap: 12px;

    margin-bottom: 20px;
}

.stat-name {
    font-size: 14px;
    color: #374151;

    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.stat-number {
    text-align: right;

    font-weight: bold;
    color: #374151;
}

.progress-container {
    width: 100%;
    height: 10px;

    background: #e5e7eb;

    border-radius: 10px;

    overflow: hidden;
}

.progress-bar {
    height: 100%;
    border-radius: 10px;

    transition: width 0.4s ease;
}

.department-bar {
    background: #2563eb;
}

.status-bar {
    background: #10b981;
}


/* ==============================
   TABLE
================================ */

.table-container {
    width: 100%;
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table th {
    padding: 14px;

    text-align: left;

    background: #f9fafb;

    color: #6b7280;

    font-size: 13px;
    font-weight: 600;
}

table td {
    padding: 15px 14px;

    border-bottom: 1px solid #e5e7eb;

    color: #374151;

    font-size: 14px;
}

table tbody tr:hover {
    background: #f9fafb;
}


/* ==============================
   QUICK ACTIONS
================================ */

.quick-actions h2 {
    margin-bottom: 20px;
}

.action-grid {
    display: flex;
    gap: 15px;
}

.quick-action {
    display: flex;
    align-items: center;
    gap: 10px;

    padding: 13px 20px;

    border-radius: 8px;

    text-decoration: none;

    font-weight: 500;

    transition: 0.2s;
}

.quick-action.add {
    background: #2563eb;
    color: white;
}

.quick-action.add:hover {
    background: #1d4ed8;
}

.quick-action.view {
    background: #f3f4f6;
    color: #374151;
}

.quick-action.view:hover {
    background: #e5e7eb;
}

.action-icon {
    font-size: 20px;
}


/* ==============================
   MONTHLY INFO
================================ */

.monthly-info {
    background: #eff6ff;

    border: 1px solid #bfdbfe;

    padding: 16px 20px;

    border-radius: 10px;

    display: flex;
    justify-content: space-between;
    align-items: center;

    color: #1e40af;

    margin-bottom: 30px;
}

.monthly-info strong {
    font-size: 20px;
}


/* ==============================
   NO DATA
================================ */

.no-data {
    color: #9ca3af;
    text-align: center;
    padding: 20px;
}


/* ==============================
   RESPONSIVE
================================ */

@media (max-width: 1000px) {

    .cards {
        grid-template-columns: repeat(2, 1fr);
    }

    .dashboard-grid {
        grid-template-columns: 1fr;
    }

}

@media (max-width: 600px) {

    .dashboard {
        padding: 15px;
    }

    .cards {
        grid-template-columns: 1fr;
    }

    .action-grid {
        flex-direction: column;
    }

    .stat-row {
        grid-template-columns: 90px 1fr 30px;
    }

}


/* =====================================
   CUSTOM PAGINATION
===================================== */

.custom-pagination {
    display: flex;
    justify-content: center;
    align-items: center;

    gap: 6px;

    margin-top: 25px;
    margin-bottom: 30px;
}


/* Page buttons */

.page-button {
    display: flex;

    align-items: center;
    justify-content: center;

    min-width: 38px;
    height: 38px;

    padding: 0 12px;

    border: 1px solid #d1d5db;

    border-radius: 7px;

    background: white;

    color: #374151;

    text-decoration: none;

    font-size: 14px;

    font-weight: 500;

    transition: all 0.2s ease;
}


/* Hover */

.page-button:hover {
    background: #2563eb;

    border-color: #2563eb;

    color: white;
}


/* Current page */

.page-button.active {
    background: #2563eb;

    border-color: #2563eb;

    color: white;

    font-weight: 700;
}


/* Disabled */

.page-button.disabled {
    background: #f3f4f6;

    color: #9ca3af;

    border-color: #e5e7eb;

    cursor: not-allowed;
}


/* Previous / Next */

.page-button:first-child,
.page-button:last-child {
    font-size: 20px;
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
         NAVIGATION DRAWER
    ========================== -->

    <aside class="sidebar" id="sidebar">

        <!-- CLOSE BUTTON -->

        <button type="button" class="close-nav" onclick="toggleNav()">

            ×

        </button>


        <div class="logo">
            Employee System
        </div>


        <div class="menu-title">
            Main Menu
        </div>


        <a href="{{ route('employee.home') }}" class="nav-link active">

            🏠 Dashboard

        </a>


        <a href="{{ route('employee.index') }}" class="nav-link">

            👥 Employees

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
                    Employee Management
                </h1>

            </div>


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
            const sidebar = document.getElementById('sidebar');

            const overlay = document.getElementById('overlay');


            sidebar.classList.toggle('open');

            overlay.classList.toggle('show');
        }

    </script>


</body>

</html>