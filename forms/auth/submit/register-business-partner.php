
<?php
require_once __DIR__ . '/../../config/base.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: forms/auth/register-business-partner.html
        PURPOSE:
        Business Logistics Partner registration form.

        ACCOUNT TYPE:
        Business that carries loads, can register drivers,
        and may earn commission after Movex approval.

        FORM SUBMISSION TARGET LATER:
        ../../auth/submit/register_business_partner_submit.php

        HTML ONLY:
        Layout only. Backend will be added later with PHP.
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Business Logistics Partner Registration</title>

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

            <h1 class="page-title">Business Logistics Partner Registration</h1>
            <p class="page-subtitle">
                Register your logistics business to operate on Movex, onboard drivers, and manage transport operations.
            </p>

            <!--
                FORM SUBMISSION TARGET:
                This form will later submit to:
                ../../auth/submit/register_business_partner_submit.php

                Method: POST
            -->
            <form action="../../auth/submit/register_business_partner_submit.php" method="post">
                <div class="form-grid two-col">
                    <div class="form-group full-width">
                        <label for="business_name">Business Name</label>
                        <div class="input-box">
                            <input
                                type="text"
                                id="business_name"
                                name="business_name"
                                placeholder="Enter registered business name"
                                required
                            />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rc_number">CAC / RC Number</label>
                        <div class="input-box">
                            <input
                                type="text"
                                id="rc_number"
                                name="rc_number"
                                placeholder="Enter CAC or RC number"
                                required
                            />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="business_type">Business Type</label>
                        <div class="input-box">
                            <select id="business_type" name="business_type" required>
                                <option value="">Select business type</option>
                                <option value="sole_proprietorship">Sole Proprietorship</option>
                                <option value="limited_company">Limited Company</option>
                                <option value="partnership">Partnership</option>
                                <option value="cooperative">Cooperative</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="contact_first_name">Contact Person First Name</label>
                        <div class="input-box">
                            <input
                                type="text"
                                id="contact_first_name"
                                name="contact_first_name"
                                placeholder="Enter first name"
                                required
                            />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="contact_last_name">Contact Person Last Name</label>
                        <div class="input-box">
                            <input
                                type="text"
                                id="contact_last_name"
                                name="contact_last_name"
                                placeholder="Enter last name"
                                required
                            />
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label for="business_email">Official Business Email</label>
                        <div class="input-box">
                            <input
                                type="email"
                                id="business_email"
                                name="business_email"
                                placeholder="Enter official business email"
                                required
                            />
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label for="business_phone">Official Business Telephone</label>
                        <div class="phone-row">
                            <select name="country_code" class="phone-prefix" required>
                                <option value="+234" selected>🇳🇬 +234</option>
                            </select>

                            <input
                                type="tel"
                                id="business_phone"
                                name="business_phone"
                                class="phone-number"
                                placeholder="8012345678"
                                pattern="[0-9]{10}"
                                title="Enter a valid 10-digit Nigerian phone number"
                                required
                            />
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label for="business_address">Business Address</label>
                        <div class="input-box">
                            <textarea
                                id="business_address"
                                name="business_address"
                                placeholder="Enter business address"
                                required
                            ></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="business_state">State of Operation</label>
                        <div class="input-box">
                            <select id="business_state" name="state_of_operation" required>
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
                        <label for="estimated_driver_count">Estimated Number of Drivers</label>
                        <div class="input-box">
                            <input
                                type="number"
                                id="estimated_driver_count"
                                name="estimated_driver_count"
                                placeholder="Enter estimated number"
                                min="1"
                                required
                            />
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label for="pools_operated">Pools Operated</label>
                        <div class="input-box">
                            <select id="pools_operated" name="pools_operated[]" multiple required>
                                <option value="dispatch_rider">Dispatch Rider Pool</option>
                                <option value="truck">Truck Pool</option>
                                <option value="tipper_granite">Tipper and Granite Pool</option>
                                <option value="ajeigboro">Ajeigboro Pool</option>
                                <option value="petrol_tanker">Petrol Tanker Pool</option>
                                <option value="frozen_foods">Frozen Foods Pool</option>
                                <option value="general">General Pool</option>
                            </select>
                        </div>
                        <p class="helper-text">Hold Ctrl or long-press on supported devices to select more than one.</p>
                    </div>

                    <div class="form-group full-width">
                        <label for="business_referral_code">Referral Code</label>
                        <div class="input-box">
                            <input
                                type="text"
                                id="business_referral_code"
                                name="referral_code"
                                placeholder="Enter referral code if any"
                            />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="business_password">Password</label>
                        <div class="input-box password-box">
                            <input
                                type="password"
                                id="business_password"
                                name="password"
                                placeholder="Create password"
                                required
                            />
                            <button
                                type="button"
                                class="toggle-password"
                                onclick="togglePassword('business_password', this)"
                                aria-label="Show or hide password"
                            >
                                👁
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="business_confirm_password">Confirm Password</label>
                        <div class="input-box password-box">
                            <input
                                type="password"
                                id="business_confirm_password"
                                name="confirm_password"
                                placeholder="Confirm password"
                                required
                            />
                            <button
                                type="button"
                                class="toggle-password"
                                onclick="togglePassword('business_confirm_password', this)"
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
                        <button type="submit" class="btn-primary">Register as Business Partner</button>
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