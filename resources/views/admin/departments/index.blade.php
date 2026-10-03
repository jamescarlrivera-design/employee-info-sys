<x-layout>

    <div class="department-section">

        <div class="section-header">
            <div>
                <h2>Departments</h2>
                <p>List of departments in the company.</p>
            </div>

            <a href="" class="add-button">
                + Add Department
            </a>
        </div>


        <div class="department-grid">

            @foreach ($departments as $department)

                <div class="department-card">

                    <div class="department-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ff4242" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-office"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M4 18h9v-12l-5 2v5l-4 2v-8l9 -4l7 2v13l-7 3l-9 -3" /></svg>
                    </div>

                    <div class="department-info">

                        <h3>
                            {{ $department->department_name }}
                        </h3>

                        <p>
                            Department ID: {{ $department->id }}
                        </p>

                    </div>

                    <div class="department-actions">

                        <a href="" class="view-button">
                            View
                        </a>

                        <a href="" class="edit-button">
                            Edit
                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</x-layout>