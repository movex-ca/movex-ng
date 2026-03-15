<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/user-profile.html
        PURPOSE:
        User profile page inside the user dashboard shell.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM SUBMISSION TARGET:
        ../user/submit/profile_update_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | User Profile</title>
    <link rel="icon" type="image/jpeg" href="../assets/images/movex-logo.jpg" />
    <link rel="stylesheet" href="../assets/css/dashboard.css" />
    <style>
        .form-panel-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
        }

        .dashboard-form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
        }

        .dashboard-form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .dashboard-form-group input,
        .dashboard-form-group select,
        .dashboard-form-group textarea {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 14px;
            outline: none;
            font-size: 14px;
            background: #fcfff7;
            color: var(--text-dark);
        }

        .dashboard-form-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        .dashboard-form-group input:focus,
        .dashboard-form-group select:focus,
        .dashboard-form-group textarea:focus {
            border-color: var(--accent-strong);
            box-shadow: 0 0 0 4px rgba(184, 222, 40, 0.14);
        }

        .form-note-small {
            font-size: 12px;
            color: var(--text-mid);
            margin-top: 6px;
            line-height: 1.5;
        }

        .profile-top-card {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .profile-photo-box {
            width: 84px;
            height: 84px;
            border-radius: 20px;
            background: linear-gradient(135deg, #ebfac0, #faffdd);
            border: 1px solid #dbe8ab;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: #5f7900;
            font-size: 24px;
            flex-shrink: 0;
        }

        .profile-top-text h3 {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .profile-top-text p {
            font-size: 14px;
            color: var(--text-mid);
            line-height: 1.6;
        }

        .inline-check {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 14px;
            color: var(--text-dark);
            line-height: 1.6;
        }

        .inline-check input {
            margin-top: 3px;
            accent-color: var(--accent-strong);
        }

        @media (min-width: 768px) {
            .dashboard-form-grid.two-col {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="global-toast-area">
        <div class="toast-demo">
            <strong>Profile Page</strong>
            <span>This page is reserved for user profile updates and personal account settings.</span>
        </div>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="dashboard-layout">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <img src="../assets/images/movex-logo.jpg" alt="Movex Logo" />
                <div class="brand-text">
                    <h1>MOVEX</h1>
                    <p>Nigeria Logistics Dashboard</p>
                    <span class="env-badge">9ja Demo</span>
                </div>
            </div>

            <div class="sidebar-profile">
                <div class="sidebar-profile-top">
                    <div class="profile-avatar">AO</div>
                    <div class="profile-meta">
                        <h2>Alao Odeleye</h2>
                        <p>Customer Account</p>
                    </div>
                </div>
                <span class="role-badge">User Dashboard</span>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Main</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="user-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text"><strong>Dashboard</strong><span>Overview and activity</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="user-new-order.html">
                            <span class="menu-icon">➕</span>
                            <span class="menu-text"><strong>New Order</strong><span>Create logistics request</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">📦</span>
                            <span class="menu-text"><strong>My Orders</strong><span>Track and manage orders</span></span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Account</div>
                <ul class="menu-list">
                    <li class="menu-item active">
                        <a href="user-profile.html">
                            <span class="menu-icon">👤</span>
                            <span class="menu-text"><strong>Profile</strong><span>Manage account details</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text"><strong>Addresses</strong><span>Saved pickup and drop-off</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">🎓</span>
                            <span class="menu-text"><strong>Student Verification</strong><span>Upload ID for review</span></span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="sidebar-footer">
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="../forms/auth/login.html">
                            <span class="menu-icon">↩</span>
                            <span class="menu-text"><strong>Logout</strong><span>Return to login</span></span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Main -->
        <main class="dashboard-main">
            <header class="dashboard-header">
                <div class="header-row">
                    <div class="header-left">
                        <button class="menu-toggle" data-menu-open aria-label="Open menu">☰</button>
                        <div class="page-heading">
                            <h1>User Profile</h1>
                            <p>View and update your personal account details.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Profile Settings</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="profile-top-card">
                            <div class="profile-photo-box">AO</div>
                            <div class="profile-top-text">
                                <h3>Alao Odeleye</h3>
                                <p>
                                    Keep your profile updated so your orders, promotions, addresses,
                                    and account support details remain accurate.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Profile Information</h3>
                                <p>This form is for user profile updates inside the dashboard.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../user/submit/profile_update_submit.php
                        -->
                        <form action="../user/submit/profile_update_submit.php" method="post">
                            <div class="dashboard-form-grid two-col">
                                <div class="dashboard-form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" id="first_name" name="first_name" placeholder="Enter first name" value="Alao" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" placeholder="Enter last name" value="Odeleye" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" name="email" placeholder="Enter email address" value="user@example.com" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="text" id="phone_number" name="phone_number" placeholder="+2348012345678" value="+2348012345678" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="state_of_residence">State of Residence</label>
                                    <select id="state_of_residence" name="state_of_residence">
                                        <option value="">Select state</option>
                                        <option selected>Lagos</option>
                                        <option>Abia</option>
                                        <option>Abuja - FCT</option>
                                        <option>Ogun</option>
                                        <option>Oyo</option>
                                        <option>Rivers</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="sex">Sex</label>
                                    <select id="sex" name="sex">
                                        <option value="">Select sex</option>
                                        <option selected>Male</option>
                                        <option>Female</option>
                                        <option>Prefer not to say</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="address">Address</label>
                                    <textarea id="address" name="address" placeholder="Enter your address">No. 10 Example Street, Lagos</textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="referral_code">Referral Code</label>
                                    <input type="text" id="referral_code" name="referral_code" placeholder="Enter referral code if any" value="MOVEX-REF-01" />
                                    <p class="form-note-small">This can be empty if the account was created without a referral.</p>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label class="inline-check">
                                        <input type="checkbox" name="promo_updates" value="1" checked />
                                        <span>Receive promotion and account update notifications.</span>
                                    </label>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <button type="submit" class="btn-primary">Save Profile Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Student Promo Section</h3>
                                <p>This area can later link to student ID upload and admin review workflow.</p>
                            </div>
                        </div>

                        <div class="quick-grid">
                            <a href="#" class="quick-card">
                                <h4>Upload Student ID</h4>
                                <p>Submit your student ID for admin verification and possible promo approval.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Promo Status</h4>
                                <p>Check whether your verification is pending, approved, or rejected.</p>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="../assets/js/dashboard.js"></script>
</body>
</html>