<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: forms/auth/register-company-client.html
        PURPOSE:
        Company Needing Services registration form.

        ACCOUNT TYPE:
        Company that needs logistics services, can later add authorized users,
        and place orders under the company account.

        FORM SUBMISSION TARGET LATER:
        ../../auth/submit/register_company_client_submit.php

        HTML ONLY:
        Layout only. Backend will be added later with PHP.
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Company Client Registration</title>

    <!-- Favicon -->
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

            <h1 class="page-title">Company Client Registration</h1>
            <p class="page-subtitle">
                Register your company to request logistics services, manage staff access, and place company-based orders.
            </p>

            <!--
                FORM SUBMISSION TARGET:
                This form will later submit to:
                ../../auth/submit/register_company_client_submit.php

                Method: POST
            -->
            <form action="../../auth/submit/register_company_client_submit.php" method="post">
                <div class="form-grid two-col">
                    <div class="form-group full-width">
                        <label for="company_name">Company Name</label>
                        <div class="input-box">
                            <input
                                type="text"
                                id="company_name"
                                name="company_name"
                                placeholder="Enter company name"
                                required
                            />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="company_rc_number">RC / Registration Number</label>
                        <div class="input-box">
                            <input
                                type="text"
                                id="company_rc_number"
                                name="company_rc_number"
                                placeholder="Enter registration number"
                                required
                            />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="industry_type">Industry Type</label>
                        <div class="input-box">
                            <select id="industry_type" name="industry_type" required>
                                <option value="">Select industry type</option>
                                <option value="manufacturing">Manufacturing</option>
                                <option value="retail">Retail</option>
                                <option value="construction">Construction</option>
                                <option value="oil_and_gas">Oil and Gas</option>
                                <option value="education">Education</option>
                                <option value="healthcare">Healthcare</option>
                                <option value="agriculture">Agriculture</option>
                                <option value="technology">Technology</option>
                                <option value="hospitality">Hospitality</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="company_contact_first_name">Contact Person First Name</label>
                        <div class="input-box">
                            <input
                                type="text"
                                id="company_contact_first_name"
                                name="contact_first_name"
                                placeholder="Enter first name"
                                required
                            />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="company_contact_last_name">Contact Person Last Name</label>
                        <div class="input-box">
                            <input
                                type="text"
                                id="company_contact_last_name"
                                name="contact_last_name"
                                placeholder="Enter last name"
                                required
                            />
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label for="company_email">Official Company Email</label>
                        <div class="input-box">
                            <input
                                type="email"
                                id="company_email"
                                name="company_email"
                                placeholder="Enter official company email"
                                required
                            />
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label for="company_phone">Official Company Telephone</label>
                        <div class="phone-row">
                            <select name="country_code" class="phone-prefix" required>
                                <option value="+234" selected>🇳🇬 +234</option>
                            </select>

                            <input
                                type="tel"
                                id="company_phone"
                                name="company_phone"
                                class="phone-number"
                                placeholder="8012345678"
                                pattern="[0-9]{10}"
                                title="Enter a valid 10-digit Nigerian phone number"
                                required
                            />
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label for="company_address">Company Address</label>
                        <div class="input-box">
                            <textarea
                                id="company_address"
                                name="company_address"
                                placeholder="Enter company address"
                                required
                            ></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="company_state">State</label>
                        <div class="input-box">
                            <select id="company_state" name="state" required>
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
                        <label for="estimated_delivery_volume">Estimated Delivery Volume</label>
                        <div class="input-box">
                            <select id="estimated_delivery_volume" name="estimated_delivery_volume" required>
                                <option value="">Select estimated volume</option>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                                <option value="enterprise">Enterprise</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label for="company_referral_code">Referral Code</label>
                        <div class="input-box">
                            <input
                                type="text"
                                id="company_referral_code"
                                name="referral_code"
                                placeholder="Enter referral code if any"
                            />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="company_password">Password</label>
                        <div class="input-box password-box">
                            <input
                                type="password"
                                id="company_password"
                                name="password"
                                placeholder="Create password"
                                required
                            />
                            <button
                                type="button"
                                class="toggle-password"
                                onclick="togglePassword('company_password', this)"
                                aria-label="Show or hide password"
                            >
                                👁
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="company_confirm_password">Confirm Password</label>
                        <div class="input-box password-box">
                            <input
                                type="password"
                                id="company_confirm_password"
                                name="confirm_password"
                                placeholder="Confirm password"
                                required
                            />
                            <button
                                type="button"
                                class="toggle-password"
                                onclick="togglePassword('company_confirm_password', this)"
                                aria-label="Show or hide password"
                            >
                                👁
                            </button>
                        </div>
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
                        <button type="submit" class="btn-primary">Register as Company Client</button>
                    </div>
                </div>
            </form>

            <p class="bottom-text">
                Already have an account?
                <a href="login.php">Login</a>
            </p>
        </div>
    </div>

    <script src="../../assets/js/auth.js"></script>
</body>
</html>