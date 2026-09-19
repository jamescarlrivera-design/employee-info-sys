
<!DOCTYPE html>
<html>
<head>
    <title>Employee Details</title>

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
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
</head>

<body>

    <div class="employee-card">

        <h1>Employee Details</h1>

        <div class="detail">
            <span class="label">ID:</span>
            {{ $employee->id }}
        </div>

        <div class="detail">
            <span class="label">First Name:</span>
            {{ $employee->first_name }}
        </div>

        <div class="detail">
            <span class="label">Last Name:</span>
            {{ $employee->last_name }}
        </div>

        <div class="detail">
            <span class="label">Department:</span>
            {{ $employee->department }}
        </div>

        <a href="{{ route('employee.index') }}" class="back-button">
            Back to Employees
        </a>

    </div>

</body>
</html>
