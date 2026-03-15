<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/user-student-verification.html
        PURPOSE:
        User page for student ID upload and promo review request.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGET:
        ../user/student-verification/submit/student_verification_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Student Verification</title>
    <link rel="icon" type="image/jpeg" href="../assets/images/movex-logo.jpg" />
    <link rel="stylesheet" href="../assets/css/dashboard.css" />
    <style>
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
            min-height: 90px;
            resize: vertical;
        }

        .verify-box {
            background: #fcfff6;
            border: 1px solid #e7efca;
            border-radius: 18px;
            padding: 16px;
        }

        .verify-box h4 {
            font-size: 16px;
            margin-bottom: 8px;
            color: var(--text-dark);
        }

        .verify-box p {
            font-size: 14px;
            color: #5e6850;
            line-height: 1.7;
        }

        .verify-tag {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            background: #fff8df;
            color: #9b7a00;
            margin-top: 10px;
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
            <strong>Student Verification</strong>
            <span>This page is reserved for student ID upload and promo eligibility request.</span>
        </div>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="dashboard-layout">
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
                        <a href="user-orders.html">
                            <span class="menu-icon">📦</span>
                            <span class="menu-text"><strong>My Orders</strong><span>Track and manage orders</span></span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Account</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="user-profile.html">
                            <span class="menu-icon">👤</span>
                            <span class="menu-text"><strong>Profile</strong><span>Manage account details</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="user-student-verification.html">
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

        <main class="dashboard-main">
            <header class="dashboard-header">
                <div class="header-row">
                    <div class="header-left">
                        <button class="menu-toggle" data-menu-open aria-label="Open menu">☰</button>
                        <div class="page-heading">
                            <h1>Student Verification</h1>
                            <p>Upload your student ID and request promo review by admin.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Promo Request</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="verify-box">
                        <h4>Current Verification Status</h4>
                        <p>
                            Student promo approval is not automatic. Your submission will be reviewed by admin
                            before any promo is attached to your account.
                        </p>
                        <span class="verify-tag">Status: Pending Review</span>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Submit Student Verification</h3>
                                <p>Use this form to upload your student information and request review.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../user/student-verification/submit/student_verification_submit.php
                        -->
                        <form action="../user/student-verification/submit/student_verification_submit.php" method="post" enctype="multipart/form-data">
                            <div class="dashboard-form-grid two-col">
                                <div class="dashboard-form-group">
                                    <label for="institution_name">Institution Name</label>
                                    <input type="text" id="institution_name" name="institution_name" placeholder="Enter institution name" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="student_id_number">Student ID Number</label>
                                    <input type="text" id="student_id_number" name="student_id_number" placeholder="Enter student ID number" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="institution_state">Institution State</label>
                                    <select id="institution_state" name="institution_state">
                                        <option value="">Select state</option>
                                        <option>Lagos</option>
                                        <option>Ogun</option>
                                        <option>Oyo</option>
                                        <option>Abuja - FCT</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="student_id_file">Upload Student ID</label>
                                    <input type="file" id="student_id_file" name="student_id_file" />
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="verification_note">Note</label>
                                    <textarea id="verification_note" name="verification_note" placeholder="Add any useful note about your verification request"></textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <button type="submit" class="btn-primary">Submit Student Verification</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="../assets/js/dashboard.js"></script>
</body>
</html>