<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Hub- Admin login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../src/style.css">
</head>
<body>
    <form method="post" action="./src/login.php">
        <div class="container" id="login">
            <h1 class="Company-name">Student Hub - Teacher login</h1>
            <h1>Login</h1>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Email" required autocomplete="email">
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password" required autocomplete="current-password">
            </div>
            <a href="#" class="forgot-password" id="forgot-password-btn">Forgot Password?</a>
            <a href="../index.html" class="forgot-password" id="home-page">Back to Home Page</a>
            <div class="input-group">
                <input type="submit" class="btn" value="Login" name="signIn" id="login-btn">
            </div>
        </div>
    </form>
    <div class="container" id="forgot-password" style="display: none;">
        <h1>Forgot password</h1>
        <p>In the case that you have forgotten your log in credentials please contact a administator at your institution to recover your details.</p>
        <p>If furthur support is needed, please contact our support page</p>
        <a href="#" class="support-page" id="support-page">Support Page</a>
        <div class="input-group">
            <input type="submit" class="btn" value="Back to login" id="back-to-login-btn">
        </div>
        <a href="../index.html" class="home-page" id="home-page">Back to Home Page</a>
    </div>
</body>
<script type="module" src="src/login.js"></script>
</html>