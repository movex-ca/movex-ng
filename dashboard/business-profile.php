<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/business-profile.html
        PURPOSE:
        Business partner profile page for company details and operating info.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGET:
        ../business/profile/submit/business_profile_update_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Business Profile</title>
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

        .business-top-card {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .business-avatar {
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

        .business-meta h3 {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .business-meta p {
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
            <strong>Business Profile</strong>
            <span>This page is reserved for partner company information, operating scope, and contact details.</span>
        </div>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="dashboard-layout">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <img src="../assets/images/movex-logo.jpg" alt="Movex Logo" />
                <div class="brand-text">
                    <h1>MOVEX</h1>
                    <p>Business Partner Dashboard</p>
                    <span class="env-badge">9ja Demo</span>
                </div>
            </div>

            <div class="sidebar-profile">
                <div class="sidebar-profile-top">
                    <div class="profile-avatar">BP</div>
                    <div class="profile-meta">
                        <h2>Partner Company</h2>
                        <p>Logistics Business Account</p>
                    </div>
                </div>
                <span class="role-badge">Business Partner</span>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Main</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="business-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text"><strong>Dashboard</strong><span>Business overview</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="business-profile.html">
                            <span class="menu-icon">🏢</span>
                            <span class="menu-text"><strong>Company Profile</strong><span>Business details and records</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="business-drivers.html">
                            <span class="menu-icon">🛵</span>
                            <span class="menu-text"><strong>Registered Drivers</strong><span>Drivers under your company</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="business-vehicles.html">
                            <span class="menu-icon">🚘</span>
                            <span class="menu-text"><strong>Vehicles</strong><span>Manage company vehicles</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="business-commissions.html">
                            <span class="menu-icon">₦</span>
                            <span class="menu-text"><strong>Commissions</strong><span>Commission tracking area</span></span>
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
                            <h1>Business Profile</h1>
                            <p>Update your logistics company details, operating pools, and contact records.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Company Profile</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="business-top-card">
                            <div class="business-avatar">BP</div>
                            <div class="business-meta">
                                <h3>Agege Load Movers Ltd</h3>
                                <p>
                                    Keep your business profile updated so driver onboarding, vehicle operations,
                                    commission handling, and partner approval remain accurate.
                                </p>
                                <span class="top-pill">Approved</span>
                                <span class="top-pill">Ajeigboro</span>
                                <span class="top-pill">Truck</span>
                            </div>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Business Information</h3>
                                <p>This form is for updating partner company records inside the dashboard.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../business/profile/submit/business_profile_update_submit.php
                        -->
                        <form action="../business/profile/submit/business_profile_update_submit.php" method="post">
                            <div class="dashboard-form-grid two-col">
                                <div class="dashboard-form-group">
                                    <label for="business_name">Business Name</label>
                                    <input type="text" id="business_name" name="business_name" value="Agege Load Movers Ltd" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="rc_number">RC Number</label>
                                    <input type="text" id="rc_number" name="rc_number" value="RC-2093341" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="contact_first_name">Contact Person First Name</label>
                                    <input type="text" id="contact_first_name" name="contact_first_name" value="Kunle" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="contact_last_name">Contact Person Last Name</label>
                                    <input type="text" id="contact_last_name" name="contact_last_name" value="Adeyemi" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="business_email">Official Business Email</label>
                                    <input type="email" id="business_email" name="business_email" value="ops@agegeload.com" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="business_phone">Official Business Phone</label>
                                    <input type="text" id="business_phone" name="business_phone" value="+2348012345678" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="business_state">State of Operation</label>
                                    <select id="business_state" name="business_state">
                                        <option>Lagos</option>
                                        <option>Ogun</option>
                                        <option>Oyo</option>
                                        <option>Abuja - FCT</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="estimated_drivers">Estimated Drivers</label>
                                    <input type="number" id="estimated_drivers" name="estimated_drivers" value="28" />
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="business_address">Business Address</label>
                                    <textarea id="business_address" name="business_address">No. 14 Transport Yard Road, Agege, Lagos</textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="business_note">Business Note</label>
                                    <textarea id="business_note" name="business_note" placeholder="Enter internal or public company note">Business operates load-carrying trucks across Lagos and nearby routes.</textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <button type="submit" class="btn-primary">Save Business Profile</button>
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