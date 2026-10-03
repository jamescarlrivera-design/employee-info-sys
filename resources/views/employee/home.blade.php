
<x-employees-layout>

    <div class="employee-dashboard">

        <div class="dashboard-header">
            <h1>Employee Dashboard</h1>

            <p>
                Welcome,
                {{ $employee->first_name }}
                {{ $employee->last_name }}!
            </p>
        </div>


        <div class="employee-cards">

            <div class="info-card">
                <h3>Employee Number</h3>
                <p>{{ $employee->employee_number }}</p>
            </div>

            <div class="info-card">
                <h3>Department</h3>
                <p>
                    {{ $employee->department?->department_name ?? 'N/A' }}
                </p>
            </div>

            <div class="info-card">
                <h3>Position</h3>
                <p>
                    {{ $employee->position?->position_name ?? 'N/A' }}
                </p>
            </div>

            <div class="info-card">
                <h3>Employment Status</h3>
                <p>
                    {{ $employee->employmentStatus?->employment_status ?? 'N/A' }}
                </p>
            </div>

        </div>


        

</x-employee-layout>

