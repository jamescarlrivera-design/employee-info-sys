<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee Login</title>

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;

            background: #f4f5f7;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .login-card {
            background: white;
            padding: 35px;
            border-radius: 14px;

            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-icon {
            width: 65px;
            height: 65px;

            margin: 0 auto 15px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #222;
            color: white;

            border-radius: 50%;
        }

        .login-icon svg {
            width: 30px;
            height: 30px;
        }

        .login-header h1 {
            font-size: 25px;
            margin-bottom: 8px;
        }

        .login-header p {
            color: #777;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;

            font-size: 14px;
            font-weight: 600;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper svg {
            position: absolute;

            left: 13px;
            top: 50%;

            transform: translateY(-50%);

            width: 18px;
            height: 18px;

            color: #777;
        }

        .input-wrapper input {
            width: 100%;

            padding: 12px 12px 12px 42px;

            border: 1px solid #ddd;
            border-radius: 7px;

            font-size: 14px;
        }

        .input-wrapper input:focus {
            outline: none;
            border-color: #333;
        }

        .login-button {
            width: 100%;

            padding: 13px;

            border: none;
            border-radius: 7px;

            background: #222;
            color: white;

            font-size: 15px;
            font-weight: 600;

            cursor: pointer;
        }

        .login-button:hover {
            opacity: 0.9;
        }

        .error-message {
            margin-bottom: 20px;

            padding: 12px 15px;

            background: #ffebee;
            color: #c62828;

            border: 1px solid #ef9a9a;
            border-radius: 7px;

            font-size: 14px;
        }

        .login-footer {
            text-align: center;
            margin-top: 25px;

            color: #888;
            font-size: 13px;
        }
    </style>
</head>

<body>

    <div class="login-container">

        <div class="login-card">

            <!-- Header -->
            <div class="login-header">

                <div class="login-icon">
                    <i data-lucide="user"></i>
                </div>

                <h1>Employee Portal</h1>

                <p>Sign in to your account</p>

            </div>


            <!-- Errors -->
             @if (session('error'))

    <div class="error-message">
        {{ session('error') }}
    </div>

    @endif
           


            <!-- Login Form -->
            <form action="{{ route('login') }}" method="POST">

                @csrf

                <!-- Email -->
                <div class="form-group">

                    <label for="email">
                        Email Address
                    </label>

                    <div class="input-wrapper">

                        <i data-lucide="mail"></i>

                        <input type="email" id="email" name="email" placeholder="Enter your email"
                            value="{{ old('email') }}" required>

                    </div>

                </div>


                <!-- Password -->
                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <div class="input-wrapper">

                        <i data-lucide="lock"></i>

                        <input type="password" id="password" name="password" placeholder="Enter your password" required>

                    </div>

                </div>


                <!-- Button -->
                <button type="submit" class="login-button">
                    Sign In
                </button>

            </form>


            <div class="login-footer">
                Employee Information System
            </div>

        </div>

    </div>


    <script>
        lucide.createIcons();
    </script>

</body>

</html>