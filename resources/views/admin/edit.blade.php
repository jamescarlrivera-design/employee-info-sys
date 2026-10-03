
<x-layout>
<div class="employee-form-container">

    <!-- PAGE HEADER -->
    <div class="page-header">
        <div>
            <h1>Edit Employee</h1>
            <p>Update employee information</p>
        </div>

        <a href="{{ route('admin.show', $employee->id) }}" class="back-button">
            ← Back
        </a>
    </div>


    <!-- VALIDATION ERRORS -->
    @if ($errors->any())
        <div class="error-box">
            <strong>Please fix the following errors:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <!-- EDIT FORM -->
    <div class="form-card">

        <form
            action="{{ route('admin.update', $employee->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')


            <!-- EMPLOYEE NUMBER -->
            <div class="form-group">
                <label for="employee_number">
                    Employee Number
                </label>

                <input
                    type="text"
                    id="employee_number"
                    value="{{ $employee->employee_number }}"
                    disabled
                >

                <small>
                    Employee number is automatically generated.
                </small>
            </div>


            <!-- FIRST NAME -->
            <div class="form-group">
                <label for="first_name">
                    First Name
                </label>

                <input
                    type="text"
                    id="first_name"
                    name="first_name"
                    value="{{ old('first_name', $employee->first_name) }}"
                    required
                >
            </div>


            <!-- MIDDLE NAME -->
            <div class="form-group">
                <label for="middle_name">
                    Middle Name
                </label>

                <input
                    type="text"
                    id="middle_name"
                    name="middle_name"
                    value="{{ old('middle_name', $employee->middle_name) }}"
                >
            </div>


            <!-- LAST NAME -->
            <div class="form-group">
                <label for="last_name">
                    Last Name
                </label>

                <input
                    type="text"
                    id="last_name"
                    name="last_name"
                    value="{{ old('last_name', $employee->last_name) }}"
                    required
                >
            </div>


            <!-- EMAIL -->
            <div class="form-group">
                <label for="email">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', $employee->email) }}"
                >
            </div>


            <!-- DEPARTMENT -->
            <div class="form-group">
                <label for="department_id">
                    Department
                </label>

                <select
                    id="department_id"
                    name="department_id"
                    required
                >

                    <option value="">
                        Select Department
                    </option>

                    @foreach ($departments as $department)

                        <option
                            value="{{ $department->id }}"
                            {{ old('department_id', $employee->department_id) == $department->id ? 'selected' : '' }}
                        >
                            {{ $department->department_name }}
                        </option>

                    @endforeach

                </select>
            </div>


            <!-- POSITION -->
            <div class="form-group">
                <label for="position_id">
                    Position
                </label>

                <select
                    id="position_id"
                    name="position_id"
                    required
                >

                    <option value="">
                        Select Position
                    </option>

                    @foreach ($positions as $position)

                        <option
                            value="{{ $position->id }}"
                            {{ old('position_id', $employee->position_id) == $position->id ? 'selected' : '' }}
                        >
                            {{ $position->position_name }}
                        </option>

                    @endforeach

                </select>
            </div>


            <!-- EMPLOYMENT STATUS -->
            <div class="form-group">
                <label for="employment_status_id">
                    Employment Status
                </label>

                <select
                    id="employment_status_id"
                    name="employment_status_id"
                    required
                >

                    <option value="">
                        Select Employment Status
                    </option>

                    @foreach ($employmentStatuses as $status)

                        <option
                            value="{{ $status->id }}"
                            {{ old('employment_status_id', $employee->employment_status_id) == $status->id ? 'selected' : '' }}
                        >
                            {{ $status->employment_status }}
                        </option>

                    @endforeach

                </select>
            </div>


            <!-- SALARY RATE -->
            <div class="form-group">
                <label for="salary_rate_id">
                    Salary Rate
                </label>

                <select
                    id="salary_rate_id"
                    name="salary_rate_id"
                    required
                >

                    <option value="">
                        Select Salary Rate
                    </option>

                    @foreach ($salary_Rates as $salaryRate)

                        <option
                            value="{{ $salaryRate->id }}"
                            {{ old('salary_rate_id', $employee->salary_rate_id) == $salaryRate->id ? 'selected' : '' }}
                        >
                            {{ $salaryRate->rate_name }}
                        </option>

                    @endforeach

                </select>
            </div>



            <div class="form-group">

                    <label for="address">
                        Address
                    </label>

                    <textarea id="address" name="address" rows="3"
                        placeholder="Enter employee address">{{ old('address') }}</textarea>

            </div>


            <!-- DATE HIRED -->
            <div class="form-group">
                <label for="date_hired">
                    Date Hired
                </label>

                <input
                    type="date"
                    id="date_hired"
                    name="date_hired"
                    value="{{ old('date_hired', $employee->date_hired) }}"
                    required
                >
            </div>


            <!-- BUTTONS -->
            <div class="form-actions">

                <a
                    href="{{ route('admin.index', $employee->id) }}"
                    class="cancel-button"
                >
                    Cancel
                </a>

                <button type="submit" class="save-button">
                    Update Employee
                </button>

            </div>

        </form>

    </div>

</div>


<style>

    .employee-form-container {
        max-width: 900px;
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

    .back-button {
        text-decoration: none;
        background: #eeeeee;
        color: #333;
        padding: 10px 16px;
        border-radius: 6px;
    }

    .form-card {
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 7px;
        font-weight: 600;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 11px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 15px;
        box-sizing: border-box;
    }

    .form-group input:disabled {
        background: #f3f3f3;
        color: #777;
    }

    .form-group small {
        display: block;
        margin-top: 5px;
        color: #777;
    }

    .error-box {
        background: #ffe5e5;
        color: #a00000;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .error-box ul {
        margin-bottom: 0;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 25px;
    }

    .cancel-button,
    .save-button {
        padding: 11px 18px;
        border-radius: 6px;
        text-decoration: none;
        border: none;
        cursor: pointer;
        font-size: 15px;
    }

    .cancel-button {
        background: #eeeeee;
        color: #333;
    }

    .save-button {
        background: #333;
        color: white;
    }

    @media (max-width: 700px) {

        .employee-form-container {
            padding: 15px;
        }

        .page-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .form-card {
            padding: 20px;
        }

    }

</style>


</x-layout>
