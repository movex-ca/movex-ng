<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/company-profile.html
        PURPOSE:
        Company client profile page for updating corporate account details.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGET:
        ../company/profile/submit/company_profile_update_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Company Profile</title>
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
            min-height: 100px;
            resize: vertical;
        }

        .company-top-card {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .company-avatar {
            width: 88px;
            height: 88px;
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

        .company-meta h3 {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .company-meta p {
            font-size: 14px;
            color: var(--text-mid);
            line-height: 1.6;
        }

        .top-pill {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            background: #eef7d1;
            color: #5d7600;
            margin-right: 8px;
            margin-top: 8px;
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
            <strong>Company Profile</strong>
            <span>This page is reserved for corporate account profile updates and company information.</span>
        </div>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="dashboard-layout">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <img src="../assets/images/movex-logo.jpg" alt="Movex Logo" />
                <div class="brand-text">
                    <h1>MOVEX</h1>
                    <p>Company Client Dashboard</p>
                    <span class="env-badge">9ja Demo</span>
                </div>
            </div>

            <div class="sidebar-profile">
                <div class="sidebar-profile-top">
                    <div class="profile-avatar">CC</div>
                    <div class="profile-meta">
                        <h2>Company Account</h2>
                        <p>Corporate Service User</p>
                    </div>
                </div>
                <span class="role-badge">Company Client</span>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Main</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="company-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text"><strong>Dashboard</strong><span>Company overview</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="company-profile.html">
                            <span class="menu-icon">🏢</span>
                            <span class="menu-text"><strong>Company Profile</strong><span>Corporate details</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="company-orders.html">
                            <span class="menu-icon">📦</span>
                            <span class="menu-text"><strong>Company Orders</strong><span>Track and manage orders</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="company-billing.html">
                            <span class="menu-icon">💳</span>
                            <span class="menu-text"><strong>Billing / Payments</strong><span>Invoices and payments</span></span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Company</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="company-authorized-users.html">
                            <span class="menu-icon">👥</span>
                            <span class="menu-text"><strong>Authorized Users</strong><span>Manage staff access</span></span>
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
                            <h1>Company Profile</h1>
                            <p>Update your company information, contact details, and service account records.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Company Details</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="company-top-card">
                            <div class="company-avatar">CC</div>
                            <div class="company-meta">
                                <h3>PrimeBuild Nigeria Ltd</h3>
                                <p>
                                    Keep your company account updated so authorized users, billing,
                                    promo eligibility, and order records remain accurate.
                                </p>
                                <span class="top-pill">Approved</span>
                                <span class="top-pill">Corporate Account</span>
                                <span class="top-pill">Promo Eligible</span>
                            </div>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Company Information</h3>
                                <p>This form is for updating company client records inside the dashboard.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../company/profile/submit/company_profile_update_submit.php
                        -->
                        <form action="../company/profile/submit/company_profile_update_submit.php" method="post">
                            <div class="dashboard-form-grid two-col">
                                <div class="dashboard-form-group">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" id="company_name" name="company_name" value="PrimeBuild Nigeria Ltd" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="company_rc">RC Number</label>
                                    <input type="text" id="company_rc" name="company_rc" value="RC-3319022" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="contact_first_name">Contact Person First Name</label>
                                    <input type="text" id="contact_first_name" name="contact_first_name" value="David" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="contact_last_name">Contact Person Last Name</label>
                                    <input type="text" id="contact_last_name" name="contact_last_name" value="Johnson" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="company_email">Official Company Email</label>
                                    <input type="email" id="company_email" name="company_email" value="admin@primebuild.com" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="company_phone">Official Company Phone</label>
                                    <input type="text" id="company_phone" name="company_phone" value="+2348090000000" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="industry_type">Industry Type</label>
                                    <select id="industry_type" name="industry_type">
                                        <option>Construction</option>
                                        <option>Manufacturing</option>
                                        <option>Retail</option>
                                        <option>Technology</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="company_state">State</label>
                                    <select id="company_state" name="company_state">
                                        <option>Lagos</option>
                                        <option>Ogun</option>
                                        <option>Oyo</option>
                                        <option>Abuja - FCT</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="company_address">Company Address</label>
                                    <textarea id="company_address" name="company_address">No. 20 Industrial Estate Road, Lagos</textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="company_note">Company Note</label>
                                    <textarea id="company_note" name="company_note" placeholder="Enter internal or account note">Company uses Movex for regular logistics movement and project-site delivery.</textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <button type="submit" class="btn-primary">Save Company Profile</button>
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