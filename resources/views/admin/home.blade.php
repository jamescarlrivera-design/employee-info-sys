<x-layout>

    <div class="dashboard">

        <!-- ==============================
             HEADER
        =============================== -->

        <div class="dashboard-header">

            <div>
                <h1>Employee Information System</h1>
                <p>Welcome back, Admin</p>
            </div>

        </div>


          <!-- ==============================
             QUICK ACTIONS
        =============================== -->

        <div class="dashboard-card quick-actions">

            <h2>Quick Actions</h2>

            <div class="action-grid">

                <a
                    href="{{ route('admin.create') }}"
                    class="quick-action add">

                    <span class="action-icon">
                        +
                    </span>

                    <span>
                        Add Employee
                    </span>

                </a>


                <a
                    href="{{ route('admin.index') }}"
                    class="quick-action view">

                    <span class="action-icon">
                        👥
                    </span>

                    <span>
                        View Employees
                    </span>

                </a>

            </div>

        </div>



        <!-- ==============================
             SUMMARY CARDS
        =============================== -->

        <div class="cards">

            <!-- Total Employees -->
            <div class="card">

                <div class="card-icon employees-icon">
                    👥
                </div>

                <div>
                    <h3>Total Employees</h3>
                    <p>{{ $totalEmployees }}</p>
                </div>

            </div>


            <!-- Departments -->
            <div class="card">

                <div class="card-icon department-icon">
                    🏢
                </div>

                <div>
                    <h3>Departments</h3>
                    <p>{{ $totalDepartments }}</p>
                </div>

            </div>


            <!-- Positions -->
            <div class="card">

                <div class="card-icon position-icon">
                    💼
                </div>

                <div>
                    <h3>Positions</h3>
                    <p>{{ $totalPositions }}</p>
                </div>

            </div>


            <!-- Employment Statuses -->
            <div class="card">

                <div class="card-icon active-icon">
                    ✓
                </div>

                <div>
                    <h3>Employment Statuses</h3>
                    <p>{{ $totalStatuses }}</p>
                </div>

            </div>

        </div>


        <!-- ==============================
             DEPARTMENT + STATUS
        =============================== -->

        <div class="dashboard-grid">


            <!-- EMPLOYEES BY DEPARTMENT -->

            <div class="dashboard-card">

                <div class="card-header">
                    <h2>Employees by Department</h2>
                </div>

                @forelse($departmentEmployees as $department)

                    @php
                        $percentage = $totalEmployees > 0
                            ? ($department->total / $totalEmployees) * 100
                            : 0;
                    @endphp

                    <div class="stat-row">

                        <div class="stat-name">
                            {{ $department->department->department_name ?? 'Unknown' }}
                        </div>

                        <div class="progress-container">

                            <div
                                class="progress-bar department-bar"
                                style="width: {{ $percentage }}%">
                            </div>

                        </div>

                        <div class="stat-number">
                            {{ $department->total }}
                        </div>

                    </div>

                @empty

                    <p class="no-data">
                        No department data available.
                    </p>

                @endforelse

            </div>


            <!-- EMPLOYMENT STATUS -->

            <div class="dashboard-card">

                <div class="card-header">
                    <h2>Employment Status</h2>
                </div>

                @forelse($statusEmployees as $status)

                    @php
                        $percentage = $totalEmployees > 0
                            ? ($status->total / $totalEmployees) * 100
                            : 0;
                    @endphp

                    <div class="stat-row">

                        <div class="stat-name">
                            {{ $status->employmentStatus->employment_status ?? 'Unknown' }}
                        </div>

                        <div class="progress-container">

                            <div
                                class="progress-bar status-bar"
                                style="width: {{ $percentage }}%">
                            </div>

                        </div>

                        <div class="stat-number">
                            {{ $status->total }}
                        </div>

                    </div>

                @empty

                    <p class="no-data">
                        No employment status data available.
                    </p>

                @endforelse

            </div>

        </div>


        <!-- ==============================
             RECENT EMPLOYEES
        =============================== -->

        <div class="dashboard-card recent-employees">

            <div class="card-header">

                <h2>Recent Employees</h2>

                <a
                    href="{{ route('admin.index') }}"
                    class="view-all">
                    View All
                </a>

            </div>


            <div class="table-container">

                <table>

                    <thead>

                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Date Added</th>
                        </tr>

                    </thead>


                    <tbody>

                        @forelse($recentEmployees as $employee)

                            <tr>

                                <td>
                                    <strong>
                                        {{ $employee->first_name }} {{ $employee->middle_name }}
                                        {{ $employee->last_name }}
                                    </strong>
                                </td>

                                <td>
                                    {{ $employee->position->position_name ?? 'N/A' }}
                                </td>

                                <td>
                                    {{ $employee->department->department_name ?? 'N/A' }}
                                </td>

                                <td>
                                    {{ $employee->employmentStatus->employment_status ?? 'N/A' }}
                                </td>

                                <td>
                                    {{ $employee->created_at->format('M d, Y') }}
                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="5"
                                    class="no-data">
                                    No employees found.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


      

        <!-- ==============================
             MONTHLY INFORMATION
        =============================== -->

        <div class="monthly-info">

            <span>
                New employees this month
            </span>

            <strong>
                {{ $newEmployeesThisMonth }}
            </strong>

        </div>

    </div>

</x-layout>
