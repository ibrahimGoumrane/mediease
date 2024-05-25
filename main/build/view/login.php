<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your Free Account</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <form action="register.php" method="POST">
            <h2>Create your free account</h2>
            <button type="button" class="google-signup">Sign up with Google</button>
            <p>or</p>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" name="fullname" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <small>Your password must be at least 10 characters</small>
            </div>
            <div class="form-group">
                <input type="checkbox" id="not-a-robot" name="not_a_robot" required>
                <label for="not-a-robot">I'm not a robot</label>
            </div>
            <button type="submit">Create Free Account</button>
            <p>By creating an account, you accept our <a href="#">terms and conditions</a></p>
        </form>
    </div>
</body>
</html>
