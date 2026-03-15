<?php

require_once __DIR__ . '/../../config/base.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Login</title>

    <!-- Favicon uses the Movex project logo -->
    <link rel="icon" type="image/jpeg" href="../../assets/images/movex-logo.jpg" />

    <!-- Shared auth stylesheet -->
    <link rel="stylesheet" href="../../assets/css/auth.css" />
</head>
<body>
    
    <div class="page-wrap">
        <div class="auth-card">
            <div class="logo-box">
                <img src="../../assets/images/movex-logo.jpg" alt="Movex Logo" />
            </div>

            <h1 class="page-title">Welcome Back</h1>
            <p class="page-subtitle">
                Sign in to your Movex Nigeria account.
            </p>

            <!--
                FORM SUBMISSION TARGET:
                This login form will later submit to:
                ../../auth/submit/login_submit.php

                Method: POST
            -->
            <form action="../../forms/auth/submit/login.php" method="post">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="login_identity">Email Address or Phone Number</label>
                        <div class="input-box">
                            <input
                                type="text"
                                id="login_identity"
                                name="login_identity"
                                placeholder="Enter email or phone number"
                                required
                            />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="login_password">Password</label>
                        <div class="input-box password-box">
                            <input
                                type="password"
                                id="login_password"
                                name="login_password"
                                placeholder="Enter your password"
                                required
                            />
                            <button
                                type="button"
                                class="toggle-password"
                                onclick="togglePassword('login_password', this)"
                                aria-label="Show or hide password"
                            >
                                👁
                            </button>
                        </div>
                    </div>

                    <div class="inline-row">
                        <label class="check-row">
                            <input type="checkbox" name="remember_me" value="1" />
                            <span>Remember me</span>
                        </label>

                        <a href="../../forgot-password.php">Forgot Password?</a>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn-primary">Login</button>
                    </div>
                </div>
            </form>

            <p class="bottom-text">
                Do not have an account?
                <a href="register.php">Register</a>
            </p>

            <p class="form-note">
                By continuing, you agree to our
                <a href="../../terms.html">Terms</a>
                and
                <a href="../../privacy.php">Privacy Policy</a>.
            </p>
        </div>
    </div>

    <script src="../../assets/js/auth.js"></script>
</body>
</html>