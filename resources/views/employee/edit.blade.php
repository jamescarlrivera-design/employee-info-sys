<!DOCTYPE html>
<html>


<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f4f4;
        padding: 40px;
    }

    .employee-card {
        background: white;
        width: 500px;
        margin: auto;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        margin-bottom: 25px;
    }

    .detail {
        margin-bottom: 15px;
    }

    .label {
        font-weight: bold;
    }

    .back-button {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 15px;
        background: #333;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }
</style>

<head>
    <title>Edit Employee</title>
</head>

<body>

    <h1>Edit Employee</h1>

    <form method="POST" action="{{ route('employee.update', $employee->id) }}">

        @csrf
        @method('PUT')

        <label for="first_name">First Name</label>
        <input id="first_name" name="first_name" value="{{ old('first_name', $employee->first_name) }}" required>

        @error('first_name')
            <p>{{ $message }}</p>
        @enderror


        <label for="last_name">Last Name</label>
        <input id="last_name" name="last_name" value="{{ old('last_name', $employee->last_name) }}" required>

        @error('last_name')
            <p>{{ $message }}</p>
        @enderror


        <label for="department">Department</label> 
        <input 
            id="department" name="department"
            value="{{ old('department', $employee->department) }}" required>
             @error('department')
            <p>{{ $message }}</p> 
            @enderror 
            <button type="submit">Update Employee</button>
    </form> <br> 
    <a href="{{ route('employee.index') }}">Back to Employees</a>