<x-layout>

    <div class="employee-section">

        <!-- PAGE HEADER -->

        <div class="section-header">

            <div>
                <h2>Add New Employee</h2>

                <p style="color: #6b7280; margin-top: 5px;">
                    Enter the employee information below.
                </p>
            </div>

            <a href="{{ route('employee.index') }}" class="action-button view">
                ← Back to Employees
            </a>

        </div>


        <!-- VALIDATION ERRORS -->

        @if ($errors->any())

            <div class="error">

                <strong>Please fix the following errors:</strong>

                <ul style="margin-top: 8px; margin-left: 20px;">

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- EMPLOYEE FORM -->

        <form action="{{ route('employee.store') }}" method="POST">

            @csrf


            {{-- <!-- EMPLOYEE NUMBER -->

            <div class="form-group">

                <label for="employee_number">
                    Employee Number
                </label>

                <input type="text" id="employee_number" name="employee_number" value="{{ old('employee_number') }}"
                    placeholder="Example: EMP-0001" required>

            </div> --}}


            <!-- FIRST NAME -->

            <div class="form-group">

                <label for="first_name">
                    First Name
                </label>

                <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
                    placeholder="Enter first name" required>

            </div>


            <!-- MIDDLE NAME -->

            <div class="form-group">

                <label for="middle_name">
                    Middle Name
                </label>

                <input type="text" id="middle_name" name="middle_name" value="{{ old('middle_name') }}"
                    placeholder="Enter middle name">

            </div>


            <!-- LAST NAME -->

            <div class="form-group">

                <label for="last_name">
                    Last Name
                </label>

                <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
                    placeholder="Enter last name" required>

            </div>


            <!-- EMAIL -->

            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    placeholder="employee@example.com">

            </div>


            <div class="form-group">

                <label for="date_hired">
                    Date Hired
                </label>

                <input type="date" id="date_hired" name="date_hired" value="{{ old('date_hired') }}" required>


                {{-- <!-- PHONE -->

                <div class="form-group">

                    <label for="phone">
                        Phone Number
                    </label>

                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                        placeholder="Enter phone number">

                </div>


                <!-- ADDRESS -->

                <div class="form-group">

                    <label for="address">
                        Address
                    </label>

                    <textarea id="address" name="address" rows="3"
                        placeholder="Enter employee address">{{ old('address') }}</textarea>

                </div>--}}


                <!-- DEPARTMENT -->

                <div class="form-group">

                    <label for="department_id">
                        Department
                    </label>

                    <select id="department_id" name="department_id" required>

                        <option value="">
                            Select Department
                        </option>

                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
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

                    <select id="position_id" name="position_id" required>

                        <option value="">
                            Select Position
                        </option>

                        @foreach ($positions as $position)

                            <option value="{{ $position->id }}" {{ old('position_id') == $position->id ? 'selected' : '' }}>
                                {{ $position->position_name }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <!-- SALARY RATE -->

                <div class="form-group">

                    <label for="salary_rate_id">
                        Salary Rate
                    </label>

                    <select id="salary_rate_id" name="salary_rate_id" required>

                        <option value="">
                            Select Salary Rate
                        </option>

                        @foreach ($salary_Rates as $salaryRate)

                            <option value="{{ $salaryRate->id }}" {{ old('salary_rate_id') == $salaryRate->id ? 'selected' : '' }}>
                                {{ $salaryRate->rate_name }}
                            </option>

                        @endforeach

                    </select>

                </div>

                       <!-- EMPLOYMENT STATUS -->

                <div class="form-group">

                   <label for="employment_status_id">Employment Status </label>

                   <select
                    id="employment_status_id"
                    name="employment_status_id"
                    required>

                       <option value="">
                          Select Employment Status
                         </option>

                     @foreach ($employmentStatuses as $status)

                         <option
                            value="{{ $status->id }}"
                               {{ old('employment_status_id') == $status->id ? 'selected' : '' }}
                                 >
                                {{ $status->employment_status }}
                         </option>

                    @endforeach

                    </select>

                </div>                                          



                <!-- BUTTONS -->

                <div style="
                display: flex;
                gap: 10px;
                margin-top: 25px;
            ">

                    <button type="submit" class="login-button" style="width: auto; padding: 12px 25px;">
                        Save Employee
                    </button>


                    <a href="{{ route('employee.index') }}" class="action-button view" style="
                        display: flex;
                        align-items: center;
                        padding: 12px 20px;
                    ">
                        Cancel
                    </a>

                </div>

        </form>

    </div>

</x-layout>