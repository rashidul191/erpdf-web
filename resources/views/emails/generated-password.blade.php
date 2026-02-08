<!DOCTYPE html>
<html>
<head>
    <title>Your Password</title>
</head>
<body>
    <p>Hello {{ $user->name }},</p>

    <p>Your account has been created successfully.</p>

    <p><strong>Phone:</strong> {{ $user->phone }}</p>
    <p><strong>Login Password:</strong> {{ $generatedPassword }}</p>

    <p>Please login and change your password after logging in.</p>

    <p>Thanks,<br>Your Team</p>
</body>
</html>
