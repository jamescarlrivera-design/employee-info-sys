<x-employees-layout>



<div class="profile-card">

            <h2>My Information</h2>

            <div class="profile-row">
                <strong>Full Name:</strong>

                <span>
                    {{ $employee->first_name }}
                    {{ $employee->middle_name }}
                    {{ $employee->last_name }}
                </span>
            </div>

            <div class="profile-row">
                <strong>Email:</strong>

                <span>
                    {{ $employee->user?->email ?? 'N/A' }}
                </span>
            </div>

            <div class="profile-row">
                <strong>Address:</strong>

                <span>
                    {{ $employee->address ?? 'N/A' }}
                </span>
            </div>

            <div class="profile-row">
                <strong>Date Hired:</strong>

                <span>
                    {{ $employee->date_hired ?? 'N/A' }}
                </span>
            </div>

            <div class="profile-row">
                <strong>Salary Rate:</strong>

                <span>
                    {{ $employee->salaryrates?->rate_name ?? 'N/A' }}
                </span>
            </div>

        </div>

    </div>

</div>

</x-employees-layout>