<x-employees-layout>

    <div class="employee-section">

        <!-- =====================================
             SUCCESS NOTIFICATION
        ====================================== -->

        @if(session('success'))

            <div class="alert alert-success" id="success-alert">

                <span>
                    ✓ {{ session('success') }}
                </span>

                <button type="button" class="alert-close" onclick="document.getElementById('success-alert').remove()">

                    &times;

                </button>

            </div>

        @endif

        




        <!-- =====================================
             HEADER
        ====================================== -->

        <div class="section-header">

            <div>
                <h2>Employees</h2>

                <p class="employee-count">
                    Showing
                    {{ $employees->firstItem() ?? 0 }}
                    -
                    {{ $employees->lastItem() ?? 0 }}
                    of
                    {{ $employees->total() }}
                    employees
                </p>
            </div>


        </div>
         

        <!-- =====================================
             EMPLOYEE TABLE
        ====================================== -->

        <div class="table-container">

            <table>

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Employee Number</th>

                        <th>Name</th>

                        <th>Department</th>

                        <th>Position</th>

                        <th>Action</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($employees as $employee)

                                        <tr>

                                            <!-- ID -->

                                            <td>
                                                {{ $employee->id }}
                                            </td>


                                            <!-- EMPLOYEE NUMBER -->

                                            <td>
                                                {{ $employee->employee_number }}
                                            </td>


                                            <!-- NAME -->

                                            <td>

                                                <strong>

                                                    {{ $employee->first_name }}

                                                    @if($employee->middle_name)
                                                        {{ $employee->middle_name }}
                                                    @endif

                                                    {{ $employee->last_name }}

                                                </strong>

                                            </td>


                                            <!-- DEPARTMENT -->

                                            <td>

                                                {{ $employee->department->department_name ?? 'N/A' }}

                                            </td>


                                            <!-- POSITION -->

                                            <td>

                                                {{ $employee->position->position_name ?? 'N/A' }}

                                            </td>


                                            <!-- ACTIONS -->

                                            <td>

                                                <div class="action-buttons">


                                                    <!-- VIEW -->

                                                    <button type="button" class="action-button view" onclick="openEmployeeModal(this)"
                                                        data-employee-number="{{ $employee->employee_number }}" data-name="{{ trim(
                            $employee->first_name . ' ' . ($employee->middle_name ?? '') . ' ' . $employee->last_name
                        )}}" data-department="{{ $employee->department->department_name ?? 'N/A' }}"
                                                        data-position="{{ $employee->position->position_name ?? 'N/A' }}"
                                                        data-email="{{ $employee->user->email ?? 'N/A' }}"
                                                        data-date-hired="{{ $employee->date_hired ?? 'N/A' }}">
                                                        View
                                                    </button>


                                                    </form>


                                                </div>

                                            </td>

                                        </tr>


                    @empty

                        <tr>

                            <td colspan="6" class="no-data">

                                No employees found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        <!-- =====================================
             PAGINATION
        ====================================== -->

        @if ($employees->hasPages())

            <div class="custom-pagination">

                {{-- Previous Page --}}

                @if ($employees->onFirstPage())

                    <span class="page-button disabled">
                        ‹
                    </span>

                @else

                    <a href="{{ $employees->previousPageUrl() }}" class="page-button">

                        ‹

                    </a>

                @endif


                {{-- Page Numbers --}}

                @foreach ($employees->getUrlRange(1, $employees->lastPage()) as $page => $url)

                    @if ($page == $employees->currentPage())

                        <span class="page-button active">
                            {{ $page }}
                        </span>

                    @else

                        <a href="{{ $url }}" class="page-button">

                            {{ $page }}

                        </a>

                    @endif

                @endforeach


                {{-- Next Page --}}

                @if ($employees->hasMorePages())

                    <a href="{{ $employees->nextPageUrl() }}" class="page-button">

                        ›

                    </a>

                @else

                    <span class="page-button disabled">
                        ›
                    </span>

                @endif

            </div>

        @endif

    </div>







    <!-- =====================================
         EMPLOYEE VIEW MODAL
    ====================================== -->

    <div id="employeeModal" class="employee-modal">


        <div class="employee-modal-box">


            <!-- CLOSE BUTTON -->

            <button type="button" class="close-modal" onclick="closeEmployeeModal()">

                &times;

            </button>


            <!-- TITLE -->

            <h2>
                Employee Information
            </h2>


            <!-- DETAILS -->

            <div class="employee-details">


                <!-- Employee Number -->

                <div class="detail-row">

                    <strong>
                        Employee Number:
                    </strong>

                    <span id="modalEmployeeNumber">
                        N/A
                    </span>

                </div>


                <!-- Name -->

                <div class="detail-row">

                    <strong>
                        Name:
                    </strong>

                    <span id="modalEmployeeName">
                        N/A
                    </span>

                </div>


                <div class="detail-row">
                    <strong>Email:</strong>
                    <span id="modalEmail"></span>
                </div>


                <!-- Department -->

                <div class="detail-row">

                    <strong>Department</strong>
                    <span id="modalDepartment">
                        N/A
                    </span>

                </div>



                <!-- Position -->

                <div class="detail-row">

                    <strong>
                        Position:
                    </strong>

                    <span id="modalPosition">
                        N/A
                    </span>

                </div>



                <!-- Date Hired -->

                <div class="detail-row">

                    <strong>
                        Date Hired:
                    </strong>

                    <span id="modalDateHired">
                        N/A
                    </span>

                </div>


            </div>

        </div>

    </div>



    <!-- =====================================
         CSS
    ====================================== -->

    <style>
        /* =====================================
           EMPLOYEE SECTION
        ====================================== */

        .employee-section {

            width: 100%;

            padding: 30px;

            background: #f5f7fb;

            min-height: 100vh;

        }


        /* =====================================
           SUCCESS ALERT
        ====================================== */

        .alert-success {

            display: flex;

            align-items: center;

            justify-content: space-between;

            background: #dcfce7;

            color: #166534;

            border: 1px solid #86efac;

            padding: 14px 18px;

            border-radius: 8px;

            margin-bottom: 20px;

            font-weight: 500;

        }


        .alert-close {

            border: none;

            background: transparent;

            color: #166534;

            font-size: 24px;

            cursor: pointer;

            line-height: 1;

        }


        .alert-close:hover {

            color: #991b1b;

        }


        /* =====================================
           HEADER
        ====================================== */

        .section-header {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 20px;

        }


        .section-header h2 {

            margin: 0;

            color: #111827;

            font-size: 26px;

        }


        .employee-count {

            margin: 5px 0 0;

            color: #6b7280;

            font-size: 14px;

        }


        /* =====================================
           ADD BUTTON
        ====================================== */

        .add-button {

            background: #2563eb;

            color: white;

            text-decoration: none;

            padding: 11px 18px;

            border-radius: 7px;

            font-size: 14px;

            font-weight: 600;

            transition: 0.2s;

        }


        .add-button:hover {

            background: #1d4ed8;

        }


        /* =====================================
           TABLE CONTAINER
        ====================================== */

        .table-container {

            background: white;

            border-radius: 10px;

            overflow-x: auto;

            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.07);

        }


        /* =====================================
           TABLE
        ====================================== */

        table {

            width: 100%;

            border-collapse: collapse;

        }


        table thead {

            background: #f9fafb;

        }


        table th {

            padding: 15px;

            text-align: left;

            color: #4b5563;

            font-size: 13px;

            font-weight: 700;

            border-bottom: 1px solid #e5e7eb;

            white-space: nowrap;

        }


        table td {

            padding: 15px;

            color: #374151;

            font-size: 14px;

            border-bottom: 1px solid #e5e7eb;

            white-space: nowrap;

        }


        table tbody tr:hover {

            background: #f9fafb;

        }


        table tbody tr:last-child td {

            border-bottom: none;

        }


        /* =====================================
           ACTION BUTTONS
        ====================================== */

        .action-buttons {

            display: flex;

            align-items: center;

            gap: 8px;

        }


        .action-button {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding: 7px 12px;

            border-radius: 6px;

            border: none;

            font-size: 13px;

            font-weight: 600;

            text-decoration: none;

            cursor: pointer;

            transition: 0.2s;

        }


        /* VIEW */

        .action-button.view {

            background: #3498db;

            color: white;

        }


        .action-button.view:hover {

            background: #2980b9;

        }


        /* EDIT */

        .action-button.edit {

            background: #f59e0b;

            color: white;

        }


        .action-button.edit:hover {

            background: #d97706;

        }


        /* DELETE */

        .action-button.delete {

            background: #dc2626;

            color: white;

        }


        .action-button.delete:hover {

            background: #b91c1c;

        }


        .delete-form {

            display: inline;

            margin: 0;

        }


        /* =====================================
           NO DATA
        ====================================== */

        .no-data {

            text-align: center;

            padding: 40px !important;

            color: #9ca3af;

        }


        /* =====================================
           PAGINATION
        ====================================== */

        .pagination-container {

            display: flex;

            justify-content: center;

            margin-top: 25px;

            margin-bottom: 30px;

        }


        /*
         * Laravel's default pagination may use
         * Tailwind classes depending on your setup.
         */

        .pagination-container nav {

            display: flex;

            justify-content: center;

        }


        .pagination-container svg {

            width: 18px;

            height: 18px;

        }


        /* =====================================
           MODAL
        ====================================== */

        .employee-modal {

            display: none;

            position: fixed;

            inset: 0;

            width: 100%;

            height: 100%;

            background: rgba(0, 0, 0, 0.55);

            z-index: 9999;

            align-items: center;

            justify-content: center;

            padding: 20px;

        }


        .employee-modal-box {

            position: relative;

            width: 550px;

            max-width: 100%;

            max-height: 85vh;

            overflow-y: auto;

            background: white;

            border-radius: 12px;

            padding: 30px;

            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);

        }


        .employee-modal-box h2 {

            margin-top: 0;

            margin-bottom: 25px;

            text-align: center;

            color: #111827;

        }


        /* =====================================
           CLOSE MODAL
        ====================================== */

        .close-modal {

            position: absolute;

            top: 10px;

            right: 15px;

            border: none;

            background: none;

            font-size: 30px;

            cursor: pointer;

            color: #555;

        }


        .close-modal:hover {

            color: red;

        }


        /* =====================================
           EMPLOYEE DETAILS
        ====================================== */

        .employee-details {

            display: flex;

            flex-direction: column;

        }


        .detail-row {

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 20px;

            padding: 13px 0;

            border-bottom: 1px solid #eee;

        }


        .detail-row:last-child {

            border-bottom: none;

        }


        .detail-row strong {

            color: #555;

        }


        .detail-row span {

            text-align: right;

            color: #222;

        }


        /* =====================================
           MOBILE
        ====================================== */

        @media (max-width: 768px) {

            .employee-section {

                padding: 15px;

            }


            .section-header {

                flex-direction: column;

                align-items: flex-start;

                gap: 15px;

            }


            .add-button {

                width: 100%;

                text-align: center;

            }


            .action-buttons {

                flex-wrap: wrap;

            }


            .detail-row {

                flex-direction: column;

                align-items: flex-start;

                gap: 5px;

            }


            .detail-row span {

                text-align: left;

            }

        }
    </style>



    <!-- =====================================
         JAVASCRIPT
    ====================================== -->

    <script>

        /*
        |--------------------------------------------------------------------------
        | OPEN EMPLOYEE MODAL
        |--------------------------------------------------------------------------
        */

        function openEmployeeModal(button) {

            // Get employee information from data attributes

            const employeeNumber =
                button.dataset.employeeNumber || 'N/A';

            const name =
                button.dataset.name || 'N/A';

            const department =
                button.dataset.department || 'N/A';

            const email =
                button.dataset.email || 'N/A';

            const position =
                button.dataset.position || 'N/A';


            const dateHired =
                button.dataset.dateHired || 'N/A';


            // Put information into modal

            document.getElementById(
                'modalEmployeeNumber'
            ).textContent = employeeNumber;


            document.getElementById(
                'modalEmployeeName'
            ).textContent = name;


            document.getElementById(
                'modalDepartment'
            ).textContent = department;

            document.getElementById(
                'modalEmail'
            ).textContent = email;


            document.getElementById(
                'modalPosition'
            ).textContent = position;


         

            document.getElementById(
                'modalDateHired'
            ).textContent = dateHired;


            // Show modal

            document.getElementById(
                'employeeModal'
            ).style.display = 'flex';

        }



        /*
        |--------------------------------------------------------------------------
        | CLOSE EMPLOYEE MODAL
        |--------------------------------------------------------------------------
        */

        function closeEmployeeModal() {

            document.getElementById(
                'employeeModal'
            ).style.display = 'none';

        }



        /*
        |--------------------------------------------------------------------------
        | CLOSE MODAL WHEN CLICKING OUTSIDE
        |--------------------------------------------------------------------------
        */

        window.addEventListener('click', function (event) {

            const modal =
                document.getElementById('employeeModal');


            if (event.target === modal) {

                closeEmployeeModal();

            }

        });



        /*
        |--------------------------------------------------------------------------
        | CLOSE MODAL WITH ESC KEY
        |--------------------------------------------------------------------------
        */

        document.addEventListener('keydown', function (event) {

            if (event.key === 'Escape') {

                closeEmployeeModal();

            }

        });

    </script>

</x-employees-layout>