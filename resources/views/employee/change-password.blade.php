<x-employees-layout>

    <div class="profile-card">
        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error-message">
                <strong>Please fix the following:</strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2>Change Password</h2>

        <form action="{{ route('employee.password.update') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="current_password">Current Password</label>

                <input type="password" id="current_password" name="current_password" required>

                @error('current_password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">New Password</label>

                <input type="password" id="password" name="password" required>

                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm New Password</label>

                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" class="change-password-button">
                Change Password
            </button>

        </form>

    </div>

</x-employees-layout>