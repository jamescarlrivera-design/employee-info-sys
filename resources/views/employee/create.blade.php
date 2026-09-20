<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>


    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            color: #333;
        }

        .navbar {
            background: #1f2937;
            color: white;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            margin: 0;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 40px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
        }

        .add-button {
            background: #2563eb;
            color: white;
            padding: 10px 18px;
            border-radius: 6px;
            text-decoration: none;
        }

        .add-button:hover {
            background: #1d4ed8;
        }

        .table-container {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #e5e7eb;
            text-align: left;
            padding: 15px;
        }

        td {
            padding: 15px;
            border-top: 1px solid #eee;
        }

        tr:hover {
            background: #f9fafb;
        }

        .action-button {
            text-decoration: none;
            padding: 7px 12px;
            border-radius: 5px;
            margin-right: 5px;
        }

        .view {
            background: #10b981;
            color: white;
        }

        .edit {
            background: #f59e0b;
            color: white;
        }

        .delete {
            background: #ef4444;
            color: white;
            border: none;
            padding: 7px 12px;
            border-radius: 5px;
            cursor: pointer;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #777;
        }
    </style>


</head>

<body>


    <div class="navbar">
        <h2>Employee Management</h2>
        <span>Admin Dashboard</span>
    </div>

    <div class="container">

        <div class="header">
            <h1>Add Employee</h1>

        </div>

        <form method="POST" action="{{ route('employee.store') }}">
             @csrf 
             <label for="first_name">First Name</label>
            <input 
                id="first_name" 
                name="first_name" 
                value="{{ old('first_name') }}" 
                 required> 
            @error('first_name')
            <p class="error">{{ $message }}</p> 
            @enderror 
            <label for="last_name">Last Name</label> 
            <input 
                id="last_name"
                name="last_name" value="{{ old('last_name') }}" required> @error('last_name')
                <p class="error">{{ $message }}</p> @enderror <label for="department">Department</label> <input
                id="department" name="department" value="{{ old('department') }}" required> @error('department')
                <p class="error">{{ $message }}</p> @enderror <button type="submit">Create Employee</button>
        </form>
        <br>
        <a href="{{ route('employee.index') }}">Back To Employees</a>






    </div>


</body>

</html>