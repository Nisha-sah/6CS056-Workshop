
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

    <h2>Register Account</h2>

    <form method="POST" action="/register">

        @csrf

        <!-- Name -->
        <label for="name">Name:</label>
        <input
            type="text"
            id="name"
            name="name"
            placeholder="Enter your name"
            value="{{ old('name') }}"
            required
        >

        @error('name')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <br><br>

        <!-- Email -->
        <label for="email">Email:</label>
        <input
            type="email"
            id="email"
            name="email"
            placeholder="Enter your email"
            value="{{ old('email') }}"
            required
        >

        @error('email')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <br><br>

        <!-- Password -->
        <label for="password">Password:</label>
        <input
            type="password"
            id="password"
            name="password"
            placeholder="Enter your password"
            required
        >

        @error('password')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <br><br>

        <!-- Password Confirmation -->
        <label for="password_confirmation">Confirm Password:</label>
        <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            placeholder="Confirm your password"
            required
        >

        <br><br>

        <!-- Submit Button -->
        <button type="submit">Register</button>

    </form>

    <p>
        Already have an account?
        <a href="/login">Login here</a>
    </p>

</body>
</html>
