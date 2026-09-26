<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Employee Information System</title>

    <style>
        * {
            box-sizing: border-box;
        }

        .login-wrapper {
            width: 100%;
            max-width: 400px;
            position: relative;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            background: white;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f4f6;

            display: flex;
            justify-content: center;
            align-items: center;

            min-height: 100vh;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            background: white;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .login-container h1 {
            text-align: center;
            margin-bottom: 10px;
        }

        .login-container p {
            text-align: center;
            color: #6b7280;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
        }

        .login-button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background: #2563eb;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .login-button:hover {
            background: #1d4ed8;
        }

        .error {
            background: #fee2e2;
            color: #b91c1c;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
        }


        .alert-error {
            display: flex;
            align-items: center;
            justify-content: space-between;

            width: 100%;

            background-color: #fee2e2;
            color: #991b1b;

            border: 1px solid #ef4444;
            border-radius: 8px;

            padding: 12px 16px;

            margin-bottom: 15px;

            font-weight: 500;

            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        }


        .alert-close {
            background: transparent;
            border: none;

            color: #991b1b;
            font-size: 22px;
            font-weight: bold;

            cursor: pointer;
            padding: 0 5px;
        }

        .alert-close:hover {
            color: #7f1d1d;
        }
    </style>
</head>


<body>

    <div class="login-wrapper">

        @if(session('error'))
            <div class="alert-error" id="login-alert">

                <span>
                    ⚠ {{ session('error') }}
                </span>

                <button type="button" class="alert-close" onclick="document.getElementById('login-alert').remove()">
                    &times;
                </button>

            </div>
        @endif


        <div class="login-container">

            <h1>Employee Information System</h1>

            <p>Login to your account</p>

            @if ($errors->any())
                <div class="error">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>

                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>

                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <button type="submit" class="login-button">
                    Login
                </button>

            </form>

        </div>

    </div>

</body>


</html>