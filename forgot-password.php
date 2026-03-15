<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: forgot-password.html
        PURPOSE:
        Forgot password request page.

        FORM SUBMISSION TARGET LATER:
        auth/submit/forgot_password_submit.php

        HTML ONLY:
        Layout only. Backend will be added later with PHP.
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Forgot Password</title>

    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="assets/images/movex-logo.jpg" />

    <!-- Shared auth stylesheet -->
    <link rel="stylesheet" href="assets/css/auth.css" />
</head>
<body>
    <div class="page-wrap" style="max-width: 460px;">
        <div class="auth-card">
            <div class="logo-box">
                <img src="assets/images/movex-logo.jpg" alt="Movex Logo" />
            </div>

            <h1 class="page-title">Forgot Password</h1>
            <p class="page-subtitle">
                Enter your email address or phone number to start your password reset process.
            </p>

            <!--
                FORM SUBMISSION TARGET:
                This form will later submit to:
                auth/submit/forgot_password_submit.php

                Method: POST
            -->
            <form action="auth/submit/forgot_password_submit.php" method="post">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="reset_identity">Email Address or Phone Number</label>
                        <div class="input-box">
                            <input
                                type="text"
                                id="reset_identity"
                                name="reset_identity"
                                placeholder="Enter email address or phone number"
                                required
                            />
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn-primary">Continue</button>
                    </div>
                </div>
            </form>

            <p class="bottom-text">
                Remember your password?
                <a href="forms/auth/login.html">Login</a>
            </p>

            <p class="form-note">
                Return to
                <a href="forms/auth/register.html">Registration</a>
                or read our
                <a href="terms.html">Terms</a>.
            </p>
        </div>
    </div>
</body>
</html>