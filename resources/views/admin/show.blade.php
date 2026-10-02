<x-layout>

    <div class="employee-details-container">

        <!-- HEADER -->
        <div class="page-header">
            <div>
                <h1>Employee Details</h1>
                <p>View employee information</p>
            </div>

            <div>
                <a href="{{ route('admin.index') }}" class="back-button">
                    ← Back to Employees
                </a>

                <a href="{{ route('admin.edit', $employee->id) }}" class="edit-button">
                    Edit Employee
                </a>
            </div>
        </div>


        <!-- EMPLOYEE PROFILE -->
        <div class="profile-card">

            <div class="profile-icon">
                {{ strtoupper(substr($employee->first_name, 0, 1)) }}
            </div>

            <div>
                <h2>
                    {{ $employee->first_name }}
                    {{ $employee->middle_name }}
                    {{ $employee->last_name }}
                </h2>

                <p>
                    Employee No:
                    <strong>{{ $employee->employee_number }}</strong>
                </p>
            </div>

        </div>


        <!-- PERSONAL INFORMATION -->
        <div class="details-card">

            <h3>Personal Information</h3>

            <div class="details-grid">

                <div class="detail">
                    <span class="label">First Name:</span>
                    <span>{{ $employee->first_name }}</span>
                </div>

                <div class="detail">
                    <span class="label">Middle Name:</span>
                    <span>{{ $employee->middle_name ?? 'N/A' }}</span>
                </div>

                <div class="detail">
                    <span class="label">Last Name:</span>
                    <span>{{ $employee->last_name }}</span>
                </div>

                <div class="detail">
                    <span class="label">Email:</span>
                    <span>{{ $employee->email ?? 'N/A' }}</span>
                </div>

                <div class="detail">
                    <span class="label">Phone:</span>
                    <span>{{ $employee->phone ?? 'N/A' }}</span>
                </div>

                <div class="detail">
                    <span class="label">Address:</span>
                    <span>{{ $employee->address ?? 'N/A' }}</span>
                </div>

            </div>

        </div>


        <!-- EMPLOYMENT INFORMATION -->
        <div class="details-card">

            <h3>Employment Information</h3>

            <div class="details-grid">

                <div class="detail">
                    <span class="label">Employee Number:</span>
                    <span>{{ $employee->employee_number }}</span>
                </div>

                <div class="detail">
                    <span class="label">Department:</span>
                    <span>
                        {{ $employee->department?->department_name ?? 'N/A' }}
                    </span>
                </div>

                <div class="detail">
                    <span class="label">Position:</span>
                    <span>
                        {{ $employee->position?->position_name ?? 'N/A' }}
                    </span>
                </div>

                <div class="detail">
                    <span class="label">Employment Status:</span>
                    <span>
                        {{ $employee->employmentStatus?->employment_status ?? 'N/A' }}
                    </span>
                </div>

                <div class="detail">
                    <span class="label">Salary:</span>
                    <span>
                        {{ $employee->salaryrates->rate_name ?? 'N/A' }}
                    </span>
                </div>

                <div class="detail">
                    <span class="label">Date Hired:</span>
                    <span>
                        {{ $employee->date_hired ?? 'N/A' }}
                    </span>
                </div>

            </div>

        </div>


        <!-- ACTIONS -->
        <div class="action-buttons">

            <a href="{{ route('admin.index') }}" class="back-button">
                Back
            </a>

            <a href="{{ route('admin.edit', $employee->id) }}" class="edit-button">
                Edit Employee
            </a>

        </div>

    </div>


    <style>

        .employee-details-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 30px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-header h1 {
            margin: 0;
            font-size: 28px;
        }

        .page-header p {
            margin-top: 5px;
            color: #777;
        }

        .profile-card {
            display: flex;
            align-items: center;
            gap: 20px;
            background: white;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .profile-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eeeeee;
            font-size: 28px;
            font-weight: bold;
        }

        .profile-card h2 {
            margin: 0 0 8px;
        }

        .profile-card p {
            margin: 0;
            color: #666;
        }

        .details-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .details-card h3 {
            margin-top: 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #eee;
            padding-bottom: 12px;
        }

        .details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .detail {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .label {
            font-size: 13px;
            color: #777;
            font-weight: 600;
        }

        .detail span:last-child {
            font-size: 16px;
        }

        .back-button,
        .edit-button {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            margin-left: 5px;
        }

        .back-button {
            background: #eeeeee;
            color: #333;
        }

        .edit-button {
            background: #333;
            color: white;
        }

        .action-buttons {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        @media (max-width: 700px) {

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .details-grid {
                grid-template-columns: 1fr;
            }

        }

    </style>

</x-layout>