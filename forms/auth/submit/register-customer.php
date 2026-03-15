<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Customer Registration</title>

    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="../../assets/images/movex-logo.jpg" />

    <!-- Shared stylesheet -->
    <link rel="stylesheet" href="../../assets/css/auth.css" />
</head>
<body>
    <div class="page-wrap">
        <div class="auth-card">
            <div class="logo-box">
                <img src="../../assets/images/movex-logo.jpg" alt="Movex Logo" />
            </div>

            <h1 class="page-title">Customer Registration</h1>
            <p class="page-subtitle">
                Create your individual Movex account to request dispatch, transport, and delivery services.
            </p>

            <!--
                FORM SUBMISSION TARGET:
                This customer registration form will later submit to:
                ../../auth/submit/register_customer_submit.php

                Method: POST
            -->
            <form action="../../auth/submit/register_customer_submit.php" method="post">
                <div class="form-grid two-col">
                    <div class="form-group">
                        <label for="customer_first_name">First Name</label>
                        <div class="input-box">
                            <input
                                type="text"
                                id="customer_first_name"
                                name="first_name"
                                placeholder="Enter first name"
                                required
                            />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="customer_last_name">Last Name</label>
                        <div class="input-box">
                            <input
                                type="text"
                                id="customer_last_name"
                                name="last_name"
                                placeholder="Enter last name"
                                required
                            />
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label for="customer_email">Email Address</label>
                        <div class="input-box">
                            <input
                                type="email"
                                id="customer_email"
                                name="email"
                                placeholder="Enter your email address"
                                required
                            />
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label for="customer_phone">Telephone</label>

                        <!-- Nigeria flag and code shown before the phone number -->
                        <div class="phone-row">
                            <select name="country_code" class="phone-prefix" required>
                                <option value="+234" selected>🇳🇬 +234</option>
                            </select>

                            <input
                                type="tel"
                                id="customer_phone"
                                name="phone_number"
                                class="phone-number"
                                placeholder="8012345678"
                                pattern="[0-9]{10}"
                                title="Enter a valid 10-digit Nigerian mobile number"
                                required
                            />
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label for="customer_address">Address</label>
                        <div class="input-box">
                            <textarea
                                id="customer_address"
                                name="address"
                                placeholder="Enter your residential address"
                                required
                            ></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="customer_state">State of Residence</label>
                        <div class="input-box">
                            <select id="customer_state" name="state" required>
                                <option value="">Select state</option>
                                <option>Abia</option>
                                <option>Adamawa</option>
                                <option>Akwa Ibom</option>
                                <option>Anambra</option>
                                <option>Bauchi</option>
                                <option>Bayelsa</option>
                                <option>Benue</option>
                                <option>Borno</option>
                                <option>Cross River</option>
                                <option>Delta</option>
                                <option>Ebonyi</option>
                                <option>Edo</option>
                                <option>Ekiti</option>
                                <option>Enugu</option>
                                <option>FCT - Abuja</option>
                                <option>Gombe</option>
                                <option>Imo</option>
                                <option>Jigawa</option>
                                <option>Kaduna</option>
                                <option>Kano</option>
                                <option>Katsina</option>
                                <option>Kebbi</option>
                                <option>Kogi</option>
                                <option>Kwara</option>
                                <option>Lagos</option>
                                <option>Nasarawa</option>
                                <option>Niger</option>
                                <option>Ogun</option>
                                <option>Ondo</option>
                                <option>Osun</option>
                                <option>Oyo</option>
                                <option>Plateau</option>
                                <option>Rivers</option>
                                <option>Sokoto</option>
                                <option>Taraba</option>
                                <option>Yobe</option>
                                <option>Zamfara</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="customer_sex">Sex</label>
                        <div class="input-box">
                            <select id="customer_sex" name="sex" required>
                                <option value="">Select sex</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="prefer_not_to_say">Prefer not to say</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label for="customer_referral_code">Referral Code</label>
                        <div class="input-box">
                            <input
                                type="text"
                                id="customer_referral_code"
                                name="referral_code"
                                placeholder="Enter referral code if any"
                            />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="customer_password">Password</label>
                        <div class="input-box password-box">
                            <input
                                type="password"
                                id="customer_password"
                                name="password"
                                placeholder="Create password"
                                required
                            />
                            <button
                                type="button"
                                class="toggle-password"
                                onclick="togglePassword('customer_password', this)"
                                aria-label="Show or hide password"
                            >
                                👁
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="customer_confirm_password">Confirm Password</label>
                        <div class="input-box password-box">
                            <input
                                type="password"
                                id="customer_confirm_password"
                                name="confirm_password"
                                placeholder="Confirm password"
                                required
                            />
                            <button
                                type="button"
                                class="toggle-password"
                                onclick="togglePassword('customer_confirm_password', this)"
                                aria-label="Show or hide password"
                            >
                                👁
                            </button>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label class="check-row">
                            <input type="checkbox" name="remember_me" value="1" />
                            <span>Remember me on this device</span>
                        </label>
                    </div>

                    <div class="form-group full-width">
                        <label class="check-row">
                            <input type="checkbox" name="agree_terms" value="1" required />
                            <span>
                                I agree to the
                                <a href="../../terms.html">Terms</a>
                                and
                                <a href="../../privacy.html">Privacy Policy</a>
                            </span>
                        </label>
                    </div>

                    <div class="form-group full-width">
                        <button type="submit" class="btn-primary">Register as Customer</button>
                    </div>
                </div>
            </form>

            <p class="bottom-text">
                Already have an account?
                <a href="login.html">Login</a>
            </p>
        </div>
    </div>

    <script src="../../assets/js/auth.js"></script>
</body>
</html>