<x-layout>

<div class="employee-section">

    <div class="section-header">
        <h2>Departments</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Department Name</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($departments as $department)
                <tr>
                    <td>{{ $department->id }}</td>
                    <td>{{ $department->department_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>


</x-layout>
